<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Moreviews extends MY_Controller {

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
        $this->load->model('moreviewsModel');
        $this->load->helper(array('form','text'));
        $this->load->library(array('form_validation','upload'));
    }

    public function index($id=0)
    {
        //echo date("Y-m-d h:i:s");
        //var_dump($this->session->flashdata());
        $this->get_moreviews($id);
    }

    public function copy_data($id)
    {
        $product_id = $this->moreviewsModel->getValue("product_id","id",$id);
        $this->moreviewsModel->DuplicateMySQLRecord($id);
        $this->session->set_flashdata('etype', 'alert-success');
        $this->session->set_flashdata('emsg', 'Record copy successfully');
        $this->cms_redirect(0,$product_id,'/');
    }

    public function edit($id=null)
    {
        if($id){
            $data['sessions'] = $this->session->userdata();
            $data['page_heading'] = "Product More Views";
            $data['moreview'] = $this->moreviewsModel->get_single_moreview($id);
            $data['product_id'] = getValuee("product_id","moreviews","id",$id);
            $this->load->view(ADMIN_VIEW_FOLDER.'/moreviews/edit',$data);
        }else{
            redirect(ADMIN_FOLDER.'/moreviews');
        }
    }

    public function update()
    {
        $pp = $this->input->post('page_id',TRUE);
        $moreview = $this->moreviewsModel->get_single_moreview($pp);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
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
            $del_image = $this->input->post('del_image',TRUE);

            if(isset($del_image)){
                $data = array("image" => null);
                $this->moreviewsModel->update_moreview($pp,$data,false);
                delFile2("moreviews","image","products/moreviews/",$moreview->image);
                $image = null;
            }else{
                $image = $moreview->image;
            }

            $title = sanitize($this->input->post('title',TRUE));
            
            $config['upload_path'] = UPLOADPATH.'products/moreviews'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_ext_tolower'] = TRUE;
            $this->upload->initialize($config);
            $delimg = false;
            if(!empty($_FILES['image']['name'])){
                if ($this->upload->do_upload('image')){
                    $img = $this->upload->data();
                    $this->_create_thumbs($img['file_name']);
                    $image  = $img['file_name'];
                    $delimg = $moreview->image;
                }
            }

            $postdata = array(
                'title' => $title,
                'image' => $image
            );
            if($this->moreviewsModel->update_moreview($pp,$postdata)){
                if($delimg != false){delFile2("moreviews","image","products/moreviews/",$delimg);}
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'More view successfully updated');
                $this->cms_redirect(0,$moreview->product_id,'/');
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
        $data['page_heading'] = "Product More Views";
        $data['product_id'] = $id;
        $this->load->view(ADMIN_VIEW_FOLDER.'/moreviews/add',$data);
    }

    public function add_submit($id=null)
    {
        $pp = $this->input->post('product_id',TRUE);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
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

            $config['upload_path'] = UPLOADPATH.'products/moreviews/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_ext_tolower'] = TRUE;
            $this->upload->initialize($config);

            $image  = null;
            if(!empty($_FILES['image']['name'])){
                if ($this->upload->do_upload('image')){
                    $img = $this->upload->data();
                    $this->_create_thumbs($img['file_name']);
                    $image  = $img['file_name'];
                }
            }

            $postdata = array(
                'title' => $title,
                'product_id' => $pp,
                'image' => $image
            );

            if($this->moreviewsModel->add_moreview($postdata)){
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'More View successfully created');
                $this->cms_redirect(0,$pp,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again');
                $this->cms_redirect(0,$pp,'');
            }

            

            
            // Query database for user details
            //$result = $this->userModel->get_user_by_username($username);
        }
    }

    public function delete($id)
    {
        $moreview = $this->moreviewsModel->get_single_moreview($id);
        if(isset($moreview)){
                $moreviewimage = $moreview->image;
                $product_id = $moreview->product_id;
                if($this->moreviewsModel->delete_moreview($id)){
                    delFile2('moreviews','image','/products/moreviews/',$moreviewimage);
                    $this->session->set_flashdata('etype', 'alert-success');
                    $this->session->set_flashdata('emsg', 'More view successfully deleted');
                    $this->cms_redirect(0,$product_id,'/');
                }else{
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'somethings wrong please try again later');
                    $this->cms_redirect(0,$product_id,'/');    
                }
        }else{
            $this->session->set_flashdata('etype', 'alert-error');
            $this->session->set_flashdata('emsg', 'Invalid data');
            $this->cms_redirect(0,$product_id,'/');
        }
    }

    public function multi_data()
    {
        $del_multi = $this->input->post('multi_del',TRUE);
        $checks = $this->input->post('check',TRUE);
        $product_id = $this->input->post('product_id',TRUE);
        if($checks){
            $erro = array();
            $succ = array();
            if($del_multi){
                foreach($checks as $check){
                    $moreview = $this->moreviewsModel->get_single_moreview($check);
                    if(isset($moreview)){
                        $moreviewimage = $moreview->image;
                        array_push($succ,$this->moreviewsModel->getValue("title","id",$check)." Deleted successfully");
                        $this->moreviewsModel->delete_moreview($check);
                        delFile2('moreviews','image','products/moreviews/',$moreviewimage);
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
            $this->cms_redirect(0,$product_id,'/');

        }else{
            $this->session->set_flashdata('etype', 'alert-info');
            $this->session->set_flashdata('emsg', 'Checkbox not selected');
            $this->cms_redirect(0,$product_id,'/');
        }   
    }

    public function get_moreviews($id)
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Product More Views";
        $data['product_id'] = $id;
        $data['moreviews'] = $this->moreviewsModel->getmoreviews($id);
        $this->load->view(ADMIN_VIEW_FOLDER.'/moreviews/index',$data);
    }

    private function _create_thumbs($file_name)
    {
        // Image resizing config
        $config = array(
            // Large Image
            array(
                'image_library' => 'GD2',
                'source_image'  => UPLOADPATH.'/products/moreviews/'.$file_name,
                'maintain_ratio'=> TRUE,
                'width'         => PRD_L_W,
                'height'        => PRD_L_H,
                'new_image'     => UPLOADPATH.'products/moreviews/large/'.$file_name
                ),
            // Medium Image
            array(
                'image_library' => 'GD2',
                'source_image'  => UPLOADPATH.'/products/moreviews/'.$file_name,
                'maintain_ratio'=> TRUE,
                'width'         => PRD_M_W,
                'height'        => PRD_M_H,
                'new_image'     => UPLOADPATH.'products/moreviews/medium/'.$file_name
                ),
            // Small Image
            array(
                'image_library' => 'GD2',
                'source_image'  => UPLOADPATH.'/products/moreviews/'.$file_name,
                'maintain_ratio'=> TRUE,
                'width'         => PRD_S_W,
                'height'        => PRD_S_H,
                'new_image'     => UPLOADPATH.'products/moreviews/small/'.$file_name
            ));
 
        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
    }

    public function cms_redirect($p1,$p2,$path)
    {
        if($p1==0){
            if($p2 != 0){
                redirect(ADMIN_FOLDER.'/moreviews'.$path.$p2);
            }else{
                redirect(ADMIN_FOLDER.'/moreviews'.$path);
            }
        }else{
            redirect(ADMIN_FOLDER.'/moreviews'.$path.$p1);
        }
    }

}