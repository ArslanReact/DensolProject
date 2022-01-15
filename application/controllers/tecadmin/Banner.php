<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MY_Controller {



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

        $this->load->model('bannerModel');

        $this->load->model('bannercategoriesModel');

        $this->load->helper(array('form','text'));

        $this->load->library(array('form_validation'));

    }

    public function index($id=null)

    {
        
        $this->get_banner($id);

    }

    public function copy_data($id)

    {

        $id = $this->bannerModel->DuplicateMySQLRecord($id);



        $this->session->set_flashdata('etype', 'alert-success');

        $this->session->set_flashdata('emsg', 'Record copy successfully');

        $this->cms_redirect(0,0,'');

    }

    public function add()

    {

        $data['sessions'] = $this->session->userdata();

        $data['page_heading'] = "Banners";

        $data['categories'] = $this->get_bannercategories();

        $this->load->view(ADMIN_VIEW_FOLDER.'/banner/add',$data);

    }

    public function add_submit($id=null)

    {

        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');

        $this->form_validation->set_rules('parent_id', 'Category', 'trim|max_length[5]');

        $this->form_validation->set_rules('short_detail', 'Short Detail', 'trim|max_length[1000]');

        $this->form_validation->set_rules('content', 'Page Content', 'trim');

        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('is_single', 'Image Without Text', 'required|trim|max_length[3]');

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

            $parent_id = $this->input->post('parent_id',TRUE);

            $short_detail = $this->input->post('short_detail',TRUE);

            $content = sanitize($this->input->post('content',TRUE));

            $is_active = sanitize($this->input->post('is_active',TRUE));
            $is_single = sanitize($this->input->post('is_single',TRUE));

            $sort = $this->input->post('sort',TRUE);

            



            $config['upload_path']   = UPLOADPATH.'banner/';

            $config['allowed_types'] = 'gif|jpg|png';

            $config['max_size']      =  2048;

            $this->load->library('upload', $config);



            if (!empty($_FILES['banner']['name'])) {

                $config['file_name'] = "banner";

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('banner'))

                {

                    $error = array('infoerror' => $this->upload->display_errors());

                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());

                    $this->cms_redirect($pp,0,'/add');

                }else{

                    $upload_data1 = $this->upload->data();

                    $banner = $upload_data1['file_name'];

                }

            }else{

                $banner = null;

            }

            if (!empty($_FILES['option1']['name'])) {

                $config['file_name'] = "option1";

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('option1'))

                {

                    $error = array('infoerror' => $this->upload->display_errors());

                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());

                    $this->cms_redirect($pp,0,'/add');

                }else{

                    $upload_data2 = $this->upload->data();

                    $option1 = $upload_data2['file_name'];

                }

            }else{

                $option1 = null;

            }

            if (!empty($_FILES['option2']['name'])) {

                $config['file_name'] = "option2";

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('option2'))

                {

                    $error = array('infoerror' => $this->upload->display_errors());

                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());

                    $this->cms_redirect($pp,0,'/add');

                }else{

                    $upload_data3 = $this->upload->data();

                    $option2 = $upload_data3['file_name'];

                }

            }else{

                $option2 = null;

            }

            if (!empty($_FILES['option3']['name'])) {

                $config['file_name'] = "option3";

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('option3'))

                {

                    $error = array('infoerror' => $this->upload->display_errors());

                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());

                    $this->cms_redirect($pp,0,'/add');

                }else{

                    $upload_data3 = $this->upload->data();

                    $option3 = $upload_data3['file_name'];

                }

            }else{

                $option3 = null;

            }









            $postdata = array(

                'title' => $title,

                'parent_id' => $parent_id,

                'short_detail' => $short_detail,

                'content' => $content,

                'is_active' => $is_active,

                'is_single' => $is_single,

                'sort' => $sort,

                'banner' => $banner,

                'option1' => $option1,

                'option2' => $option2,

                'option3' => $option3,

            );

            $banner_id = $this->bannerModel->add_banner($postdata);

            if($banner_id){

                $this->session->set_flashdata('etype', 'alert-success');

                $this->session->set_flashdata('emsg', 'New banner successfully added');

                $this->cms_redirect(0,0,'/');

            }else{

                $this->session->set_flashdata('etype', 'alert-error');

                $this->session->set_flashdata('emsg', 'Somethings wrong please try again');

                $this->cms_redirect(0,0,'');

            }



            



            

            // Query database for user details

            //$result = $this->userModel->get_user_by_username($username);

        }

    }

    private function get_bannercategories($id=0)

    {

        $categories = $this->bannercategoriesModel->get_all_bannercategories(0,true);

        $data = '<select name="parent_id" class="form-control js-selectbox">';

        $data .= '<option value="0">Home Banner</option>';

        if(isset($categories)){

        $sel = '';

            foreach($categories as $categorie){

                if($id==$categorie->id){$sel = "selected";}else{$sel="";}

                $data .= '<option '.$sel.' value="'.$categorie->id.'">'.$categorie->title.'</option>';

                

            }

        }

        $data .= '</select>';

        return $data;

    }

    public function edit($id=null)

    {
        
        if($id){

            $data['sessions'] = $this->session->userdata();

            $data['page_heading'] = "Banner";
            

            $banner = $this->bannerModel->get_single_banner($id);
            
            $data['banner'] = $banner;

            $data['categories'] = $this->get_bannercategories($banner->parent_id);

            $this->load->view(ADMIN_VIEW_FOLDER.'/banner/edit',$data);

        }else{

            redirect(ADMIN_FOLDER.'/banner');

        }

    }

    public function update()

    {

        $pp = $this->input->post('page_id',TRUE);

        $banner = $this->bannerModel->get_single_banner($pp);

        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');

        $this->form_validation->set_rules('parent_id', 'Category', 'trim|max_length[5]');

        $this->form_validation->set_rules('short_detail', 'Short Detail', 'trim|max_length[1000]');

        $this->form_validation->set_rules('content', 'Page Content', 'trim');

        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('is_single', 'Image Without Text', 'required|trim|max_length[3]');

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

            $ddbb = 0;

            $ddo1 = 0;

            $ddo2 = 0;

            $ddo3 = 0;

            $del_banner = $this->input->post('del_banner',TRUE);

            $del_option1 = $this->input->post('del_option1',TRUE);

            $del_option2 = $this->input->post('del_option2',TRUE);

            $del_option3 = $this->input->post('del_option3',TRUE);

            



            if(isset($del_banner)){

                $data = array("banner" => null);

                $this->bannerModel->update_banner($pp,$data,false);

                $delbanner = null;

                delFile('banner','banner','/banner/',$banner->banner);

            }else{

                $delbanner = $banner->banner;

            }

            if(isset($del_option1)){

                $data = array("option1" => null);

                $this->bannerModel->update_banner($pp,$data,false);

                $deloption1 = null;

                delFile('banner','option1','/banner/',$banner->option1);

            }else{

                $deloption1 = $banner->option1;

            }

            if(isset($del_option2)){

                $data = array("option2" => null);

                $this->bannerModel->update_banner($pp,$data,false);

                $deloption2 = null;

                delFile('banner','option2','/banner/',$banner->option2);

            }else{

                $deloption2 = $banner->option2;

            }

            if(isset($del_option3)){

                $data = array("option3" => null);

                $this->bannerModel->update_banner($pp,$data,false);

                $deloption3 = null;

                delFile('banner','option3','/banner/',$banner->option3);

            }else{

                $deloption3 = $banner->option3;

            }

            

            $title = sanitize($this->input->post('title',TRUE));

            $parent_id = sanitize($this->input->post('parent_id',TRUE));

            $short_detail = sanitize($this->input->post('short_detail',TRUE));

            $content = sanitize($this->input->post('content',TRUE));

            $is_active = sanitize($this->input->post('is_active',TRUE));
            $is_single = sanitize($this->input->post('is_single',TRUE));

            $sort = $this->input->post('sort',TRUE);

            



            $config['upload_path']   = UPLOADPATH.'banner/';

            $config['allowed_types'] = 'gif|jpg|png';

            $config['max_size']      =  2048;

            $this->load->library('upload', $config);



            if (!empty($_FILES['banner']['name'])) {

                $config['file_name'] = "banner";

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('banner'))

                {

                    $error = array('infoerror' => $this->upload->display_errors());

                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());

                    $this->cms_redirect($pp,0,'/edit/');

                }else{

                    $upload_data1 = $this->upload->data();

                    $banner = $upload_data1['file_name'];

                    $ddbb = 1;

                }

            }else{

                $banner = $delbanner;

            }

            if (!empty($_FILES['option1']['name'])) {

                $config['file_name'] = "option1";

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('option1'))

                {

                    $error = array('infoerror' => $this->upload->display_errors());

                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());

                    $this->cms_redirect($pp,0,'/edit/');

                }else{

                    $upload_data1 = $this->upload->data();

                    $option1 = $upload_data1['file_name'];

                    $ddo1 = 1;

                }

            }else{

                $option1 = $deloption1;

            }

            if (!empty($_FILES['option2']['name'])) {

                $config['file_name'] = "option2";

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('option2'))

                {

                    $error = array('infoerror' => $this->upload->display_errors());

                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());

                    $this->cms_redirect($pp,0,'/edit/');

                }else{

                    $upload_data1 = $this->upload->data();

                    $option2 = $upload_data1['file_name'];

                    $ddo2 = 1;

                }

            }else{

                $option2 = $deloption2;

            }

            if (!empty($_FILES['option3']['name'])) {

                $config['file_name'] = "option3";

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('option3'))

                {

                    $error = array('infoerror' => $this->upload->display_errors());

                    $this->session->set_flashdata('infoerror', $this->upload->display_errors());

                    $this->cms_redirect($pp,0,'/edit/');

                }else{

                    $upload_data1 = $this->upload->data();

                    $option3 = $upload_data1['file_name'];

                    $ddo3 = 1;

                }

            }else{

                $option3 = $deloption3;

            }

            



            $postdata = array(

                'title' => $title,

                'parent_id' => $parent_id,

                'content' => $content,

                'short_detail' => $short_detail,

                'is_active' => $is_active,
                
                'is_single' => $is_single,

                'sort' => $sort,

                'banner' => $banner,

                'option1' => $option1,

                'option2' => $option2,

                'option3' => $option3,

            );

            if($this->bannerModel->update_banner($pp,$postdata)){

                if($ddbb == 1){delFile('banner','banner','/banner/',$delbanner);}

                if($ddo1 == 1){delFile('banner','option1','/banner/',$deloption1);}

                if($ddo2 == 1){delFile('banner','option2','/banner/',$deloption2);}

                if($ddo3 == 1){delFile('banner','option3','/banner/',$deloption3);}

                $this->session->set_flashdata('etype', 'alert-success');

                $this->session->set_flashdata('emsg', 'banner successfully updated');

                $this->cms_redirect(0,0,'/');

            }else{

                $this->session->set_flashdata('etype', 'alert-error');

                $this->session->set_flashdata('emsg', 'Somethings wrong please try again');

                $this->cms_redirect($pp,0,'/edit/');

            }







        }

    }    

    public function delete($id)

    {

        $banner = $this->bannerModel->get_single_banner($id);

        if(isset($banner)){

            $bannerbanner = $banner->banner;

            $banneroption1 = $banner->option1;

            $banneroption2 = $banner->option2;

            $banneroption3 = $banner->option3;

            if($this->bannerModel->delete_banner($id)){

                delFile('banner','banner','/banner/',$bannerbanner);

                delFile('banner','option1','/banner/',$banneroption1);

                delFile('banner','option2','/banner/',$banneroption2);

                delFile('banner','option3','/banner/',$banneroption3);

                $this->session->set_flashdata('etype', 'alert-success');

                $this->session->set_flashdata('emsg', 'banner successfully deleted');

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

                        $this->bannerModel->update_banner($check,$data,false,false);

                        array_push($succ,$this->bannerModel->getValue("title","id",$check)." sort Updated");

                    }else{

                        array_push($erro,$this->bannerModel->getValue("title","id",$check)." sort is not defined!");

                    }

                }

            }

            if($del_multi){

                foreach($checks as $check){

                    $banner = $this->bannerModel->get_single_banner($check);

                    if(isset($banner)){

                    $bannerbanner = $banner->banner;

                    $banneroption1 = $banner->option1;

                    $banneroption2 = $banner->option2;

                    $banneroption3 = $banner->option3;

                    array_push($succ,$this->bannerModel->getValue("title","id",$check)." Deleted successfully");

                    $this->bannerModel->delete_banner($check);

                    delFile('banner','banner','/banner/',$bannerbanner);

                    delFile('banner','option1','/banner/',$banneroption1);

                    delFile('banner','option2','/banner/',$banneroption2);

                    delFile('banner','option3','/banner/',$banneroption3);

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

    public function get_banner($id)

    {

        $data['sessions'] = $this->session->userdata();

        $data['page_heading'] = "Banners";

        $data['banners'] = $this->bannerModel->get_all_banners($id);

        $this->load->view(ADMIN_VIEW_FOLDER.'/banner/index',$data);

    }

    public function cms_redirect($p1,$p2,$path)

    {

        if($p1==0){

            if($p2 != 0){

                redirect(ADMIN_FOLDER.'/banner'.$path.$p2);

            }else{

                redirect(ADMIN_FOLDER.'/banner'.$path);

            }

        }else{

            redirect(ADMIN_FOLDER.'/banner'.$path.$p1);

        }

    }



}