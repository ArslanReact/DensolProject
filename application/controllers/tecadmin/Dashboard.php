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
            $this->flexi_cart_admin->sql_order_by($this->flexi_cart_admin->db_column('order_summary', 'order_number'), 'desc');
            $query =  $this->db->query("SELECT sum(ord_total) as total, (SELECT count(ord_order_number) FROM order_summary) as totalorder, (SELECT count(ord_order_number) FROM order_summary where ord_status=6) as totalcompleteorder, (SELECT count(ord_order_number) FROM order_summary where ord_status=3) as totalprocessing FROM order_summary where ord_status");
            $data['dashboard_summay'] = $query->result_array();
		    $data['order_data'] = $this->flexi_cart_admin->get_db_order_array();
            $data['sessions'] = $this->session->userdata();
            $data['page_heading'] = site_settings()->company_name." Dashboard";
            $data['products'] = $this->productsModel->get_dashboard_products();
            $this->load->view(ADMIN_VIEW_FOLDER.'/dashboard',$data);
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