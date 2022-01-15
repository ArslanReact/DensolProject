<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CmsModel extends CI_Model {
    protected $table = "cms";
    protected $gallerytable = "gallery";
    protected $sgallerytable = "selected_gallery";
    protected $dstable = "dealership_data";
    protected $fbtable = "feedback_data";
    protected $crtable = "credit_data";

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

            if($key != 'id' && $key != 'created'){

                if($key=='slug'){$val = $this->create_slug($val);}

                $this->db->set($key, $val);               

            }//endif              

        }//endforeach

        }//endforeach



        /* insert the new record into table*/

        $this->db->set('created', 'NOW()', FALSE);

        return $this->db->insert($this->table);

    }



    public function getgalleries()

    {

        $query = $this->db->get($this->gallerytable);

        return $query->result();

    }

    public function getselgalleries($id,$type)

    {

        $this->db->where("parent_id",$id);

        $this->db->where("type",$type);

        $query = $this->db->get($this->sgallerytable);

        return $query->result();

    }

    public function getcms($id=0)

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

    public function get_all_cms($id=0,$category=false)

    {

        if(!$category){

            if($id != 0){$this->db->where('parent_id', $id);}

        }

        $query = $this->db->get($this->table);

        return $query->result();

    }

    public function get_single_cms($id=null)

    {

        $this->db->where('id', $id);

        $query = $this->db->get($this->table);

        return $query->row();

    }

    public function get_single_cms_by_slug($slug,$full)

    {

        $this->db->where("slug", $slug);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0){

            if($query->num_rows() > 1){

                $this->db->where("full_slug", $full);

                $query2 = $this->db->get($this->table);

                return $query2->row();

            }else{

                return $query->row();

            }

        }else{

            return false;

        }

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

    public function update_cms($id,$data,$slug=false,$full_slug,$update=true)

    {

        if($slug != false){

        $slugarr = array('slug' => $this->create_slug($slug,$data['parent_id']),'full_slug' => $this->create_slug2($full_slug));

        $data = array_merge($data, $slugarr);

        }

        if($update){$this->db->set('updated', 'NOW()', FALSE);}

        if($this->db->update($this->table, $data, "id = ".$id)){

            return true;

        }else{

            return true;

        }

        

    }

    public function delete_cms($id)

    {

        if($this->db->delete($this->table, array('id' => $id))){

            return true;

        }else{

            return true;

        }

    }

    public function add_cms($slug,$full_slug,$data=array())

    {

        $slugarr = array('slug' => $this->create_slug($slug,$data['parent_id']),'full_slug' => $this->create_slug2($full_slug));

        $mmdata = array_merge($data, $slugarr); 

        $this->db->set('created', 'NOW()', FALSE);

        $this->db->insert($this->table, $mmdata);

        return $this->db->insert_id();

    }



    public function add_dealership($data=array())
    {
        $this->db->set('created', 'NOW()', FALSE);
        $this->db->insert($this->dstable, $data);
        return $this->db->insert_id();
    }
    public function add_feedback($data=array())
    {
        $this->db->set('created', 'NOW()', FALSE);
        $this->db->insert($this->fbtable, $data);
        return $this->db->insert_id();
    }
    public function add_credit($data=array())
    {
        $this->db->set('created', 'NOW()', FALSE);
        $this->db->insert($this->crtable, $data);
        return $this->db->insert_id();
    }



    public function add_sel_gallery($data)

    {

        $this->db->insert($this->sgallerytable, $data);

        return $this->db->insert_id();

    }

    public function delete_sel_gallery($id)

    {

        if($this->db->delete($this->sgallerytable, array('parent_id' => $id))){

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



    public function create_slug($name,$parent_id)

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



        if($this->db->from($table)->where($params)->get()->num_rows() > 0){

            $full_slug = makeslugs("cms",$parent_id).$slug;

            if($this->db->from($table)->where("full_slug",$full_slug)->get()->num_rows() > 0){

                while ($this->db->from($table)->where($params)->get()->num_rows())

                {  

                    if (!preg_match ('/-{1}[0-9]+$/', $slug ))

                    $slug .= '-' . ++$i;

                    else

                    $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );

                    $params [$field] = $slug;

                }  

            }

        }

        return $alias=$slug;

    }

    public function create_slug2($name)

    {

        $table=$this->table;    //Write table name

        $field='full_slug';         //Write field name

        $slug = $name;  //Write title for slug

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