<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usersgroup extends MY_Controller {



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
        $this->load->model('usersgroupModel');
        $this->load->helper(array('form','text'));
        $this->load->library(array('form_validation'));
    }

    public function index()
    {
        $this->get_usersgroups();
    }

    public function add()
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Users Group";
        $this->load->view(ADMIN_VIEW_FOLDER.'/users/group/add',$data);
    }

    public function add_submit($id=null)
    {
        $this->form_validation->set_rules('title', 'Group Name', 'trim|required|min_length[4]|max_length[40]');
        // $this->form_validation->set_rules('discount_type', 'Discount Type', 'trim|required|min_length[1]|max_length[2]');
        // $this->form_validation->set_rules('discount', 'Discount', 'trim|required');
        $this->form_validation->set_rules('is_active', 'is Active', 'required|integer|max_length[1]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
            $this->cms_redirect(0,0,'/add');
            //echo "invalid data";
        }else{
            $title = sanitize($this->input->post('title',TRUE));
            // $discount_type = sanitize($this->input->post('discount_type',TRUE));
            // $discount = sanitize($this->input->post('discount',TRUE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $data = array(
                'title' => $title,
                'is_active' => $is_active
            );
            $result = $this->usersgroupModel->add_usersgroup($data);
            if($result){
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'User Group successfully Created');
                $this->cms_redirect(0,0,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'somethings wrong please try again');
                $this->cms_redirect(0,0,'add/');
            }
        }
    }

    

    public function edit($id=null)
    {
        if($id){
            $data['sessions'] = $this->session->userdata();
            $data['page_heading'] = "Users Group";
            $data['usergroups'] = $this->usersgroupModel->get_usersgroup_by_id($id);
            $this->load->view(ADMIN_VIEW_FOLDER.'/users/group/edit',$data);
        }else{
            redirect(ADMIN_FOLDER.'/users-group');
        }
    }

    public function update()
    {
        $pp = sanitize($this->input->post('page_id',TRUE));
        $usergroup = $this->usersgroupModel->get_usersgroup_by_id($pp);
        $this->form_validation->set_rules('title', 'Group Name', 'trim|required|min_length[4]|max_length[40]');
        // $this->form_validation->set_rules('discount_type', 'Discount Type', 'trim|required|min_length[1]|max_length[2]');
        // $this->form_validation->set_rules('discount', 'Discount', 'trim|required');
        $this->form_validation->set_rules('is_active', 'is Active', 'required|integer|max_length[1]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
            $this->cms_redirect($pp,0,'/edit/');
            //echo "invalid data";
        }else{
            $title = sanitize($this->input->post('title',TRUE));
            // $discount_type = sanitize($this->input->post('discount_type',TRUE));
            // $discount = sanitize($this->input->post('discount',TRUE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $data = array(
                'title' => $title,
                'is_active' => $is_active,
            );
            $result = $this->usersgroupModel->update_usersgroup($pp,$data);
            if($result){
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'User Group successfully Updated');
                $this->cms_redirect(0,0,'/');    
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'somethings wrong please try again');
                $this->cms_redirect($pp,0,'edit/');
            }
        }
    }    

    // public function delete($id)

    // {

    //     $user = $this->usersgroupModel->get_user_by_id($id);

    //     if(isset($user)){

    //         if($this->usersgroupModel->delete_user($id)){

    //             $this->session->set_flashdata('etype', 'alert-success');

    //             $this->session->set_flashdata('emsg', 'User successfully deleted');

    //             $this->cms_redirect(0,0,'/');

    //         }else{

    //             $this->session->set_flashdata('etype', 'alert-error');

    //             $this->session->set_flashdata('emsg', 'somethings wrong please try again later');

    //             $this->cms_redirect(0,0,'/');    

    //         }

    //     }else{

    //         $this->session->set_flashdata('etype', 'alert-error');

    //         $this->session->set_flashdata('emsg', 'Invalid data');

    //         $this->cms_redirect(0,0,'/');

    //     }

    // }


    public function get_usersgroups()
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Users Groups";
        $data['usersgroups'] = $this->usersgroupModel->get_all_usersgroups();
        $this->load->view(ADMIN_VIEW_FOLDER.'/users/group/index',$data);
    }

    public function cms_redirect($p1,$p2,$path)
    {
        if($p1==0){
            if($p2 != 0){
                redirect(ADMIN_FOLDER.'/users-group'.$path.$p2);
            }else{
                redirect(ADMIN_FOLDER.'/users-group'.$path);
            }
        }else{
            redirect(ADMIN_FOLDER.'/users-group'.$path.$p1);
        }
    }



}