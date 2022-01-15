<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends MY_Controller {

    public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        if(!$this->is_logged_in()){
            redirect(ADMIN_FOLDER.'/login');
        }else{
            if(!$this->check_admin()){
                redirect(base_url().'user/profile');
            }
        }
        $this->load->model('galleryModel');
        $this->load->model('gallerycategoriesModel');
        $this->load->helper(array('form','text'));
        $this->load->library(array('form_validation'));
    }

    public function index()
    {
        // $content = "<p>here is ([[tec_gallery id=26]]) and here is another ([[tec_gallery id=27]]) and here is ([[tec_galleryitem id=29]]).</p>";
        // echo handleShortcodes($content);
        $this->get_gallery();
    }
    public function copy_data($id)
    {
        $id = $this->galleryModel->DuplicateMySQLRecord($id);
        $this->session->set_flashdata('etype', 'alert-success');
        $this->session->set_flashdata('emsg', 'Record copy successfully');
        $this->cms_redirect(0,0,'');
    }
    public function add()
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Gallery";
        $data['categories'] = $this->gallerycategoriesModel->get_all_gallerycategories(0,false);
        $this->load->view(ADMIN_VIEW_FOLDER.'/gallery/add',$data);
    }
    public function add_submit()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('type', 'Gallery Type', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('video', 'Video Embed Code', 'trim');
        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('sort', 'Sort', 'required|integer');
        //$this->form_validation->set_message('min_length', '%s field length is invalid');
        $this->form_validation->set_message('max_length', '%s field length is invalid');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
            $this->cms_redirect($pp,0,'/add');
            //$this->load->view('auth/login');
            //echo "invalid data";
        }
        else
        {
            $title = sanitize($this->input->post('title',TRUE));
            $type = $this->input->post('type',TRUE);
            $video = sanitize($this->input->post('video',TRUE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $sort = $this->input->post('sort',TRUE);
            $config['upload_path']   = UPLOADPATH.'gallery/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      =  2048;
            $config['file_ext_tolower'] = TRUE;
            $this->load->library('upload', $config);

            if (!empty($_FILES['thumbnail']['name'])) {
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('thumbnail'))
                {
                    $error = array('infoerror' => $this->upload->display_errors());
                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());
                    $this->cms_redirect($pp,0,'/add');
                }else{
                    $upload_data1 = $this->upload->data();
                    $thumbnail = $upload_data1['file_name'];
                }
            }else{
                $thumbnail = null;
            }
            if (!empty($_FILES['file']['name'])) {
                $config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|pdf|zip|gzip|rar';
                $config['max_size']      =  50048;
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('file'))
                {
                    $error = array('infoerror' => $this->upload->display_errors());
                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());
                    $this->cms_redirect($pp,0,'/add');
                }else{
                    $upload_data2 = $this->upload->data();
                    $file = $upload_data2['file_name'];
                    $file_ext = $upload_data2['file_ext'];
                }
            }else{
                $file = null;
                $file_ext = null;
            }
            

            $postdata = array(
                'title' => $title,
                'type' => $type,
                'video' => $video,
                'thumbnail' => $thumbnail,
                'file' => $file,
                'file_ext' => $file_ext,
                'is_active' => $is_active,
                'sort' => $sort
            );
            $gallery_id = $this->galleryModel->add_gallery($postdata);
            if($gallery_id){
            $checks = $this->input->post('cats',TRUE);
            if($checks){
                foreach($checks as $check){
                    $insert_data[] = array(
                    'gallery_id' => $gallery_id,
                    'gallerycategory_id'=> $check
                    );
                }
            }else{
                $insert_data[] = array(
                    'gallery_id' => $gallery_id,
                    'gallerycategory_id'=> 0
                );
            }
            $this->galleryModel->add_sel_categories($insert_data);




                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'New Gallery successfully created');
                $this->cms_redirect($pp,$parent_id,'');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again');
                $this->cms_redirect($pp,0,'');
            }

            

            
            // Query database for user details
            //$result = $this->userModel->get_user_by_username($username);
        }
    }
    public function edit($id=null)
    {
        if($id){
            $data['sessions'] = $this->session->userdata();
            $data['page_heading'] = "Gallery";
            $data['gallery'] = $this->galleryModel->get_single_gallery($id);
            $data['categories'] = $this->gallerycategoriesModel->get_all_gallerycategories(0,false);
            $data['sel_cat'] = $this->galleryModel->get_selected_categories($id);
            $this->load->view(ADMIN_VIEW_FOLDER.'/gallery/edit',$data);
        }else{
            redirect(ADMIN_FOLDER.'/gallery');
        }
    }
    public function update()
    {
        $deltt = 0;
        $delff = 0;
        $pp = $this->input->post('page_id',TRUE);
        $gallery = $this->galleryModel->get_single_gallery($pp);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('type', 'Gallery Type', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('video', 'Video Embed Code', 'trim');
        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('sort', 'Sort', 'required|integer');
        $this->form_validation->set_message('max_length', '%s field length is invalid');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
            $this->cms_redirect($pp,0,'/edit/');
            //$this->load->view('auth/login');
            //echo "invalid data";
        }
        else
        {
            $del_thumbnail = $this->input->post('del_thumbnail',TRUE);
            $del_file = $this->input->post('del_file',TRUE);

            if(isset($del_thumbnail)){
                $data = array("thumbnail" => '');
                $this->galleryModel->update_gallery($pp,$data,false);
                $delthumbnail = null;
                delFile("gallery","thumbnail","gallery/",$gallery->thumbnail);
            }else{
                $delthumbnail = $gallery->thumbnail;
            }
            
            if(isset($del_file)){
                $data = array("file" => '',"file_ext" => '');
                $this->galleryModel->update_gallery($pp,$data,false);
                $delfile = null;
                $delfile_ext = null;
                delFile("gallery","file","gallery/",$gallery->file);
            }else{
                $delfile = $gallery->file;
                $delfile_ext = $gallery->file_ext;
            }
            $title = sanitize($this->input->post('title',TRUE));
            $type = $this->input->post('type',TRUE);
            $video = sanitize($this->input->post('video',TRUE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $sort = $this->input->post('sort',TRUE);

            $config['upload_path']   = UPLOADPATH.'gallery/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_ext_tolower'] = TRUE;
            $config['max_size']      =  2048;
            $this->load->library('upload', $config);

            if (!empty($_FILES['thumbnail']['name'])) {
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('thumbnail'))
                {
                    $error = array('infoerror' => $this->upload->display_errors());
                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());
                    $this->cms_redirect($pp,0,'/edit/');
                }else{
                    $upload_data1 = $this->upload->data();
                    $thumbnail = $upload_data1['file_name'];
                    $deltt = 1;
                }
            }else{
                $thumbnail = $delthumbnail;
            }

            if (!empty($_FILES['file']['name'])) {
                delFile("gallery","file","gallery/",$delfile);
                $config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|pdf|zip|gzip|rar';
                $config['max_size']      =  50048;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('file'))
                {
                    $error = array('infoerror' => $this->upload->display_errors());
                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());
                    $this->cms_redirect($pp,0,'/edit/');
                }else{
                    $upload_data2 = $this->upload->data();
                    $file = $upload_data2['file_name'];
                    $file_ext = $upload_data2['file_ext'];
                    $delff = 1;
                }
            }else{
                $file = $delfile;
                $file_ext = $delfile_ext;
            }
            
            $postdata = array(
                'title' => $title,
                'type' => $type,
                'video' => $video,
                'thumbnail' => $thumbnail,
                'file' => $file,
                'file_ext' => $file_ext,
                'is_active' => $is_active,
                'sort' => $sort
            );
            if($this->galleryModel->update_gallery($pp,$postdata)){
                if($deltt==1){delFile("gallery","thumbnail","gallery/",$delthumbnail);}
                if($delff==1){delFile("gallery","thumbnail","gallery/",$delfile);}
                $checks = $this->input->post('cats',TRUE);
                $this->galleryModel->delete_sel_categories($pp);
                if($checks){
                    foreach($checks as $check){
                        $insert_data[] = array(
                        'gallery_id' => $pp,
                        'gallerycategory_id'=> $check
                        );
                    }
                }else{
                    $insert_data[] = array(
                        'gallery_id' => $pp,
                        'gallerycategory_id'=> 0
                    );
                }
                $this->galleryModel->add_sel_categories($insert_data);
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'gallery successfully updated');
                $this->cms_redirect(0,0,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again later');
                $this->cms_redirect($pp,0,'/edit/');
            }



        }
    }
    public function delete($id)
    {
        $gallery = $this->galleryModel->get_single_gallery($id);
        if(isset($gallery)){
            $gallerythumb = $gallery->thumbnail;
            $galleryfile = $gallery->file;
            if($this->galleryModel->delete_gallery($id)){
                delFile('gallery','thumbnail','/gallery/',$gallerythumb);
                delFile('gallery','file','/gallery/',$galleryfile);
                $this->galleryModel->delete_sel_categories($id);
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'gallery successfully deleted');
                $this->cms_redirect(0,0,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'somethings wrong please try again later');
                $this->cms_redirect(0,0,'/');    
            }
        }else{
            $this->session->set_flashdata('etype', 'alert-error');
            $this->session->set_flashdata('emsg', 'Invalid data');
            $this->cms_redirect(0,0,'/');
        }
    }
    public function multi_data()
    {
        $sort_multi = $this->input->post('multi_sort',TRUE);
        $del_multi = $this->input->post('multi_del',TRUE);
        $checks = $this->input->post('check',TRUE);
        if($checks){
            $erro = array();
            $succ = array();
            if($sort_multi){
                foreach($checks as $check){
                    $sort = $this->input->post($check,TRUE);
                    if($sort != ""){
                        $data = array('sort'=> $this->input->post($check,TRUE));
                        $this->galleryModel->update_gallery($check,$data,false);
                        array_push($succ,$this->galleryModel->getValue("title","id",$check)." sort Updated");
                    }else{
                        array_push($erro,$this->galleryModel->getValue("title","id",$check)." sort is not defined!");
                    }
                }
            }
            if($del_multi){
                foreach($checks as $check){
                    $gallery = $this->galleryModel->get_single_gallery($check);
                    if(isset($gallery)){
                        $gallerythumb = $gallery->thumbnail;
                        $galleryfile = $gallery->file;
                        array_push($succ,$this->galleryModel->getValue("title","id",$check)." Deleted successfully");
                        $this->galleryModel->delete_gallery($check);
                        delFile('gallery','thumbnail','/gallery/',$gallerythumb);
                        delFile('gallery','file','/gallery/',$galleryfile);
                        $this->galleryModel->delete_sel_categories($check);
                    }
                }
            }

            if(isset($succ)){
                $md_array['infosucc'] = $succ;
            }
            if(isset($erro)){
                $md_array['infoerror'] = $erro;
            }
            $this->session->set_flashdata('iii', $md_array);
            $this->cms_redirect(0,0,'/');

        }else{
            $this->session->set_flashdata('etype', 'alert-info');
            $this->session->set_flashdata('emsg', 'Checkbox not selected');
            $this->cms_redirect(0,0,'');
        }

        
        
    }
    public function get_gallery()
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Gallery";
        $data['gallerys'] = $this->galleryModel->get_all_gallery();
        $this->load->view(ADMIN_VIEW_FOLDER.'/gallery/index',$data);
    }
    public function cms_redirect($p1,$p2,$path)
    {
        if($p1==0){
            if($p2 != 0){
                redirect(ADMIN_FOLDER.'/gallery'.$path.$p2);
            }else{
                redirect(ADMIN_FOLDER.'/gallery'.$path);
            }
        }else{
            redirect(ADMIN_FOLDER.'/gallery'.$path.$p1);
        }
    }

}