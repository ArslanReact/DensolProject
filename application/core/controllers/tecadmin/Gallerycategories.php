<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GalleryCategories extends MY_Controller {

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
        $this->load->model('gallerycategoriesModel');
        $this->load->helper(array('form','text'));
        $this->load->library(array('form_validation'));
    }
    public function index($id=0)
    {
        //echo date("Y-m-d h:i:s");
        //var_dump($this->session->flashdata());
        $this->get_gallerycategories($id);
    }
    public function copy_data($id)
    {
        $parent_id = $this->gallerycategoriesModel->getValue("parent_id","id",$id);
        $this->gallerycategoriesModel->DuplicateMySQLRecord($id);
        $this->session->set_flashdata('etype', 'alert-success');
        $this->session->set_flashdata('emsg', 'Record copy successfully');
        $this->cms_redirect($parent_id,0,'/');
    }
    public function edit($id=null)
    {
        if($id){
            $parent_id = $this->gallerycategoriesModel->getValue("parent_id","id",$id);
            $data['sessions'] = $this->session->userdata();
            $data['page_heading'] = "Gallery Categories";
            $data['page_parent'] = $parent_id;
            $data['gallerycategoriescategories'] = $this->get_categories($parent_id,$id);
            $data['gallerycategory'] = $this->gallerycategoriesModel->get_single_category($id);
            $this->load->view(ADMIN_VIEW_FOLDER.'/gallery/categories/edit',$data);
        }else{
            redirect(ADMIN_FOLDER.'/gallery/categories');
        }
    }
    public function update()
    {
        $ddii = 0;
        $ddtt = 0;
        $ddbb = 0;
        $pp = $this->input->post('page_id',TRUE);
        $gallerycategory = $this->gallerycategoriesModel->get_single_category($pp);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|max_length[100]');
        $this->form_validation->set_rules('parent_id', 'Parent', 'required|integer');
        $this->form_validation->set_rules('content', 'Page Content', 'trim');
        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('sort', 'Sort', 'required|integer');
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
                $this->gallerycategoriesModel->update_gallerycategory($pp,$data,false,false);
                $delicon = null;
                delFile('gallery_categories','icon','/gallery/categories/',$gallerycategory->icon);
            }else{
                $delicon = $gallerycategory->icon;
            }
            if(isset($del_thumbnail)){
                $data = array("thumbnail" => '');
                $this->gallerycategoriesModel->update_gallerycategory($pp,$data,false,false);
                $delthumbnail = null;
                delFile('gallery_categories','thumbnail','/gallery/categories/',$gallerycategory->thumbnail);
            }else{
                $delthumbnail = $gallerycategory->thumbnail;
            }
            if(isset($del_banner)){
                $data = array("banner" => '');
                $this->gallerycategoriesModel->update_gallerycategory($pp,$data,false,false);
                $delbanner = null;
                delFile('gallery_categories','banner','/gallery/categories/',$gallerycategory->banner);
            }else{
                $delbanner = $gallerycategory->banner;
            }
            $title = sanitize($this->input->post('title',TRUE));
            if($this->input->post('slug',TRUE)){$slug = doSeo(sanitize($this->input->post('slug',TRUE)));}else{$slug = doSeo(sanitize($this->input->post('title',TRUE)));}
            $parent_id = $this->input->post('parent_id',TRUE);
            $content = sanitize($this->input->post('content',TRUE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $sort = $this->input->post('sort',TRUE);
            $meta_title = sanitize($this->input->post('meta_title',TRUE));
            $meta_desc = sanitize($this->input->post('meta_desc',TRUE));
            $meta_key = sanitize($this->input->post('meta_key',TRUE));

            $config['upload_path']   = UPLOADPATH.'gallery/categories/';
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
                'parent_id' => $parent_id,
                'is_active' => $is_active,
                'content' => $content,
                'sort' => $sort,
                'icon' => $icon,
                'thumbnail' => $thumbnail,
                'banner' => $banner,
                'meta_title' => $meta_title,
                'meta_desc' => $meta_desc,
                'meta_key' => $meta_key
            );

            if($slug != $gallerycategory->slug){
                $updateslug = $slug;
            }else{
                $updateslug = false;
            }
            if($this->gallerycategoriesModel->update_gallerycategory($pp,$postdata,$updateslug)){
                if($ddii == 1){delFile('gallery_categories','icon','/gallery/categories/',$delicon);}
                if($ddtt == 1){delFile('gallery_categories','thumbnail','/gallery/categories/',$delthumbnail);}
                if($ddbb == 1){delFile('gallery_categories','banner','/gallery/categories/',$delbanner);}
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'gallery category successfully updated');
                $this->cms_redirect(0,$parent_id,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again');
                $this->cms_redirect($pp,0,'/edit/');
            }



        }
    }
    public function add($id=0)
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Gallery Categories";
        $data['page_parent'] = $id;
        $data['categories'] = $this->get_categories($id);
        $this->load->view(ADMIN_VIEW_FOLDER.'/gallery/categories/add',$data);
    }
    public function delete($id)
    {
        $gallerycategory = $this->gallerycategoriesModel->get_single_category($id);
        if(isset($gallerycategory)){
            if($this->gallerycategoriesModel->is_parent($id)==1){
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'please delete child categories first');
                $this->cms_redirect(0,$gallerycategory->parent_id,'/');
            }else{
                $gallerycategoryicon = $gallerycategory->icon;
                $gallerycategorythumb = $gallerycategory->thumbnail;
                $gallerycategorybanner = $gallerycategory->banner;
                if($this->gallerycategoriesModel->delete_category($id)){
                    delFile('gallery_categories','icon','/gallery/categories/',$gallerycategoryicon);
                    delFile('gallery_categories','thumbnail','/gallery/categories/',$gallerycategorythumb);
                    delFile('gallery_categories','banner','/gallery/categories/',$gallerycategorybanner);
                    $this->gallerycategoriesModel->update_sel_categories($id);
                    $this->session->set_flashdata('etype', 'alert-success');
                    $this->session->set_flashdata('emsg', 'gallery category successfully deleted');
                    $this->cms_redirect(0,$gallerycategory->parent_id,'/');
                }else{
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'somethings wrong please try again later');
                    $this->cms_redirect(0,$gallerycategory->parent_id,'/');    
                }
            }
        }else{
            $this->session->set_flashdata('etype', 'alert-error');
            $this->session->set_flashdata('emsg', 'Invalid data');
            $this->cms_redirect(0,$gallerycategory->parent_id,'/');
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
                        $this->gallerycategoriesModel->update_gallerycategory($check,$data,false,false);
                        array_push($succ,$this->gallerycategoriesModel->getValue("title","id",$check)." sort Updated");
                    }else{
                        array_push($erro,$this->gallerycategoriesModel->getValue("title","id",$check)." sort is not defined!");
                    }
                }
            }
            if($del_multi){
                foreach($checks as $check){
                    if($this->gallerycategoriesModel->is_parent($check)==1){
                        array_push($erro,"(".$this->gallerycategoriesModel->getValue("title","id",$check).") have child pages");
                    }else{
                        $gallerycategory = $this->gallerycategoriesModel->get_single_category($check);
                        if(isset($gallerycategory)){
                            $gallerycategoryicon = $gallerycategory->icon;
                            $gallerycategorythumb = $gallerycategory->thumbnail;
                            $gallerycategorybanner = $gallerycategory->banner;
                            array_push($succ,$this->gallerycategoriesModel->getValue("title","id",$check)." Deleted successfully");
                            $this->gallerycategoriesModel->delete_category($check);
                            delFile('gallery_categories','icon','/gallery/categories/',$gallerycategoryicon);
                            delFile('gallery_categories','thumbnail','/gallery/categories/',$gallerycategorythumb);
                            delFile('gallery_categories','banner','/gallery/categories/',$gallerycategorybanner);
                            $this->gallerycategoriesModel->update_sel_categories($check);
                        }
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
    private function get_categories($id=0,$mid=0)
    {
        $categories = $this->gallerycategoriesModel->get_all_gallerycategories(0,true);
        $data = '<select name="parent_id" class="form-control js-selectbox">';
        $data .= '<option value="0">Root Category</option>';
        if(isset($categories)){
            foreach($categories as $categorie){
                if($mid != $categorie->id){
                if($id==$categorie->id){$sel = "selected";}else{$sel="";}
                $data .= '<option '.$sel.' value="'.$categorie->id.'">'.$categorie->title.'</option>';
                }
            }
        }
        $data .= '</select>';
        return $data;
    }
    public function add_submit($id=null)
    {
        $pp = $this->input->post('page_parent',TRUE);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|max_length[100]');
        $this->form_validation->set_rules('parent_id', 'Parent', 'required|integer');
        $this->form_validation->set_rules('content', 'Page Content', 'trim');
        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('sort', 'Sort', 'required|integer');
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
            if($this->input->post('slug',TRUE)){$slug = doSeo(sanitize($this->input->post('slug',TRUE)));}else{$slug = doSeo(sanitize($this->input->post('title',TRUE)));}
            $parent_id = $this->input->post('parent_id',TRUE);
            $content = $this->input->post('content',TRUE);
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $sort = $this->input->post('sort',TRUE);
            $meta_title = sanitize($this->input->post('meta_title',TRUE));
            $meta_desc = sanitize($this->input->post('meta_desc',TRUE));
            $meta_key = sanitize($this->input->post('meta_key',TRUE));

            $config['upload_path']   = UPLOADPATH.'gallery/categories/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      =  2048;
            $config['file_name'] = "icon";
            $this->load->library('upload', $config);
            if (!empty($_FILES['icon']['name'])) {
                $config['file_name'] = "icon";
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('icon'))
                {
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'icon file error');
                    $this->cms_redirect(0,0,'/add');
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
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'thumbnail file error');
                    $this->cms_redirect(0,0,'/add');
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
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'banner file error');
                    $this->cms_redirect(0,0,'/add');
                }else{
                    $upload_data3 = $this->upload->data();
                    $banner = $upload_data3['file_name'];
                }
            }else{
                $banner = null;
            }

            $postdata = array(
                'title' => $title,
                'parent_id' => $parent_id,
                'content' => $content,
                'is_active' => $is_active,
                'sort' => $sort,
                'icon' => $icon,
                'thumbnail' => $thumbnail,
                'banner' => $banner,
                'meta_title' => $meta_title,
                'meta_desc' => $meta_desc,
                'meta_key' => $meta_key
            );

            if($this->gallerycategoriesModel->add_gallerycategory($slug,$postdata)){
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'New category successfully created');
                $this->cms_redirect($pp,$parent_id,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again');
                $this->cms_redirect($pp,0,'');
            }

            

            
            // Query database for user details
            //$result = $this->userModel->get_user_by_username($username);
        }
    }
    public function get_gallerycategories($id)
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Gallery Categories";
        $data['page_parent'] = $id;
        $data['gallerycategories'] = $this->gallerycategoriesModel->getgallerycategories($id);
        $this->load->view(ADMIN_VIEW_FOLDER.'/gallery/categories/index',$data);
    }
    public function cms_redirect($p1,$p2,$path)
    {
        if($p1==0){
            if($p2 != 0){
                redirect(ADMIN_FOLDER.'/gallery/categories'.$path.$p2);
            }else{
                redirect(ADMIN_FOLDER.'/gallery/categories'.$path);
            }
        }else{
            redirect(ADMIN_FOLDER.'/gallery/categories'.$path.$p1);
        }
    }
}