<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BannerCategories extends MY_Controller {

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
        $this->load->model('bannercategoriesModel');
        $this->load->helper(array('form','text'));
        $this->load->library(array('form_validation'));
    }
    public function index($id=0)
    {
        //echo date("Y-m-d h:i:s");
        //var_dump($this->session->flashdata());
        $this->get_bannercategories($id);
    }
    public function copy_data($id)
    {
        $parent_id = $this->bannercategoriesModel->getValue("parent_id","id",$id);
        $this->bannercategoriesModel->DuplicateMySQLRecord($id);
        $this->session->set_flashdata('etype', 'alert-success');
        $this->session->set_flashdata('emsg', 'Record copy successfully');
        $this->cms_redirect($parent_id,0,'/');
    }
    public function edit($id=null)
    {
        if($id){
            $parent_id = $this->bannercategoriesModel->getValue("parent_id","id",$id);
            $data['sessions'] = $this->session->userdata();
            $data['page_heading'] = "Banner Categories";
            $data['page_parent'] = $parent_id;
            $data['bannercategoriescategories'] = $this->get_categories($parent_id,$id);
            $data['bannercategory'] = $this->bannercategoriesModel->get_single_category($id);
            $this->load->view(ADMIN_VIEW_FOLDER.'/banner/categories/edit',$data);
        }else{
            redirect(ADMIN_FOLDER.'/banner/categories');
        }
    }
    public function update()
    {
        $pp = $this->input->post('page_id',TRUE);
        $bannercategory = $this->bannercategoriesModel->get_single_category($pp);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('parent_id', 'Parent', 'required|integer');
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
            
            $title = sanitize($this->input->post('title',TRUE));
            $parent_id = $this->input->post('parent_id',TRUE);
            
            $postdata = array(
                'title' => $title,
                'parent_id' => $parent_id,
            );

            
            if($this->bannercategoriesModel->update_bannercategory($pp,$postdata)){
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'Banner category successfully updated');
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
        $data['page_heading'] = "Banner Categories";
        $data['page_parent'] = $id;
        $data['categories'] = $this->get_categories($id);
        $this->load->view(ADMIN_VIEW_FOLDER.'/banner/categories/add',$data);
    }
    public function delete($id)
    {
        $bannercategory = $this->bannercategoriesModel->get_single_category($id);
        if(isset($bannercategory)){
            if($this->bannercategoriesModel->is_parent($id)==1){
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'please delete child categories first');
                $this->cms_redirect(0,$bannercategory->parent_id,'/');
            }else{
                if($this->bannercategoriesModel->delete_category($id)){
                    $this->session->set_flashdata('etype', 'alert-success');
                    $this->session->set_flashdata('emsg', 'banner category successfully deleted');
                    $this->cms_redirect(0,$bannercategory->parent_id,'/');
                }else{
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'somethings wrong please try again later');
                    $this->cms_redirect(0,$bannercategory->parent_id,'/');    
                }
            }
        }else{
            $this->session->set_flashdata('etype', 'alert-error');
            $this->session->set_flashdata('emsg', 'Invalid data');
            $this->cms_redirect(0,$bannercategory->parent_id,'/');
        }
    }
    public function multi_data()
    {
        $del_multi = $this->input->post('multi_del',TRUE);
        $checks = $this->input->post('check',TRUE);
        if($checks){
            $erro = array();
            $succ = array();
            if($del_multi){
                foreach($checks as $check){
                    if($this->bannercategoriesModel->is_parent($check)==1){
                        array_push($erro,"(".$this->bannercategoriesModel->getValue("title","id",$check).") have child pages");
                    }else{
                        $bannercategory = $this->bannercategoriesModel->get_single_category($check);
                        if(isset($bannercategory)){
                            array_push($succ,$this->bannercategoriesModel->getValue("title","id",$check)." Deleted successfully");
                            $this->bannercategoriesModel->delete_category($check);
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
        $categories = $this->bannercategoriesModel->get_all_bannercategories(0,true);
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
        $this->form_validation->set_rules('parent_id', 'Parent', 'required|integer');
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
            $parent_id = $this->input->post('parent_id',TRUE);
            

            $postdata = array(
                'title' => $title,
                'parent_id' => $parent_id,
            );

            if($this->bannercategoriesModel->add_bannercategory($postdata)){
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
    public function get_bannercategories($id)
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Banner Categories";
        $data['page_parent'] = $id;
        $data['bannercategories'] = $this->bannercategoriesModel->getbannercategories($id);
        $this->load->view(ADMIN_VIEW_FOLDER.'/banner/categories/index',$data);
    }
    public function cms_redirect($p1,$p2,$path)
    {
        if($p1==0){
            if($p2 != 0){
                redirect(ADMIN_FOLDER.'/banner/categories'.$path.$p2);
            }else{
                redirect(ADMIN_FOLDER.'/banner/categories'.$path);
            }
        }else{
            redirect(ADMIN_FOLDER.'/banner/categories'.$path.$p1);
        }
    }
}