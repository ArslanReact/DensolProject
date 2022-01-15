<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ProductsModel extends CI_Model {

    protected $table = "products";
    protected $stocktable = "item_stock";
    protected $cattable = "products_categories";
    protected $selcattable = "products_sel_categories";
    protected $selreltable = "related";
    protected $selvartable = "variation_sel_products";
    protected $mviewstable = "moreviews";
    protected $spectable = "product_specifications";
    protected $gptable = "groups_prices";
    protected $tagstable = "tags";

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
                    if($key=='article'){$val = $this->post_uniq_article($val);}
                    if($key=='slug'){$val = $this->post_uniq_slug($val);}
                    $this->db->set($key, $val);               
                }            
            }
        }
        $this->db->set('created', 'NOW()', FALSE);
        if($this->db->insert($this->table)){
            $newid = $this->db->insert_id();
            // Insert tag
            $sel_tags = $this->get_selected_tags($primary_key_val);
            for($i=0; $i < count($sel_tags); $i++)
            {
                $normaltag = $sel_tags[$i];
                $seotag  = strtolower($normaltag);
                $seotag = str_replace(" ", "-", $seotag);
                $tagarray = array(
                    "t_table" => 'products',
                    "t_table_id" => $newid,
                    "seo_tag" => $seotag,
                    "normal_tag" => $sel_tags[$i]
                );
                $this->db->insert("tags", $tagarray);
            }
            
            $this->db->where('product_id', $primary_key_val); 
            $query2 = $this->db->get($this->selcattable);
            $result = $query2->result();
            if($result){
                foreach ($query2->result() as $row2){
                    $insert_data[] = array(
                        'product_id' => $newid,
                        'productcategory_id'=> $row2->productcategory_id
                    );
                }
            }else{
                $insert_data[] = array(
                    'product_id' => $newid,
                    'productcategory_id'=> 0
                );
            }
            
            //itm stock
            $item_data = array(
                'stock_item_fk' => $newid,
                'stock_quantity' => 100,
                'stock_auto_allocate_status' => 1
            );            
            $this->db->insert($this->stocktable, $item_data);
            
            $this->add_sel_categories($insert_data);

            $this->db->where('product_id', $primary_key_val); 
            $query3 = $this->db->get($this->selvartable);
            $result3 = $query3->result();
            if($result3){
                foreach ($query3->result() as $row3){
                    $insert_data3[] = array(
                        'product_id' => $newid,
                        'group_id'=> $row3->group_id,
                        'variation_id'=> $row3->variation_id
                    );
                }
                $this->add_sel_variations($insert_data3);
            }
            


        }
    }
    public function get_selected_categories($id)
    {
        $this->db->select('productcategory_id');
        $this->db->where('product_id', $id);
        $query = $this->db->get($this->selcattable);
        $vvs = $query->result();
        if(isset($vvs)){
            $data = array();
            foreach($vvs as $vv){
                array_push($data,$vv->productcategory_id);
            }
        }else{
            $data = 0;
        }
        return $data;
    }
    public function get_selected_tags($id)
    {
        $this->db->select('normal_tag');
        $this->db->where('t_table', "products");
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
    public function get_selected_specification($id)
    {
        $this->db->where('product_id', $id);
        $query = $this->db->get($this->spectable);
        return $query->result();
    }
    public function get_selected_variations($id)
    {
        $this->db->where('product_id', $id);
        $query = $this->db->get($this->selvartable);
        $vvs = $query->result();
        if(isset($vvs)){
            $data = array();
            foreach($vvs as $vv){
                array_push($data,$vv->variation_id);
            }
        }else{
            $data = 0;
        }
        return $data;
    }
    public function get_products_all() 
    {
        // $this->db->select('*,GROUP_CONCAT(blogs_categories.title) as blogs_sel_categories');
        // $this->db->from('blogs');
        // $this->db->join('blogs_sel_categories', 'blogs.id = blogs_sel_categories.blog_id', 'inner');
        // $this->db->join('blogs_categories', 'blogs_sel_categories.blogcategory_id = blogs_categories.id', 'inner');
        $query = $this->db->query("SELECT DISTINCT p.title AS product_title, p.id AS product_id,
        c.title AS category_name, c.id AS category_id
        FROM products AS p 
        JOIN products_sel_categories AS pc ON p.id = pc.product_id
        JOIN products_categories AS c ON c.id = bc.productcategory_id
        Order BY product_id");
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
    public function get_all_products($id=null) 
    {
        if($id!=null){
        $query = $this->db->query("SELECT products.* FROM products_sel_categories JOIN products ON products_sel_categories.product_id = products.id WHERE products_sel_categories.productcategory_id = $id");
        }else{
        $query = $this->db->query("SELECT * FROM products");
        }
        $select = $query->result();
        if (isset($select))
            return $select;
        return NULL;
    }
    public function count_all($where=null,$what=null)
    {
        if($what != null){
            if($where=="category"){
                $query = $this->db->query("SELECT products.* FROM products_sel_categories JOIN products ON products_sel_categories.product_id = products.id WHERE products_sel_categories.productcategory_id = $what");
                return $query->num_rows();
            }else{
                return $this->db->where($where,$what)->from($this->table)->count_all_results();
            }
        }else{
            return $this->db->where("article","noart")->from($this->table)->count_all_results();
        }
    }
    public function count_search_all($string)
    {
        return $this->db->like('title', $string)->or_like('article', $string)->or_like('short_detail', $string)->or_like('full_detail', $string)->or_like('tags', $string)->from($this->table)->count_all_results();
    }
    public function count_tags_all($string)
    {
        return $this->db->where('t_table', "products")->where('seo_tag', $string)->from($this->tagstable)->count_all_results();
    }
    public function search_products($string,$limit,$start)
    {
        $this->db->like('title', $string);
        $this->db->or_like('article', $string);
        $this->db->or_like('short_detail', $string);
        $this->db->or_like('full_detail', $string);
        $this->db->or_like('tags', $string);
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function get_front_products($id=null,$where="",$what="",$limit,$start) 
    {
        if($id!=null){
        $query = $this->db->query("SELECT products.* FROM products_sel_categories JOIN products ON products_sel_categories.product_id = products.id WHERE products_sel_categories.productcategory_id = $id LIMIT $limit OFFSET $start");
        }elseif($where != ""){
        $query = $this->db->query("SELECT * FROM products where $where = '$what' LIMIT $limit OFFSET $start");
        }elseif($id==0){
        $query = $this->db->query("SELECT * FROM products where article = 'noart' LIMIT $limit OFFSET $start");
        }else{
        $query = $this->db->query("SELECT * FROM products LIMIT $limit OFFSET $start");
        }
        $select = $query->result();
        if (isset($select))
            return $select;
        return NULL;
    }
    public function tagged_products($string,$limit,$start)
    {
        $this->db->select('t_table_id');
        $this->db->where('t_table', "products");
        $this->db->where('seo_tag', $string);
        //$this->db->limit($limit, $start);
        $query = $this->db->get($this->tagstable);
        $result = $query->result();
        //return $this->db->last_query();
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
    public function get_dashboard_products() 
    {

        $query = $this->db->query("SELECT * FROM `products` ORDER BY id DESC LIMIT 5");
        $select = $query->result();
        if (isset($select))
            return $select;
        return false;
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
    public function getproducts($id=null)
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

    public function get_single_product($id=null)
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

    public function update_product($id,$data,$slug=false,$update=true)
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
    public function update_product_stock($id,$data)
    {
        if($this->db->update($this->stocktable, $data, "stock_item_fk = ".$id)){
            return true;
        }else{
            return true;
        }
        
    }

    public function delete_product($id)
    {
        if($this->db->delete($this->table, array('id' => $id))){
            return true;
        }else{
            return true;
        }
    }
    public function delete_product_stock($id)
    {
        if($this->db->delete($this->stocktable, array('stock_item_fk' => $id))){
            return true;
        }else{
            return true;
        }
    }

    public function add_product($slug,$data=array())
    {
        // $slugarr = array('slug' => $this->create_slug($slug));
        $slugarr = array('slug' => $this->post_uniq_slug($slug));
        $mmdata = array_merge($data, $slugarr); 
        //return $mmdata;
        $this->db->set('created', 'NOW()', FALSE);
        //$this->db->set('slug', $this->uniq_slug($slug, '-', TRUE), FALSE);
        $this->db->insert($this->table, $mmdata);
        return $this->db->insert_id();
    }

    public function add_product_stock($data=array())
    {
        $this->db->insert($this->stocktable, $data);
        return $this->db->insert_id();
    }

    public function add_sel_categories($data)
    {
        $this->db->insert_batch($this->selcattable, $data);
        return $this->db->affected_rows();
    }
    public function add_sel_related($data)
    {
        $this->db->insert_batch($this->selreltable, $data);
        return $this->db->affected_rows();
    }
    public function add_sel_tags($data)
    {
        $this->db->insert_batch($this->tagstable, $data);
        return $this->db->affected_rows();
    }
    public function add_sel_specification($data)
    {
        $this->db->insert_batch($this->spectable, $data);
        return $this->db->affected_rows();
    }

    public function add_sel_variations($data)
    {
        $this->db->insert_batch($this->selvartable, $data);
        return $this->db->affected_rows();
    }
    public function add_group_prices($data)
    {
        $this->db->insert_batch($this->gptable, $data);
        return $this->db->affected_rows();
    }

    public function delete_sel_categories($id)
    {
        if($this->db->delete($this->selcattable, array('product_id' => $id))){
            return true;
        }else{
            return true;
        }
    }  
    public function delete_sel_related($id)
    {
        if($this->db->delete($this->selreltable, array('r_table_id' => $id))){
            return true;
        }else{
            return true;
        }
    }  
    public function delete_sel_tags($id)
    {
        if($this->db->delete($this->tagstable, array('t_table' => 'products', 't_table_id' => $id))){
            return true;
        }else{
            return true;
        }
    }  
    public function delete_sel_specification($id)
    {
        if($this->db->delete($this->spectable, array('product_id' => $id))){
            return true;
        }else{
            return true;
        }
    }  
    public function delete_sel_variations($id)
    {
        if($this->db->delete($this->selvartable, array('product_id' => $id))){
            return true;
        }else{
            return true;
        }
    }  
    public function delete_group_prices($id)
    {
        if($this->db->delete($this->gptable, array('pid' => $id))){
            return true;
        }else{
            return true;
        }
    }  
    public function delete_prd_moreviews($id)
    {
        $this->db->where("product_id",$id);
        $query = $this->db->get($this->mviewstable);
        $results = $query->result();
        foreach($results as $result){
            $this->db->delete($this->mviewstable, array('id' => $result->id));
            delFile2("moreviews","image","products/moreviews/",$result->image);
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
    public function post_uniq_slug($slug, $separator='-', $increment_number_at_end=FALSE) {    
        $last_char_is_number = is_numeric($slug[strlen($slug)-1]);
        $slug = $slug. ($last_char_is_number && $increment_number_at_end? '.':'');
        //if slug exists already, increment it
        $i=0;
        $limit = 20; //for security reason
        while( get_instance()->db->where('slug', $slug)->count_all_results($this->table) != 0) {
            //increment the slug
            $slug = increment_string($slug, $separator);
    
            if($i > $limit) {
                //break;
                return FALSE;
            }
    
            $i++;
        }
    
        //so now we have unique slug
        //remove the dot create because number collision
        if($last_char_is_number && $increment_number_at_end) $slug = str_replace('.','', $slug);
    
        return $slug;
    }
    public function post_uniq_article($slug, $separator='-', $increment_number_at_end=FALSE) {    
        $last_char_is_number = is_numeric($slug[strlen($slug)-1]);
        $slug = $slug. ($last_char_is_number && $increment_number_at_end? '.':'');
        //if slug exists already, increment it
        $i=0;
        $limit = 20; //for security reason
        while( get_instance()->db->where('article', $slug)->count_all_results($this->table) != 0) {
            //increment the slug
            $slug = increment_string($slug, $separator);
    
            if($i > $limit) {
                //break;
                return FALSE;
            }
    
            $i++;
        }
    
        //so now we have unique slug
        //remove the dot create because number collision
        if($last_char_is_number && $increment_number_at_end) $slug = str_replace('.','', $slug);
    
        return $slug;
    }

    public function create_slug22($name)
    {
        $count = 0;
        $slug_name = $name = url_title($name);
        while(true) 
        {
            $this->db->from($this->table)->where('slug', $slug_name);
            if ($this->db->count_all_results() > 0) break;
            $slug_name = $name . '-' . (++$count);
        }
        return $slug_name;
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