<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {



    public function __construct()

    {

        // $this->load does not exist until after you call this

        parent::__construct(); // Construct CI's core so that you can use it

        if(!$this->is_logged_in()){

            redirect('login');

        }
        $this->load->model('userModel');
        $this->load->model('usersgroupModel');

        $this->load->helper(array('form','text'));

        $this->load->library(array('form_validation'));

    }


    public function edit($id=null)

    {
            $data['sessions'] = $this->session->userdata();

            $data['page_heading'] = "Users";

            $user = $this->userModel->get_user_by_id($id);

            $data['user'] = $user;

            $data['user_groups'] = $this->usersgroupModel->get_all_usersgroups();

            $this->load->view('clientdash/users/edit',$data);
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



                $username = sanitize($this->input->post('username',TRUE));

                $password = sanitize($this->input->post('password',TRUE));

                $name = sanitize($this->input->post('name',TRUE));

                $email = sanitize($this->input->post('email',TRUE));

                $company = sanitize($this->input->post('company',TRUE));
               // $disc = $this->input->post('discount');

                $address1 = sanitize($this->input->post('address1',TRUE));

                $address2 = sanitize($this->input->post('address2',TRUE));

                $city = sanitize($this->input->post('city',TRUE));

                $state = sanitize($this->input->post('state',TRUE));

                $zip = sanitize($this->input->post('zip',TRUE));

                $country = sanitize($this->input->post('country',TRUE));


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
                    
                    

                    'company' => $company,

                    'address1' => $address1,

                    'address2' => $address2,

                    'city' => $city,

                    'state' => $state,

                    'zip' => $zip,

                    'country' => $country,

                    'user_key' => '',

                    'pattern' => $pattern,

                    'salt1' => $salt1,

                    'salt2' => $salt2,

                );

                $result = $this->userModel->update_user($pp,$data);
                $this->session->set_flashdata('etype', 'alert-success');

                $this->session->set_flashdata('emsg', 'User successfully Updated');

               redirect("users/edit/$pp");  

            


        }




   



}