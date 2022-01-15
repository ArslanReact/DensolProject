<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logs extends CI_Controller {

        public function __construct()
        {
            // $this->load does not exist until after you call this
            parent::__construct(); // Construct CI's core so that you can use it
            $this->load->database();
            $this->load->model('logModel');
        }

        public function check_attampt($ip)
        {
            return $this->logModel->get_log_by_ip($ip);
        }

        public function add_attampt($user,$ip,$failed,$type,$message,$importance='yes')
        {
            add_log($user,$ip,$failed,$type,$message,$importance);
        }

}