<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {

    public $userlogin = false;
    public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->helper(array('form','text'));
        $this->flexi = new stdClass;
        $this->load->library(array('form_validation','antispam','pagination','flexi_cart'));
        $this->load->model('productscategoriesModel');
        $this->load->model('productsModel');
        if(!$this->is_logged_in()){
        $this->userlogin = false;
        }else{
        $this->userlogin = true;
        }
    }

    public function index($id="n")
    {
        $args = func_get_args();
        $args2 = func_get_args();
        $slug = end($args);
        $slug2 = end($args);
        $full_path = geturlsegment($slug,$this->uri->uri_string());

        if(is_numeric($slug)){
            array_splice($args2, count($args2) - 2, 2);
            $slug = end($args2);
        }

        if($id=="n"){
            // if($this->uri->uri_string()!=""){
            //     redirect(base_url(),'location',301);
            // }

            $cid = 0;
            $totalcount = $this->productsModel->count_all();
            $scms = getSingleValuee("cms","id",104);
            $pagetitle = $scms->title;
            $breadcrumb = showCatsBreadCrumb("products_categories",$cid);
            $content = cleanOut($scms->content);;
            $cat_feature1 = "";
            $cat_feature2 = "";
            if($scms->banner==""){
                $banner = base_url("files/frontend/images/defaultcatbanner.png");
            }else{
                $banner = base_url("uploads/pages/".$scms->banner);
            }
            $headdata['beforeheads'] = getMeta("cms",104);
            $categories = getFeaturedcat();
            $zeroid = getCms(121);
        }else{
            $cid = getValuee("id","products_categories","slug",$slug);
            $category = getSingleValuee("products_categories","id",$cid);
            $pagetitle = $category->title;
            $breadcrumb = showCatsBreadCrumb("products_categories",$cid);
            // $breadcrumb = $category->short_detail;
            $content = getCatContent($cid);
            $cat_feature1 = cleanOut($category->cat_feature1);
            $cat_feature2 = cleanOut($category->cat_feature2);
            $banner = ($category->banner=="") ? base_url("files/frontend/images/defaultcatbanner.png") : NOSTORE_URLLINK."uploads/products/categories/".$category->banner;
            $totalcount = $this->productsModel->count_all("category",$cid);
            $headdata['beforeheads'] = getMeta("products_categories",$cid);
            $categories = $this->productscategoriesModel->get_all_front_categories($cid);
            $zeroid = false;
        }

        
        $prpage = 120;
        $config = array();
        $config["base_url"] = base_url() . $full_path;
        $config["total_rows"] = $totalcount;
        $config["per_page"] = $prpage;
        $config["uri_segment"] = $this->uri->total_segments();
        $config["num_links"] = 3;
        $config["prefix"] = "/page/";
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination hidden-xs pull-right">';
        $config['full_tag_close'] = '</ul><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a href="" class="page-link active">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $apaginate = $this->pagination->initialize($config);
        $page = (is_numeric($slug2)) ? $slug2-1 : 0;
        $data["links"] = $this->pagination->create_links();
        $data["paging"] = pagination_detail($slug2,$prpage,$totalcount,true);
        $products = $this->productsModel->get_front_products($cid,"","",$config["per_page"],$page*$prpage);
        $footerdata['footer'] = "";
        $bannerdata['title'] = $pagetitle;
        $bannerdata['brudcrumb'] = $breadcrumb;
        $bannerdata['banner'] = $banner;
        $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
        $data['header'] = $this->load->view('includes/header', NULL, TRUE);
        $data['banner'] = $this->load->view('includes/prod_banner', $bannerdata, TRUE);
        $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
        $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);
        $data['categories'] = $categories;
        $data['products'] = $products;
        $data['content'] = $content;
        $data['feature1'] = $cat_feature1;
        $data['feature2'] = $cat_feature2;
        $data['productrootpage'] = $zeroid;
        $this->load->view('products',$data);
    }

    public function search_submit()
    {
        $this->load->helper('security');
        $this->form_validation->set_rules('search', 'Search', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
            redirect(base_url()."search/empty");
        }else{
            if($this->input->post('search',TRUE)){
                $string = strtolower(str_replace(" ","+",$this->input->post('search',TRUE)));
                redirect(base_url()."search/".$string);
            }
        }
    }

    public function search($string)
    {
        $string2 = str_replace("+"," ",$string);
        $totalcount = $this->productsModel->count_search_all($string2);
        $prpage = 120;
        $config = array();
        $config["base_url"] = base_url() . "search/".$string;
        $config["total_rows"] = $totalcount;
        $config["per_page"] = $prpage;
        $config["uri_segment"] = $this->uri->total_segments();
        $config["num_links"] = 3;
        $config["prefix"] = "/page/";
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination hidden-xs pull-right">';
        $config['full_tag_close'] = '</ul><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a href="" class="page-link active">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $apaginate = $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4)-1: 0;
        $data["links"] = $this->pagination->create_links();
        $data["paging"] = pagination_detail($this->uri->segment(4),$prpage,$totalcount);
        $products = $this->productsModel->search_products($string2,$config["per_page"],$page*$prpage);

        $scms = getSingleValuee("cms","id",90);
        $headdata['beforeheads'] = getMeta("search",$string,$scms);
        $footerdata['footer'] = "";
        $bannerdata['title'] = $scms->title;
        $bannerdata['brudcrumb'] = $scms->short_detail;
        if($scms->banner==""){
            $bannerdata['banner'] = base_url("files/frontend/images/about-P-bg.jpg");
        }else{
            $bannerdata['banner'] = NOSTORE_URLLINK."uploads/pages/".$scms->banner;
        }
        $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
        $data['header'] = $this->load->view('includes/header', NULL, TRUE);
        $data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
        $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
        $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);
        $data['products'] = $products;
        $data['content'] = $scms->content;
        $this->load->view('search',$data);
    }

    public function single($slug)
    {
        $product = getSingleValuee("products","slug",$slug);
        if(!$product){show_404();}
        $categoryid = getValuee("productcategory_id","products_sel_categories","product_id",$product->id);
        $category = getSingleValuee("products_categories","id",$categoryid);
        $categories = getValues("products_sel_categories","product_id",$product->id);
        $headdata['beforeheads'] = getMeta("products",$product->id);
        $footerdata['footer'] = "";
        $bannerdata['title'] = $product->title;
        $bannerdata['brudcrumb'] = showCatsBreadCrumb("products_categories",$categoryid,true);
        $bannerdata['banner'] = base_url("files/frontend/images/about-P-bg.jpg");
        $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
        $data['header'] = $this->load->view('includes/header', NULL, TRUE);
        $data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
        $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
        $captcha = $this->antispam->get_antispam_image(255,0,0);
        $this->session->unset_userdata('captcha');
        $this->session->set_userdata('captcha', $captcha['word']);
        $contactformdata['captcha'] = $captcha['image'];
        $datapp = $this->load->view('includes/contact_form', $contactformdata, TRUE);
        $data['cform'] = getcms(74,$datapp);
        if($this->session->flashdata("success") != "" || $this->session->flashdata("error") != ""){
            $data["form_action"] = true;
        }else{
            $data["form_action"] = false;
        }
        $scriptsdata["form_action"] = $data["form_action"];
        $data['scripts'] = $this->load->view('includes/index_scripts', $scriptsdata, TRUE);
        $data["product"] = $product;
        $data["categories"] = $categories;
        $data["sel_specs"] = $this->productsModel->get_selected_specification($product->id);
        // var_dump($this->session->flashdata("error"));
        // $this->load->view('product',$data);
        $this->load->view('store_product',$data);
    }
}