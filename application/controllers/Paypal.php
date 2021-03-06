<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Paypal extends MY_Controller 
    {
         function  __construct(){
            parent::__construct();
            //$this->flexi = new stdClass;
            $this->load->library('paypal_lib','session');
            //$this->load->model('product');
         }
         
         function success(){
            //get the transaction data

            print_r($_GET);
            die();
            $paypalInfo = $this->input->get();
              
            $data['txn_id'] = $paypalInfo["tx"];
            $data['payment_amt'] = $paypalInfo["amt"];
            $data['currency_code'] = $paypalInfo["cc"];
            $data['status'] = $paypalInfo["st"];
            $data['order_number'] = $paypalInfo["cm"];
            
            //pass the transaction data to view
            $this->load->view('paypal/success', $data);
         }
         
         function cancel(){
            $this->load->library('flexi_cart');
            $headdata['beforeheads'] = getMeta("paypal",0);
            
            $footerdata['footer'] = "";

            $bannerdata['title'] = "Payment Cancel";

            $bannerdata['brudcrumb'] = "";

            $bannerdata['banner'] = base_url("files/frontend/images/about-P-bg.jpg");
            $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
            $data['header'] = $this->load->view('includes/header', NULL, TRUE);
            $data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
            $data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
            $data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);
            $this->flexi_cart->destroy_cart();
            $this->load->view('paypal/cancel',$data);
         }
         
         function ipn(){
            //paypal return transaction details array
            $paypalInfo    = $this->input->post();
            $data['user_id'] = $paypalInfo['custom'];
            $data['product_id']    = $paypalInfo["item_number"];
            $data['txn_id']    = $paypalInfo["txn_id"];
            $data['payment_gross'] = $paypalInfo["payment_gross"];
            $data['currency_code'] = $paypalInfo["mc_currency"];
            $data['payer_email'] = $paypalInfo["payer_email"];
            $data['payment_status']    = $paypalInfo["payment_status"];
            $paypalURL = $this->paypal_lib->paypal_url;        
            $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
            
            //check whether the payment is verified
            if(preg_match("/VERIFIED/i",$result)){
                //insert the transaction data into the database
                $this->product->insertTransaction($data);
            }
        }
    }
?>