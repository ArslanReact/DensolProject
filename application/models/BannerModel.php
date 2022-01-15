<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BannerModel extends CI_Model {



    protected $table = "banner";

    protected $cattable = "banner_categories";



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

        if($this->db->insert($this->table)){

            return $this->db->insert_id();

        }

    }





    



    // public function get_blogs_by_category($id=0) {

    //     $query = $this->db->query("SELECT blogs.* FROM blogs_sel_categories JOIN blogs ON blogs_sel_categories.blog_id = blogs.id WHERE blogs_sel_categories.blogcategory_id = $id");

    //     $select = $query->result();

    //     if (isset($select))

    //         return $select;

    //     return NULL;

    // }

    public function get_all_banners($id=null) 

    {

        if($id!=null){

        $query = $this->db->query("SELECT * FROM banner WHERE parent_id = ".$id."");

        }else{

        $query = $this->db->query("SELECT * FROM banner");

        }

        $select = $query->result();

        if (isset($select))

            return $select;

        return NULL;

    }


    public function get_front_banners($id=null) 

    {

        if($id!=null){

        $query = $this->db->query("SELECT * FROM banner WHERE parent_id = ".$id." and is_active = '1'");

        }else{

        $query = $this->db->query("SELECT * FROM banner where is_active = '1'");

        }

        $select = $query->result();

        if (isset($select))

            return $select;

        return NULL;

    }



    // public function get_all_post() {

    //     $this->db->select('*');

    //     $this->db->from('blogs');

    //     $this->db->join('blogs_sel_categories', 'blogs_sel_categories.blog_id = blogs.id');

    //     $this->db->join('blogs_categories', 'blogs_categories.id = blogs_sel_categories.blogcategory_id');

    //     $query = $this->db->get();

    //     $select = $query->result();

    //     // foreach($query->result() as $row) {

    //     //     $select[] = $row;

    //     // }

    //     if (isset($select))

    //         return $select;

    //     return NULL;

    // }

    // public function get_all_post() {

    //     $this->db->select('*');

    //     $this->db->from($this->table);// I use aliasing make joins easier

    //     $this->db->join($this->selcattable, $this->table.'.id = '.$this->selcattable.'.blog_id', 'INNER');

    //     $this->db->join($this->cattable, $this->cattable.'.id = '.$this->selcattable.'.blogcategory_id', 'INNER');

    //     $this->db->where($this->selcattable.'.blogcategory_id',15);

    //     $query = $this->db->get();

    //     $select = $query->result();

    //     // foreach($query->result() as $row) {

    //     //     $select[] = $row;

    //     // }

    //     if (isset($select))

    //         return $select;

    //     return NULL;

    // }

    // public function get_all_post() {

    //     $this->db->select('*');

    //     $this->db->from($this->table);

    //     $this->db->join($this->selcattable, $this->selcattable.'.blog_id='.$this->table.'.id', 'left');

    //     $this->db->join($this->cattable, $this->selcattable.'.blogcategory_id='.$this->cattable.'.id');

    //     $query = $this->db->get();

    //     $select = array();

    //     foreach($query->result() as $row) {

    //         $select[] = $row;

    //     }

    //     if (count($select) > 0)

    //         return $select;

    //     return NULL;

    // }

    public function getblog($id=null)

    {

        if($id){$this->db->where('parent_id', $id);}

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



    // public function get_all_banners($id=0,$category=false)

    // {

    //     if(!$category){

    //         if($id != 0){$this->db->where('parent_id', $id);}

    //     }

    //     $query = $this->db->get($this->table);

    //     return $query->result();

    // }



    public function get_single_banner($id=null)

    {

        $this->db->where('id', $id);

        $query = $this->db->get($this->table);

        return $query->row();

    }



    // public function is_parent($id)

    // {

    //     $this->db->where('parent_id', $id);

    //     $query = $this->db->get($this->table);

    //     $pp = $query->row();

    //     if(isset($pp)){

    //         return 1;

    //     }else{

    //         return 0;

    //     }

    // }



    public function update_banner($id,$data,$update=true)

    {

        if($update){$this->db->set('updated', 'NOW()', FALSE);}

        if($this->db->update($this->table, $data, "id = ".$id)){

            return true;

        }else{

            return true;

        }

        

    }



    public function delete_banner($id)

    {

        if($this->db->delete($this->table, array('id' => $id))){

            return true;

        }else{

            return true;

        }

    }



    public function add_banner($data=array())

    {

        $this->db->set('created', 'NOW()', FALSE);

        //$this->db->set('slug', $this->uniq_slug($slug, '-', TRUE), FALSE);

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();

    }



    

    

}