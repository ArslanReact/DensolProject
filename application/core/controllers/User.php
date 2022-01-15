<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {



        public function __construct()

        {

            parent::__construct(); // Construct CI's core so that you can use it

            $this->load->helper(array('form'));

            $this->load->library(array('form_validation'));

        }



        public function index()

        {

            if($this->is_logged_in()){

                $this->user_after_login();

            }else{

                redirect(base_url());

            }

        }



        public function registeration_submit()

        {

            $this->load->helper('security');

            $this->form_validation->set_rules('register_username', 'Username', 'trim|required|min_length[4]|xss_clean|max_length[40]|is_unique[users.username]',array('required' => 'The %s field is required.','is_unique' => 'This %s already exists.'));

            $this->form_validation->set_rules('register_password', 'Password', 'trim|required|min_length[7]|xss_clean');

            $this->form_validation->set_rules('passconf', 'Retype', 'required|matches[register_password]|xss_clean');

            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[50]|xss_clean');

            $this->form_validation->set_rules('register_email', 'Email', 'trim|required|min_length[10]|max_length[40]|xss_clean|valid_email|is_unique[users.email]',array('required' => 'The %s field is required.','is_unique' => 'This %s already exists.'));

            $this->form_validation->set_rules('company', 'Company', 'trim');

            $this->form_validation->set_rules('address1', 'Street Address 1', 'trim|required|max_length[200]|xss_clean');

            $this->form_validation->set_rules('address2', 'Street Address 2', 'trim|max_length[200]|xss_clean');

            $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[20]|xss_clean');

            $this->form_validation->set_rules('state', 'State', 'trim|required|max_length[20]|xss_clean');

            $this->form_validation->set_rules('zip', 'Zip Code', 'trim|required|max_length[15]|xss_clean');

            $this->form_validation->set_rules('country', 'Country', 'trim|required|max_length[15]|xss_clean');

            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[15]|xss_clean');

            $this->form_validation->set_rules('register_captcha', 'Captcha', 'trim|required|max_length[6]|xss_clean');

            $this->form_validation->set_rules('captcha_s_name', 'Captcha', 'trim|required|xss_clean');

            

            $returnpage = $this->input->post('return_page',TRUE);



            if ($this->form_validation->run() == FALSE)

            {

                $errors = array(

                    "register_username" => form_error('register_username', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "register_password" => form_error('register_password', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "passconf" => form_error('passconf', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "name" => form_error('name', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "register_email" => form_error('register_email', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "company" => form_error('company', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "address1" => form_error('address1', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "address2" => form_error('address2', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "city" => form_error('city', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "state" => form_error('state', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "zip" => form_error('zip', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "country" => form_error('country', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "phone" => form_error('phone', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "register_captcha" => form_error('register_captcha', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "captcha_s_name" => form_error('captcha_s_name', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>')

                );

                $this->session->set_flashdata('register_error', $errors);

                redirect(base_url($returnpage));

            }

            else

            {

                $captcha = sanitize($this->input->post('register_captcha',TRUE));

                $captcha_session_name = sanitize($this->input->post('captcha_s_name',TRUE));

                if($captcha!=$this->session->userdata($captcha_session_name)){

                    $errors = array(

                        "register_captcha" => '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> Invalid Captcha</span>'

                    );

                    $this->session->set_flashdata('register_error', $errors);

                    redirect(base_url($returnpage));

                }





                 $username = sanitize($this->input->post('register_username',TRUE));

                 $password = sanitize($this->input->post('register_password',TRUE));

                 $name = sanitize($this->input->post('name',TRUE));

                 $email = sanitize($this->input->post('register_email',TRUE));

                 $company = sanitize($this->input->post('company',TRUE));

                 $address1 = sanitize($this->input->post('address1',TRUE));

                 $address2 = sanitize($this->input->post('address2',TRUE));

                 $city = sanitize($this->input->post('city',TRUE));

                 $state = sanitize($this->input->post('state',TRUE));

                 $zip = sanitize($this->input->post('zip',TRUE));

                 $country = sanitize($this->input->post('country',TRUE));

                 $phone = sanitize($this->input->post('phone',TRUE));

                 $user_key = get_key(25);

                

                 extract($this->encrypt_password($password));

                // Query database for user details

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

                    'phone' => $phone,

                    'is_admin' => '0',

                    'is_active' => '0',

                    'user_key' => $user_key,

                    'return_page' => $returnpage,

                    'pattern' => $pattern,

                    'salt1' => $salt1,

                    'salt2' => $salt2,

                );

                $result = $this->userModel->add_user($data);



                if($result){



                    $ss = site_settings();

                    $to = $email;

                    $subject = "Registration Successful";

                    $template = getValuee("content","email_template","id",2);

                    $activelink = base_url().'user/activate/'.$user_key;

                    $html = str_replace(array('[LOGO]','[SITENAME]','[LINK]','[URL]'), array(base_url("files/frontend/images/logo.png"),$ss->company_name,$activelink,base_url()), $template);

                    // if($this->send_email_to_user($to,$subject,$html,false,true,false)){

                    $this->session->set_flashdata('register_success', 'Form Submit Successfully');

                    // }else{

                    // $this->session->set_flashdata('register_error', 'Email not send');

                    //}

                    redirect(base_url($returnpage));

                }else{

                    // somethings wrong please try again later

                    $this->session->set_flashdata('register_error', 'Email not send');

                    redirect(base_url($returnpage));

                }



            }

        }



        public function activate($key="hello")

        {

            $activateuser = $this->userModel->activate_user_by_key($key);

            if($activateuser){

                $successs = array(

                    "successmsg" => 'Your account has been activated<br>you can login any time.'

                );

                $this->session->set_flashdata('login_success', $successs);

                redirect(base_url($activateuser));

            }else{

                echo 'ERROR: your account is already activated or invalid key';

            }

        }



        public function login_submit()

        {

            $returnpage = $this->input->post('return_page',TRUE);



            $attampt = $this->check_attampt();

            if($attampt != false){

                if($attampt > 1){$attampttime=$attampt." minutes";}else{$attampttime=$attampt." minute";}

                $errorr = array(

                    "errormsg" => 'Too many login attamts.<br>Your information stored for further investigation.<br>Please wait for '.$attampttime.' for next login.'

                );

                $this->session->set_flashdata('login_error', $errorr);

                redirect(base_url($returnpage));

            }

            $this->load->helper('security');

            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[40]|xss_clean');

            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]|xss_clean');

            $this->form_validation->set_rules('login_captcha', 'Captcha', 'trim|required|max_length[6]|xss_clean');

            $this->form_validation->set_rules('captcha_s_name', 'Captcha', 'trim|required|xss_clean');

            $this->form_validation->set_message('min_length', '%s field length is invalid');

            $this->form_validation->set_message('max_length', '%s field length is invalid');

            if ($this->form_validation->run() == FALSE)

            {

                $errors = array(

                    "username" => form_error('username', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "password" => form_error('password', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "login_captcha" => form_error('login_captcha', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>')

                );

                $this->add_attampt("Guest","user","Possible Brute force attack");

                $this->session->set_flashdata('login_error', $errors);

                redirect(base_url($returnpage));

            }

            else

            {



                $captcha = sanitize($this->input->post('login_captcha',TRUE));

                $captcha_session_name = sanitize($this->input->post('captcha_s_name',TRUE));

                if($captcha!=$this->session->userdata($captcha_session_name)){

                    $errors = array(

                        "login_captcha" => '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> Invalid Captcha</span>'

                    );

                    $this->session->set_flashdata('login_error', $errors);

                    redirect(base_url($returnpage));

                }





                $username = sanitize($this->input->post('username',TRUE));

                $password = sanitize($this->input->post('password',TRUE));

                

                // Query database for user details

                $result = $this->userModel->get_user_by_username($username);

                // User likely doesn't exist

                if(!$result) 

                {

                    $this->_destroy();

                    $this->add_attampt("Guest","user","Possible Brute force attack");

                    $errorr = array(

                        "errormsg" => 'Invalid username and Password'

                    );

                    $this->session->set_flashdata('login_error', $errorr);

                    redirect(base_url($returnpage));

                    return false;

                }

                if(!$this->validate_password( trim($password), $result ))

                {

                    $this->_destroy();

                    $this->add_attampt("Guest","user","Possible Brute force attack");

                    $errorr = array(

                        "errormsg" => 'Invalid username and Password'

                    );

                    $this->session->set_flashdata('login_error', $errorr);

                    redirect(base_url($returnpage));

                    return false;

                }

                if(!$this->check_active($result))

                {

                    $this->_destroy();

                    $this->add_attampt($result->username,"user","Inactive account access");

                    $errorr = array(

                        "errormsg" => 'Your account is not active'

                    );

                    $this->session->set_flashdata('login_error', $errorr);

                    redirect(base_url($returnpage));

                    return false;

                }

                // if($this->input->post('remember_me')){

                //     $remember_code = get_key(20);

                //     $remember_ip = md5($this->input->ip_address());

                //     $user_id = $result->id;

                //     $remember_data = $remember_code."&!".$user_id."&!";

                //     $expire = time()+604800; // 7 days

                //     $path  = '/';

                //     $secure = TRUE;

                //     setcookie('remember_me',$remember_data,$expire,$path);

                //     $this->userModel->add_user_remember($user_id,$remember_code,$remember_ip);

                // }

                if($this->set_session( $result,$returnpage )){ // User is logged in, add to $_SESSION data

                    if($returnpage=="checkout/"){
                        $successs = array("successmsg" => 'You have successfuly logged out');
                        $this->session->set_flashdata('login_success', $successs);
                        redirect(base_url($returnpage));
                    }else{
                    $this->user_after_login();
                    }

                }

            }

            

            

        }



        protected function user_after_login()

        {

            // echo "<pre>";

            // print_r($this->session->userdata());

            // echo "</pre>";

            // die();

            $uid = $this->session->userdata('uid');

            $ip = $this->uIP;

            $getuserdata = $this->userModel->get_user_by_id($uid);

            $logs = $this->logsModel->get_log_by_ip($ip,"user");

            if($logs != FALSE){$query = $this->logsModel->delete_log($logs->id,'user');}

            // redirect(base_url("user/profile"));
            redirect(base_url());

        }



        public function logout()
        {
            if(isset($_GET['return'])){
                $return_page = $_GET['return'];
            }else{
                $return_page = "login/";
            }
            //$return_page = "login/";
            $this->_destroy();
            $successs = array(
                "successmsg" => 'You have successfuly logged out'
            );
            $this->session->set_flashdata('login_success', $successs);
            redirect(base_url($return_page));
        }



        public function forgot_submit()

        {

            $this->load->helper('security');

            $returnpage = $this->input->post('return_page',TRUE);

            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[40]|valid_email|xss_clean');

            $this->form_validation->set_rules('forgot_captcha', 'Captcha', 'trim|required|max_length[6]|xss_clean');

            $this->form_validation->set_rules('captcha_s_name', 'Captcha', 'trim|required|xss_clean');

            $this->form_validation->set_message('min_length', '%s field length is invalid');

            $this->form_validation->set_message('max_length', '%s field length is invalid');

            if ($this->form_validation->run() == FALSE)

            {

                $errors = array(

                    "email" => form_error('email', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>'),

                    "forgot_captcha" => form_error('forgot_captcha', '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> ', '</span>')

                );

                $this->session->set_flashdata('forgot_error', $errors);

            }

            else

            {



                $captcha = sanitize($this->input->post('forgot_captcha',TRUE));

                $captcha_session_name = sanitize($this->input->post('captcha_s_name',TRUE));

                if($captcha!=$this->session->userdata($captcha_session_name)){

                    $errors = array(

                        "forgot_captcha" => '<span class="spanerror"><i class="fa fa-exclamation-triangle"></i> Invalid Captcha</span>'

                    );

                    $this->session->set_flashdata('forgot_error', $errors);

                    redirect(base_url($returnpage));

                }



                $email = sanitize($this->input->post('email',TRUE));

                $getuserdata = $this->userModel->get_user_by_email($email);

                if($getuserdata){

                    $normalpass = randomPassword(10);

                    $newpassword = $this->encrypt_password($normalpass);

                    if($this->userModel->update_user_password($getuserdata->id,$newpassword)){

                        $to = $email;

                        $subject = "New Password Generated";

                        $template = getValuee("content","email_template","id",3);

                        $html = str_replace(array('[LOGO]','[SITENAME]','[USERNAME]','[PASSWORD]','[URL]'), array(base_url("files/frontend/images/logo.png"),$ss->company_name,$getuserdata->username,$normalpass,base_url()),$template);

                        

                        if($this->send_email_to_user($to,$subject,$html,false,true,false)){

                            $successs = array(

                                "successmsg" => 'Your new password generated.<br>Please check your email'

                            );

                            $this->session->set_flashdata('forgot_success', $successs);

                        }else{

                            $errorr = array(

                                "errormsg" => 'Email send error please try again leter'

                            );

                            $this->session->set_flashdata('forgot_error', $errorr);

                        }

                    }else{

                        $errorr = array(

                            "errormsg" => 'Somthings wrong please try again leter'

                        );

                        $this->session->set_flashdata('forgot_error', $errorr);

                    }

                }else{

                    $errorr = array(

                        "errormsg" => 'Email address does not exist'

                    );

                    $this->session->set_flashdata('forgot_error', $errorr);

                }

            }

            redirect(base_url($returnpage));

        }



}