<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller {

        public function __construct()
        {
            parent::__construct();
            if(!$this->is_logged_in()){
                redirect(ADMIN_FOLDER.'/login');
            }else{
                if(!$this->check_admin()){
                    redirect(base_url().'user/profile');
                }
            }
            $this->load->model('productsModel');
            $this->load->library('flexi_cart_admin');
        }

        public function index()
        {
                echo "s";
                die;
        }
        public function cs(){
            echo "ok";
            die;
        }
        public function chartdata($daterange)
        {
            $exex = explode('+', $daterange);
            $start = $exex[0]; $end = $exex[1];

            $viewgrdatarr = getrangeystate($start, $end);
            echo json_encode($viewgrdatarr);
            return;
        }

        
}