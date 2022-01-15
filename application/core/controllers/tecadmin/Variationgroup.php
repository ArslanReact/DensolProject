<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VariationGroup extends MY_Controller {



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

        $this->load->model('variationgroupModel');

        $this->load->helper(array('form','text'));

        $this->load->library(array('form_validation'));

    }

    public function index($id=0)

    {
        $this->get_variationgroup($id);

    }

    public function copy_data($id)

    {

        $this->variationgroupModel->DuplicateMySQLRecord($id);

        $this->session->set_flashdata('etype', 'alert-success');

        $this->session->set_flashdata('emsg', 'Record copy successfully');

        $this->cms_redirect($parent_id,0,'/');

    }

    public function edit($id=null)

    {

        if($id){

            $data['sessions'] = $this->session->userdata();

            $data['page_heading'] = "Variation Group";

            $data['variationgroup'] = $this->variationgroupModel->get_single_variationgroup($id);

            $this->load->view(ADMIN_VIEW_FOLDER.'/variation/group/edit',$data);

        }else{

            redirect(ADMIN_FOLDER.'/variation/group');

        }

    }

    public function update()

    {

        $pp = $this->input->post('page_id',TRUE);

        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');

        $this->form_validation->set_rules('helper_name', 'Helper Name', 'trim|max_length[250]');

        $this->form_validation->set_rules('type', 'Variation Type', 'trim|max_length[10]');

        $this->form_validation->set_rules('is_required', 'Required', 'required|integer');

        $this->form_validation->set_rules('affect_price', 'Price Affect', 'required|integer');

        $this->form_validation->set_rules('is_color', 'is Color', 'required|integer');

        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');

        $this->form_validation->set_rules('sort', 'Sort', 'required|integer');

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

            $helper_name = sanitize($this->input->post('helper_name',TRUE));

            $type = $this->input->post('type',TRUE);

            $is_required = $this->input->post('is_required',TRUE);

            $affect_price = $this->input->post('affect_price',TRUE);

            $is_color = $this->input->post('is_color',TRUE);

            $is_active = sanitize($this->input->post('is_active',TRUE));

            $sort = $this->input->post('sort',TRUE);

            

            $postdata = array(

                'title' => $title,

                'helper_name' => $helper_name,

                'type' => $type,

                'is_required' => $is_required,

                'affect_price' => $affect_price,

                'is_color' => $is_color,

                'sort' => $sort,

                'is_active' => $is_active

            );

            

            if($this->variationgroupModel->update_variationgroup($pp,$postdata)){

                $this->session->set_flashdata('etype', 'alert-success');

                $this->session->set_flashdata('emsg', 'Variation group successfully updated');

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

        $data['page_heading'] = "Variation Group";

        $data['page_parent'] = $id;

        $this->load->view(ADMIN_VIEW_FOLDER.'/variation/group/add',$data);

    }

    public function delete($id)

    {

        $variationgroup = $this->variationgroupModel->get_single_variationgroup($id);

        if(isset($variationgroup)){

            if($this->variationgroupModel->delete_variationgroup($id)){

                $this->session->set_flashdata('etype', 'alert-success');

                $this->session->set_flashdata('emsg', 'Variation Group successfully deleted');

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

                        $this->variationgroupModel->update_variationgroup($check,$data,false);

                        array_push($succ,$this->variationgroupModel->getValue("title","id",$check)." sort Updated");

                    }else{

                        array_push($erro,$this->variationgroupModel->getValue("title","id",$check)." sort is not defined!");

                    }

                }

            }

            if($del_multi){

                foreach($checks as $check){

                    $variationgroup = $this->variationgroupModel->get_single_variationgroup($check);

                    if(isset($variationgroup)){

                        array_push($succ,$this->variationgroupModel->getValue("title","id",$check)." Deleted successfully");

                        $this->variationgroupModel->delete_variationgroup($check);

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

    public function add_submit($id=null)

    {

        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');

        $this->form_validation->set_rules('helper_name', 'Helper Name', 'trim|max_length[250]');

        $this->form_validation->set_rules('type', 'Variation Type', 'trim|max_length[10]');

        $this->form_validation->set_rules('is_required', 'Required', 'required|integer');

        $this->form_validation->set_rules('affect_price', 'Price Affect', 'required|integer');

        $this->form_validation->set_rules('is_color', 'is Color', 'required|integer');

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

            $helper_name = sanitize($this->input->post('helper_name',TRUE));

            $type = $this->input->post('type',TRUE);

            $is_required = $this->input->post('is_required',TRUE);

            $affect_price = $this->input->post('affect_price',TRUE);

            $is_color = $this->input->post('is_color',TRUE);

            $is_active = sanitize($this->input->post('is_active',TRUE));

            $sort = $this->input->post('sort',TRUE);

            

            $postdata = array(

                'title' => $title,

                'helper_name' => $helper_name,

                'type' => $type,

                'is_required' => $is_required,

                'affect_price' => $affect_price,

                'is_color' => $is_color,

                'sort' => $sort,

                'is_active' => $is_active

            );



            if($this->variationgroupModel->add_variationgroup($postdata)){

                $this->session->set_flashdata('etype', 'alert-success');

                $this->session->set_flashdata('emsg', 'New group successfully created');

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

    public function get_variationgroup($id)

    {

        $data['sessions'] = $this->session->userdata();

        $data['page_heading'] = "Variation Group";

        $data['page_parent'] = $id;

        $data['variationgroups'] = $this->variationgroupModel->getvariationgroup($id);

        $this->load->view(ADMIN_VIEW_FOLDER.'/variation/group/index',$data);

    }

    public function cms_redirect($p1,$p2,$path)

    {

        if($p1==0){

            if($p2 != 0){

                redirect(ADMIN_FOLDER.'/variation/group'.$path.$p2);

            }else{

                redirect(ADMIN_FOLDER.'/variation/group'.$path);

            }

        }else{

            redirect(ADMIN_FOLDER.'/variation/group'.$path.$p1);

        }

    }

}