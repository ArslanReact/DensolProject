<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {



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

        $this->load->model('userModel');
        $this->load->model('usersgroupModel');

        $this->load->helper(array('form','text'));

        $this->load->library(array('form_validation'));

    }

    public function index()

    {

        $this->get_users();

    }

    public function add()

    {

        $data['sessions'] = $this->session->userdata();

        $data['page_heading'] = "Users";
        $data['user_groups'] = $this->usersgroupModel->get_all_usersgroups();

        $this->load->view(ADMIN_VIEW_FOLDER.'/users/add',$data);

    }

    public function add_submit($id=null)

    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[40]|is_unique[users.username]',array('required' => 'The %s field is required.','is_unique' => 'This %s already exists.'));

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]');

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[50]');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[10]|max_length[40]|valid_email|is_unique[users.email]',array('required' => 'The %s field is required.','is_unique' => 'This %s already exists.'));

        $this->form_validation->set_rules('company', 'Company', 'trim|max_length[200]');

        $this->form_validation->set_rules('address1', 'Street Address 1', 'trim|max_length[200]');

        $this->form_validation->set_rules('address2', 'Street Address 2', 'trim|max_length[200]');

        $this->form_validation->set_rules('city', 'City', 'trim|max_length[20]');

        $this->form_validation->set_rules('state', 'State', 'trim|max_length[20]');

        $this->form_validation->set_rules('zip', 'Zip Code', 'trim|max_length[15]');

        $this->form_validation->set_rules('country', 'Country', 'trim|max_length[15]');

        $this->form_validation->set_rules('is_admin', 'is Admin', 'required|integer|max_length[1]');
        $this->form_validation->set_rules('user_group', 'User Group', 'required|integer|max_length[3]');
        $this->form_validation->set_rules('credit_type', 'Credit Type', 'integer|max_length[3]');
        $this->form_validation->set_rules('is_active', 'is Active', 'required|integer|max_length[1]');

        



        if ($this->form_validation->run() == FALSE)

        {

            $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));

            $this->cms_redirect(0,0,'/add');

            //echo "invalid data";

        }

        else

        {

                $username = sanitize($this->input->post('username',TRUE));

                $password = sanitize($this->input->post('password',TRUE));

                $name = sanitize($this->input->post('name',TRUE));

                $email = sanitize($this->input->post('email',TRUE));

                $company = sanitize($this->input->post('company',TRUE));

                $address1 = sanitize($this->input->post('address1',TRUE));

                $address2 = sanitize($this->input->post('address2',TRUE));

                $city = sanitize($this->input->post('city',TRUE));

                $state = sanitize($this->input->post('state',TRUE));

                $zip = sanitize($this->input->post('zip',TRUE));

                $country = sanitize($this->input->post('country',TRUE));

                $is_admin = sanitize($this->input->post('is_admin',TRUE));
                $user_group = sanitize($this->input->post('user_group',TRUE));
                $credit_type = sanitize($this->input->post('credit_type',TRUE));

                $is_active = sanitize($this->input->post('is_active',TRUE));

            

                extract($this->encrypt_password($password));

                $data = array(

                    'username' => $username,

                    'password' => $password,

                    'name' => $name,

                    'email' => $email,

                    'company' => $company,

                    'address1' => $address1,

                    'address2' => $address2,

                    'city' => $city,

                    'state' => $state,

                    'zip' => $zip,

                    'country' => $country,

                    'is_admin' => $is_admin,
                    'credit_type' => $credit_type,

                    'is_active' => $is_active,
                    'user_group' => $user_group,

                    'user_key' => '',

                    'pattern' => $pattern,

                    'salt1' => $salt1,

                    'salt2' => $salt2,

                );

            $user_id = $this->userModel->add_user($data);

            if($user_id){

            $cprices = $this->input->post('customprice',TRUE);
            foreach($cprices as $cprice){
                $insert_data661[] = array(
                    'cid' => $user_id,
                    'pid' => $cprice['id'],
                    'price' => $cprice['price'],
                    'sale_price' => $cprice['sale_price'],
                    'sale_start' => $cprice['sale_start']." 00:00:01",
                    'sale_end' => $cprice['sale_end']." 23:59:59",
                    'is_active' => $cprice['is_active'],
                );
            }
            $this->userModel->add_custom_prices($insert_data661);

                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'User successfully Created');
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

            $data['page_heading'] = "Users";

            $user = $this->userModel->get_user_by_id($id);

            $data['user'] = $user;

            $data['user_groups'] = $this->usersgroupModel->get_all_usersgroups();

            $this->load->view(ADMIN_VIEW_FOLDER.'/users/edit',$data);

        }else{

            redirect(ADMIN_FOLDER.'/users');

        }

    }

    public function update()

    {

        $pp = sanitize($this->input->post('page_id',TRUE));

        $user = $this->userModel->get_user_by_id($pp);

        if($this->input->post('username') != $user->username) {

            $is_unique1 =  '|is_unique[users.username]';

        }else{

            $is_unique1 =  '';

        }

        if($this->input->post('email') != $user->email) {

            $is_unique2 =  '|is_unique[users.email]';

        }else{

            $is_unique2 =  '';

        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[40]'.$is_unique1,array('required' => 'The %s field is required.','is_unique' => 'This %s already exists.'));

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]');

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[50]');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[10]|max_length[40]|valid_email'.$is_unique2,array('required' => 'The %s field is required.','is_unique' => 'This %s already exists.'));

        $this->form_validation->set_rules('company', 'Company', 'trim|max_length[200]');

        $this->form_validation->set_rules('address1', 'Street Address 1', 'trim|max_length[200]');

        $this->form_validation->set_rules('address2', 'Street Address 2', 'trim|max_length[200]');

        $this->form_validation->set_rules('city', 'City', 'trim|max_length[20]');

        $this->form_validation->set_rules('state', 'State', 'trim|max_length[20]');

        $this->form_validation->set_rules('zip', 'Zip Code', 'trim|max_length[15]');

        $this->form_validation->set_rules('country', 'Country', 'trim|max_length[15]');

        $this->form_validation->set_rules('is_admin', 'is Admin', 'required|integer|max_length[1]');
        $this->form_validation->set_rules('user_group', 'User Group', 'required|integer|max_length[3]');
        $this->form_validation->set_rules('credit_type', 'Credit Type', 'integer|max_length[3]');

        $this->form_validation->set_rules('is_active', 'is Active', 'required|integer|max_length[1]');

        



        if ($this->form_validation->run() == FALSE)

        {

            $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));

            $this->cms_redirect($pp,0,'/edit/');

            //echo "invalid data";

        }

        else

        {

                $username = sanitize($this->input->post('username',TRUE));

                $password = sanitize($this->input->post('password',TRUE));

                $name = sanitize($this->input->post('name',TRUE));

                $email = sanitize($this->input->post('email',TRUE));

                $company = sanitize($this->input->post('company',TRUE));
                $disc = $this->input->post('discount');

                $address1 = sanitize($this->input->post('address1',TRUE));

                $address2 = sanitize($this->input->post('address2',TRUE));

                $city = sanitize($this->input->post('city',TRUE));

                $state = sanitize($this->input->post('state',TRUE));

                $zip = sanitize($this->input->post('zip',TRUE));

                $country = sanitize($this->input->post('country',TRUE));

                $is_admin = sanitize($this->input->post('is_admin',TRUE));
                $user_group = sanitize($this->input->post('user_group',TRUE));
                $credit_type = sanitize($this->input->post('credit_type',TRUE));
                $is_active = sanitize($this->input->post('is_active',TRUE));

                if($password=="nopassword"){

                    $password = $user->password;

                    $pattern = $user->pattern;

                    $salt1 = $user->salt1;

                    $salt2 = $user->salt2;

                }else{

                extract($this->encrypt_password($password));

                }

                $data = array(

                    'username' => $username,

                    'password' => $password,

                    'name' => $name,

                    'email' => $email,
                    
                    'discount' => $disc,

                    'company' => $company,

                    'address1' => $address1,

                    'address2' => $address2,

                    'city' => $city,

                    'state' => $state,

                    'zip' => $zip,

                    'country' => $country,

                    'is_admin' => $is_admin,

                    'is_active' => $is_active,
                    'user_group' => $user_group,
                    'credit_type' => $credit_type,

                    'user_key' => '',

                    'pattern' => $pattern,

                    'salt1' => $salt1,

                    'salt2' => $salt2,

                );

            $result = $this->userModel->update_user($pp,$data);

            if($result){

            $cprices = $this->input->post('customprice',TRUE);
            $this->userModel->delete_custom_prices($pp);
            foreach($cprices as $cprice){
                $insert_data661[] = array(
                    'cid' => $pp,
                    'pid' => $cprice['id'],
                    'price' => $cprice['price'],
                    'sale_price' => $cprice['sale_price'],
                    'sale_start' => $cprice['sale_start']." 00:00:01",
                    'sale_end' => $cprice['sale_end']." 23:59:59",
                    'is_active' => $cprice['is_active'],
                );
            }
            $this->userModel->add_custom_prices($insert_data661);

                $this->session->set_flashdata('etype', 'alert-success');

                $this->session->set_flashdata('emsg', 'User successfully Updated');

                $this->cms_redirect(0,0,'/');    

            }else{

                $this->session->set_flashdata('etype', 'alert-error');

                $this->session->set_flashdata('emsg', 'somethings wrong please try again');

                $this->cms_redirect($pp,0,'edit/');

            }



        }

    }    

    public function delete($id)

    {

        $user = $this->userModel->get_user_by_id($id);

        if(isset($user)){

            if($this->userModel->delete_user($id)){

                $this->session->set_flashdata('etype', 'alert-success');

                $this->session->set_flashdata('emsg', 'User successfully deleted');

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

        $del_multi = $this->input->post('multi_del',TRUE);

        $checks = $this->input->post('check',TRUE);

        if($checks){

            $erro = array();

            $succ = array();

            if($del_multi){

                foreach($checks as $check){

                    $user = $this->userModel->get_user_by_id($check);

                    if(isset($user)){

                    array_push($succ,$this->userModel->getValue("username","id",$check)." Deleted successfully");

                    $this->userModel->delete_user($check);

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

    public function get_users()
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Users";
        $data[] = 'waqas';
        $data['users'] = $this->userModel->get_all_users();
        $this->load->view(ADMIN_VIEW_FOLDER.'/users/index',$data);
    }

    public function cms_redirect($p1,$p2,$path)

    {

        if($p1==0){

            if($p2 != 0){

                redirect(ADMIN_FOLDER.'/users'.$path.$p2);

            }else{

                redirect(ADMIN_FOLDER.'/users'.$path);

            }

        }else{

            redirect(ADMIN_FOLDER.'/users'.$path.$p1);

        }

    }
    public function credit_account_request(){
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Credit Account Requests List";
        $data['requests'] = $this->userModel->get_all_requests();
        $this->load->view(ADMIN_VIEW_FOLDER.'/users/credit_account_requests',$data);
    }
    public function student_requests(){
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Student Requests List";
        $data['requests'] = $this->userModel->get_all_student_requests();
        $this->load->view(ADMIN_VIEW_FOLDER.'/users/student_requests',$data);
    }    
    public function delete_student_req($id){
        $this->db->query("delete from student_request_form where form_id='$id'");
        $this->session->set_flashdata('emsg', 'Student Request successfully deleted');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_credit_account_req($id){
        $this->db->query("delete from tbl_credit_account_request where request_id='$id'");
        $this->session->set_flashdata('emsg', 'Credit Account Request Successfully Deleted');
        redirect($_SERVER['HTTP_REFERER']);
    }
    // For Student Login
    public function generate_student_login()
    {
        $formreq_id = $this->input->post('form_id');
        $discount = $this->input->post('discount');
        $password = $this->input->post('password');
        extract($this->encrypt_password($password));
         $user_key = get_key(25);
        $query = $this->db->query("select * from student_request_form where form_id='$formreq_id'");
        $result = $query->result_array();
        $array = array(
            'username' => $result[0]['fname'],
            'password' => $password,
            'name' => $result[0]['fname'].' '.$result[0]['lname'],
            'email' => $result[0]['email'],
            'phone' => $result[0]['contact'],
            'is_active' => '1',
            'discount' => $discount,
            'acc_type' => 'Student Account',
            'user_key' => $user_key,
            'pattern' => $pattern,
            'salt1' => $salt1,
            'salt2' => $salt2,

        );
        $this->db->insert('users',$array);
        $this->db->query("update student_request_form set active_status=1 where form_id='$formreq_id'");
        $this->session->set_flashdata('emsg', 'Student login successfully generated');
        redirect($_SERVER['HTTP_REFERER']);        
        
    }
    // For Credit Login
    public function generate_credit_login()
    {
        $req_id = $this->input->post('form_id');
        $acctype = $this->input->post('acctype');
        $username = $this->input->post('username');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $discount = '';
        if($acctype == 'Gold Account'){
            $discount = 20;
        }else if ($acctype == 'Standard Account'){
             $discount = 0;
        }
        $password = $this->input->post('password');
        extract($this->encrypt_password($password));
         $user_key = get_key(25);
        $query = $this->db->query("select * from tbl_credit_account_request where request_id='$req_id'");
        $result = $query->result_array();
        $array = array(
            'username' => $username,
            'password' => $password,
            'name' => $fname.' '.$lname,
            'email' => $result[0]['email'],
            'phone' => $result[0]['mobile_no'],
            'is_active' => '1',
            'discount' => $discount,
            'acc_type' => $acctype,
            'credit_request_id' => $req_id,
            'user_key' => $user_key,
            'pattern' => $pattern,
            'salt1' => $salt1,
            'salt2' => $salt2,

        );
        $this->db->insert('users',$array);
        $this->db->query("update tbl_credit_account_request set active_status=1 where request_id='$req_id'");
        $this->session->set_flashdata('emsg', 'Credit login successfully generated');
        redirect($_SERVER['HTTP_REFERER']);        
        
    }    
    public function showcredit_requestdetails()
    {
        $fid = $this->input->post('formid');
        $query = $this->db->query("select * from tbl_credit_account_request where request_id='$fid'");
        $result = $query->result_array();
        $dcheck = '';
        $ddcheck = '';
        $lcheck = '';
        $llcheck = '';
        $ocheck = '';
        if($result[0]['business_category'] == 'Dentist'){ $dcheck='checked'; }
        if($result[0]['business_category'] == 'Dental Specialist (specify)'){ $dcheck='checked'; }
        if($result[0]['business_category'] == 'Laboratory'){ $dcheck='checked'; }
        if($result[0]['business_category'] == 'Laboratory Specialist (specify)'){ $dcheck='checked'; }
        if($result[0]['business_category'] == 'Other'){ $dcheck='checked'; }
        $data .='
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
        <div class="card" style="padding:0;">
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Applicant Details </h5>
                            <div class="row m-b-30">
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Registered Business Name*</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="business_name" value="'.$result[0]['business_name'].'" id="business_name" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Trading Name</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="trading_name" value="'.$result[0]['trading_name'].'" id="trading_name">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Business Email*</label>
                                        <input type="email" class="form-control h-45 borderradius10" name="business_email" value="'.$result[0]['business_email'].'" id="business_email">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Name of Proprietor(s)</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="name_of_proprietor" value="'.$result[0]['name_of_proprietor'].'" id="name_of_proprietor">
                                    </div>
                                </div>
                            </div>
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Delivery Address  </h5>
                            <div class="row m-b-30">
                                <div class="col-lg-12 m-b-20">
                                    <div class="form-group">
                                        <label>Suite/Unit No</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="d_building" value="'.$result[0]['d_building'].'" id="d_building">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Street</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="d_suite" value="'.$result[0]['d_suite'].'" id="d_suite">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Postcode</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="d_postcode" value="'.$result[0]['d_postcode'].'" id="d_postcode">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="d_city" value="'.$result[0]['d_city'].'" id="d_city">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="d_state" value="'.$result[0]['d_state'].'" id="d_state">
                                    </div>
                                </div>
                            </div>
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Postal address <small class="paragraphcolortext fontsize14">(if different from delivery)</small>  </h5>
                            <div class="row m-b-30">
                                <div class="col-lg-12 m-b-20">
                                    <div class="form-group">
                                        <label>Building</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="p_building" value="'.$result[0]['p_building'].'" id="p_building">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>St/Suite</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="p_suite" value="'.$result[0]['p_suite'].'" id="p_suite">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Postcode</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="p_postcode" value="'.$result[0]['p_postcode'].'" id="p_postcode">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="p_city" value="'.$result[0]['p_city'].'" id="p_city">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="p_state" value="'.$result[0]['p_state'].'" id="p_state">
                                    </div>
                                </div>
                            </div>
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Contact Details </h5>
                            <div class="row m-b-30">
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Phone:</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="phone" value="'.$result[0]['phone'].'" id="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="fax" value="'.$result[0]['fax'].'" id="fax">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Mobile Numbe</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="mobile_no" value="'.$result[0]['mobile_no'].'" id="mobile_no">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control h-45 borderradius10" name="email" value="'.$result[0]['email'].'" id="email">
                                    </div>
                                </div>
                            </div>
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Business Details </h5>
                            <div class="row m-b-30">
                                <div class="col-lg-12 m-b-20">
                                    <div class="form-group">
                                        <label>How long has the business been established?</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="business_q1" value="'.$result[0]['business_q1'].'" id="business_q1">
                                    </div>
                                </div>
                                <div class="col-lg-12 m-b-20">
                                    <div class="form-group">
                                        <label>How long have the current proprietors owned the business?</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="business_q2" value="'.$result[0]['business_q2'].'" id="business_q2">
                                    </div>
                                </div>
                                <div class="col-lg-12 m-b-20">
                                    <div class="d-block">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="business_category" id="business_category" '.$dcheck.' value="Dentist">
                                            <label class="form-check-label" for="business_category">Dentist</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="business_category" id="business_category" '.$ddcheck.' value="Dental Specialist (specify)">
                                            <label class="form-check-label" for="business_category">Dental Specialist (specify)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="business_category" id="business_category" '.$lcheck.' value="Laboratory">
                                            <label class="form-check-label" for="business_category">Laboratory</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="business_category" id="business_category" '.$llcheck.' value="Laboratory Specialist (specify)">
                                            <label class="form-check-label" for="business_category">Laboratory Specialist (specify)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="business_category" id="business_category" '.$ocheck.' value="Other">
                                            <label class="form-check-label" for="business_category">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Trade Reference Details <small class="d-block fontsize14 paragraphcolortext m-t-15">Please give the names and phone numbers of two suppliers for trade reference purposes.</small> </h5>
                            <div class="row">
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Person 1</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="trade_ref_person1" value="'.$result[0]['trade_ref_person1'].'" id="trade_ref_person1">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="trade_ref_person1_phone" value="'.$result[0]['trade_ref_person1_phone'].'" id="trade_ref_person1_phone">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Person 2</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="trade_ref_person2" value="'.$result[0]['trade_ref_person2'].'" id="trade_ref_person2">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="trade_ref_person2_phone" value="'.$result[0]['trade_ref_person2_phone'].'" id="trade_ref_person2_phone">
                                    </div>
                                </div>
                            </div>
                        </div>';
        echo $data;
        die;
    }
    public function creditsaveinpdf($id){
                        $query = $this->db->query("select * from tbl_credit_account_request where request_id='$id'");
                        $data['result'] = $query->row_array();
                        $pdfHtml = $this->load->view('includes/creditrequest/pdf_request.tpl.php',$data, TRUE);

                        $this->load->library('pdf');
                     //   log_message('ERROR', 'PDF Library loaded');
                        $this->dompdf->loadhtml($pdfHtml);
                        $this->dompdf->setPaper('A4', 'portrait');
                        $this->dompdf->render();
                        $this->dompdf->stream($id.".pdf", array("Attachment"=>0));        
    }


}