<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersgroupModel extends CI_Model {



    protected $table = "usersgroup";



    public function __construct()

    {

        parent::__construct();

    }

    public function get_usersgroup_by_id($id)
    {
        //$this->db->select('id, username, password, pattern, salt1, salt2');
        $this->db->escape($id);
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        //return $query->result();
        return $query->row();
    }

    
    public function add_usersgroup($data=array())

    {
        $this->db->set('created', 'NOW()', FALSE);
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function update_usersgroup($id,$data=array())
    {
        $this->db->set('updated', 'NOW()', FALSE);
        $this->db->update($this->table, $data, "id = ".$id);
        return $this->db->affected_rows();
    }

    public function delete_usersgroup($id)
    {
        if($this->db->delete($this->table, array('id' => $id))){
            return true;
        }else{
            return false;
        }
    }

    public function get_all_usersgroups()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    



}