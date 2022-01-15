<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends MY_Controller {

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
        $this->load->model('newsModel');
        $this->load->model('newscategoriesModel');
        $this->load->helper(array('form','text'));
        $this->load->library(array('form_validation'));
    }

    public function index($id=null)
    {
        // $content = "<p>here is ([[tec_gallery id=26]]) and here is another ([[tec_gallery id=27]]) and here is ([[tec_galleryitem id=29]]).</p>";
        // echo handleShortcodes($content);
        $this->get_news($id);
    }
    public function copy_data($id)
    {
        $id = $this->newsModel->DuplicateMySQLRecord($id);
        $this->session->set_flashdata('etype', 'alert-success');
        $this->session->set_flashdata('emsg', 'Record copy successfully');
        $this->cms_redirect(0,0,'');
    }
    public function add()
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "News";
        $data['categories'] = $this->newscategoriesModel->get_all_newscategories(0,false);
        $this->load->view(ADMIN_VIEW_FOLDER.'/news/add',$data);
    }
    public function add_submit($id=null)
    {
        $pp = $this->input->post('page_parent',TRUE);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('icon_code', 'Icon Code', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('short_detail', 'Short Detail', 'trim|max_length[1000]');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|max_length[100]');
        $this->form_validation->set_rules('content', 'Page Content', 'trim');
        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('sort', 'Sort', 'required|integer');
        $this->form_validation->set_rules('tags', 'Page Tags', 'trim|max_length[250]');
        $this->form_validation->set_rules('meta_title', 'Seo Title', 'trim|max_length[250]');
        $this->form_validation->set_rules('meta_desc', 'Seo Description', 'trim|max_length[250]');
        $this->form_validation->set_rules('meta_key', 'Seo Keywords', 'trim|max_length[250]');
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
            $icon_code = sanitize($this->input->post('icon_code',TRUE));
            if($this->input->post('slug',TRUE)){$slug = doSeo(sanitize($this->input->post('slug',TRUE)));}else{$slug = doSeo(sanitize($this->input->post('title',TRUE)));}
            $parent_id = $this->input->post('parent_id',TRUE);
            $short_detail = $this->input->post('short_detail',TRUE);
            $content = sanitize($this->input->post('content',TRUE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $sort = $this->input->post('sort',TRUE);
            $tags = sanitize($this->input->post('tags',TRUE));
            $meta_title = sanitize($this->input->post('meta_title',TRUE));
            $meta_desc = sanitize($this->input->post('meta_desc',TRUE));
            $meta_key = sanitize($this->input->post('meta_key',TRUE));
            $config['upload_path']   = UPLOADPATH.'news/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      =  2048;
            $config['file_name'] = "icon";
            $this->load->library('upload', $config);

            if (!empty($_FILES['icon']['name'])) {
                $config['file_name'] = "icon";
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('icon'))
                {
                    $error = array('infoerror' => $this->upload->display_errors());
                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());
                    $this->cms_redirect($pp,0,'/add');
                }else{
                    $upload_data1 = $this->upload->data();
                    $icon = $upload_data1['file_name'];
                }
            }else{
                $icon = null;
            }
            if (!empty($_FILES['thumbnail']['name'])) {
                $config['file_name'] = "thumbnail";
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('thumbnail'))
                {
                    $error = array('infoerror' => $this->upload->display_errors());
                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());
                    $this->cms_redirect($pp,0,'/add');
                }else{
                    $upload_data2 = $this->upload->data();
                    $thumbnail = $upload_data2['file_name'];
                }
            }else{
                $thumbnail = null;
            }
            if (!empty($_FILES['banner']['name'])) {
                $config['file_name'] = "banner";
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('banner'))
                {
                    $error = array('infoerror' => $this->upload->display_errors());
                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());
                    $this->cms_redirect($pp,0,'/add');
                }else{
                    $upload_data3 = $this->upload->data();
                    $banner = $upload_data3['file_name'];
                }
            }else{
                $banner = null;
            }




            $postdata = array(
                'title' => $title,
                'icon_code' => $icon_code,
                'short_detail' => $short_detail,
                'content' => $content,
                'is_active' => $is_active,
                'sort' => $sort,
                'tags' => $tags,
                'icon' => $icon,
                'thumbnail' => $thumbnail,
                'banner' => $banner,
                'meta_title' => $meta_title,
                'meta_desc' => $meta_desc,
                'meta_key' => $meta_key
            );
            $news_id = $this->newsModel->add_news($slug,$postdata);
            if($news_id){
            $checks = $this->input->post('cats',TRUE);
            if($checks){
                foreach($checks as $check){
                    $insert_data[] = array(
                    'news_id' => $news_id,
                    'newscategory_id'=> $check
                    );
                }
            }else{
                $insert_data[] = array(
                    'news_id' => $news_id,
                    'newscategory_id'=> 0
                );
            }
            $this->newsModel->add_sel_categories($insert_data);




                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'New news successfully created');
                $this->cms_redirect($pp,$parent_id,'');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again.');
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
            $data['page_heading'] = "News";
            $data['news'] = $this->newsModel->get_single_news($id);
            $data['categories'] = $this->newscategoriesModel->get_all_newscategories(0,false);
            $data['sel_cat'] = $this->newsModel->get_selected_categories($id);
            $this->load->view(ADMIN_VIEW_FOLDER.'/news/edit',$data);
        }else{
            redirect(ADMIN_FOLDER.'/news');
        }
    }
    public function update()
    {
        $ddii = 0;
        $ddtt = 0;
        $ddbb = 0;
        $pp = $this->input->post('page_id',TRUE);
        $news = $this->newsModel->get_single_news($pp);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('icon_code', 'Icon Code', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('short_detail', 'Short Detail', 'trim|max_length[1000]');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|max_length[100]');
        $this->form_validation->set_rules('content', 'Page Content', 'trim');
        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('sort', 'Sort', 'required|integer');
        $this->form_validation->set_rules('tags', 'Page Tags', 'trim|max_length[250]');
        $this->form_validation->set_rules('meta_title', 'Seo Title', 'trim|max_length[250]');
        $this->form_validation->set_rules('meta_desc', 'Seo Description', 'trim|max_length[250]');
        $this->form_validation->set_rules('meta_key', 'Seo Keywords', 'trim|max_length[250]');
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
            $del_icon = $this->input->post('del_icon',TRUE);
            $del_thumbnail = $this->input->post('del_thumbnail',TRUE);
            $del_banner = $this->input->post('del_banner',TRUE);

            if(isset($del_icon)){
                $data = array("icon" => null);
                $this->newsModel->update_news($pp,$data,false,false);
                $delicon = null;
                delFile('news','icon','/news/',$news->icon);
            }else{
                $delicon = $news->icon;
            }
            if(isset($del_thumbnail)){
                $data = array("thumbnail" => '');
                $this->newsModel->update_news($pp,$data,false,false);
                $delthumbnail = null;
                delFile('news','thumbnail','/news/',$news->thumbnail);
            }else{
                $delthumbnail = $news->thumbnail;
            }
            if(isset($del_banner)){
                $data = array("banner" => '');
                $this->newsModel->update_news($pp,$data,false,false);
                $delbanner = null;
                delFile('news','banner','/news/',$news->banner);
            }else{
                $delbanner = $news->banner;
            }
            $title = sanitize($this->input->post('title',TRUE));
            $icon_code = sanitize($this->input->post('icon_code',TRUE));
            if($this->input->post('slug',TRUE)){$slug = doSeo(sanitize($this->input->post('slug',TRUE)));}else{$slug = doSeo(sanitize($this->input->post('title',TRUE)));}
            $short_detail = sanitize($this->input->post('short_detail',TRUE));
            $content = sanitize($this->input->post('content',TRUE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $sort = $this->input->post('sort',TRUE);
            $tags = sanitize($this->input->post('tags',TRUE));
            $meta_title = sanitize($this->input->post('meta_title',TRUE));
            $meta_desc = sanitize($this->input->post('meta_desc',TRUE));
            $meta_key = sanitize($this->input->post('meta_key',TRUE));

            $config['upload_path']   = UPLOADPATH.'news/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      =  2048;
            $config['file_name'] = "icon";
            $this->load->library('upload', $config);

            if (!empty($_FILES['icon']['name'])) {
                $config['file_name'] = "icon";
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('icon'))
                {
                    $error = array('infoerror' => $this->upload->display_errors());
                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());
                    $this->cms_redirect($pp,0,'/edit/');
                }else{
                    $upload_data1 = $this->upload->data();
                    $icon = $upload_data1['file_name'];
                    $ddii = 1;
                }
            }else{
                $icon = $delicon;
            }
            if (!empty($_FILES['thumbnail']['name'])) {
                $config['file_name'] = "thumbnail";
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('thumbnail'))
                {
                    $error = array('infoerror' => $this->upload->display_errors());
                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());
                    $this->cms_redirect($pp,0,'/edit/');
                }else{
                    $upload_data2 = $this->upload->data();
                    $thumbnail = $upload_data2['file_name'];
                    $ddtt = 1;
                }
            }else{
                $thumbnail = $delthumbnail;
            }
            if (!empty($_FILES['banner']['name'])) {
                $config['file_name'] = "banner";
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('banner'))
                {
                    $error = array('infoerror' => $this->upload->display_errors());
                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());
                    $this->cms_redirect($pp,0,'/edit/');
                }else{
                    $upload_data3 = $this->upload->data();
                    $banner = $upload_data3['file_name'];
                    $ddbb = 1;
                }
            }else{
                $banner = $delbanner;
            }




            $postdata = array(
                'title' => $title,
                'icon_code' => $icon_code,
                'short_detail' => $short_detail,
                'content' => $content,
                'is_active' => $is_active,
                'sort' => $sort,
                'tags' => $tags,
                'icon' => $icon,
                'thumbnail' => $thumbnail,
                'banner' => $banner,
                'meta_title' => $meta_title,
                'meta_desc' => $meta_desc,
                'meta_key' => $meta_key
            );
            if($slug != $news->slug){
                $updateslug = $slug;
            }else{
                $updateslug = false;
            }
            if($this->newsModel->update_news($pp,$postdata,$updateslug)){
                if($ddii == 1){delFile('news','icon','/news/',$delicon);}
                if($ddtt == 1){delFile('news','thumbnail','/news/',$delthumbnail);}
                if($ddbb == 1){delFile('news','banner','/news/',$delbanner);}
                $checks = $this->input->post('cats',TRUE);
                $this->newsModel->delete_sel_categories($pp);
                if($checks){
                    foreach($checks as $check){
                        $insert_data[] = array(
                        'news_id' => $pp,
                        'newscategory_id'=> $check
                        );
                    }
                }else{
                    $insert_data[] = array(
                        'news_id' => $pp,
                        'newscategory_id'=> 0
                    );
                }
                $this->newsModel->add_sel_categories($insert_data);

                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'news successfully updated');
                $this->cms_redirect(0,0,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again.');
                $this->cms_redirect($pp,0,'/edit/');
            }



        }
    }
    public function delete($id)
    {
        $news = $this->newsModel->get_single_news($id);
        if(isset($news)){
            $newsicon = $news->icon;
            $newsthumb = $news->thumbnail;
            $newsbanner = $news->banner;
            if($this->newsModel->delete_news($id)){
                delFile('news','icon','/news/',$newsicon);
                delFile('news','thumbnail','/news/',$newsthumb);
                delFile('news','banner','/news/',$newsbanner);
                $this->newsModel->delete_sel_categories($id);
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'news successfully deleted');
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
                        $this->newsModel->update_news($check,$data,false,false);
                        array_push($succ,$this->newsModel->getValue("title","id",$check)." sort Updated");
                    }else{
                        array_push($erro,$this->newsModel->getValue("title","id",$check)." sort is not defined!");
                    }
                }
            }
            if($del_multi){
                foreach($checks as $check){
                    $news = $this->newsModel->get_single_news($check);
                    if(isset($news)){
                        $newsicon = $news->icon;
                        $newsthumb = $news->thumbnail;
                        $newsbanner = $news->banner;
                        array_push($succ,$this->newsModel->getValue("title","id",$check)." Deleted successfully");
                        $this->newsModel->delete_news($check);
                        delFile('news','icon','/news/',$newsicon);
                        delFile('news','thumbnail','/news/',$newsthumb);
                        delFile('news','banner','/news/',$newsbanner);
                        $this->newsModel->delete_sel_categories($check);
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
    public function get_news($id)
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "News";
        $data['news'] = $this->newsModel->get_all_news($id);
        $this->load->view(ADMIN_VIEW_FOLDER.'/news/index',$data);
    }
    public function cms_redirect($p1,$p2,$path)
    {
        if($p1==0){
            if($p2 != 0){
                redirect(ADMIN_FOLDER.'/news'.$path.$p2);
            }else{
                redirect(ADMIN_FOLDER.'/news'.$path);
            }
        }else{
            redirect(ADMIN_FOLDER.'/news'.$path.$p1);
        }
    }

}