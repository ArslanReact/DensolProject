<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BannerCategoriesModel extends CI_Model {

    protected $table = "banner_categories";

    public function __construct()
    {
        parent::__construct();
    }

    public function DuplicateMySQLRecord ($primary_key_val) 
    {
        $this->db->where('id', $primary_key_val); 
        $query = $this->db->get($this->table);
        foreach ($query->result() as $row){   
            foreach($row as $key=>$val){        
                if($key != 'id' && $key != 'created'){
                    $this->db->set($key, $val);               
                }          
            }
        }
        $this->db->set('created', 'NOW()', FALSE);
        return $this->db->insert($this->table);
    }

    public function getbannercategories($id=0)
    {
        if($id != 0){$this->db->where('parent_id', $id);}else{$this->db->where('parent_id', 0);}
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
    public function get_all_bannercategories($id=0,$category=false)
    {
        if(!$category){
            if($id != 0){$this->db->where('parent_id', $id);}
        }
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function get_single_category($id=null)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    public function is_parent($id)
    {
        $this->db->where('parent_id', $id);
        $query = $this->db->get($this->table);
        $pp = $query->row();
        if(isset($pp)){
            return 1;
        }else{
            return 0;
        }
    }
    public function update_bannercategory($id,$data,$update=true)
    {
        if($update){$this->db->set('updated', 'NOW()', FALSE);}
        if($this->db->update($this->table, $data, "id = ".$id)){
            return true;
        }else{
            return true;
        }
    }
    public function delete_category($id)
    {
        if($this->db->delete($this->table, array('id' => $id))){
            return true;
        }else{
            return true;
        }
    }
    public function add_bannercategory($data=array())
    {
        $this->db->set('created', 'NOW()', FALSE);
        //$this->db->set('slug', $this->uniq_slug($slug, '-', TRUE), FALSE);
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

}