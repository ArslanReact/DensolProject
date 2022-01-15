<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments extends MY_Controller {



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
        $this->load->model('paymentModel');
        $this->load->helper(array('form','text'));
        $this->load->library(array('form_validation'));
    }

    public function index()
    {
        if($this->input->post('update_payments')){
            $this->updatepayments();
        }else{
            // echo "<pre>";
            // print_r($this->session->flashdata());
            // echo "</pre>";
            $this->getpayments();
        }
    }

    public function updatepayments()
    {
        $payments = $this->input->post('payments');
        foreach($payments as $payment){
            $pid = $payment['id'];
            $postdata = array(
                'is_active' => $payment['is_active'],
                'is_live' => $payment['is_live'],
                'title' => $payment['title'],
                'email' => $payment['email'],
                'api_key' => $payment['api_key'],
                'api_secret' => $payment['api_secret'],
                'api_password' => $payment['api_password'],
                'notes_basket' => $payment['notes_basket'],
                'notes_order' => $payment['notes_order'],
                'sort' => $payment['sort']
            );
            $this->paymentModel->update_payment($pid,$postdata);
        }
        $this->session->set_flashdata('etype', 'alert-success');
        $this->session->set_flashdata('emsg', 'banner successfully updated');
        $this->cms_redirect();
    }
    
    public function getpayments()
    {
        $data['sessions'] = $this->session->userdata();
        $data['page_heading'] = "Payments";
        $data['payments'] = $this->paymentModel->get_admin_payments();
        $this->load->view(ADMIN_VIEW_FOLDER.'/payments/index',$data);
    }

    public function cms_redirect()
    {
        redirect(ADMIN_FOLDER.'/payment/');
    }
    public function addpaymentoforder($orderno)
    {
        $paymentdate = $this->input->post('paymentdate');
        $paymentvia = $this->input->post('paymentvia');
        $amount = $this->input->post('amount');
        $description = $this->input->post('description');
        $insertarray = array(
            'orderno' => $orderno,
            'dateofpayment' => $paymentdate,
            'amount' => $amount,
            'via' => $paymentvia,
            'description' => $description
        );
        $this->db->insert("payment_log_history",$insertarray);
        $this->session->set_flashdata('success', 'Payment Detials Added Successfully');
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
    public function paymentoforderstatus($orderno)
    {
        $status = $this->input->post('status');
        $insertarray = array(
            'payment_status' => $status
        );
        $this->db->where("ord_order_number",$orderno);
        $this->db->update("order_summary",$insertarray);
        echo "ok";
        die;
    }
    public function deletepaymentoforder($orderno)
    {
        $this->db->where('orderno', $orderno);
        $this->db->delete('payment_log_history');
        $this->session->set_flashdata('success', 'Payment Detials Deleted Successfully');
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

}