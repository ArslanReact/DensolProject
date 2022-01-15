<?php



if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class MY_Controller extends CI_Controller {



    protected $cstable = "cstats";



    protected $dstable = "devices";



    protected $sttable = "stats";



    protected $uIP;



    protected $U_ip;



    protected $U_city;



    protected $U_region;



    protected $U_areaCode;



    protected $U_dmaCode;



    protected $U_countryCode;



    protected $U_countryName;



    protected $U_continentCode;



    protected $U_latitude;



    protected $U_longitude;



    protected $U_currencyCode;



    protected $U_currencySymbol;



    protected $U_currencyConverter;







    public function __construct()



    {



        parent::__construct();


        // Get the index page filename from config.php
        // For perior to PHP 5.3 use the old syntax.
        $index = index_page() ?: 'index.php';

        // Whether the 'index.php' exists in the URI
        if (FALSE !== strpos($this->input->server('REQUEST_URI', TRUE), $index))
        {
            // Redirect to the new address
            // Use 301 for permanent redirection (useful for search engines)
            redirect($this->uri->uri_string(), 'location', 301);
        }


        $this->load->database();



        $this->load->model('userModel');



        $this->load->model('logsModel');



        $this->load->helper(array('cookie','string'));



        $this->load->library(array('session','GeoPlugin'));



        $this->loadGeo();
        $this->setUsersSessionsDataIfNotExist();


    }


    private function setUsersSessionsDataIfNotExist()
    {
        if(!$this->is_logged_in()){
            $the_session = array("uid" => 0,"user_name" => 'n',"username" => 'n', "last_login" => 'n', "last_ip" => 'n', "logged_in" => false, "return_page" => 'login/', "user_group" => 3);
            $this->session->set_userdata($the_session);
        }
    }




    private function loadGeo()



    {



        $this->uIP = get_user_ip();



        if($this->session->userdata('U_ip') != get_user_ip()){



            if(GEOPLUGIN){



                $this->Geo = new GeoPlugin();



                $this->U_ip = $this->Geo->ip;



                $this->U_city = $this->Geo->city;



                $this->U_region = $this->Geo->region;



                $this->U_areaCode = $this->Geo->areaCode;



                $this->U_dmaCode = $this->Geo->dmaCode;



                $this->U_countryCode = $this->Geo->countryCode;



                $this->U_countryName = $this->Geo->countryName;



                $this->U_continentCode = $this->Geo->continentCode;



                $this->U_latitude = $this->Geo->latitude;



                $this->U_longitude = $this->Geo->longitude;



                $this->U_currencyCode = $this->Geo->currencyCode;



                $this->U_currencySymbol = $this->Geo->currencySymbol;



                $this->U_currencyConverter = $this->Geo->currencyConverter;



            }else{



                $this->U_ip = get_user_ip();



                $this->U_city = "unknown";



                $this->U_region = NULL;



                $this->U_areaCode = NULL;



                $this->U_dmaCode = NULL;



                $this->U_countryCode = NULL;



                $this->U_countryName = "unknown";



                $this->U_continentCode = NULL;



                $this->U_latitude = 0;



                $this->U_longitude = 0;



                $this->U_currencyCode = NULL;



                $this->U_currencySymbol = NULL;



                $this->U_currencyConverter = NULL;



            }



            $this->setGeoSession();



        }else{



            $this->U_ip = $this->session->userdata('U_ip');



            $this->U_city = $this->session->userdata('U_city');



            $this->U_region = $this->session->userdata('U_region');



            $this->U_areaCode = $this->session->userdata('U_areaCode');



            $this->U_dmaCode = $this->session->userdata('U_dmaCode');



            $this->U_countryCode = $this->session->userdata('U_countryCode');



            $this->U_countryName = $this->session->userdata('U_countryName');



            $this->U_continentCode = $this->session->userdata('U_continentCode');



            $this->U_latitude = $this->session->userdata('U_latitude');



            $this->U_longitude = $this->session->userdata('U_longitude');



            $this->U_currencyCode = $this->session->userdata('U_currencyCode');



            $this->U_currencySymbol = $this->session->userdata('U_currencySymbol');



            $this->U_currencyConverter = $this->session->userdata('U_currencyConverter');



        }



        if($this->uri->segment(1) != ADMIN_FOLDER){



        $this->getVisitors();



        }



    }







    protected function setGeoSession()



    {



        



        $geo_session = array(



            'U_ip' => $this->U_ip,



            'U_city' => $this->U_city,



            'U_region' => $this->U_region,



            'U_areaCode' => $this->U_areaCode,



            'U_dmaCode' => $this->U_dmaCode,



            'U_countryCode' => $this->U_countryCode,



            'U_countryName' => $this->U_countryName,



            'U_continentCode' => $this->U_continentCode,



            'U_latitude' => $this->U_latitude,



            'U_longitude' => $this->U_longitude,



            'U_currencyCode' => $this->U_currencyCode,



            'U_currencySymbol' => $this->U_currencySymbol,



            'U_currencyConverter' => $this->U_currencyConverter



        );



        $this->session->set_userdata($geo_session);



    }







    public function getVisitors(){

        //log_message('Debug', 'PHPMailer class is loaded.'.time());

    //     if($this->session->userdata('vv_ip')){

    //         $new_ip = $this->U_ip;

    //         $new_time = time();

    //         $diff = $new_time-$this->session->userdata('vv_time');

    //         if($diff<=6){

    //             $chch = false;

    //             $this->session->unset_userdata('vv_ip');

    //         }else{

    //             $chch = true;

    //         }



    //    }else{

    //         $vv_session = array(

    //             'vv_ip' => $this->U_ip,

    //             'vv_time' => time()

    //         );

    //         $this->session->set_userdata($vv_session);

    //         $chch = true;

    //    }

    //     if($chch){

    //        log_message('Debug', 'usman ali');

            $cookie= array('name'   => 'TECMYER_HITS','value'  => time(),'expire' => 3600,'secure' => TRUE);

            $this->input->set_cookie($cookie);

            $vCookie['is_cookie'] = ($this->input->cookie('TECMYER_HITS',true) !== null) ? 1 : 0;

            $date = date('Y-m-d');

            $this->db->where("ip",$this->uIP);

            $query = $this->db->get($this->cstable);

            if ($query->num_rows() > 0){}else{

                $istatsss = array(

                    'ip' => $this->uIP,

                    'city' => $this->U_city,

                    'country' => $this->U_countryName,

                    'longitude' => $this->U_longitude,

                    'latitude' => $this->U_latitude,

                    'device' => detectDevice(),

                );

                $this->db->insert($this->cstable, $istatsss);

            }

            $this->db->where("device",detectDevice());

            $query2 = $this->db->get($this->dstable);

            if ($query2->num_rows() > 0){

                $dd = $query2->first_row();

                $hid = intval($dd->id);

                $this->db->where('id', $hid);

                $this->db->set('dcount', 'dcount+1', FALSE);

                $this->db->update($this->dstable);

            }else{

                $istatsss2 = array(

                    'device' => detectDevice(),

                    'dcount' => 1,

                );

                $this->db->insert($this->dstable, $istatsss2);

            }

            $this->db->where("day",$date);

            $query3 = $this->db->get($this->sttable);

            if ($query3->num_rows() > 0){

                $dd2 = $query3->first_row();

                $hid2 = intval($dd2->id);

                $pageviews = $dd2->pageviews;

                $unique = $dd2->uniquevisitors;

                if ($this->input->cookie('TECMYER_UNIQUE',true) !== null && $vCookie['is_cookie']) {

                    $cookie2 = array('name'   => 'TECMYER_UNIQUE','value'  => time(),'expire' => 3600,'secure' => TRUE);

                    $this->input->set_cookie($cookie);

                    $this->db->set('pageviews', 'pageviews+1', FALSE);

                    $this->db->set('uniquevisitors', 'uniquevisitors+1', FALSE);

                }else{

                    $this->db->set('pageviews', 'pageviews+1', FALSE);

                }

                $this->db->where("id",$hid2);

                $this->db->update($this->sttable);

            }else{

                $satenew = array(

                    'pageviews' => 1,

                    'uniquevisitors' => 1,

                );

                $this->db->set('day', 'NOW()', FALSE);

                $this->db->insert($this->sttable, $satenew);

            }

        // }

    }







    protected function check_admin()



    {



        $uid = $this->session->userdata('uid');



        $getuserdata = $this->userModel->get_user_by_id($uid);



        return $this->is_admin($getuserdata);



    }







    protected function check_remember()



    {



        $remember_me = $this->input->cookie('remember_me',TRUE);



        if($remember_me){



            $dd = explode("&!",$remember_me);



            $remember_code = $dd[0];



            $remember_ip = $dd[2];



            $user_id = $dd[1];



            $getuserdata = $this->userModel->get_user_by_id($user_id);



            if($getuserdata){



                if($getuserdata->remember_code==$remember_code && $getuserdata->remember_ip==md5($this->uIP)){



                    if($this->check_active($getuserdata)){



                        $this->set_session( $getuserdata );



                        return true;



                    }else{



                        return false;



                    }



                }else{



                    return false;



                }



            }else{



                return false;



            }



        }else{



            return false;



        }



    }







    protected function check_active($data)



    {



        if($data->is_active==1){



            return true;



        }else{



            return false;



        }



    }







    protected function is_admin($data)



    {



        if($data->is_admin==1){



            return true;



        }else{



            return false;



        }



    }







    protected function set_session( $values,$returnpage="")



    {



        $ip = $this->uIP;



        $the_session = array("uid" => $values->id,"user_name" => htmlspecialchars($values->name),"username" => htmlspecialchars($values->username), "last_login" => $values->last_login, "last_ip" => $values->last_ip, "logged_in" => true, "return_page" => $returnpage, "user_group" => $values->user_group);



        $this->session->set_userdata($the_session);



        if($this->userModel->update_user_last_login($values->id,$ip)){



            return true;



        }else{



            return false;



        }



    }







    protected function is_logged_in()



    {



        if($this->check_remember()){



            return true;



        }else{



            if($this->session->userdata('logged_in')){



                $uid = $this->session->userdata('uid');



                $username = $this->session->userdata('username');



                $getuserdata = $this->userModel->get_user_by_id($uid);



                if($getuserdata){



                    if($getuserdata->username==$username){



                        if($this->check_active($getuserdata)){



                                return true;



                        }else{



                            return false;



                        }



                    }else{



                        return false;



                    }



                }else{



                    return false;



                }



            }else{



                return false;



            }



        }



    }







    protected function check_attampt()



    {



        $ip = $this->uIP;



        $logs = $this->logsModel->get_log_by_ip($ip,"user");



        if(!$logs){



        $data = false;



        }else{



            if($logs->failed >= LOGIN_ATTAMPT){



                $diff = time() - $logs->failed_last;



                if ( $diff > ATTAMPT_WAIT*60 ) {



                    if($query = $this->logsModel->delete_log($logs->id,'user')){



                        return false;



                    }else{



                        return true;



                    }



                }else{



                    $diffd = $diff/60;



                    $dd = ATTAMPT_WAIT-$diffd;



                    return round($dd);



                }



            }else{



                $data = false;



            }



        }



        return $data;



    }







    protected function add_attampt($user,$type,$message)



    {



        $ip = $this->uIP;



        $logs = $this->logsModel->get_log_by_ip($ip,$type);



        $type = $type;



        if(!$logs){



            $failed = 1;



            $query = $this->logsModel->add_log($user,$ip,$failed,$type,$message,'yes');



        }else{



            $id = $logs->id;



            $failed = $logs->failed+1;



            $query = $this->logsModel->update_log($id,$user,$failed,time(),$type,$message,'yes');



        }



        if($query){



            return true;



        }else{



            return false;



        }



    }







    protected function after_login()



    {



        $uid = $this->session->userdata('uid');



        $ip = $this->uIP;



        $getuserdata = $this->userModel->get_user_by_id($uid);



        $logs = $this->logsModel->get_log_by_ip($ip,"user");



        if($logs != FALSE){$query = $this->logsModel->delete_log($logs->id,'user');}



        if($getuserdata->is_admin==1){



            redirect(ADMIN_FOLDER.'/dashboard');



        }else{



            //redirect('/user-profile');



            //$this->_destroy();



            //$this->add_attampt($getuserdata->username,'system','trying to access admin');



            // $this->add_attampt($getuserdata->username,'user','trying to access admin');



            //$this->session->set_flashdata('etype', 'danger');



            // $this->session->set_flashdata('emsg', 'You dont have permission to access this area');



            //echo "hello user"; 



            redirect(base_url().'user/profile');



        }



    }







    protected function encrypt_password( $password )



    {



        // This is our first set of possible salt characters. Shuffle so always different all aspects



        $set1 = str_shuffle("!@#$%^&*()_+=-';:,<.>126AaBbJjKkLlSdDsQwWeErqRtTyY");



        



        // Second set. Same thing, different characters though :D



        $set2 = str_shuffle("1234567890`~ZxzxCcVvBb?[]{}pP");



        



        /**



        * Now the loops to actually make the salt characters



        * We'll be using the rand(); function give us random chars from the shuffled sets



        * The for loops are fairly simple.



        * Salt1 = 12 char



        * Salt2 = 10 char



        */



        $salt1 = '';



        $salt2 = '';











        $charactersLength = strlen($set1);



        for ($i = 0; $i < 12; $i++) {



            $salt1 .= $set1[rand(0, $charactersLength - 1)];



        }



        $charactersLength2 = strlen($set2);



        for ($i = 0; $i < 10; $i++) {



            $salt2 .= $set2[rand(0, $charactersLength2 - 1)];



        }



        



        // Now let's generate a pattern. We'll have only about 4 combinations.



        $part[1] = "{salt1}";



        $part[2] = "{salt2}";



        $part[3] = "{pass}";



        $psort   = array_rand($part,3);



        $pattern = $part[$psort[0]].".".$part[$psort[1]].".".$part[$psort[2]];



        // Now for pass



        $grep = array( "/{salt1}/", "/{salt2}/", "/{pass}/" ); // Identify pattern



        $repl = array( $salt1, $salt2, $password ); // Make pattern real



        // Now replace the pattern with actual values



        $sendpass = preg_replace( $grep, $repl, $pattern );



        



        return array( 'salt1'    => $salt1, 



                    'salt2'    => $salt2, 



                    'password' => sha1($sendpass),



                    'pattern'  => $pattern );



    }







    protected function validate_password( $pass, $encrypt )
    {
        // Use the grep and replace arrays again to replace information from pattern!
        $grep = array( "/{salt1}/", "/{salt2}/", "/{pass}/" );        // Identify pattern
        $repl = array( $encrypt->salt1, $encrypt->salt2, $pass ); // Make pattern real
        $pwd  = preg_replace( $grep, $repl, $encrypt->pattern );    // Generate password how it should be.
       // Now let's make sure the user is properly identifying!
        if( sha1($pwd) != $encrypt->password)
      {
        return false;
    }
   return true;
    }
    // protected function qvalidate_password( $pass, $encrypt )
    // {
    //     if( $pass != $encrypt->password)
    //     {
    //         return false;
    //     }
    //         return true;
    // }






    protected function _destroy()



    {



        if($this->session->userdata('logged_in')){



            $user_id = $this->session->userdata('uid');



            $this->userModel->delete_user_remember($user_id);



            $the_session = array('uid' => '0','user_name' => 'n', 'username' => 'n', 'logged_in' => false,'last_login' => 'n', 'last_ip' => 'n','user_group'=> 0);



            $this->session->set_userdata($the_session); // $this->session->sess_destroy();



            //$this->session->sess_destroy();



            delete_cookie('remember_me');



            return;



        }



    }







    protected function send_email_to_user($email,$subject,$message,$attach=false,$enc=true)



    {



        //Load email library



        $this->load->library('email');







        //SMTP & mail configuration

   //     if(EMAIL_PROTOCOL=="smtp"){

        // $config = array(



        //     'protocol'  => EMAIL_PROTOCOL,



        //     'smtp_host' => EMAIL_HOST,



        //     'smtp_port' => EMAIL_PORT,



        //     'smtp_user' => EMAIL_USER,



        //     'smtp_pass' => EMAIL_PASS,



        //     'mailtype'  => 'html',



        //     'charset'   => 'utf-8'



        // );

        // $this->email->initialize($config);

        // }else{}



        $this->email->set_mailtype("html");



        $this->email->set_newline("\r\n");







        //Email content



        $htmlContent = $message;



        $ss = site_settings();



        if($attach != false){$this->email->attach($attach, 'application/pdf', "Invoice " . date("m-d H-i-s") . ".pdf", false);}



        $this->email->from($ss->company_email,$ss->company_name);

        $this->email->to($email);

        $this->email->cc($ss->company_email);



        $this->email->subject($subject);



        $this->email->message($htmlContent);







        //Send email



       // if($enc==true){$this->load->library('encrypt');}



        if($this->email->send()){



            return true;



        }else{



            return false;



        }



    }
    protected function send_invoice_email_to_user($email,$subject,$message)
    {
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $htmlContent = $message;
        $ss = site_settings();
        $this->email->from($ss->company_email,$ss->company_name);
        $this->email->to($email);
        $this->email->cc($ss->company_email);
        $this->email->subject($subject);
        $this->email->message($htmlContent);
        if($this->email->send()){
        return true;
        }else{
        return false;
        }
    }
    protected function send_email_to_user_bk($email,$subject,$message,$attach=false,$enc=true,$adminsend=true)



    {



        //Load email library



        $this->load->library("phpmailer_library");

        $mail = $this->phpmailer_library->load();



        // SMTP configuration

        $mail->isSMTP();

        // $mail->Host     = EMAIL_HOST;

        // $mail->SMTPAuth = true;

        // $mail->Username = EMAIL_USER;

        // $mail->Password = EMAIL_PASS;

        // $mail->SMTPSecure = 'ssl';

        // $mail->Port     = EMAIL_PORT;

        if(EMAIL_PROTOCOL=="smtp"){
            $mail->Host       = EMAIL_HOST;
            $mail->SMTPAuth   = EMAIL_SMTP_AUTH;
            $mail->Username   = EMAIL_USER;
            $mail->Password   = EMAIL_PASS;
            $mail->SMTPSecure = EMAIL_TYPE_SECURE;
            $mail->Port       = EMAIL_PORT;
        }else{
            $mail->Host = 'localhost';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false; 
            $mail->Port = 25; 
        }

        $ss = site_settings();
        $mail->AddReplyTo($ss->company_email,$ss->company_name);
        $mail->setFrom(EMAIL_USER,$ss->company_name);
        $mail->addAddress($email);

        if($adminsend){

        $mail->addCC($ss->company_email);

        }

        $mail->Subject = $subject;

        $mail->isHTML(true);

        $mail->Body = $message;



        if(!$mail->send()){

            log_message('Debug', 'Mailer Error: '. $mail->ErrorInfo);

            return false;

        }else{

            return true;

        }



    }







}



?>