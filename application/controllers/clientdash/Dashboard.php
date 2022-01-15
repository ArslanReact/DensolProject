<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller {
        public function __construct()
        {
            parent::__construct();
            if(!$this->is_logged_in()){
                redirect('login');
            }else{
            }
            $this->load->model('productsModel');
            $this->load->library('flexi_cart_admin');
        }

        public function index()
        {
            $uid = $this->session->userdata('uid');
            $query =  $this->db->query("SELECT * FROM order_summary where ord_user_fk='$uid' order by ord_date desc limit 3");
		    $data['order_data'] = $query->result_array();
		    $query =  $this->db->query("SELECT sum(ord_total) as total, (SELECT count(ord_order_number) FROM order_summary where ord_user_fk='$uid') as totalorder, (SELECT count(ord_order_number) FROM order_summary where ord_user_fk='$uid' and ord_status=4) as totalcompleteorder, (SELECT count(ord_order_number) FROM order_summary where ord_user_fk='$uid' and ord_status!=4) as totaluncompleteorder FROM order_summary where ord_user_fk='$uid'");
            $data['dashboard_summay'] = $query->result_array();
            $data['page_heading'] = site_settings()->company_name." Dashboard";
            $this->load->view('clientdash/dashboard',$data);
        }

        public function chartdata($daterange)
        {
            $exex = explode('+', $daterange);
            $start = $exex[0]; $end = $exex[1];

            $viewgrdatarr = getrangeystate($start, $end);
            echo json_encode($viewgrdatarr);
            return;
        }
        public function clientallorder()
        {
            $uid = $this->session->userdata('uid');
            $query =  $this->db->query("SELECT * FROM order_summary where ord_user_fk='$uid' order by ord_date desc");
		    $data['order_data'] = $query->result_array();
            $data['sessions'] = $this->session->userdata();
            $data['page_heading'] = "My All Order";
            $this->load->view('clientdash/orders/orders',$data);
        }

        
}