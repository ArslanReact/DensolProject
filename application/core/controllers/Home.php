<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MY_Controller {
    public $userlogin = false;
    public function __construct()

    {
        // $this->load does not exist until after you call this

        parent::__construct(); // Construct CI's core so that you can use it

        $this->load->helper(array('form','text'));

        $this->flexi = new stdClass;
        $this->load->library(array('form_validation','antispam','pagination','flexi_cart'));

        $this->load->model('bannerModel');
        $this->load->model('blogModel');
        if(!$this->is_logged_in()){
        $this->userlogin = false;
        }else{
        $this->userlogin = true;
        }
    }

    public function index()
    {
        $headdata['beforeheads'] = getMeta("settings",1);

        //print_r($headdata['beforeheads']);

        $headdata['afterheads'] = array('<link href="'.base_url().'files/frontend/css/responsive-slider.css" rel="stylesheet">');

        $sliderdata['sliders'] = $this->bannerModel->get_front_banners(0);

        $footerdata['footer'] = "";
        $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
        $data['header'] = $this->load->view('includes/header', NULL, TRUE);
        $data['slider'] = $this->load->view('includes/slider2', $sliderdata, TRUE);
        $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);

        $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);
        //$data['news'] = $this->blogModel->get_news_front_blogs(null,"","",10);

        $this->load->view('home',$data);

    }
    public function search_produc_by_input(){
        $query = $this->input->post('query');
        $queryy =  $this->db->query("select * from products where title like '%$query%'");
        $data_product= $query->result_array();
        $html = '<ul class="list-group">';
        foreach($data_product as $row){
            $html .='<li class="list-group-item">'.$row['title'].'</li>';
        }   
        $html = '</ul>';
        echo json_encode( $html);   
        exit;
    }


}