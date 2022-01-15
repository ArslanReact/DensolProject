<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends MY_Controller {



        public function __construct()
        {
            parent::__construct(); // Construct CI's core so that you can use it
            $this->load->helper(array('form'));
            $this->load->library(array('form_validation'));
            $this->flexi = new stdClass;

		// Load 'standard' flexi cart library by default.
		$this->load->library('flexi_cart');	
		$this->load->library('flexi_cart_admin');	
        }



        public function index($id)
        {
            if($id){
                if (strpos($id, '-') !== false) {
                    $xxpsd = explode("-",$id);
                    $order_number = $xxpsd[1];
                }else{
                    echo "invalid Invoice!";
                    die();
                }
                $sql_where = array("ord_order_number" => $order_number);
                $order_query = $this->db->get_where('order_summary', $sql_where);
                if ($order_query->num_rows() == 1)
			    {
                    $sql_where = array("ord_det_order_number_fk" => $order_number);
                    $order_details_query = $this->db->get_where("order_details", $sql_where);
                    if ($order_details_query->num_rows() > 0)
    				{
                        $order_data['summary_data'] = $order_query->row_array();
                        $order_data['item_data'] = $order_details_query->result_array();
                        $this->load->view('includes/invoice/order_invoice.tpl.php', $order_data);
                    }else{
                        echo "Invalid Invoice!";
                        die();
                    }
                }else{
                    echo "Invalid Invoice!";
                    die();
                }


                // // Get output html
                // $html = $this->output->get_output();
                   
                // // Load pdf library
                // $this->load->library('pdf');
                
                // // Load HTML content
                // $this->pdf->loadHtml($html);
                
                // // (Optional) Setup the paper size and orientation
                // $this->pdf->setPaper('A4', 'landscape');
                
                // // Render the HTML as PDF
                // $this->pdf->render();
                
                // // Output the generated PDF (1 = download and 0 = preview)
                // $this->pdf->stream("welcome.pdf", array("Attachment"=>0));
            }else{
                echo "Invalid Invoice";
                die();
            }
        }


        function pdf($id){
 
            if($id){
                if (strpos($id, '-') !== false) {
                    $xxpsd = explode("-",$id);
                    $order_number = $xxpsd[1];
                }else{
                    echo "invalid Invoice!";
                    die();
                }
                $sql_where = array("ord_order_number" => $order_number);
                $order_query = $this->db->get_where('order_summary', $sql_where);
                if ($order_query->num_rows() == 1)
			    {
                    $sql_where = array("ord_det_order_number_fk" => $order_number);
                    $order_details_query = $this->db->get_where("order_details", $sql_where);
                    if ($order_details_query->num_rows() > 0)
    				{
                        $order_data['summary_data'] = $order_query->row_array();
                        $order_data['item_data'] = $order_details_query->result_array();
                        $pdfHtml = $this->load->view('includes/invoice/pdf_invoice.tpl.php', $order_data, TRUE);
                        //echo $pdfHtml;
                        //die();
                        $this->load->library('pdf');
                        log_message('ERROR', 'PDF Library loaded');

                        $this->dompdf->loadhtml($pdfHtml);
                        $this->dompdf->setPaper('A4', 'portrait');
                        $this->dompdf->render();
                        $this->dompdf->stream($id.".pdf", array("Attachment"=>1));
                    }else{
                        echo "Invalid Invoice!";
                        die();
                    }
                }else{
                    echo "Invalid Invoice!";
                    die();
                }
            }else{
                echo "Invalid Invouce!";
                die();
            }
        }
}