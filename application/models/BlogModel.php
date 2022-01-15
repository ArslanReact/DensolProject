<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BlogModel extends CI_Model {

    protected $table = "blogs";
    protected $cattable = "blogs_categories";
    protected $selcattable = "blogs_sel_categories";
    protected $tagstable = "tags";

    public function __construct()
    {
        parent::__construct();
    }

    public function count_all($where=null,$what=null)
    {
        if($what != null){
            if($where=="category"){
                $query = $this->db->query("SELECT blogs.* FROM blogs_sel_categories JOIN blogs ON blogs_sel_categories.blog_id = blogs.id WHERE blogs_sel_categories.blogcategory_id = $what");
                return $query->num_rows();
            }else{
                return $this->db->where($where,$what)->from($this->table)->count_all_results();
            }
        }else{
            return $this->db->count_all($this->table);
        }
    }

    public function count_keywords_all($string)
    {
        return $this->db->where('t_table', "blogs")->where('seo_tag', $string)->from($this->tagstable)->count_all_results();
    }

    public function key_blogs($string,$limit,$start)
    {
        $this->db->select('t_table_id');
        $this->db->where('t_table', "blogs");
        $this->db->where('seo_tag', $string);
        //$this->db->limit($limit, $start);
        $query = $this->db->get($this->tagstable);
        $result = $query->result();
        if(!empty($result)){
            //$rere = array();
            foreach($result as $re){
                $rere[] = intval($re->t_table_id);
            }
            //$ids = rtrim($rere,",");
            $this->db->where_in('id', $rere);
            $this->db->limit($limit, $start);
            $query = $this->db->get($this->table);
            return $query->result();
        }else{
            return false;
        }
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
        if($this->db->insert($this->table)){
            $newid = $this->db->insert_id();

            $this->db->where('blog_id', $primary_key_val); 
            $query2 = $this->db->get($this->selcattable);
            $result = $query2->result();
            if($result){
                foreach ($query2->result() as $row2){
                    $insert_data[] = array(
                        'blog_id' => $newid,
                        'blogcategory_id'=> $row2->blogcategory_id
                    );
                }
            }else{
                $insert_data[] = array(
                    'blog_id' => $newid,
                    'blogcategory_id'=> 0
                );
            }

            $this->add_sel_categories($insert_data);

        }
    }

    public function get_selected_categories($id)
    {
        $this->db->select('blogcategory_id');
        $this->db->where('blog_id', $id);
        $query = $this->db->get($this->selcattable);
        $vvs = $query->result();
        if(isset($vvs)){
            $data = array();
            foreach($vvs as $vv){
                array_push($data,$vv->blogcategory_id);
            }
        }else{
            $data = 0;
        }
        return $data;
    }
    public function get_selected_tags($id)
    {
        $this->db->select('normal_tag');
        $this->db->where('t_table', 'blogs');
        $this->db->where('t_table_id', $id);
        $query = $this->db->get($this->tagstable);
        $vvs = $query->result();
        if(isset($vvs)){
            $data = array();
            foreach($vvs as $vv){
                array_push($data,$vv->normal_tag);
            }
        }else{
            $data = 0;
        }
        return $data;
    }

    public function get_blogs_all() 
    {
        // $this->db->select('*,GROUP_CONCAT(blogs_categories.title) as blogs_sel_categories');
        // $this->db->from('blogs');
        // $this->db->join('blogs_sel_categories', 'blogs.id = blogs_sel_categories.blog_id', 'inner');
        // $this->db->join('blogs_categories', 'blogs_sel_categories.blogcategory_id = blogs_categories.id', 'inner');
        $query = $this->db->query("SELECT DISTINCT b.title AS blog_title, b.id AS blog_id,
        c.title AS category_name, c.id AS category_id
        FROM blogs AS b 
        JOIN blogs_sel_categories AS bc ON b.id = bc.blog_id
        JOIN blogs_categories AS c ON c.id = bc.blogcategory_id
        Order BY blog_id");
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
    public function get_all_blogs($id=null) 
    {
        if($id!=null){
        $query = $this->db->query("SELECT blogs.* FROM blogs_sel_categories JOIN blogs ON blogs_sel_categories.blog_id = blogs.id WHERE blogs_sel_categories.blogcategory_id = $id");
        }else{
        $query = $this->db->query("SELECT * FROM blogs");
        }
        $select = $query->result();
        if (isset($select))
            return $select;
        return NULL;
    }

    public function get_all_front_blogs($id=null,$where="",$what="",$limit,$start) 
    {
        if($id!=null){
            $query = $this->db->query("SELECT blogs.* FROM blogs_sel_categories JOIN blogs ON blogs_sel_categories.blog_id = blogs.id WHERE blogs_sel_categories.blogcategory_id = $id ORDER BY created DESC LIMIT $limit OFFSET $start");
        }elseif($where != ""){
                $query = $this->db->query("SELECT * FROM blogs where $where = '$what' ORDER BY created DESC LIMIT $limit OFFSET $start");
        }else{
            $query = $this->db->query("SELECT * FROM blogs ORDER BY created DESC LIMIT $limit OFFSET $start");
        }
        $select = $query->result();
        if (isset($select))
            return $select;
        return NULL;
    }


    public function get_news_front_blogs($id=null,$where="",$what="",$limit) 
    {
        if($id!=null){
            $query = $this->db->query("SELECT blogs.* FROM blogs_sel_categories JOIN blogs ON blogs_sel_categories.blog_id = blogs.id WHERE blogs_sel_categories.blogcategory_id = $id ORDER BY created DESC LIMIT $limit");
        }elseif($where != ""){
            $query = $this->db->query("SELECT * FROM blogs where $where = '$what' ORDER BY created DESC LIMIT $limit");
        }else{
            $query = $this->db->query("SELECT * FROM blogs ORDER BY created DESC LIMIT $limit");
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

    public function get_single_blog_by_slug($slug)
    {
        $this->db->where("slug", $slug);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
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

    public function get_all_cms($id=0,$category=false)
    {
        if(!$category){
            if($id != 0){$this->db->where('parent_id', $id);}
        }
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_single_blog($id=null)
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

    public function update_blog($id,$data,$slug=false,$update=true)
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

    public function delete_blog($id)
    {
        if($this->db->delete($this->table, array('id' => $id))){
            return true;
        }else{
            return true;
        }
    }

    public function add_blog($slug,$data=array())
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
    public function add_sel_tags($data)
    {
        $this->db->insert_batch($this->tagstable, $data);
        return $this->db->affected_rows();
    }

    public function delete_sel_categories($id)
    {
        if($this->db->delete($this->selcattable, array('blog_id' => $id))){
            return true;
        }else{
            return true;
        }
    }  
    public function delete_sel_tags($id)
    {
        if($this->db->delete($this->tagstable, array('t_table' => 'blogs','t_table_id' => $id))){
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