<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cms extends MY_Controller {

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
        $this->load->model('cmsModel');
        $this->load->helper(array('form','text'));
        $this->load->library(array('form_validation'));
    }

    public function index($id=0)
    {
        //echo date("Y-m-d h:i:s");
        //var_dump($this->session->flashdata());
        $this->get_cms($id);
    }

    public function copy_data($id)
    {
        $parent_id = $this->cmsModel->getValue("parent_id","id",$id);
        $this->cmsModel->DuplicateMySQLRecord($id);
        $this->session->set_flashdata('etype', 'success');
        $this->session->set_flashdata('emsg', 'Record copy successfully');
        $this->cms_redirect($parent_id,0,'/');
    }

    public function edit($id=null)
    {
        if($id){
            $parent_id = $this->cmsModel->getValue("parent_id","id",$id);
            $data['sessions'] = $this->session->userdata();
            $data['page_heading'] = "Cms Pages";
            $data['page_parent'] = $parent_id;
            $data['categories'] = $this->get_categories($parent_id,$id);
            $data['cms'] = $this->cmsModel->get_single_cms($id);
            $data['galleries'] = $this->cmsModel->getgalleries();
            $this->load->view(ADMIN_VIEW_FOLDER.'/cms/edit',$data);
        }else{
            redirect(ADMIN_FOLDER.'/cms');
        }
    }

    public function update()
    {
        $ddii = 0;
        $ddtt = 0;
        $ddbb = 0;
        $pp = $this->input->post('page_id',TRUE);
        $cms = $this->cmsModel->get_single_cms($pp);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('helper_name', 'Helper Name', 'trim|max_length[250]');
        $this->form_validation->set_rules('short_detail', 'Short Detail', 'trim|max_length[1000]');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|max_length[100]');
        $this->form_validation->set_rules('parent_id', 'Parent', 'required|integer');
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
                $this->cmsModel->update_cms($pp,$data,false,false,false);
                $delicon = null;
                delFile('cms','icon','/pages/',$cms->icon);
            }else{
                $delicon = $cms->icon;
            }
            if(isset($del_thumbnail)){
                $data = array("thumbnail" => '');
                $this->cmsModel->update_cms($pp,$data,false,false,false);
                $delthumbnail = null;
                delFile('cms','thumbnail','/pages/',$cms->thumbnail);
            }else{
                $delthumbnail = $cms->thumbnail;
            }
            if(isset($del_banner)){
                $data = array("banner" => '');
                $this->cmsModel->update_cms($pp,$data,false,false,false);
                $delbanner = null;
                delFile('cms','banner','/pages/',$cms->banner);
            }else{
                $delbanner = $cms->banner;
            }
            $title = sanitize($this->input->post('title',TRUE));
            $helper_name = sanitize($this->input->post('helper_name',TRUE));
            if($this->input->post('slug',TRUE)){$slug = doSeo(sanitize($this->input->post('slug',TRUE)));}else{$slug = doSeo(sanitize($this->input->post('title',TRUE)));}
            $parent_id = $this->input->post('parent_id',TRUE);
            $content = sanitize($this->input->post('content',FALSE));
            $short_detail = sanitize($this->input->post('short_detail',TRUE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $sort = $this->input->post('sort',TRUE);
            $tags = sanitize($this->input->post('tags',TRUE));
            $meta_title = sanitize($this->input->post('meta_title',TRUE));
            $meta_desc = sanitize($this->input->post('meta_desc',TRUE));
            $meta_key = sanitize($this->input->post('meta_key',TRUE));
            
            $config['upload_path']   = UPLOADPATH.'pages/';
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
                'helper_name' => $helper_name,
                'parent_id' => $parent_id,
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
            if($slug != $cms->slug){
                $updateslug = $slug;
                $full_slug = makeslugs("cms",$parent_id).$slug;
            }else{
                $updateslug = false;
                $full_slug = false;
            }

            // echo $updateslug."<br>";
            // echo $full_slug."<br>";
            // exit();
            // die();
            if($this->cmsModel->update_cms($pp,$postdata,$updateslug,$full_slug)){
                if($ddii==1){delFile('cms','icon','/pages/',$delicon);}
                if($ddtt==1){delFile('cms','thumbnail','/pages/',$delthumbnail);}
                if($ddbb==1){delFile('cms','banner','/pages/',$delbanner);}

                $this->cmsModel->delete_sel_gallery($pp);

                if($this->input->post('documentation',TRUE)){
                    $content1 = implode(",",$this->input->post('documentation',TRUE));
                    $data1 = array(
                        'parent_id' => $pp,
                        'type' => "docs",
                        'content' => $content1
                    );
                    $this->cmsModel->add_sel_gallery($data1);
                }
                if($this->input->post('firmware',TRUE)){
                    $content2 = implode(",",$this->input->post('firmware',TRUE));
                    $data2 = array(
                        'parent_id' => $pp,
                        'type' => "firmware",
                        'content' => $content2
                    );
                    $this->cmsModel->add_sel_gallery($data2);
                }
                if($this->input->post('drivers',TRUE)){
                    $content3 = implode(",",$this->input->post('drivers',TRUE));
                    $data3 = array(
                        'parent_id' => $pp,
                        'type' => "drivers",
                        'content' => $content3
                    );
                    $this->cmsModel->add_sel_gallery($data3);
                }
                if($this->input->post('application',TRUE)){
                    $content4 = implode(",",$this->input->post('application',TRUE));
                    $data4 = array(
                        'parent_id' => $pp,
                        'type' => "application",
                        'content' => $content4
                    );
                    $this->cmsModel->add_sel_gallery($data4);
                }



                $this->session->set_flashdata('etype', 'success');
                $this->session->set_flashdata('emsg', 'page successfully updated');
                $this->cms_redirect(0,$parent_id,'/');
            }else{
                $this->session->set_flashdata('etype', 'danger');
                $this->session->set_flashdata('emsg', 'Somethings wrong check kro bao ji');
                $this->cms_redirect($pp,0,'/edit/');
            }



        }
    }

    public function add($id=0)
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Cms Pages";
        $data['page_parent'] = $id;
        $data['categories'] = $this->get_categories($id);
        $data['galleries'] = $this->cmsModel->getgalleries();
        $this->load->view(ADMIN_VIEW_FOLDER.'/cms/add',$data);
    }

    public function add_submit($id=null)
    {
        $pp = $this->input->post('page_parent',TRUE);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('helper_name', 'Helper Name', 'trim|max_length[250]');
        $this->form_validation->set_rules('short_detail', 'Short Detail', 'trim|max_length[1000]');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|max_length[100]');
        $this->form_validation->set_rules('parent_id', 'Parent', 'required|integer');
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
            $helper_name = sanitize($this->input->post('helper_name',TRUE));
            if($this->input->post('slug',TRUE)){$slug = doSeo(sanitize($this->input->post('slug',TRUE)));}else{$slug = doSeo(sanitize($this->input->post('title',TRUE)));}
            $parent_id = $this->input->post('parent_id',TRUE);
            $short_detail = $this->input->post('short_detail',TRUE);
            $content = sanitize($this->input->post('content',FALSE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $sort = $this->input->post('sort',TRUE);
            $tags = sanitize($this->input->post('tags',TRUE));
            $meta_title = sanitize($this->input->post('meta_title',TRUE));
            $meta_desc = sanitize($this->input->post('meta_desc',TRUE));
            $meta_key = sanitize($this->input->post('meta_key',TRUE));

            $config['upload_path']   = UPLOADPATH.'pages/';
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
                'helper_name' => $helper_name,
                'parent_id' => $parent_id,
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
            $full_slug = makeslugs("cms",$parent_id).$slug;
            $cmsid = $this->cmsModel->add_cms($slug,$full_slug,$postdata);
            if($cmsid){
                if($this->input->post('documentation',TRUE)){
                    $content1 = implode(",",$this->input->post('documentation',TRUE));
                    $data1 = array(
                        'parent_id' => $cmsid,
                        'type' => "docs",
                        'content' => $content1
                    );
                    $this->cmsModel->add_sel_gallery($data1);
                }
                if($this->input->post('firmware',TRUE)){
                    $content2 = implode(",",$this->input->post('firmware',TRUE));
                    $data2 = array(
                        'parent_id' => $cmsid,
                        'type' => "firmware",
                        'content' => $content2
                    );
                    $this->cmsModel->add_sel_gallery($data2);
                }
                if($this->input->post('drivers',TRUE)){
                    $content3 = implode(",",$this->input->post('drivers',TRUE));
                    $data3 = array(
                        'parent_id' => $cmsid,
                        'type' => "drivers",
                        'content' => $content3
                    );
                    $this->cmsModel->add_sel_gallery($data3);
                }
                if($this->input->post('application',TRUE)){
                    $content4 = implode(",",$this->input->post('application',TRUE));
                    $data4 = array(
                        'parent_id' => $cmsid,
                        'type' => "application",
                        'content' => $content4
                    );
                    $this->cmsModel->add_sel_gallery($data4);
                }
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'New page successfully created');
                $this->cms_redirect($pp,$parent_id,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-warning');
                $this->session->set_flashdata('emsg', 'Somethings wrong check kro bao ji');
                $this->cms_redirect($pp,0,'');
            }

            

            
            // Query database for user details
            //$result = $this->userModel->get_user_by_username($username);
        }
    }

    public function delete($id)
    {
        $cms = $this->cmsModel->get_single_cms($id);
        if(isset($cms)){
            if($this->cmsModel->is_parent($id)==1){
                $this->session->set_flashdata('etype', 'danger');
                $this->session->set_flashdata('emsg', 'please delete child pages first');
                $this->cms_redirect(0,$cms->parent_id,'/');
            }else{
                $pageicon = $cms->icon;
                $pagethumb = $cms->thumbnail;
                $pagebanner = $cms->banner;
                if($this->cmsModel->delete_cms($id)){
                    delFile('cms','icon','/pages/',$pageicon);
                    delFile('cms','thumbnail','/pages/',$pagethumb);
                    delFile('cms','banner','/pages/',$pagebanner);
                    $this->cmsModel->delete_sel_gallery($id);
                    $this->session->set_flashdata('etype', 'success');
                    $this->session->set_flashdata('emsg', 'page successfully deleted');
                    $this->cms_redirect(0,$cms->parent_id,'/');
                }else{
                    $this->session->set_flashdata('etype', 'danger');
                    $this->session->set_flashdata('emsg', 'somethings wrong please try again later');
                    $this->cms_redirect(0,$cms->parent_id,'/');    
                }
            }
        }else{
            $this->session->set_flashdata('etype', 'danger');
            $this->session->set_flashdata('emsg', 'Invalid data');
            $this->cms_redirect(0,$cms->parent_id,'/');
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
                        $this->cmsModel->update_cms($check,$data,false,false,false);
                        array_push($succ,$this->cmsModel->getValue("title","id",$check)." sort Updated");
                    }else{
                        array_push($erro,$this->cmsModel->getValue("title","id",$check)." sort is not defined!");
                    }
                }
            }
            if($del_multi){
                foreach($checks as $check){
                    if($this->cmsModel->is_parent($check)==1){
                        array_push($erro,"(".$this->cmsModel->getValue("title","id",$check).") have child pages");
                    }else{
                        $cms = $this->cmsModel->get_single_cms($check);
                        if(isset($cms)){
                            $pageicon = $cms->icon;
                            $pagethumb = $cms->thumbnail;
                            $pagebanner = $cms->banner;
                            array_push($succ,$this->cmsModel->getValue("title","id",$check)." Deleted successfully");
                            $this->cmsModel->delete_cms($check);
                            delFile('cms','icon','/pages/',$pageicon);
                            delFile('cms','thumbnail','/pages/',$pagethumb);
                            delFile('cms','banner','/pages/',$pagebanner);
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
        $categories = $this->cmsModel->get_all_cms(0,true);
        $data = '<select name="parent_id" class="form-control js-selectbox">';
        $data .= '<option value="0">Root Page</option>';
        if(isset($categories)){
        $sel = '';
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

    public function get_cms($id)
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Cms Pages";
        $data['page_parent'] = $id;
        $data['cmss'] = $this->cmsModel->getcms($id);
        $this->load->view(ADMIN_VIEW_FOLDER.'/cms/index',$data);
    }

    public function cms_redirect($p1,$p2,$path)
    {
        if($p1==0){
            if($p2 != 0){
                redirect(ADMIN_FOLDER.'/cms'.$path.$p2);
            }else{
                redirect(ADMIN_FOLDER.'/cms'.$path);
            }
        }else{
            redirect(ADMIN_FOLDER.'/cms'.$path.$p1);
        }
    }

}