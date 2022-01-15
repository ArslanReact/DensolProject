<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MoreviewsModel extends CI_Model {

    protected $table = "moreviews";

    public function __construct()
    {
        parent::__construct();
    }

    public function DuplicateMySQLRecord ($primary_key_val) 
    {
        /* generate the select query */
        $this->db->where('id', $primary_key_val); 
        $query = $this->db->get($this->table);
    
        foreach ($query->result() as $row){   
        foreach($row as $key=>$val){        
            if($key != 'id'){
                $this->db->set($key, $val);               
            }//endif              
        }//endforeach
        }//endforeach

        /* insert the new record into table*/
        return $this->db->insert($this->table);
    }

    public function getmoreviews($id=0)
    {
        $this->db->where('product_id', $id);
        $query = $this->db->get($this->table);
        return $query->result();
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
    public function get_single_moreview($id=null)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    public function update_moreview($id,$data)
    {
        if($this->db->update($this->table, $data, "id = ".$id)){
            return true;
        }else{
            return true;
        }
        
    }
    public function delete_moreview($id)
    {
        if($this->db->delete($this->table, array('id' => $id))){
            return true;
        }else{
            return true;
        }
    }
    public function add_moreview($data=array())
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }
}