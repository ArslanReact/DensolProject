<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends MY_Controller {

    public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        if(!$this->is_logged_in()){
            redirect(ADMIN_FOLDER.'/login');
        }else{
            if(!$this->check_admin()){
                redirect(base_url().'user/profile');
            }
        }
        $this->load->model('productsModel');
        $this->load->model('productscategoriesModel');
        $this->load->helper(array('form','text'));
        $this->load->library(array('form_validation','upload'));
    }
    public function index($id=null)
    {
        $this->get_products($id);
    }
    public function copy_data($id)
    {
        $id = $this->productsModel->DuplicateMySQLRecord($id);

        $this->session->set_flashdata('etype', 'alert-success');
        $this->session->set_flashdata('emsg', 'Record copy successfully');
        $this->cms_redirect(0,0,'');
    }
    public function add()
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Products";
        $data['categories'] = $this->productscategoriesModel->get_all_productscategories(0,false);
        $this->load->view(ADMIN_VIEW_FOLDER.'/products/add',$data);
    }
    public function add_submit($id=null)
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('article', 'Article/Model', 'required|trim|max_length[100]|is_unique[products.article]',array('required' => 'The %s field is required.','is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('short_detail', 'Short Description', 'trim');
        $this->form_validation->set_rules('full_detail', 'Product Description', 'trim');
        $this->form_validation->set_rules('specih[]', 'Specification heading', 'trim');
        $this->form_validation->set_rules('speciv[]', 'Specification value', 'trim');
        $this->form_validation->set_rules('cats[]', 'Categories', 'trim|required');
        $this->form_validation->set_rules('related[]', 'Related Products', 'trim');
        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('is_featured', 'Featured', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('sort', 'Sort', 'required|integer');
        $this->form_validation->set_rules('tags', 'Page Tags', 'trim');
        $this->form_validation->set_rules('weight', 'Weight', 'numeric|trim');
        $this->form_validation->set_rules('price', 'Price', 'numeric|trim');
        $this->form_validation->set_rules('discounted_price', 'Discounted Price', 'numeric|trim');
        $this->form_validation->set_rules('qty', 'Qty', 'integer|trim');
        $this->form_validation->set_rules('stock_availability', 'Auto Allocate Stock', 'integer|trim|max_length[1]');
        $this->form_validation->set_rules('meta_title', 'Seo Title', 'trim|max_length[500]');
        $this->form_validation->set_rules('meta_desc', 'Seo Description', 'trim|max_length[500]');
        $this->form_validation->set_rules('meta_key', 'Seo Keywords', 'trim|max_length[500]');
        //$this->form_validation->set_message('min_length', '%s field length is invalid');
        $this->form_validation->set_message('max_length', '%s field length is invalid');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
            $this->cms_redirect($pp,0,'/add');
            //$this->load->view('auth/login');
            //echo "invalid data";
        }
        else
        {
            $title = sanitize($this->input->post('title',TRUE));
            if($this->input->post('slug',TRUE)){
                $article = sanitize($this->input->post('article',TRUE));
                $slug = doSeo(sanitize($this->input->post('slug',TRUE)));
            }else{
                $article = rand(00000,99999);
                $slug = doSeo(sanitize($this->input->post('title',TRUE)));
            }
            $short_detail = sanitize($this->input->post('short_detail',TRUE));
            $full_detail = sanitize($this->input->post('full_detail',FALSE));
            
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $is_featured = sanitize($this->input->post('is_featured',TRUE));
            $sort = $this->input->post('sort',TRUE);
            $tags = sanitize($this->input->post('tags',TRUE));

            $price = sanitize($this->input->post('price',TRUE));
            $weight = sanitize($this->input->post('weight',TRUE));
            $discounted_price = sanitize($this->input->post('discounted_price',TRUE));
            $qty = sanitize($this->input->post('qty',TRUE));
            $stock_availability = sanitize($this->input->post('stock_availability',TRUE));

            $meta_title = sanitize($this->input->post('meta_title',TRUE));
            $meta_desc = sanitize($this->input->post('meta_desc',TRUE));
            $meta_key = sanitize($this->input->post('meta_key',TRUE));

            // $config['upload_path']   = UPLOADPATH.'products/';
            // $config['allowed_types'] = 'gif|jpg|png';
            // $config['max_size']      =  2048;
            // $config['file_name'] = "icon";
            // $this->load->library('upload', $config);
            // if (!empty($_FILES['icon']['name'])) {
            //     $config['file_name'] = "icon";
            //     $this->upload->initialize($config);
            //     if ( ! $this->upload->do_upload('icon'))
            //     {
            //         $error = array('infoerror' => $this->upload->display_errors());
            //         $this->session->set_flashdata('infoerror', $this->upload->display_errors());
            //         $this->cms_redirect($pp,0,'/add');
            //     }else{
            //         $upload_data1 = $this->upload->data();
            //         $icon = $upload_data1['file_name'];
            //     }
            // }else{
            //     $icon = null;
            // }
            // if (!empty($_FILES['thumbnail']['name'])) {
            //     $config['file_name'] = "thumbnail";
            //     $this->upload->initialize($config);
            //     if ( ! $this->upload->do_upload('thumbnail'))
            //     {
            //         $error = array('infoerror' => $this->upload->display_errors());
            //         $this->session->set_flashdata('infoerror', $this->upload->display_errors());
            //         $this->cms_redirect($pp,0,'/add');
            //     }else{
            //         $upload_data2 = $this->upload->data();
            //         $thumbnail = $upload_data2['file_name'];
            //     }
            // }else{
            //     $thumbnail = null;
            // }
            // if (!empty($_FILES['banner']['name'])) {
            //     $config['file_name'] = "banner";
            //     $this->upload->initialize($config);
            //     if ( ! $this->upload->do_upload('banner'))
            //     {
            //         $error = array('infoerror' => $this->upload->display_errors());
            //         $this->session->set_flashdata('infoerror', $this->upload->display_errors());
            //         $this->cms_redirect($pp,0,'/add');
            //     }else{
            //         $upload_data3 = $this->upload->data();
            //         $banner = $upload_data3['file_name'];
            //     }
            // }else{
            //     $banner = null;
            // }

            $config['upload_path'] = UPLOADPATH.'products/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_ext_tolower'] = TRUE;
            $this->upload->initialize($config);

            $image  = null;
            if(!empty($_FILES['product']['name'])){
                if ($this->upload->do_upload('product')){
                    $img = $this->upload->data();
                    $this->_create_thumbs($img['file_name']);
                    $image  = $img['file_name'];
                }
            }


            $postdata = array(
                'title' => $title,
                'article' => $article,
                'short_detail' => $short_detail,
                'full_detail' => $full_detail,
                'is_active' => $is_active,
                'is_featured' => $is_featured,
                'sort' => $sort,
                'price' => $price,
                'weight' => $weight,
                'discounted_price' => $discounted_price,
                'image' => $image,
                'meta_title' => $meta_title,
                'meta_desc' => $meta_desc,
                'meta_key' => $meta_key
            );
            $products_id = $this->productsModel->add_product($slug,$postdata);
            if($products_id){

            $stockdata = array(
                'stock_item_fk' => $products_id,
                'stock_quantity' => $qty,
                'stock_auto_allocate_status' => $stock_availability
            );
            $this->productsModel->add_product_stock($stockdata);
            $checks = $this->input->post('cats',TRUE);
            if($checks){
                foreach($checks as $check){
                    $insert_data[] = array(
                    'product_id' => $products_id,
                    'productcategory_id'=> $check
                    );
                }
            }else{
                $insert_data[] = array(
                    'product_id' => $products_id,
                    'productcategory_id'=> 0
                );
            }
            $this->productsModel->add_sel_categories($insert_data);


            $rels = $this->input->post('related',TRUE);
            if($rels){
                foreach($rels as $rel){
                    $insert_data_rel[] = array(
                    'r_table' => "product",
                    'r_table_id' => $products_id,
                    'r_prods_id'=> $rel
                    );
                }
            $this->productsModel->add_sel_related($insert_data_rel);
            }
            



            if($tags){
                if (strpos($tags, ',') !== false) {
                    $tags = explode(",",$tags);
                    foreach($tags as $tag){
                        $tag = trim($tag);
                        $insert_data5[] = array(
                        't_table' => "products",
                        't_table_id' => $products_id,
                        'seo_tag' => doseo($tag),
                        'normal_tag'=> $tag
                        );
                    }
                }else{
                    $insert_data5[] = array(
                    't_table' => "products",
                    't_table_id' => $products_id,
                    'seo_tag' => doseo($tags),
                    'normal_tag'=> $tags
                    );
                }
                $this->productsModel->add_sel_tags($insert_data5);
            }

            
            $pvars = $this->input->post('pvar',TRUE);
                if($pvars){
                    foreach($pvars as $pvar){
                        $insert_data2[] = array(
                        'product_id' => $products_id,
                        'group_id'=> getValuee("group_id","variations","id",$pvar),
                        'variation_id'=> $pvar
                        );
                    }
                $this->productsModel->add_sel_variations($insert_data2);
                }

            $specihh = $this->input->post('specih',TRUE);
            $specivv = $this->input->post('speciv',TRUE);
            if($specihh){
                foreach($specihh as $key => $specih){
                    if($specih != "" && $specivv[$key] != ""){
                        $insert_data3[] = array(
                            'product_id' => $products_id,
                            'title'=> $specih,
                            'content'=> $specivv[$key]
                        );
                    }
                }
                if(isset($insert_data3)){
                $this->productsModel->add_sel_specification($insert_data3);
                }
            }

            $gprices = $this->input->post('groupprice',TRUE);
            foreach($gprices as $gprice){
                $insert_data661[] = array(
                    'gid' => $gprice['id'],
                    'pid' => $products_id,
                    'price' => $gprice['price'],
                    'sale_price' => $gprice['sale_price'],
                    'sale_start' => $gprice['sale_start']." 00:00:01",
                    'sale_end' => $gprice['sale_end']." 23:59:59",
                );
            }
            $this->productsModel->add_group_prices($insert_data661);
                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'New product successfully created');
                $this->cms_redirect($pp,$parent_id,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again');
                $this->cms_redirect($pp,0,'');
            }
            // Query database for user details
            //$result = $this->userModel->get_user_by_username($username);
        }
    }
    public function edit($id=null)
    {
        if($id){
            $data['sessions'] = $this->session->userdata();
            $data['page_heading'] = "Products";
            $data['product'] = $this->productsModel->get_single_product($id);
            $data['categories'] = $this->productscategoriesModel->get_all_productscategories(0,false);
            $data['sel_cat'] = $this->productsModel->get_selected_categories($id);
            $data['sel_vars'] = $this->productsModel->get_selected_variations($id);
            $data['sel_tags'] = $this->productsModel->get_selected_tags($id);
            $data['sel_specs'] = $this->productsModel->get_selected_specification($id);
            $this->load->view(ADMIN_VIEW_FOLDER.'/products/edit',$data);
        }else{
            redirect(ADMIN_FOLDER.'/products');
        }
    }
    public function update()
    {
        $pp = $this->input->post('page_id',TRUE);
        $product = $this->productsModel->get_single_product($pp);
        if($this->input->post('article') != $product->article) {
            $is_unique =  '|is_unique[products.article]';
         } else {
            $is_unique =  '';
         }
        $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[250]');
      //  $this->form_validation->set_rules('img_alt', 'Img_alt', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('article', 'Article/Model', 'required|trim|max_length[100]'.$is_unique,array('required' => 'The %s field is required.','is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('short_detail', 'Short Description', 'trim');
        $this->form_validation->set_rules('full_detail', 'Product Description', 'trim');
        $this->form_validation->set_rules('specih[]', 'Specification heading', 'trim');
        $this->form_validation->set_rules('speciv[]', 'Specification value', 'trim');
        $this->form_validation->set_rules('cats[]', 'Categories', 'trim|required');
        $this->form_validation->set_rules('related[]', 'Related Products', 'trim');
        $this->form_validation->set_rules('is_active', 'Activate', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('is_featured', 'Featured', 'required|trim|max_length[3]');
        $this->form_validation->set_rules('sort', 'Sort', 'required|integer');
        $this->form_validation->set_rules('tags', 'Page Tags', 'trim');
        $this->form_validation->set_rules('weight', 'Weight', 'numeric|trim');
        $this->form_validation->set_rules('price', 'Price', 'numeric|trim');
        $this->form_validation->set_rules('discounted_price', 'Discounted Price', 'numeric|trim');
        $this->form_validation->set_rules('qty', 'Qty', 'integer|trim');
        $this->form_validation->set_rules('stock_availability', 'Stock Availability', 'trim|max_length[3]');
        $this->form_validation->set_rules('meta_title', 'Seo Title', 'trim|max_length[500]');
        $this->form_validation->set_rules('meta_desc', 'Seo Description', 'trim|max_length[500]');
        $this->form_validation->set_rules('meta_key', 'Seo Keywords', 'trim|max_length[500]');
        //$this->form_validation->set_message('min_length', '%s field length is invalid');
        $this->form_validation->set_message('max_length', '%s field length is invalid');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('infoerror', validation_errors_array('<span>', '</span><br>'));
            $this->cms_redirect($pp,0,'/edit/');
            //$this->load->view('auth/login');
            //echo "invalid data";
        }
        else
        {
            
            $del_image = $this->input->post('del_image',TRUE);

            if(isset($del_image)){
                $data = array("specifications" => null,"image" => null);
                $this->productsModel->update_product($pp,$data,false,false);
                delFile2("products","image","products/",$product->image);
                $delimage = null;
            }else{
                $delimage = $product->image;
            }
            
            $title = sanitize($this->input->post('title',TRUE));
            if($this->input->post('article',TRUE)){
                $article = sanitize($this->input->post('article',TRUE));
                $slug = doSeo(sanitize($this->input->post('slug',TRUE)));
            }else{
                $article = rand(00000,99999);
                $slug = doSeo(sanitize($this->input->post('title',TRUE)));
            }
            $short_detail = sanitize($this->input->post('short_detail',TRUE));
            $full_detail = sanitize($this->input->post('full_detail',FALSE));
            
            $is_active = sanitize($this->input->post('is_active',TRUE));
            $is_featured = sanitize($this->input->post('is_featured',TRUE));
            $promotion = $this->input->post('promotion');
            $sort = $this->input->post('sort',TRUE);
            $tags = $this->input->post('tags',TRUE);

            $price = sanitize($this->input->post('price',TRUE));
            $weight = sanitize($this->input->post('weight',TRUE));
            $discounted_price = sanitize($this->input->post('discounted_price',TRUE));
            $qty = sanitize($this->input->post('qty',TRUE));
            $stock_availability = sanitize($this->input->post('stock_availability',TRUE));

            $meta_title = sanitize($this->input->post('meta_title',TRUE));
            $meta_desc = sanitize($this->input->post('meta_desc',TRUE));
            $meta_key = sanitize($this->input->post('meta_key',TRUE));
          //  $img_alt = sanitize($this->input->post('img_alt',TRUE));


            $config['upload_path'] = UPLOADPATH.'products/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_ext_tolower'] = TRUE;
            $this->upload->initialize($config);
            $delii = 0;
            if(!empty($_FILES['product']['name'])){
                if ($this->upload->do_upload('product')){
                    $img = $this->upload->data();
                    $this->_create_thumbs($img['file_name']);
                    $image  = $img['file_name'];
                    $delii = 1;
                }
            }else{
                $image = $delimage;
            }




            $postdata = array(
                'title' => $title,
                'slug' => $slug, 
                'article' => $article,
                'short_detail' => $short_detail,
                'full_detail' => $full_detail,
                'is_active' => $is_active,
                'is_featured' => $is_featured,
                'sort' => $sort,
                'weight' => $weight,
                'price' => $price,
                'discounted_price' => $discounted_price,
                'image' => $image,
                'meta_title' => $meta_title,
                'meta_desc' => $meta_desc,
                'meta_key' => $meta_key,
                'promotion' => $promotion
            );
            if($slug != $product->slug){
                $updateslug = $slug;
            }else{
                $updateslug = false;
            }
            if($this->productsModel->update_product($pp,$postdata,$updateslug)){

                if($delii==1){delFile2("products","image","products/",$delimage);}

                $stockdata = array(
                    'stock_quantity' => $qty,
                    'stock_auto_allocate_status' => $stock_availability
                );
                $this->productsModel->update_product_stock($pp,$stockdata);
                $checks = $this->input->post('cats',TRUE);
                $this->productsModel->delete_sel_categories($pp);
                $this->productsModel->delete_sel_tags($pp);
                if($checks){
                    foreach($checks as $check){
                        $insert_data[] = array(
                        'product_id' => $pp,
                        'productcategory_id'=> $check
                        );
                    }
                }else{
                    $insert_data[] = array(
                        'product_id' => $pp,
                        'productcategory_id'=> 0
                    );
                }
                $this->productsModel->add_sel_categories($insert_data);


                $rels = $this->input->post('related',TRUE);
                $this->productsModel->delete_sel_related($pp);
                if($rels){
                    foreach($rels as $rel){
                        $insert_data_rel[] = array(
                        'r_table' => "product",
                        'r_table_id' => $pp,
                        'r_prods_id'=> $rel
                        );
                    }
                $this->productsModel->add_sel_related($insert_data_rel);
                }



                if($tags){
                    if (strpos($tags, ',') !== false) {
                        $tags = explode(",",$tags);
                        foreach($tags as $tag){
                            $tag = trim($tag);
                            $insert_data5[] = array(
                            't_table' => "products",
                            't_table_id' => $pp,
                            'seo_tag' => doseo($tag),
                            'normal_tag'=> $tag
                            );
                        }
                    }else{
                        $insert_data5[] = array(
                        't_table' => "products",
                        't_table_id' => $pp,
                        'seo_tag' => doseo($tags),
                        'normal_tag'=> $tags
                        );
                    }
                    $this->productsModel->add_sel_tags($insert_data5);
                }


                $pvars = $this->input->post('pvar',TRUE);
                $this->productsModel->delete_sel_variations($pp);
                if($pvars){
                    foreach($pvars as $pvar){
                        $insert_data2[] = array(
                        'product_id' => $pp,
                        'group_id'=> getValuee("group_id","variations","id",$pvar),
                        'variation_id'=> $pvar
                        );
                    }
                    $this->productsModel->add_sel_variations($insert_data2);
                }


                $specihh = $this->input->post('specih',TRUE);
                $specivv = $this->input->post('speciv',TRUE);
                $this->productsModel->delete_sel_specification($pp);
                if($specihh){
                    foreach($specihh as $key => $specih){
                        if($specih != "" && $specivv[$key] != ""){
                            $insert_data3[] = array(
                                'product_id' => $pp,
                                'title'=> htmlspecialchars($specih),
                                'content'=> htmlentities($specivv[$key])
                            );
                        }
                    }
                    if(isset($insert_data3)){
                    $this->productsModel->add_sel_specification($insert_data3);
                    }
                }

            $gprices = $this->input->post('groupprice',TRUE);
            $this->productsModel->delete_group_prices($pp);
            foreach($gprices as $gprice){
                $insert_data661[] = array(
                    'gid' => $gprice['id'],
                    'pid' => $pp,
                    'price' => $gprice['price'],
                    'sale_price' => $gprice['sale_price'],
                    'sale_start' => $gprice['sale_start']." 00:00:01",
                    'sale_end' => $gprice['sale_end']." 23:59:59",
                );
            }
            $this->productsModel->add_group_prices($insert_data661);

                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'product successfully updated');
                $this->cms_redirect(0,0,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'Somethings wrong please try again');
                $this->cms_redirect($pp,0,'/edit/');
            }



        }
    }    
    public function delete($id)
    {
        $product = $this->productsModel->get_single_product($id);
        if(isset($product)){
            $productoldid = $product->id;
            $productimage = $product->image;
            if($this->productsModel->delete_product($id)){
                $this->productsModel->delete_product_stock($productoldid);
                delFile2("products","image","products/",$productimage);
                $this->productsModel->delete_sel_categories($id);
                $this->productsModel->delete_sel_related($id);
                $this->productsModel->delete_sel_variations($id);
                $this->productsModel->delete_sel_tags($id);
                if(getmoreviewsbyproductid($id) > 0){
                $this->productsModel->delete_prd_moreviews($id);
                }

                $this->session->set_flashdata('etype', 'alert-success');
                $this->session->set_flashdata('emsg', 'product successfully deleted');
                $this->cms_redirect(0,0,'/');
            }else{
                $this->session->set_flashdata('etype', 'alert-error');
                $this->session->set_flashdata('emsg', 'somethings wrong please try again later');
                $this->cms_redirect(0,0,'/');    
            }
        }else{
            $this->session->set_flashdata('etype', 'alert-error');
            $this->session->set_flashdata('emsg', 'Invalid data');
            $this->cms_redirect(0,0,'/');
        }
    }
    public function multi_data()
    {
        $sort_multi = $this->input->post('multi_sort',TRUE);
        $del_multi = $this->input->post('multi_del',TRUE);
        $checks = $this->input->post('check',TRUE);
        if($checks){
            $erro = array();
            $succ = array();
            if($sort_multi){
                foreach($checks as $check){
                    $sort = $this->input->post($check,TRUE);
                    if($sort != ""){
                        $data = array('sort'=> $this->input->post($check,TRUE));
                        $this->productsModel->update_product($check,$data,false,false);
                        array_push($succ,$this->productsModel->getValue("title","id",$check)." sort Updated");
                    }else{
                        array_push($erro,$this->productsModel->getValue("title","id",$check)." sort is not defined!");
                    }
                }
            }
            if($del_multi){
                foreach($checks as $check){
                    $product = $this->productsModel->get_single_product($check);
                    if(isset($product)){
                        $productimage = $product->image;
                        array_push($succ,$this->productsModel->getValue("title","id",$check)." Deleted successfully");
                        $this->productsModel->delete_product($check);
                        delFile2("products","image","products/",$productimage);
                        $this->productsModel->delete_sel_categories($check);
                        $this->productsModel->delete_sel_related($check);
                        $this->productsModel->delete_sel_variations($check);
                        $this->productsModel->delete_sel_tags($check);
                        if(getmoreviewsbyproductid($check) > 0){
                            $this->productsModel->delete_prd_moreviews($check);
                        }
                    }
                }
            }

            if(isset($succ)){
                $md_array['infosucc'] = $succ;
            }
            if(isset($erro)){
                $md_array['infoerror'] = $erro;
            }
            $this->session->set_flashdata('iii', $md_array);
            $this->cms_redirect(0,0,'/');

        }else{
            $this->session->set_flashdata('etype', 'alert-info');
            $this->session->set_flashdata('emsg', 'Checkbox not selected');
            $this->cms_redirect(0,0,'');
        }

        
        
    }
    public function get_products($id)
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Products";
        $data['products'] = $this->productsModel->get_all_products($id);
        $this->load->view(ADMIN_VIEW_FOLDER.'/products/index',$data);
    }
    private function _create_thumbs($file_name){
        // Image resizing config
        $config = array(
            // Large Image
            array(
                'image_library' => 'GD2',
                'source_image'  => UPLOADPATH.'/products/'.$file_name,
                'maintain_ratio'=> TRUE,
                'width'         => PRD_L_W,
                'height'        => PRD_L_H,
                'new_image'     => UPLOADPATH.'products/large/'.$file_name
                ),
            // Medium Image
            array(
                'image_library' => 'GD2',
                'source_image'  => UPLOADPATH.'/products/'.$file_name,
                'maintain_ratio'=> TRUE,
                'width'         => PRD_M_W,
                'height'        => PRD_M_H,
                'new_image'     => UPLOADPATH.'products/medium/'.$file_name
                ),
            // Small Image
            array(
                'image_library' => 'GD2',
                'source_image'  => UPLOADPATH.'/products/'.$file_name,
                'maintain_ratio'=> TRUE,
                'width'         => PRD_S_W,
                'height'        => PRD_S_H,
                'new_image'     => UPLOADPATH.'products/small/'.$file_name
            ));
 
        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
    }
    public function cms_redirect($p1,$p2,$path)
    {
        if($p1==0){
            if($p2 != 0){
                redirect(ADMIN_FOLDER.'/products'.$path.$p2);
            }else{
                redirect(ADMIN_FOLDER.'/products'.$path);
            }
        }else{
            redirect(ADMIN_FOLDER.'/products'.$path.$p1);
        }
    }

}