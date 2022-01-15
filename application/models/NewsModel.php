<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class NewsModel extends CI_Model {

    protected $table = "news";
    protected $cattable = "news_categories";
    protected $selcattable = "news_sel_categories";

    public function __construct()
    {
        parent::__construct();
    }

    // $this->db->join('blog_category', 'blog_category.blog_id=blog.blog_id', 'left');
    // $this->db->join('category', 'blog_category.cat_id=category.cat_id');
    

    public function DuplicateMySQLRecord ($primary_key_val) 
    {
    /* generate the select query */
    $this->db->where('id', $primary_key_val); 
    $query = $this->db->get($this->table);
    
        foreach ($query->result() as $row){   
        foreach($row as $key=>$val){        
            if($key != 'id' && $key != 'created'){
                if($key=='slug'){$val = $this->create_slug($val);}
                $this->db->set($key, $val);               
            }//endif              
        }//endforeach
        }//endforeach

        /* insert the new record into table*/
        $this->db->set('created', 'NOW()', FALSE);
        if($this->db->insert($this->table)){
            $newid = $this->db->insert_id();

            $this->db->where('news_id', $primary_key_val); 
            $query2 = $this->db->get($this->selcattable);
            $result = $query2->result();
            if($result){
                foreach ($query2->result() as $row2){
                    $insert_data[] = array(
                        'news_id' => $newid,
                        'newscategory_id'=> $row2->newscategory_id
                    );
                }
            }else{
                $insert_data[] = array(
                    'news_id' => $newid,
                    'newscategory_id'=> 0
                );
            }

            $this->add_sel_categories($insert_data);

        }
    }



    public function get_selected_categories($id)
    {
        $this->db->select('newscategory_id');
        $this->db->where('news_id', $id);
        $query = $this->db->get($this->selcattable);
        $vvs = $query->result();
        if(isset($vvs)){
            $data = array();
            foreach($vvs as $vv){
                array_push($data,$vv->newscategory_id);
            }
        }else{
            $data = 0;
        }
        return $data;
    }


    public function get_news_all() 
    {
        // $this->db->select('*,GROUP_CONCAT(blogs_categories.title) as blogs_sel_categories');
        // $this->db->from('blogs');
        // $this->db->join('blogs_sel_categories', 'blogs.id = blogs_sel_categories.blog_id', 'inner');
        // $this->db->join('blogs_categories', 'blogs_sel_categories.blogcategory_id = blogs_categories.id', 'inner');
        $query = $this->db->query("SELECT DISTINCT n.title AS news_title, n.id AS news_id,
        c.title AS category_name, c.id AS category_id
        FROM news AS b 
        JOIN news_sel_categories AS nc ON n.id = nc.news_id
        JOIN news_categories AS c ON c.id = nc.newscategory_id
        Order BY news_id");
        // $query = $this->db->get();
        $select = $query->result();
        // foreach($query->result() as $row) {
        //     $select[] = $row;
        // }
        if (isset($select))
            return $select;
        return NULL;
    }
    // public function get_blogs_by_category($id=0) {
    //     $query = $this->db->query("SELECT blogs.* FROM blogs_sel_categories JOIN blogs ON blogs_sel_categories.blog_id = blogs.id WHERE blogs_sel_categories.blogcategory_id = $id");
    //     $select = $query->result();
    //     if (isset($select))
    //         return $select;
    //     return NULL;
    // }
    public function get_all_news($id=null) 
    {
        if($id!=null){
        $query = $this->db->query("SELECT news.* FROM news_sel_categories JOIN news ON news_sel_categories.news_id = news.id WHERE news_sel_categories.newscategory_id = $id");
        }else{
        $query = $this->db->query("SELECT * FROM news");
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


    public function getnews($id=null)
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
    public function get_single_news($id=null)
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
    public function update_news($id,$data,$slug=false,$update=true)
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
    public function delete_news($id)
    {
        if($this->db->delete($this->table, array('id' => $id))){
            return true;
        }else{
            return true;
        }
    }
    public function add_news($slug,$data=array())
    {
        $slugarr = array('slug' => $this->create_slug($slug));
        $mmdata = array_merge($data, $slugarr); 
        //return $mmdata;
        $this->db->set('created', 'NOW()', FALSE);
        //$this->db->set('slug', $this->uniq_slug($slug, '-', TRUE), FALSE);
        $this->db->insert($this->table, $mmdata);
        return $this->db->insert_id();
    }

    public function add_sel_categories($data)
    {
        $this->db->insert_batch($this->selcattable, $data);
        return $this->db->affected_rows();
    }
    public function delete_sel_categories($id)
    {
        if($this->db->delete($this->selcattable, array('news_id' => $id))){
            return true;
        }else{
            return true;
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