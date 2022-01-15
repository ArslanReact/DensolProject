<?php 
class My404 extends CI_Controller 
{
 public function __construct() 
 {
    parent::__construct(); 
 } 

 public function index() 
 { 
      $headdata['beforeheads'] = getMeta("settings",1);
      $data['head'] = $this->load->view('includes/head', $headdata, TRUE);
    $this->output->set_status_header('404'); 
    $this->load->view('err404',$data);
 } 
} ?>