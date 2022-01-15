<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends MY_Controller {

        public function __construct()
        {
            // $this->load does not exist until after you call this
            parent::__construct(); // Construct CI's core so that you can use it
            $this->load->helper(array('form'));
            $this->load->library(array('form_validation'));
        }

        public function index()
        {
            // $this->GeoPlugin = new GeoPlugin();
            // echo "<pre>";
            // print_r($this->GeoPlugin->alldata);
            // echo "</pre>";
            //$datap = $this->GeoPlugin->locate("39.52.148.165");
            //print_r($datap);
            //var_dump($datap);
            //$this->Test();
            $this->login();
            // echo "<pre>";
            // print_r($this->session->userdata());
            // echo "</pre>";
            
        }



        public function login()
        {
            //var_dump($this->session->userdata());
            if(!$this->is_logged_in()){
                $data['attampt'] = $this->check_attampt();
                $this->_destroy();
                $this->load->view(ADMIN_VIEW_FOLDER."/auth/login",$data);
            }else{
                $this->after_login();
            }
        }
        // public function qlogin()
        // {
        //     //var_dump($this->session->userdata());
        //     if(!$this->is_logged_in()){
        //         $data['attampt'] = $this->check_attampt();
        //         $this->_destroy();
        //         $this->load->view(ADMIN_VIEW_FOLDER."/auth/qlogin",$data);
        //     }else{
        //         $this->after_login();
        //     }
        // }        

        public function register()
        {
            if(!$this->auth_is_logged_in()){
                $this->load->view("auth/register");
            }else{
                $this->after_login();
            }
        }
        // public function update_password($password)
        // {

        //     $passwordp = $this->encrypt_password($password);
        //     if($this->userModel->update_user_password(1,$passwordp)){
        //         $this->session->set_flashdata('etype', 'success');
        //         $this->session->set_flashdata('emsg', 'Password changed successfully');
        //         redirect(ADMIN_FOLDER.'/login');
        //     }else{
        //         $this->session->set_flashdata('etype', 'danger');
        //         $this->session->set_flashdata('emsg', 'somethings wrong please try again');
        //         redirect(ADMIN_FOLDER.'/login');
        //     }
        // }

        

        

        public function login_submit()
        {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[40]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]');
            $this->form_validation->set_message('min_length', '%s field length is invalid');
            $this->form_validation->set_message('max_length', '%s field length is invalid');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->add_attampt("Guest","user","Possible Brute force attack");
                $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
                redirect(ADMIN_FOLDER.'/login');
            }
            else
            {
                 $username = sanitize($this->input->post('username',TRUE));
                 $password = sanitize($this->input->post('password',TRUE));
                
                // Query database for user details
                $result = $this->userModel->get_user_by_username($username);
                // User likely doesn't exist
                if(!$result) 
                {
                    $this->_destroy();
                    $this->add_attampt("Guest","user","Possible Brute force attack");
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'Invalid username and Password');
                    redirect(ADMIN_FOLDER.'/login');
                    //echo "user not found";
                    return false;
                }
                if(!$this->validate_password( trim($password), $result ))
                {
                    $this->_destroy();
                    $this->add_attampt("Guest","user","Possible Brute force attack");
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'Invalid username and Password');
                    redirect(ADMIN_FOLDER.'/login');
                    //echo "password not match";
                    return false;
                }
                if(!$this->check_active($result))
                {
                    $this->_destroy();
                    $this->add_attampt($result->username,"user","Inactive account access");
                    $this->session->set_flashdata('etype', 'alert-info');
                    $this->session->set_flashdata('emsg', 'Your account is not active');
                    redirect(ADMIN_FOLDER.'/login');
                    //echo "account is not active";
                    return false;
                }
                if($this->input->post('remember_me')){
                    $remember_code = get_key(20);
                    $remember_ip = md5($this->input->ip_address());
                    $user_id = $result->id;
                    $remember_data = $remember_code."&!".$user_id."&!";
                    $expire = time()+604800; // 7 days
                    $path  = '/';
                    $secure = TRUE;
                    setcookie('remember_me',$remember_data,$expire,$path);
                    $this->userModel->add_user_remember($user_id,$remember_code,$remember_ip);
                }
                if($this->set_session( $result )){ // User is logged in, add to $_SESSION data
                   $this->after_login();
                }
            }
            
            
        }
        public function qsubmit_login()
        {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[40]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]');
            $this->form_validation->set_message('min_length', '%s field length is invalid');
            $this->form_validation->set_message('max_length', '%s field length is invalid');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->add_attampt("Guest","user","Possible Brute force attack");
                $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
                redirect(ADMIN_FOLDER.'/login');
            }
            else
            {
                 $username = sanitize($this->input->post('username',TRUE));
                 $password = sanitize($this->input->post('password',TRUE));
                
                // Query database for user details
                $result = $this->userModel->get_user_by_username($username);
                // User likely doesn't exist
                if(!$result) 
                {
                    $this->_destroy();
                    $this->add_attampt("Guest","user","Possible Brute force attack");
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'Invalid username and Password');
                    redirect(ADMIN_FOLDER.'/login');
                    //echo "user not found";
                    return false;
                }
                if(!$this->qvalidate_password( trim($password), $result ))
                {
                    $this->_destroy();
                    $this->add_attampt("Guest","user","Possible Brute force attack");
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'Invalid username and Password');
                    redirect(ADMIN_FOLDER.'/login');
                    //echo "password not match";
                    return false;
                }
                if(!$this->check_active($result))
                {
                    $this->_destroy();
                    $this->add_attampt($result->username,"user","Inactive account access");
                    $this->session->set_flashdata('etype', 'alert-info');
                    $this->session->set_flashdata('emsg', 'Your account is not active');
                    redirect(ADMIN_FOLDER.'/login');
                    //echo "account is not active";
                    return false;
                }
                if($this->set_session( $result )){ // User is logged in, add to $_SESSION data
                   $this->after_login();
                }
            }
                        
        }

        public function logout()
        {
            $this->_destroy();
            $this->session->set_flashdata('etype', 'alert-success');
            $this->session->set_flashdata('emsg', 'You have successfuly logged out');
            redirect(ADMIN_FOLDER.'/login');
        }

        // public function auth_is_logged_in()
        // {
        //     if($this->auth_check_remember()){
        //         return true;
        //     }else{
        //         if($this->session->userdata('logged_in')){
        //             $uid = $this->session->userdata('uid');
        //             $username = $this->session->userdata('username');
        //             $getuserdata = $this->userModel->get_user_by_id($uid);
        //             if($getuserdata){
        //                 if($getuserdata->username==$username){
        //                     if($this->auth_check_active($getuserdata)){
        //                         if($this->auth_is_admin($getuserdata)){
        //                             return true;
        //                         }else{
        //                             return false;
        //                         }
        //                     }else{
        //                         return false;
        //                     }
        //                 }else{
        //                     return false;
        //                 }
        //             }else{
        //                 return false;
        //             }
        //         }else{
        //             return false;
        //         }
        //     }
        // }



       

        public function register_submit()
        {

            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[40]|is_unique[users.username]',array('required' => 'The %s field is required.','is_unique' => 'This %s already exists.'));
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[10]|max_length[40]|valid_email|is_unique[users.email]',array('required' => 'The %s field is required.','is_unique' => 'This %s already exists.'));
            $this->form_validation->set_rules('address1', 'Street Address 1', 'trim|max_length[200]');
            $this->form_validation->set_rules('address2', 'Street Address 2', 'trim|max_length[200]');
            $this->form_validation->set_rules('city', 'City', 'trim|max_length[20]');
            $this->form_validation->set_rules('state', 'State', 'trim|max_length[20]');
            $this->form_validation->set_rules('zip', 'Zip Code', 'trim|max_length[15]');
            $this->form_validation->set_rules('country', 'Country', 'trim|max_length[15]');
            

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('auth/register');
                //echo "invalid data";
            }
            else
            {
                 $username = sanitize($this->input->post('username',TRUE));
                 $password = sanitize($this->input->post('password',TRUE));
                 $name = sanitize($this->input->post('name',TRUE));
                 $email = sanitize($this->input->post('email',TRUE));
                 $address1 = sanitize($this->input->post('address1',TRUE));
                 $address2 = sanitize($this->input->post('address2',TRUE));
                 $city = sanitize($this->input->post('city',TRUE));
                 $state = sanitize($this->input->post('state',TRUE));
                 $zip = sanitize($this->input->post('zip',TRUE));
                 $country = sanitize($this->input->post('country',TRUE));
                 $user_key = get_key(25);
                
                 extract($this->encrypt_password($password));
                // Query database for user details
                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'name' => $name,
                    'email' => $email,
                    'address1' => $address1,
                    'address2' => $address2,
                    'city' => $city,
                    'state' => $state,
                    'zip' => $zip,
                    'country' => $country,
                    'is_admin' => '0',
                    'is_active' => '0',
                    'user_key' => $user_key,
                    'pattern' => $pattern,
                    'salt1' => $salt1,
                    'salt2' => $salt2,
                );
                $result = $this->userModel->add_user($data);

                if($result){

                    $to = $email;
                    $subject = "Registration Successful";
                    $message = '<h2>Registration Successful</h2>';
                    $message .= '<h4>One last step remainng</h4>';
                    $message .= '<p>Your account is created but not active please activate by clicking below link</p>';
                    $message .= '<p><a href="'.base_url().'auth/activate/'.$user_key.'">Acive Now</a></p>';
                    if($this->send_email_to_user($to,$subject,$message)){
                        $this->load->view('auth/register_success');
                    }else{
                        echo "email not sent";
                    }

                    
                }else{
                    // somethings wrong please try again later
                    $this->load->view('auth/register');
                }

            }
        }

        public function activate($key="hello")
        {
            if($this->userModel->get_user_by_key($key)){
                echo "activated";
            }else{
                echo "your account is already activated or invalid key";
            }
        }

        public function forgot()
        {
            $this->load->view(ADMIN_VIEW_FOLDER."/auth/forgot");
        }
        public function forgot_submit()
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[10]|max_length[40]|valid_email');
            $this->form_validation->set_message('min_length', '%s field length is invalid');
            $this->form_validation->set_message('max_length', '%s field length is invalid');
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
                redirect(ADMIN_FOLDER.'/forgot');
                //echo "invalid data";
            }
            else
            {
                $email = sanitize($this->input->post('email',TRUE));
                $getuserdata = $this->userModel->get_user_by_email($email);
                if($getuserdata){
                    $user_key = get_key(25);
                    $to = $email;
                    $subject = "Recover Account Password";
                    $message = '<!DOCTYPE html><html lang="en"> <head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> <title>Tecmyer</title> <meta name="viewport" content="width=device-width"/> <style type="text/css"> @media only screen and (max-width: 550px), screen and (max-device-width: 550px){body[yahoo] .buttonwrapper{background-color: transparent !important;}body[yahoo] .button{padding: 0 !important;}body[yahoo] .button a{background-color: #ffb901; padding: 15px 25px !important;}}@media only screen and (min-device-width: 601px){.content{width: 600px !important;}.col387{width: 387px !important;}}</style> </head> <body bgcolor="#000000" style="margin: 0; padding: 10px; background:#000;" yahoo="fix"><!--[if (gte mso 9)|(IE)]> <table width="600" align="center" cellpadding="0" cellspacing="0" border="0"> <tr> <td><![endif]--> <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;" class="content"> <tr> <td align="center" bgcolor="#ffb901" style="padding: 10px 10px 10px 10px; color: #ffffff; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;"> <img src="'.base_url().'"files/assets/images/login_logo.png" alt="Tecmyer Logo" width="150" height="37" style="display:block;"/> </td></tr><tr> <td align="center" bgcolor="#ffffff" style="padding: 40px 20px 40px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px; border-bottom: 1px solid #f6f6f6;"> <b>Forgot your password? Lets get you a new one!</b> </td></tr><tr> <td align="center" bgcolor="#f9f9f9" style="padding: 30px 20px 30px 20px; font-family: Arial, sans-serif; border-bottom: 1px solid #f6f6f6;"> <table bgcolor="#ffb901" border="0" cellspacing="0" cellpadding="0" class="buttonwrapper"> <tr> <td align="center" height="50" style=" padding: 0 25px 0 25px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;" class="button"> <a href="'.base_url().ADMIN_FOLDER.'/recover/'.$user_key.'" style="color: #ffffff; text-align: center; text-decoration: none;">Reset Password</a> </td></tr></table> </td></tr><tr> <td align="center" bgcolor="#f7c74a" style="padding: 15px 10px 15px 10px; color: #555555; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"> <b>IMPORTANT!</b><br/>If you didnt request this? ignore this email </td></tr><tr> <td style="padding: 15px 10px 15px 10px;"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" width="100%" style="color: #fff; font-family: Arial, sans-serif; font-size: 12px;"> <a target="_blank" href="https://tecmyer.com.au/" style="color: #fff;">Tecmyer IT Services</a> </td></tr></table> </td></tr></table><!--[if (gte mso 9)|(IE)]> </td></tr></table><![endif]--> </body>';
                    //$message .= '<p><a href="'.base_url().ADMIN_FOLDER.'/recover/'.$user_key.'">Click here to change your password</a></p>';
                    $this->userModel->add_recover_key($getuserdata->id,$user_key);
                    if($this->send_email_to_user($to,$subject,$message)){
                        $this->session->set_flashdata('etype', 'alert-success');
                        $this->session->set_flashdata('emsg', 'Check your email');
                        redirect(ADMIN_FOLDER.'/forgot');
                        //$this->load->view('auth/forgot_success');
                    }else{
                        $this->session->set_flashdata('etype', 'alert-warning');
                        $this->session->set_flashdata('emsg', 'Somethings wrong please try again');
                        redirect(ADMIN_FOLDER.'/forgot');
                    }
                }else{
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'Email address does not exist');
                    redirect(ADMIN_FOLDER.'/forgot');
                }
            }
        }

        public function recover($key=false)
        {
            if($key){
                $getuserdata = $this->userModel->get_user_by_recover_key($key);
                if(!$getuserdata){
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'Invalid Recover key');
                    redirect(ADMIN_FOLDER.'/login');
                }else{
                    $data['recover_key'] = $key;
                    $this->load->view(ADMIN_VIEW_FOLDER."/auth/recover",$data);
                }
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Invalid Recover key');
                redirect(ADMIN_FOLDER.'/login');
            }
        }

        public function recover_submit()
        {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]');
            $this->form_validation->set_rules('passconf', 'Retype Password', 'required|matches[password]');
            $this->form_validation->set_rules('recover_key', 'Recover Key', 'required|min_length[25]|max_length[25]');
            $key = sanitize($this->input->post('recover_key',TRUE));
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
                redirect(ADMIN_FOLDER.'/recover/'.$key);
            }
            else
            {
                $password = sanitize($this->input->post('password',TRUE));
                $getuserdata = $this->userModel->get_user_by_recover_key($key);
                if(!$getuserdata){
                    $this->session->set_flashdata('etype', 'alert-error');
                    $this->session->set_flashdata('emsg', 'Invalid / Expired Recover key');
                    redirect(ADMIN_FOLDER.'/recover/'.$key);
                }else{
                    $passwordp = $this->encrypt_password($password);
                    if($this->userModel->update_user_password($getuserdata->id,$passwordp)){
                        // $message = '<h1>Your Password Changed Successfully</h1>';
                        // $message .= '<p>Now you can login anytime with your new password</p>';

                        $message = '<!DOCTYPE html><html lang="en"> <head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> <title>Tecmyer</title> <meta name="viewport" content="width=device-width"/> <style type="text/css"> @media only screen and (max-width: 550px), screen and (max-device-width: 550px){body[yahoo] .buttonwrapper{background-color: transparent !important;}body[yahoo] .button{padding: 0 !important;}body[yahoo] .button a{background-color: #ffb901; padding: 15px 25px !important;}}@media only screen and (min-device-width: 601px){.content{width: 600px !important;}.col387{width: 387px !important;}}</style> </head> <body bgcolor="#000000" style="margin: 0; padding: 10px; background:#000;" yahoo="fix"><!--[if (gte mso 9)|(IE)]> <table width="600" align="center" cellpadding="0" cellspacing="0" border="0"> <tr> <td><![endif]--> <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;" class="content"> <tr> <td align="center" bgcolor="#ffb901" style="padding: 10px 10px 10px 10px; color: #ffffff; font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;"> <img src="'.base_url().'"files/assets/images/login_logo.png" alt="Tecmyer Logo" width="150" height="37" style="display:block;"/> </td></tr><tr> <td align="center" bgcolor="#ffffff" style="padding: 40px 20px 40px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px; border-bottom: 1px solid #f6f6f6;"> <b>Your Password Changed Successfully</b> </td></tr><tr> <td align="center" bgcolor="#f9f9f9" style="padding: 30px 20px 30px 20px; font-family: Arial, sans-serif; border-bottom: 1px solid #f6f6f6;"> <table bgcolor="#ffb901" border="0" cellspacing="0" cellpadding="0" class="buttonwrapper"> <tr> <td align="center" height="50" style=" padding: 0 25px 0 25px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;" class="button"> <a href="'.base_url().ADMIN_FOLDER.'/login" style="color: #ffffff; text-align: center; text-decoration: none;">Login Now</a> </td></tr></table> </td></tr><tr> <td align="center" bgcolor="#f7c74a" style="padding: 15px 10px 15px 10px; color: #555555; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"> <b>IMPORTANT!</b><br/>Now you can login anytime with your new password</td></tr><tr> <td style="padding: 15px 10px 15px 10px;"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" width="100%" style="color: #fff; font-family: Arial, sans-serif; font-size: 12px;"> <a target="_blank" href="https://tecmyer.com.au/" style="color: #fff;">Tecmyer IT Services</a> </td></tr></table> </td></tr></table><!--[if (gte mso 9)|(IE)]> </td></tr></table><![endif]--> </body>';

                        $this->send_email_to_user($getuserdata->email,"Password Changed Successfully",$message);
                        $this->session->set_flashdata('etype', 'alert-success');
                        $this->session->set_flashdata('emsg', 'Password Changed Successfully');
                        redirect(ADMIN_FOLDER.'/login');
                    }
                }
            }
        }

        

}