<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Variation extends MY_Controller {

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
        $this->load->model('variationModel');
        $this->load->model('variationgroupModel');
        $this->load->helper(array('form','text'));
        $this->load->library(array('form_validation','upload'));
    }
    public function index($id=null)
    {
        $this->get_variation($id);
    }
    public function copy_data($id)
    {
        $id = $this->variationModel->DuplicateMySQLRecord($id);
        $variation = $this->variationModel->get_single_variation($id);
        $this->session->set_flashdata('etype', 'alert-success');
        $this->session->set_flashdata('emsg', 'Record copy successfully');
        $this->cms_redirect(0,$variation->group_id,'/');
    }
    public function add($id)
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Variations";
        $data['group'] = $this->variationgroupModel->get_single_variationgroup($id);
        $this->load->view(ADMIN_VIEW_FOLDER.'/variation/add',$data);
    }
    public function add_submit($id=null)
    {
        $group_id = $this->input->post('group_id',TRUE);
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('detail', 'Detail', 'trim|max_length[199]');
        $this->form_validation->set_rules('sku', 'Sku', 'trim|max_length[100]');
        $this->form_validation->set_rules('price', 'Price', 'numeric|trim');
        $this->form_validation->set_rules('price_option', 'Price Adjustment', 'trim');
        $this->form_validation->set_rules('qty', 'Qty', 'trim|integer');
        $this->form_validation->set_rules('color', 'Color', 'trim|max_length[25]');
        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('sort', 'Sort', 'required|integer');
        //$this->form_validation->set_message('min_length', '%s field length is invalid');
        $this->form_validation->set_message('max_length', '%s field length is invalid');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
            $this->cms_redirect(0,$group_id,'/add/');
            //$this->load->view('auth/login');
            //echo "invalid data";
        }
        else
        {
            $title = sanitize($this->input->post('title',TRUE));
            $detail = sanitize($this->input->post('detail',TRUE));
            $sku = $this->input->post('sku',TRUE);
            $price = sanitize($this->input->post('price',TRUE));
            $price_option = sanitize($this->input->post('price_option',TRUE));
            $qty = sanitize($this->input->post('qty',TRUE));
            $color = sanitize($this->input->post('color',TRUE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $sort = $this->input->post('sort',TRUE);

            $config['upload_path'] = UPLOADPATH.'variation/'; //path folder
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
                'group_id' => $group_id,
                'title' => $title,
                'detail' => $detail,
                'sku' => $sku,
                'price' => $price,
                'price_option' => $price_option,
                'sku' => $sku,
                'qty' => $qty,
                'color' => $color,
                'is_active' => $is_active,
                'sort' => $sort,
                'image' => $image,
            );
            $variation_id = $this->variationModel->add_variation($postdata);
            if($variation_id){
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'New variation successfully created');
                $this->cms_redirect(0,$group_id,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again');
                $this->cms_redirect(0,$group_id,'');
            }
        }
    }
    public function edit($id=null)
    {
        if($id){
            $variation = $this->variationModel->get_single_variation($id);
            $data['sessions'] = $this->session->userdata();
            $data['page_heading'] = "Variation Options";
            $data['variation'] = $variation;
            $data['group'] = $this->variationgroupModel->get_single_variationgroup($variation->group_id);
            $this->load->view(ADMIN_VIEW_FOLDER.'/variation/edit',$data);
        }else{
            redirect(ADMIN_FOLDER.'/variation');
        }
    }
    public function update()
    {
        $pp = $this->input->post('page_id',TRUE);
        $variation = $this->variationModel->get_single_variation($pp);
        $group_id = $variation->group_id;
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('detail', 'Detail', 'trim|max_length[199]');
        $this->form_validation->set_rules('sku', 'Sku', 'trim|max_length[100]');
        $this->form_validation->set_rules('price', 'Price', 'numeric|trim');
        $this->form_validation->set_rules('price_option', 'Price Adjustment', 'trim');
        $this->form_validation->set_rules('qty', 'Qty', 'trim|integer');
        $this->form_validation->set_rules('color', 'Color', 'trim|max_length[25]');
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
            $title = sanitize($this->input->post('title',TRUE));
            $detail = sanitize($this->input->post('detail',TRUE));
            $sku = $this->input->post('sku',TRUE);
            $price = sanitize($this->input->post('price',TRUE));
            $price_option = sanitize($this->input->post('price_option',TRUE));
            $qty = sanitize($this->input->post('qty',TRUE));
            $color = sanitize($this->input->post('color',TRUE));
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $sort = $this->input->post('sort',TRUE);
            $del_image = $this->input->post('del_image',TRUE);
            if(isset($del_image)){
                $data = array("image" => null);
                $this->variationModel->update_variation($pp,$data,false);
                $delimage = null;
                delFile2("variations","image","variation/",$variation->image);
            }else{
                $delimage = $variation->image;
            }
            $config['upload_path'] = UPLOADPATH.'variation/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_ext_tolower'] = TRUE;
            $this->upload->initialize($config);
            $delii = 0;
            if(!empty($_FILES['image']['name'])){
                if ($this->upload->do_upload('image')){
                    $img = $this->upload->data();
                    $this->_create_thumbs($img['file_name']);
                    $image  = $img['file_name'];
                    $delii = 1;
                }
            }else{
                $image = $delimage;
            }
            $postdata = array(
                'title' => $title,
                'detail' => $detail,
                'sku' => $sku,
                'price' => $price,
                'price_option' => $price_option,
                'sku' => $sku,
                'qty' => $qty,
                'color' => $color,
                'is_active' => $is_active,
                'sort' => $sort,
                'image' => $image,
            );
            if($this->variationModel->update_variation($pp,$postdata)){
                if($delii==1){ delFile2("variations","image","variation/",$delimage);}
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'variation successfully updated');
                $this->cms_redirect(0,$group_id,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again');
                $this->cms_redirect($pp,0,'/edit/');
            }
        }
    }    
    public function delete($id)
    {
        $variation = $this->variationModel->get_single_variation($id);
        if(isset($variation)){
            $variationimage = $variation->image;
            if($this->variationModel->delete_variation($id)){
                delFile2("variations","image","variation/",$variationimage);
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'variation successfully deleted');
                $this->cms_redirect(0,$variation->group_id,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-errorr');
                $this->session->set_flashdata('emsg', 'somethings wrong please try again later');
                $this->cms_redirect(0,$variation->group_id,'/');    
            }
        }else{
            $this->session->set_flashdata('etype', 'alert-errorr');
            $this->session->set_flashdata('emsg', 'Invalid data');
            $this->cms_redirect(0,$variation->group_id,'/');
        }
    }
    public function multi_data()
    {
        $sort_multi = $this->input->post('multi_sort',TRUE);
        $del_multi = $this->input->post('multi_del',TRUE);
        $group_id = $this->input->post('group_id',TRUE);
        $checks = $this->input->post('check',TRUE);
        if($checks){
            $erro = array();
            $succ = array();
            if($sort_multi){
                foreach($checks as $check){
                    $variation = $this->variationModel->get_single_variation($check);
                    $sort = $this->input->post($check,TRUE);
                    if($sort != ""){
                        $data = array('sort'=> $this->input->post($check,TRUE));
                        $this->variationModel->update_variation($check,$data,false);
                        array_push($succ,$this->variationModel->getValue("title","id",$check)." sort Updated");
                    }else{
                        array_push($erro,$this->variationModel->getValue("title","id",$check)." sort is not defined!");
                    }
                }
            }
            if($del_multi){
                foreach($checks as $check){
                    $variation = $this->variationModel->get_single_variation($check);
                    if(isset($variation)){
                    $variationimage = $variation->image;
                    array_push($succ,$this->variationModel->getValue("title","id",$check)." Deleted successfully");
                    $this->variationModel->delete_variation($check);
                    delFile2("variations","image","variation/",$variationimage);
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
            $this->cms_redirect(0,$group_id,'/');

        }else{
            $this->session->set_flashdata('etype', 'alert-info');
            $this->session->set_flashdata('emsg', 'Checkbox not selected');
            $this->cms_redirect(0,$group_id,'');
        }

        
        
    }
    public function get_variation($id)
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Variation Options";
        $data['group'] = $this->variationgroupModel->get_single_variationgroup($id);
        $data['variations'] = $this->variationModel->get_all_variation($id);
        $this->load->view(ADMIN_VIEW_FOLDER.'/variation/index',$data);
    }
    private function _create_thumbs($file_name)
    {
        // Image resizing config
        $config = array(
            // Large Image
            array(
                'image_library' => 'GD2',
                'source_image'  => UPLOADPATH.'/variation/'.$file_name,
                'maintain_ratio'=> TRUE,
                'width'         => PRD_L_W,
                'height'        => PRD_L_H,
                'new_image'     => UPLOADPATH.'variation/large/'.$file_name
                ),
            // Medium Image
            array(
                'image_library' => 'GD2',
                'source_image'  => UPLOADPATH.'/variation/'.$file_name,
                'maintain_ratio'=> TRUE,
                'width'         => PRD_M_W,
                'height'        => PRD_M_H,
                'new_image'     => UPLOADPATH.'variation/medium/'.$file_name
                ),
            // Small Image
            array(
                'image_library' => 'GD2',
                'source_image'  => UPLOADPATH.'/variation/'.$file_name,
                'maintain_ratio'=> TRUE,
                'width'         => PRD_S_W,
                'height'        => PRD_S_H,
                'new_image'     => UPLOADPATH.'variation/small/'.$file_name
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
                redirect(ADMIN_FOLDER.'/variation'.$path.$p2);
            }else{
                redirect(ADMIN_FOLDER.'/variation'.$path);
            }
        }else{
            redirect(ADMIN_FOLDER.'/variation'.$path.$p1);
        }
    }

}