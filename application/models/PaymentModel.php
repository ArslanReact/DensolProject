<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaymentModel extends CI_Model {



    protected $table = "payments";


    public function __construct()

    {

        parent::__construct();

    }

    public function get_admin_payments() 
    {
        $query = $this->db->query("SELECT * FROM payments order by id");
        $select = $query->result();
        if (isset($select))
            return $select;
        return NULL;
    }
    public function get_front_payments() 
    {
        $query = $this->db->query("SELECT * FROM payments where is_active = 1 order by sort");
        $select = $query->result();
        if (isset($select))
            return $select;
        return NULL;
    }
    public function get_single_payment($id=null)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    public function update_payment($id,$data)
    {
        if($this->db->update($this->table, $data, "id = ".$id)){
            return true;
        }else{
            return true;
        }
    }
}