<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GalleryCategoriesModel extends CI_Model {

    protected $table = "gallery_categories";
    protected $selcattable = "gallery_sel_categories";

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
                if($key=='slug'){$val = $this->create_slug($val);}
                $this->db->set($key, $val);               
            }
        }
        }
        $this->db->set('created', 'NOW()', FALSE);
        return $this->db->insert($this->table);
    }

    public function getgallerycategories($id=0)
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
    public function get_all_gallerycategories($id=0,$category=false)
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
    public function update_gallerycategory($id,$data,$slug=false,$update=true)
    {
        if($slug != false){
        $slugarr = array('slug' => $this->create_slug($slug));
        $data = array_merge($data, $slugarr);
        }
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
    public function add_gallerycategory($slug,$data=array())
    {
        $slugarr = array('slug' => $this->create_slug($slug));
        $mmdata = array_merge($data, $slugarr); 
        //return $mmdata;
        $this->db->set('created', 'NOW()', FALSE);
        //$this->db->set('slug', $this->uniq_slug($slug, '-', TRUE), FALSE);
        $this->db->insert($this->table, $mmdata);
        return $this->db->affected_rows();
    }
    public function update_sel_categories($id)
    {
        $this->db->where("gallerycategory_id", $id);
        $query = $this->db->get($this->selcattable);
        if ($query->num_rows() > 0){
            $data = array('gallerycategory_id' => 0);
            $this->db->update($this->selcattable, $data, "gallerycategory_id = ".$id);
            return true;
        }else{
            return false;
        }
    }
    public function uniq_slug($slug, $separator='-', $increment_number_at_end=FALSE) {    
        $slug = url_title(convert_accented_characters($slug), $separator, true);
        $last_char_is_number = is_numeric($slug[strlen($slug)-1]);
        $slug = $slug. ($last_char_is_number && $increment_number_at_end? '.':'');
        $i=0;
        $limit = 100;
        while( $this->db->where('slug', $slug)->count_all_results($this->table) != 0) {
            $slug = increment_string($slug, $separator);
            if($i > $limit) {
                return FALSE;
            }
            $i++;
        }
        if($last_char_is_number && $increment_number_at_end) $slug = str_replace('.','', $slug);
        return $slug;
    }
    public function create_slug($name)
    {
        $table=$this->table;    //Write table name
        $field='slug';         //Write field name
        $slug = $name;  //Write title for slug
        $slug = url_title($name);
        $key=NULL;
        $value=NULL;       
        $i = 0;
        $params = array ();
        $params[$field] = $slug;

        if($key)$params["$key !="] = $value;

        while ($this->db->from($table)->where($params)->get()->num_rows())
        {  
        if (!preg_match ('/-{1}[0-9]+$/', $slug ))
        $slug .= '-' . ++$i;
        else
        $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
        $params [$field] = $slug;
        }  

        return $alias=$slug;
    }



}