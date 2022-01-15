<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {



    protected $table = "users";
    protected $cptable = "custom_prices";



    public function __construct()

    {

        parent::__construct();

    }

    public function get_user_by_username($username)

    {

        //$this->db->select('id, username, password, pattern, salt1, salt2');

        $this->db->escape($username);

        $this->db->where('username', $username);

        $query = $this->db->get($this->table);

        //return $query->result();

        return $query->row();

    }

    public function get_user_by_email($email)

    {

        //$this->db->select('id, username, password, pattern, salt1, salt2');

        $this->db->escape($email);

        $this->db->where('email', $email);

        $query = $this->db->get($this->table);

        //return $query->result();

        return $query->row();

    }

    public function get_user_by_id($id)

    {

        //$this->db->select('id, username, password, pattern, salt1, salt2');

        $this->db->escape($id);

        $this->db->where('id', $id);

        $query = $this->db->get($this->table);

        //return $query->result();

        return $query->row();

    }

    public function activate_user_by_key($key)

    {

        //$this->db->select('id, username, password, pattern, salt1, salt2');

        $this->db->escape($key);

        $this->db->where('user_key', $key);

        $query = $this->db->get($this->table);

        //return $query->result();

        $row = $query->row();

        if (isset($row)){

            $data = array('is_active' => '1','user_key' => '');

            if($this->db->update($this->table, $data, "user_key = '".$key."'")){

                return $row->return_page;

            }else{

                return false;

            }

        }else{

            return false;

        }

    }

    public function get_user_by_recover_key($key)

    {

        //$this->db->select('id, username, password, pattern, salt1, salt2');

        $this->db->escape($key);

        $this->db->where('recover_key', $key);

        $query = $this->db->get($this->table);

        //return $query->result();

        $row = $query->row();

        if (isset($row)){

            return $row;

        }else{

            return false;

        }

    }

    public function add_user($data=array())

    {

        $this->db->set('created', 'NOW()', FALSE);

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();

    }

    public function update_user($id,$data=array())

    {

        $this->db->set('updated', 'NOW()', FALSE);

        $this->db->update($this->table, $data, "id = ".$id);

        return $this->db->affected_rows();

    }

    public function delete_user($id)

    {

        if($this->db->delete($this->table, array('id' => $id))){

            return true;

        }else{

            return true;

        }

    }

    public function add_user_remember($id,$code,$ip)

    {

        $data = array('remember_code' => $code,'remember_ip' => $ip);

        if($this->db->update($this->table, $data, "id = ".$id)){

            return true;

        }else{

            return true;

        }

        

    }

    public function add_recover_key($id,$key)

    {

        $data = array('recover_key' => $key);

        if($this->db->update($this->table, $data, "id = ".$id)){

            return true;

        }else{

            return true;

        }

        

    }


    public function add_custom_prices($data)
    {
        $this->db->insert_batch($this->cptable, $data);
        return $this->db->affected_rows();
    }

    public function delete_custom_prices($id)
    {
        if($this->db->delete($this->cptable, array('cid' => $id))){
            return true;
        }else{
            return true;
        }
    }


    public function update_user_password($id,$password=array())

    {

        extract($password);

        $data = array('recover_key'=>'','password' => $password,'pattern' => $pattern,'salt1' => $salt1,'salt2' => $salt2);

        if($this->db->update($this->table, $data, "id = ".$id)){

            return true;

        }else{

            return true;

        }

        

    }

    public function update_user_last_login($id,$ip)

    {



        $data = array('last_ip' => $ip);

        $this->db->set('last_login', 'NOW()', FALSE);

        if($this->db->update($this->table, $data, "id = ".$id)){

            return true;

        }else{

            return true;

        }

        

    }

    public function delete_user_remember($id)

    {

        $data = array('remember_code' => '','remember_ip' => '');

        $this->db->update($this->table, $data, "id = ".$id);

        return;

    }

    public function getValue($select,$whare,$what)

    {

        $this->db->escape($what);

        $this->db->where($whare, $what);

        $query = $this->db->get($this->table);

        $result = $query->row();

        if(isset($result)){

            return $result->$select;

        }

        return;

    }
    public function get_all_users()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function get_all_requests()
    {
        $query = $this->db->query("select * from tbl_credit_account_request where active_status=0");
        return $query->result();
    }   
    public function get_all_student_requests()
    {
        $query = $this->db->query("select * from student_request_form where active_status=0");
        return $query->result();
    }       

    



}