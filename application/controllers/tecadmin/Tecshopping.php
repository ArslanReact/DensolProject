<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tecshopping extends MY_Controller {
	
	function __construct() 
	{
		parent::__construct();
		if(!$this->is_logged_in()){
            redirect(ADMIN_FOLDER.'/login');
        }else{
            if(!$this->check_admin()){
                redirect(base_url().'user/profile');
            }
        }
		
		// To load the CI benchmark and memory usage profiler - set 1==1.
		if (1==2) 
		{
			$sections = array(
				'benchmarks' => TRUE, 'memory_usage' => TRUE, 
				'config' => FALSE, 'controller_info' => FALSE, 'get' => FALSE, 'post' => FALSE, 'queries' => FALSE, 
				'uri_string' => FALSE, 'http_headers' => FALSE, 'session_data' => FALSE
			); 
			$this->output->set_profiler_sections($sections);
			$this->output->enable_profiler(TRUE);
		}

		// Load CI libraries and helpers.
		//$this->load->database();
		$this->load->library('session');
		$this->load->helper('text');
 		$this->load->helper('form');

 		// Example of defining a specific language to return flexi carts status and error messages.
 		// The defined language file must be added to the CI application directory as 'application/language/[language_name]/flexi_cart_lang.php'.
 		// Alternatively, CI's default language can be set via the CI config. file.
 		// Note: This must be defined before $this->load->library('flexi_cart').
 		# $this->lang->load('flexi_cart', 'spanish');

 		// IMPORTANT! This global must be defined BEFORE the flexi cart library is loaded! 
 		// It is used as a global that is accessible via both models and both libraries, without it, flexi cart will not work.
		$this->flexi = new stdClass;
		
		// Load 'admin' flexi cart library by default.
		$this->load->library('flexi_cart_admin');
		
		// Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
		//$this->load->vars('includes_dir', 'http://localhost/flexi_cart/includes/');
		$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		
		// Load cart data to be displayed via 'Mini Cart' menu.

		$this->mini_cart_data();
	}
	
	/**
	 * FLEXI CART ADMIN DEMO
	 * Many of the functions within this controller load a custom model called 'demo_cart_admin_model' that has been created for the purposes of this demo.
	 * This file is not part of flexi cart, it is included to demonstrate how some of the functions of flexi cart can be used.
	 */
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// ADMIN DASHBOARD
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * index
	 * View and manage all the available admin functions within flexi cart.
	 */ 
	function index() 
	{	

		// echo "this is test";
		//print_r($this->flexi->cart_contents);
		// print_r($this->session->userdata());
		//$this->shipping();
		//$this->load->view('demo/admin_examples/dashboard_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// ORDER MANAGEMENT
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * orders
	 * View and manage customer orders that have been saved by flexi cart
	 */ 
	function orders() 
	{
		// Get an array of all saved orders. 
		// Using a flexi cart SQL function, set the order the order data so that dates are listed newest to oldest.
		$this->flexi_cart_admin->sql_order_by($this->flexi_cart_admin->db_column('order_summary', 'date'), 'desc');
		//$this->data['order_data'] = $this->flexi_cart_admin->get_db_order_array();
		$this->data['order_data'] = $this->flexi_cart_admin->get_db_order_array();
		// echo $this->db->last_query();
		// var_dump($this->data['order_data']);
		// die();
		// Get any status message that may have been set.
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['page_heading'] = "Orders";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/orders/orders',$this->data);
		// $this->load->view('demo/admin_examples/orders/orders_view', $this->data);
	}
	
	function userallorder($id) 
	{
        $uid = $this->session->userdata('uid');
        $query =  $this->db->query("SELECT * FROM order_summary where ord_user_fk='$id' order by ord_date desc");
	    $this->data['order_data'] = $query->result_array();
        $this->data['sessions'] = $this->session->userdata();
        
        $query =  $this->db->query("SELECT * FROM users where id='$id'");
	    $userdata = $query->result_array();
        
        $this->data['page_heading'] = $userdata[0]['name']." Orders List";
		$this->load->view(ADMIN_VIEW_FOLDER.'/orders/userallorder',$this->data);
	}
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * order_details
	 * Displays all data related to a saved order, including the users billing and shipping details, the cart contents and the cart summary.
	 * This demo includes an example of indicating to flexi cart which items have been shipped or cancelled since the order was receieved, flexi cart can then use this data 
	 * to manage item stock and user reward points.
	 */ 
	function order_details($order_number) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_order'))
		{
            $this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_order_details($order_number);
            // Log Dataa
            $logdata = array(
                "orderno" => $order_number,
                "orderstatus" => $this->input->post('update_status'),
                "dateoflog" => date('Y-m-d H:i:s A'),
                "message" => $this->input->post('update_status_message'),
                "track_company" => $this->input->post('tracking_company'),
                "track_number" => $this->input->post('tracking_no')
            );
            $this->db->insert('order_log_history', $logdata);
            
            if((int) $this->input->post('send_email_to_user') == 1) {
                $pdf = '';
                if((int) $this->input->post('send_invoice_email_to_user') == 1) {
                    $sql_where = array("ord_order_number" => $order_number);
                    $order_query = $this->db->get_where('order_summary', $sql_where);
                    $sql_where = array("ord_det_order_number_fk" => $order_number);
                    $order_details_query = $this->db->get_where("order_details", $sql_where);
                    $order_data['summary_data'] = $order_query->row_array();
                    $order_data['item_data'] = $order_details_query->result_array();
                    $pdfHtml = $this->load->view('includes/invoice/pdf_invoice.tpl.php', $order_data, TRUE);
                    $this->load->library('pdf');
                    log_message('ERROR', 'PDF Library loaded');
                    $this->dompdf->loadhtml($pdfHtml);
                    $this->dompdf->setPaper('A4', 'portrait');
                    $this->dompdf->render();;
                    $pdf = $this->dompdf->output(); 
                }
                $status_mesg = getValuee("ord_status_description", "order_status", "ord_status_id", $this->input->post('update_status'));
                $buyer_email = getValuee("ord_demo_email", "order_summary", "ord_order_number", $order_number);
                $message = $this->input->post('update_status_message');
                $ss = site_settings();
                $template = getValuee("content", "email_template", "id", 5);
                $html = str_replace(array('[LOGO]', '[SITENAME]', '[MESSAGE]', '[ORDERNO]', '[ORDERSTATUS]', '[CUSTOMERIP]', '[URL]'), array(base_url("files/frontend/images/logo.png"), $ss->company_name, $message, $order_number, $status_mesg, $this->uIP, base_url()), $template);
                $this->send_email_to_user($buyer_email, "Order# OLO-" . $order_number . " Status Updated [" . $status_mesg . "]", $html, $pdf, true, false);
            }
            // if((int) $this->input->post('send_invoice_email_to_user') == 1) {
            //         $sql_where = array("ord_order_number" => $order_number);
            //         $order_query = $this->db->get_where('order_summary', $sql_where);
            //         $sql_where = array("ord_det_order_number_fk" => $order_number);
            //         $order_details_query = $this->db->get_where("order_details", $sql_where);
            //         $order_data['summary_data'] = $order_query->row_array();
            //         $order_data['item_data'] = $order_details_query->result_array();
            //         $pdfHtml = $this->load->view('includes/invoice/pdf_invoice.tpl.php', $order_data, TRUE);
            //         $this->load->library('pdf');
            //         log_message('ERROR', 'PDF Library loaded');
            //         $this->dompdf->loadhtml($pdfHtml);
            //         $this->dompdf->setPaper('A4', 'portrait');
            //         $this->dompdf->render();;
            //         $pdf = $this->dompdf->output(); 
            //     // $sql_where = array("ord_order_number" => $order_number);
            //     // $order_query = $this->db->get_where('order_summary', $sql_where);
            //     // $sql_where = array("ord_det_order_number_fk" => $order_number);
            //     // $order_details_query = $this->db->get_where("order_details", $sql_where);
            //     // $order_data['summary_data'] = $order_query->row_array();
            //     // $order_data['item_data'] = $order_details_query->result_array();
            //     // $html =$this->load->view('includes/invoice/email_invoice.tpl.php', $order_data,true);
            //     $buyer_email = getValuee("ord_demo_email", "order_summary", "ord_order_number", $order_number);
            //  //$buyer_email = "arslanuog53@gmail.com";
            //                  //Load email library
            //     $this->load->library('email');
            //     $this->email->set_mailtype("html");
            //     $this->email->set_newline("\r\n");
            //  //   $htmlContent = $message;
            // //    if($attach != false){$this->email->attach($attach, 'inline');}
            //     $this->email->from($ss->company_email,$ss->company_name);
            //     $this->email->to($buyer_email);
            //     $this->email->cc($ss->company_email);
            //     $this->email->subject("Order# OLO-" . $order_number . " Status Updated [" . $status_mesg . "]");
            //     $this->email->message("Find Invoice Attachment");
            //     $this->email->attach($pdf, 'application/pdf', "Pdf File " . date("m-d H-i-s") . ".pdf", false);
            //     $this->email->send();
            //     //$this->send_invoice_email_to_user($buyer_email, "Order# OLO-" . $order_number . " Invoice", $html);                
                
            // }
            redirect(current_url());
		}
		
		// Get the row array of the order filtered by the order number in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('order_summary', 'order_number') => $order_number);
		$this->data['summary_data'] = $this->flexi_cart_admin->get_db_order_summary_row_array(FALSE, $sql_where);
		
		// Get an array of all order details related to the above order, filtered by the order number in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('order_details', 'order_number') => $order_number);
		$this->data['item_data'] = $this->flexi_cart_admin->get_db_order_detail_array(FALSE, $sql_where);
		
		// Get an array of all order statuses that can be set for an order.
		// The data is then to be displayed via a html select input to allow the user to update the orders status.
		$this->data['status_data'] = $this->flexi_cart_admin->get_db_order_status_array();

		// Get the row array of any refund data that may be available for the order, filtered by the order number in the url.
		$this->data['refund_data'] = $this->flexi_cart_admin->get_refund_summary_row_array($order_number);
		
		// Get any status message that may have been set.
		$this->data['message'] = $this->session->flashdata('message');	
		
		$this->data['page_heading'] = "Orders";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/orders/order_details',$this->data);
		// $this->load->view('demo/admin_examples/orders/order_details_view', $this->data);
	}
    public function order_delete($order_number)
    {
        $this->db->query("DELETE FROM order_summary WHERE ord_order_number='$order_number'");
        $this->db->query("DELETE FROM order_details WHERE ord_det_order_number_fk='$order_number'");
        $this->session->set_flashdata('info', 'Order Delete Successfully');
        redirect($_SERVER['HTTP_REFERER']);
    }
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * update_order_details
	 * Reloads the saved cart data from a saved order into the users current cart session.
	 * Once the saved cart data is reloaded, the user can browse the store adding and updating items to the cart as normal.
	 * When the cart is resaved, the new cart data will update and overwrite the original saved order.
	 * The page includes an example of listing items that can be further added to the cart, and examples of how to apply discounts and surcharges all from within the same page.
	 *
	 * This page is accessed from the 'Order Details' page via the 'Edit Order' link.
	 */ 
	function update_order_details($order_number)
	{

		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_order'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_resave_order($order_number);
		}
		
		// Get the row array of the original order details, filtered by the order number in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('order_summary', 'order_number') => $order_number);
		$this->data['current_order_data'] = $this->flexi_cart_admin->get_db_order_summary_row_array(FALSE, $sql_where);

		// Get the id of the loaded cart data.
		$cart_data_id = $this->data['current_order_data'][$this->flexi_cart_admin->db_column('order_summary', 'cart_data')];

		// To prevent re-reloading the saved cart data (And losing any changes) every time the page is refreshed, check if the current CI session contains 
		// the cart data array matching the saved order data that is to be updated.		
		if ($this->flexi_cart_admin->cart_data_id() != $cart_data_id)
		{
			// Load saved cart data array from the confirmed order.
			// This data is loaded into the browser session as if you were shopping with the cart as a customer.
			$this->flexi_cart_admin->load_cart_data($cart_data_id, TRUE);
		}
		
		// This demo includes a list of items from the demo item table that can be added to the reloaded cart.
		// For simplicity, rather than including all example items that can be found in the demo, only items from the 'demo_items' table are used.
		$this->load->model('demo_cart_model');
		$this->data['item_data'] = $this->demo_cart_model->demo_get_item_data();

		// Get required data on cart items, summary discounts and cart surcharges for use on the cart.
		// Note: This demo requires the 'get_shipping_options()' function being loaded from the standard flexi cart library.
		$this->load->library('flexi_cart');
		$this->data['update_cart_items'] = $this->flexi_cart_admin->cart_items(FALSE, TRUE, TRUE);
		$this->data['update_shipping_options'] = $this->flexi_cart->get_shipping_options(); 
		$this->data['update_reward_vouchers'] = $this->flexi_cart_admin->reward_voucher_data(TRUE, TRUE);
		$this->data['update_discounts'] = $this->flexi_cart_admin->summary_discount_data(FALSE, TRUE, TRUE);
		$this->data['update_surcharges'] = $this->flexi_cart_admin->surcharge_data(FALSE, TRUE, TRUE);

		// Get any status message that may have been set.
		$this->data['message'] = $this->session->flashdata('message');	
		
		$this->data['page_heading'] = "Orders";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/orders/order_details_update',$this->data);

		// $this->load->view('demo/admin_examples/orders/order_details_update_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * unset_discount
	 * Removes a specific active item or summary discount from the cart. 
	 * This function is accessed from the 'Update Order Details' page via a 'Remove' link located in the description of an active discount.
	 */ 
	function unset_discount($discount_id = FALSE, $order_number = FALSE)
	{
		$this->load->library('flexi_cart');
		
		// If a discount id is submitted, then only that specific discount will be unset, if submitted as FALSE, all discounts are unset.
		$this->flexi_cart->unset_discount($discount_id);
		
		redirect(ADMIN_FOLDER.'/update_order_details/'.$order_number);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * unset_surcharge
	 * Removes a specific surcharge from the cart.
	 * This function is accessed from the 'Update Order Details' page via a 'Remove' link located in the description of a surcharge.
	 */ 
	function unset_surcharge($surcharge_id = FALSE, $order_number = FALSE)
	{
		$this->load->library('flexi_cart');

		// If a surcharge id is submitted, then only that specific surcharge will be unset, if submitted as FALSE, all surcharges will be unset.
		$this->flexi_cart->unset_surcharge($surcharge_id);
		
		redirect(ADMIN_FOLDER.'/update_order_details/'.$order_number);
	}	
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// LOCATIONS AND ZONES
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * LOCATIONS AND ZONES
	 * Location Types act as a parent grouping for locations, for example a location type of 'Country' would act as the parent to locations like 'United States', 'United Kingdom'.
	 * Locations can be setup to identify a users specific location. Shipping and tax rates can then be applied to each location.
	 * Zones can be setup so the shipping and tax rates can be applied to a range of locations, rather than each specific location. For example, EU and non EU European countries.
	 */
	
	/**
	 * location_types
	 * Displays a manageable list of all 'Locations Types'. Each row can be updated or deleted. 
	 */ 
	function location_types() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_location_types'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_location_types();
		}
	
		// Get an array of all location types.		
		$this->data['location_type_data'] = $this->flexi_cart_admin->get_db_location_type_array();
		
		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];

		$this->data['page_heading'] = "Location Types";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/locations/location_type_update',$this->data);
		// $this->load->view('demo/admin_examples/locations/location_type_update_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * insert_location_type
	 * Inserts new location types to the database. 
	 * This page is accessed via the 'Location' page via a link titled 'Insert New Location Type'.
	 */ 
	function insert_location_type() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_location_type'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_location_type();
		}
		
		// Get an array of all location types.		
		$this->data['location_type_data'] = $this->flexi_cart_admin->get_db_location_type_array();

		$this->data['page_heading'] = "Location Types";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/locations/location_type_insert',$this->data);
		// $this->load->view('demo/admin_examples/locations/location_type_insert_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * locations
	 * Displays a manageable list of all 'Locations'. Each row can be updated or deleted.
	 * This page is accessed via the 'Location Type' page via a link on the row of the locations 'parent' (Location type).
	 */ 
	function locations($location_type_id) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_locations'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_locations();
		}
		
		// Get an array of location data formatted with all sub-locations displayed 'inline', so all locations can be listed in one html select menu.
		// Alternatively, the location data could have been formatted with all sub-locations displayed 'tiered' into the location type groups.
		$this->data['locations_inline'] = $this->flexi_cart_admin->locations_inline();
		
		// Get arrays of all shipping and tax zones.
		$this->data['shipping_zones'] = $this->flexi_cart_admin->location_zones('shipping',$location_type_id);
		$this->data['tax_zones'] = $this->flexi_cart_admin->location_zones('tax',$location_type_id);
		// echo "1111";
		// print_r($this->data['tax_zones']);
		// die();

		// Get the row array of the location type filtered by the id in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('location_type', 'id') => $location_type_id);
		$this->data['location_type_data'] = $this->flexi_cart_admin->get_db_location_type_row_array(FALSE, $sql_where);

		// Get an array of all locations filtered by the id in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('locations', 'type') => $location_type_id);
		$this->data['location_data'] = $this->flexi_cart_admin->get_db_location_array(FALSE, $sql_where);
	
		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Location Types";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/locations/location_update',$this->data);
		// $this->load->view('demo/admin_examples/locations/location_update_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * insert_location
	 * Inserts new locations to the database. 
	 * This page is accessed via the 'Location Type' page via a link on the row of the locations 'parent' (Location type), followed by a link similar to 'Insert New Location'.
	 */ 
	function insert_location($location_type_id) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_location'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_location($location_type_id);
		}
		
		// Get an array of location data formatted with all sub-locations displayed 'inline', so all locations can be listed in one html select menu.
		// Alternatively, the location data could have been formatted with all sub-locations displayed 'tiered' into the location type groups.
		$this->data['locations_inline'] = $this->flexi_cart_admin->locations_inline();
		
		// Get arrays of all shipping and tax zones.
		$this->data['shipping_zones'] = $this->flexi_cart_admin->location_zones('shipping',$location_type_id);
		$this->data['tax_zones'] = $this->flexi_cart_admin->location_zones('tax',$location_type_id);
	
		// Get the row array of the location type filtered by the id in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('location_type', 'id') => $location_type_id);
		$this->data['location_type_data'] = $this->flexi_cart_admin->get_db_location_type_row_array(FALSE, $sql_where);
		
		$this->data['page_heading'] = "Location Types";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/locations/location_insert',$this->data);
		// $this->load->view('demo/admin_examples/locations/location_insert_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * zones
	 * Displays a manageable list of all 'Zones'. Each row can be updated or deleted.
	 */ 
	function zones() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_zones'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_zones();
		}
		
		// Get an array of all zones.
		$this->data['location_zone_data'] = $this->flexi_cart_admin->get_db_location_zone_array();
	
		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Location Zones";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/locations/zone_update',$this->data);
		// $this->load->view('demo/admin_examples/locations/zone_update_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * insert_zone
	 * Inserts new location based zones to the database. 
	 * This page is accessed via the 'Zones' page via a link titled 'Insert New Zone'.
	 */ 
	function insert_zone() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_zone'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_zones();
		}

		$this->data['page_heading'] = "Location Zones";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/locations/zone_insert',$this->data);
		// $this->load->view('demo/admin_examples/locations/zone_insert_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// SHIPPING OPTIONS AND RATES
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * SHIPPING OPTIONS AND RATES
	 * Shipping can be setup to return a selection of different shipping options and rates related to a customers location and the weight and value of the cart.
	 */
	
	/**
	 * shipping
	 * Displays a manageable list of all shipping options. Each row can be updated or deleted.
	 */ 
	function shipping() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_shipping'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_shipping();
		}
		
		// Get an array of location data formatted with all sub-locations displayed 'tiered' into the location type groups, so locations can be listed 
		// over multiple html select menus.
		$this->data['locations_tiered'] = $this->flexi_cart_admin->locations_tiered();

		// Get an array of all shipping zones.
		$this->data['shipping_zones'] = $this->flexi_cart_admin->location_zones('shipping');
	
		// Get an array of all shipping option data.
		$this->data['shipping_data'] = $this->flexi_cart_admin->get_db_shipping_array();

		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Shipping Page";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/shipping/shipping_update_view',$this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * insert_shipping
	 * Inserts new shipping options to the database. 
	 * This page is accessed via the 'Shipping Options' page via a link titled 'Insert New Shipping Option'.
	 */ 
	function insert_shipping() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_option') && $this->input->post('insert_rate'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_shipping();
		}
		
		// Get an array of location data formatted with all sub-locations displayed 'tiered' into the location type groups, so locations can be listed 
		// over multiple html select menus.
		$this->data['locations_tiered'] = $this->flexi_cart_admin->locations_tiered();

		// Get an array of all shipping zones.
		$this->data['shipping_zones'] = $this->flexi_cart_admin->location_zones('shipping');
	
		// $this->load->view('demo/admin_examples/shipping/shipping_insert_view', $this->data);
		$this->data['page_heading'] = "Shipping Page";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/shipping/shipping_insert_view',$this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * shipping_rates
	 * Displays a manageable list of all shipping rates for a specific shipping option. Each row can be updated or deleted.
	 * This page is accessed via the 'Shipping Options' page via a link titled 'Manage'.
	 */ 
	function shipping_rates($shipping_id) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_shipping_rates'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_shipping_rate();
		}
		
		// Get the row array of the shipping option filtered by the id in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('shipping_options', 'id') => $shipping_id);
		$this->data['shipping_data'] = $this->flexi_cart_admin->get_db_shipping_row_array(FALSE, $sql_where);
		
		// Get an array of all shipping rates filtered by the id in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('shipping_rates', 'parent') => $shipping_id);
		$this->data['shipping_rate_data'] = $this->flexi_cart_admin->get_db_shipping_rate_array(FALSE, $sql_where);
		
		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Shipping Rates";
		$this->data['sessions'] = $this->session->userdata();
		// $this->load->view('demo/admin_examples/shipping/shipping_rate_update_view', $this->data);
		$this->load->view(ADMIN_VIEW_FOLDER.'/shipping/shipping_rate_update_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * insert_shipping_rate
	 * Inserts new shipping rates to a specific shipping option in the database. 
	 * This page is accessed via the 'Shipping Options' page via a link titled 'Insert New Rates'.
	 */ 
	function insert_shipping_rate($shipping_id) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_shipping_rate'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_shipping_rate($shipping_id);
		}
		
		// Get the row array of the shipping option filtered by the id in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('shipping_options', 'id') => $shipping_id);
		$this->data['shipping_data'] = $this->flexi_cart_admin->get_db_shipping_row_array(FALSE, $sql_where);
		
		$this->data['page_heading'] = "Shipping Rates";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/shipping/shipping_rate_insert_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * item_shipping
	 * Displays a manageable list of all shipping rates for a specific item. Each row can be updated or deleted.
	 * This page is accessed via the 'Items' page via a link titled 'Manage' in the 'Item Shipping Rules' table column.	 
	 */ 
	function item_shipping($item_id) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_item_shipping'))
		{		
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_item_shipping();
		}
		
		// Get an array of location data formatted with all sub-locations displayed 'inline', so all locations can be listed in one html select menu.
		// Alternatively, the location data could have been formatted with all sub-locations displayed 'tiered' into the location type groups.
		$this->data['locations_inline'] = $this->flexi_cart_admin->locations_inline();
		
		// Get an array of all shipping zones.
		$this->data['shipping_zones'] = $this->flexi_cart_admin->location_zones('shipping');

		// Get the row array of the demo item filtered by the id in the url.
		$sql_where = array('id' => $item_id);
		$this->data['item_data'] = $this->flexi_cart_admin->get_db_table_data_row_array('products', FALSE, $sql_where);

		// Get an array of all item shipping rules filtered by the id in the url.		
		$sql_where = array($this->flexi_cart_admin->db_column('item_shipping', 'item') => $item_id);
		$this->data['item_shipping_data'] = $this->flexi_cart_admin->get_db_item_shipping_array(FALSE, $sql_where);

		// var_dump($this->data);
		// die();

		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Product Shipping Rules";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/products/shipping_update', $this->data);

		// $this->load->view('demo/admin_examples/items/item_shipping_update_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * insert_item_shipping
	 * Inserts new item shipping rules for a specific item in the database. 
	 * This page is accessed via the 'Items' page via a link titled 'Manage' in the 'Item Shipping Rules' table column, 
	 * followed by a link titled 'Insert New Item Shipping Rules'.
	 */ 
	function insert_item_shipping($item_id) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_item_shipping'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_item_shipping($item_id);
		}
		
		// Get an array of location data formatted with all sub-locations displayed 'inline', so all locations can be listed in one html select menu.
		// Alternatively, the location data could have been formatted with all sub-locations displayed 'tiered' into the location type groups.
		$this->data['locations_inline'] = $this->flexi_cart_admin->locations_inline();
		
		// Get an array of all shipping zones.
		$this->data['shipping_zones'] = $this->flexi_cart_admin->location_zones('shipping');

		// Get the row array of the demo item filtered by the id in the url.
		$sql_where = array('id' => $item_id);
		$this->data['item_data'] = $this->flexi_cart_admin->get_db_table_data_row_array('products', FALSE, $sql_where);
		
		$this->data['page_heading'] = "Product Shipping Rules";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/products/shipping_insert', $this->data);
		// $this->load->view('demo/admin_examples/items/item_shipping_insert_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// TAXES
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * TAXES
	 * Taxes can be setup to return a tax rate related to a customers location.
	 */
	
	/**
	 * tax
	 * Displays a manageable list of all tax rates. Each row can be updated or deleted.
	 */ 
	function tax() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_tax'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_tax();
		}
	
		// Get an array of location data formatted with all sub-locations displayed 'tiered' into the location type groups, so locations can be listed 
		// over multiple html select menus.
		$this->data['locations_tiered'] = $this->flexi_cart_admin->locations_tiered();

		// Get an array of all tax zones.
		$this->data['tax_zones'] = $this->flexi_cart_admin->location_zones('tax');

		// Get an array of all tax rates.
		$this->data['tax_data'] = $this->flexi_cart_admin->get_db_tax_array();

		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];

		$this->data['page_heading'] = "Manage Taxes";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/tax/update', $this->data);

		//$this->load->view('demo/admin_examples/tax/tax_update_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * insert_tax
	 * Inserts new tax rate to the database. 
	 * This page is accessed via the 'Taxes' page via a link titled 'Insert New Tax'.
	 */ 
	function insert_tax() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_tax'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_tax();
		}
	
		// Get an array of location data formatted with all sub-locations displayed 'tiered' into the location type groups, so locations can be listed 
		// over multiple html select menus.
		$this->data['locations_tiered'] = $this->flexi_cart_admin->locations_tiered();

		// Get an array of all tax zones.
		$this->data['tax_zones'] = $this->flexi_cart_admin->location_zones('tax');

		$this->data['page_heading'] = "Manage Taxes";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/tax/insert', $this->data);

		// $this->load->view('demo/admin_examples/tax/tax_insert_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * item_tax
	 * Displays a manageable list of all tax rates for a specific item. Each row can be updated or deleted.
	 * This page is accessed via the 'Items' page via a link titled 'Manage' in the 'Item Taxes' table column.
	 */ 
	function item_tax($item_id) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_item_tax'))
		{		
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_item_tax();
		}
		
		// Get an array of location data formatted with all sub-locations displayed 'inline', so all locations can be listed in one html select menu.
		// Alternatively, the location data could have been formatted with all sub-locations displayed 'tiered' into the location type groups.
		$this->data['locations_inline'] = $this->flexi_cart_admin->locations_inline();
		
		// Get an array of all tax zones.
		$this->data['tax_zones'] = $this->flexi_cart_admin->location_zones('tax');

		// Get the row array of the demo item filtered by the id in the url.
		$sql_where = array('id' => $item_id);
		$this->data['item_data'] = $this->flexi_cart_admin->get_db_table_data_row_array('products', FALSE, $sql_where);

		// Get an array of all the item tax rates filtered by the id in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('item_tax', 'item') => $item_id);
		$this->data['item_tax_data'] = $this->flexi_cart_admin->get_db_item_tax_array(FALSE, $sql_where);

		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Product Taxes";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/products/tax_update', $this->data);

		// $this->load->view('demo/admin_examples/items/item_tax_update_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * insert_item_tax
	 * Inserts new item tax rates for a specific item in the database. 
	 * This page is accessed via the 'Items' page via a link titled 'Manage' in the 'Item Taxes' table column, followed by a link titled 'Insert New Item Tax Rates'.
	 */ 
	function insert_item_tax($item_id) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_item_tax'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_item_tax($item_id);
		}
		
		// Get an array of location data formatted with all sub-locations displayed 'inline', so all locations can be listed in one html select menu.
		// Alternatively, the location data could have been formatted with all sub-locations displayed 'tiered' into the location type groups.
		$this->data['locations_inline'] = $this->flexi_cart_admin->locations_inline();
		
		// Get an array of all tax zones.
		$this->data['tax_zones'] = $this->flexi_cart_admin->location_zones('tax');

		// Get the row array of the demo item filtered by the id in the url.
		$sql_where = array('id' => $item_id);
		$this->data['item_data'] = $this->flexi_cart_admin->get_db_table_data_row_array('products', FALSE, $sql_where);
		
		$this->data['page_heading'] = "Product Taxes";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/products/tax_insert', $this->data);

		// $this->load->view('demo/admin_examples/items/item_tax_insert_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// DISCOUNTS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * DISCOUNTS
	 * Discounts can be setup with a wide range of rule conditions.
	 * The discounts can then be applied to specific items, groups of items or can be applied across the entire cart.
	 */ 
	
	/**
	 * item_discounts
	 * Displays a manageable list of all item discounts. Each row can be updated or deleted.
	 */ 
	function item_discounts() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_discounts'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_discounts();
		}
		
		// Get an array of all discounts filtered by a 'type' of 1 ('item discounts') and for purposes of this demo, have an id of 32+.
		$sql_where = array(
			// $this->flexi_cart_admin->db_column('discounts', 'id').' >=' => 32,
			$this->flexi_cart_admin->db_column('discounts', 'type') => 1
		);
		$this->data['discount_data'] = $this->flexi_cart_admin->get_db_discount_array(FALSE, $sql_where);
		
		// Set a variable to indicate on the html page that the discount is an 'item' discount.
		$this->data['discount_type'] = 'item';
	
		// Get any status message that may have been set.
		$this->data['message'] = $this->session->flashdata('message');

		$this->data['page_heading'] = "Discounts";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/discounts/discounts', $this->data);
		// $this->load->view('demo/admin_examples/discounts/discounts_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * summary_discounts
	 * Displays a manageable list of all summary discounts. Each row can be updated or deleted.
	 */ 
	function summary_discounts() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_discounts'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_discounts();
		}

		// Get an array of all discounts filtered by a 'type' of 2 ('summary discounts').
		$sql_where = array($this->flexi_cart_admin->db_column('discounts', 'type') => 2);
		$this->data['discount_data'] = $this->flexi_cart_admin->get_db_discount_array(FALSE, $sql_where);

		// Set a variable to indicate on the html page that the discount is an 'summary' discount.
		$this->data['discount_type'] = 'summary';
	
		// Get any status message that may have been set.
		$this->data['message'] = $this->session->flashdata('message');

		$this->data['page_heading'] = "Discounts";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/discounts/discounts', $this->data);
		// $this->load->view('demo/admin_examples/discounts/discounts_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * update_discount
	 * Updates data for an existing discount in the database. 
	 * This page is accessed via either the 'Item Discounts' or 'Summary Discounts' page via a link titled 'Edit'.
	 */
	function update_discount($discount_id)
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_discount'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_discount($discount_id);
		}

		// Get an array of location data formatted with all sub-locations displayed 'inline', so all locations can be listed in one html select menu.
		// Alternatively, the location data could have been formatted with all sub-locations displayed 'tiered' into the location type groups.
		$this->data['locations_inline'] = $this->flexi_cart_admin->locations_inline();
		
		// Get an array of all zones.
		$this->data['zones'] = $this->flexi_cart_admin->location_zones();
		
		// Get an array of all discount types.		
		$this->data['discount_types'] = $this->flexi_cart_admin->get_db_discount_type_array();
		
		// Get an array of all discount methods.	
		$this->data['discount_methods'] = $this->flexi_cart_admin->get_db_discount_method_array();
		
		// Get an array of all discount tax methods.		
		$this->data['discount_tax_methods'] = $this->flexi_cart_admin->get_db_discount_tax_method_array();
		
		// Get an array of all discount groups.		
		$this->data['discount_groups'] = $this->flexi_cart_admin->get_db_discount_group_array();
		
		// Get an array of all demo items.		
		$this->data['items'] = $this->flexi_cart_admin->get_db_table_data_array('products');

		// Get the row array of the discount filtered by the id in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('discounts', 'id') => $discount_id);
		$this->data['discount_data'] = $this->flexi_cart_admin->get_db_discount_row_array(FALSE, $sql_where);

		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Discounts";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/discounts/discount_update', $this->data);
		// $this->load->view('demo/admin_examples/discounts/discount_update_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * insert_discount
	 * Inserts a new item or summary discount to the database. 
	 * This page is accessed via either the 'Item Discounts' or 'Summary Discounts' page via a link titled 'Insert New Discount'.
	 */ 
	function insert_discount() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_discount'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_discount();
		}

		// Get an array of location data formatted with all sub-locations displayed 'inline', so all locations can be listed in one html select menu.
		// Alternatively, the location data could have been formatted with all sub-locations displayed 'tiered' into the location type groups.
		$this->data['locations_inline'] = $this->flexi_cart_admin->locations_inline();
		
		// Get an array of all zones.
		$this->data['zones'] = $this->flexi_cart_admin->location_zones();
		
		// Get an array of all discount types.		
		$this->data['discount_types'] = $this->flexi_cart_admin->get_db_discount_type_array();
		
		// Get an array of all discount methods.	
		$this->data['discount_methods'] = $this->flexi_cart_admin->get_db_discount_method_array();
		
		// Get an array of all discount tax methods.		
		$this->data['discount_tax_methods'] = $this->flexi_cart_admin->get_db_discount_tax_method_array();
		
		// Get an array of all discount groups.		
		$this->data['discount_groups'] = $this->flexi_cart_admin->get_db_discount_group_array();
		
		// Get an array of all demo items.		
		$this->data['items'] = $this->flexi_cart_admin->get_db_table_data_array('products');
		
		$this->data['page_heading'] = "Discounts";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/discounts/discount_insert', $this->data);

		// $this->load->view('demo/admin_examples/discounts/discount_insert_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * discount_groups
	 * Displays a manageable list of all discount groups. Each row can be updated or deleted.
	 */ 
	function discount_groups() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_discount_groups'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_discount_groups();
		}
	
		// Get an array of all discount groups.		
		$this->data['discount_group_data'] = $this->flexi_cart_admin->get_db_discount_group_array();

		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];

		$this->data['page_heading'] = "Discount Group";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/discounts/discount_groups', $this->data);

		// $this->load->view('demo/admin_examples/discounts/discount_groups_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * update_discount_group
	 * Updates data for an existing discount group and its related discount group items in the database. 
	 * This page is accessed via the 'Discount Groups' page via a link titled 'Manage Items in Group'.
	 */ 
	function update_discount_group($group_id) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_discount_group_items'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_discount_group($group_id);
		}
		
		// Get the row array of the discount group filtered by the id in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('discount_groups', 'id') => $group_id);
		$this->data['group_data'] = $this->flexi_cart_admin->get_db_discount_group_row_array(FALSE, $sql_where);
		
		// Get an array of all the discount group items filtered by the id in the url.
		// Using flexi cart SQL functions, join the demo item table with the discount group items and then order the data by item id.
		$this->flexi_cart_admin->sql_join('products', 'id = '.$this->flexi_cart_admin->db_column('discount_group_items', 'item')); 
		$this->flexi_cart_admin->sql_order_by('id');
		$sql_where = array($this->flexi_cart_admin->db_column('discount_group_items', 'group') => $group_id);		
		$this->data['group_item_data'] = $this->flexi_cart_admin->get_db_discount_group_item_array(FALSE, $sql_where);
		
		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Discount Group";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/discounts/discount_group_update', $this->data);
		// $this->load->view('demo/admin_examples/discounts/discount_group_update_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * insert_discount_group
	 * Inserts a new discount group and its related discount group items to the database. 
	 * This page is accessed via the 'Discount Groups' page via a link titled 'Insert New Group'.
	 */ 
	function insert_discount_group() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_discount_group'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_discount_group();
		}
		
		$this->data['page_heading'] = "Discount Group";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/discounts/discount_group_insert', $this->data);
		// $this->load->view('demo/admin_examples/discounts/discount_group_insert_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * insert_discount_group_items
	 * Inserts new discount group items to the database. 
	 * This page is accessed via the 'Discount Groups' page via a link titled 'Insert New Items to Group'.
	 */ 
	function insert_discount_group_items($group_id) 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_discount_group_items'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_discount_group_items($group_id);
		}
		
		// Get the row array of the discount group filtered by the id in the url.
		$sql_where = array($this->flexi_cart_admin->db_column('discount_groups', 'id') => $group_id);
		$this->data['group_data'] = $this->flexi_cart_admin->get_db_discount_group_row_array(FALSE, $sql_where);
		
		$this->data['page_heading'] = "Discount Group";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/discounts/discount_group_items_insert', $this->data);
		// $this->load->view('demo/admin_examples/discounts/discount_group_items_insert_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// REWARD POINTS AND VOUCHERS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * REWARD POINTS AND VOUCHERS
	 * Customers can earn reward points when purchasing cart items. The reward points can then be converted to vouchers that can be used to buy other items.
	 */ 
	
	/**
	 * user_reward_points
	 * Displays a summary list of all users and their reward points.
	 */ 
	// function user_reward_points() 
	// {
	// 	$this->load->model('demo_cart_admin_model');
		
	// 	// Get an array of all demo users and their related reward points from a custom demo model function.
	// 	$this->data['user_data'] = $this->demo_cart_admin_model->demo_reward_point_summary();
		
	// 	$this->load->view('demo/admin_examples/reward_points/user_reward_points_view', $this->data);
	// }
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * user_reward_point_history
	 * Displays an itemised list of all earnt and converted user reward points.
	 * This page is accessed via the 'Reward Points' page via a link titled 'View' in the 'History' table column.
	 */ 
	// function user_reward_point_history($user_id) 
	// {
	// 	$this->load->model('demo_cart_admin_model');
		
	// 	// Get the row array of the demo users filtered by the id in the url.
	// 	$sql_where = array('user_id' => $user_id);
	// 	$this->data['user_data'] = $this->flexi_cart_admin->get_db_table_data_row_array('demo_users', FALSE, $sql_where);
	
	// 	// Get an array of all reward points for a user filtered by the id in the url.
	// 	// The 'get_user_reward_points()' function only returns the minimum required fields, therefore define the other required table fields via an SQL SELECT statement.
	// 	$sql_select = array(
	// 		$this->flexi_cart_admin->db_column('reward_points', 'order_number'),
	// 		$this->flexi_cart_admin->db_column('reward_points', 'description'),
	// 		$this->flexi_cart_admin->db_column('reward_points', 'order_date')
	// 	);	
	// 	$sql_where = array($this->flexi_cart_admin->db_column('reward_points', 'user') => $user_id);
	// 	$this->data['points_awarded_data'] = $this->flexi_cart_admin->get_db_reward_points_array($sql_select, $sql_where);
		
	// 	// Call a custom function that returns a nested array of reward voucher codes and the reward point data used to create the voucher.
	// 	$this->data['points_converted_data'] = $this->demo_cart_admin_model->demo_converted_reward_point_history($user_id);
		
	// 	$this->load->view('demo/admin_examples/reward_points/user_reward_point_history_view', $this->data);
	// }
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * user_vouchers
	 * Displays a list of all reward vouchers for a specific user. Each row can be updated.
	 * This page is accessed via the 'Reward Points' page via a link titled 'View' in the 'Vouchers' table column.
	 */ 
	// function user_vouchers($user_id) 
	// {
	// 	// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
	// 	if ($this->input->post('update_vouchers'))
	// 	{
	// 		$this->load->model('demo_cart_admin_model');
	// 		$this->demo_cart_admin_model->demo_update_voucher();
	// 	}
	
	// 	// Get the row array of the demo user filtered by the id in the url.
	// 	$sql_where = array('user_id' => $user_id);
	// 	$this->data['user_data'] = $this->flexi_cart_admin->get_db_table_data_row_array('demo_users', FALSE, $sql_where);

	// 	// Get an array of all the reward vouchers filtered by the id in the url.
	// 	// Using flexi cart SQL functions, join the demo user table with the discount table.
	// 	$sql_where = array($this->flexi_cart_admin->db_column('discounts', 'user') => $user_id);
	// 	$this->flexi_cart_admin->sql_join('demo_users', 'user_id = '.$this->flexi_cart_admin->db_column('discounts', 'user'));
	// 	$this->data['voucher_data'] = $this->flexi_cart_admin->get_db_voucher_array(FALSE, $sql_where);
		
	// 	// Get any status message that may have been set.
	// 	$this->data['message'] = $this->session->flashdata('message');
		
	// 	$this->load->view('demo/admin_examples/reward_points/user_vouchers_view', $this->data);
	// }

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * vouchers
	 * Displays a list of all reward vouchers. Each row can be updated.
	 */ 
	// function vouchers() 
	// {
	// 	// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
	// 	if ($this->input->post('update_vouchers'))
	// 	{
	// 		$this->load->model('demo_cart_admin_model');
	// 		$this->demo_cart_admin_model->demo_update_voucher();
	// 	}
	
	// 	// Get an array of all reward vouchers.
	// 	// Using flexi cart SQL functions, join the demo users table with the discount table.
	// 	$this->flexi_cart_admin->sql_join('demo_users', 'user_id = '.$this->flexi_cart_admin->db_column('discounts', 'user'));
	// 	$this->data['voucher_data'] = $this->flexi_cart_admin->get_db_voucher_array();

	// 	// Get any status message that may have been set.
	// 	$this->data['message'] = $this->session->flashdata('message');
		
	// 	$this->load->view('demo/admin_examples/reward_points/vouchers_view', $this->data);
	// }
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * convert_reward_points
	 * Converts a submitted number of reward points into a reward voucher.
	 * This page is accessed via the 'Reward Points' page via a link titled 'Convert' in the 'Vouchers' table column.
	 */ 
	// function convert_reward_points($user_id) 
	// {
	// 	$this->load->model('demo_cart_admin_model');
		
	// 	// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
	// 	if ($this->input->post('convert_reward_points'))
	// 	{
	// 		$this->demo_cart_admin_model->demo_convert_reward_points($user_id);
	// 	}

	// 	// Get an array of a demo user and their related reward points from a custom demo model function, filtered by the id in the url.
	// 	$user_data = $this->demo_cart_admin_model->demo_reward_point_summary($user_id);
		
	// 	// Note: The custom function returns a multi-dimensional array, of which we only need the first array, so get the first row '$user_data[0]'.
	// 	$this->data['user_data'] = $user_data[0];
		
	// 	// Get the conversion tier values for converting reward points to vouchers.
	// 	$conversion_tiers = $this->data['user_data'][$this->flexi_cart_admin->db_column('reward_points', 'total_points_active')];
	// 	$this->data['conversion_tiers'] = $this->flexi_cart_admin->get_reward_point_conversion_tiers($conversion_tiers);
		
	// 	$this->load->view('demo/admin_examples/reward_points/user_reward_point_convert_view', $this->data);
	// }

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// CURRENCY
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * currency
	 * Displays a manageable list of all currencies. Each row can be updated or deleted.
	 */ 
	function currency() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_currency'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_currency();
		}

		// Get an array of all currencies.
		$this->data['currency_data'] = $this->flexi_cart_admin->get_db_currency_array();

		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Currencies";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/currency/currency_update', $this->data);
		// $this->load->view('demo/admin_examples/currency/currency_update_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * insert_currency
	 * Inserts new currencies to the database. 
	 * This page is accessed via the 'Currency' page via a link titled 'Insert New Currency'.
	 */ 
	function insert_currency() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_currency'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_currency();
		}

		$this->data['page_heading'] = "Currencies";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/currency/currency_insert', $this->data);
		// $this->load->view('demo/admin_examples/currency/currency_insert_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// ORDER STATUS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * order_status
	 * Displays a manageable list of all order statuses. Each row can be updated or deleted.
	 */ 
	function order_status() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_order_status'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_order_status();
		}

		// Get an array of all order statuses.
		$this->data['order_status_data'] = $this->flexi_cart_admin->get_db_order_status_array();

		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Order Status";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/orders/order_status_update', $this->data);
		// $this->load->view('demo/admin_examples/orders/order_status_update_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	
	/**
	 * insert_order_status
	 * Inserts new order statuses to the database. 
	 * This page is accessed via the 'Order Status' page via a link titled 'Insert New Order Status'.
	 */ 
	function insert_order_status()
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('insert_order_status'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_insert_order_status();
		}

		$this->data['page_heading'] = "Order Status";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/orders/order_status_insert', $this->data);
		// $this->load->view('demo/admin_examples/orders/order_status_insert_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// CART CONFIGURATION AND DEFAULTS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * config
	 * Updates the carts configuration data in the database. 
	 */ 
	function config() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_config'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_config();
		}
		
		// Get the row array of the config table.
		$this->data['config'] = $this->flexi_cart_admin->get_db_config_row_array();

		// Get any status message that may have been set.
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['page_heading'] = "Shopping Config";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/config/config_update', $this->data);
		// $this->load->view('demo/admin_examples/config/config_update_view', $this->data);
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * defaults
	 * Sets the default cart values for the currency, shipping and tax tables. 
	 */ 
	function defaults() 
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.
		if ($this->input->post('update_defaults'))
		{
			$this->load->model('demo_cart_admin_model');
			$this->demo_cart_admin_model->demo_update_defaults();
		}
		// Get an array of location data formatted with all sub-locations displayed 'inline', so all locations can be listed in one html select menu.
		// Alternatively, the location data could have been formatted with all sub-locations displayed 'tiered' into the location type groups.
		$this->data['locations_inline'] = $this->flexi_cart_admin->locations_inline();
		// Get an array of all currencies.
		$this->data['currency_data'] = $this->flexi_cart_admin->get_db_currency_array();
		// Get an array of all shipping options.
		$this->data['shipping_data'] = $this->flexi_cart_admin->get_db_shipping_array();

		// Get an array of all tax rate.
		$this->data['tax_data'] = $this->flexi_cart_admin->get_db_tax_array();

		// Get current cart defaults.
		$this->data['default_currency'] = $this->flexi_cart_admin->get_db_currency_row_array(FALSE, array('curr_default' => 1));
		$this->data['default_ship_location'] = $this->flexi_cart_admin->get_db_location_row_array(FALSE, array('loc_ship_default' => 1));
		$this->data['default_tax_location'] = $this->flexi_cart_admin->get_db_location_row_array(FALSE, array('loc_tax_default' => 1));
		$this->data['default_ship_option'] = $this->flexi_cart_admin->get_db_shipping_row_array(FALSE, array('ship_default' => 1));
		$this->data['default_tax_rate'] = $this->flexi_cart_admin->get_db_tax_row_array(FALSE, array('tax_default' => 1));

		// Get any status message that may have been set.
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['page_heading'] = "Shopping Config";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/config/defaults_update', $this->data);
		// $this->load->view('demo/admin_examples/config/defaults_update_view', $this->data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// LOCATION MENU EXAMPLE
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * demo_location_menus
	 * A demo example of how location data can be displayed via html select menus with a JavaScript and non Javascript example.
	 */ 
	function demo_location_menus()
	{
		// Get an array of location data formatted with all sub-locations displayed 'inline', so all locations can be listed in one html select menu.
		$this->data['locations_inline'] = $this->flexi_cart_admin->locations_inline();
		
		// Get an array of location data formatted with all sub-locations displayed 'tiered' into the location type groups, so locations can be listed 
		// over multiple html select menus.
		$this->data['locations_tiered'] = $this->flexi_cart_admin->locations_tiered();

		$this->load->view('demo/admin_examples/locations/location_menu_demo_view', $this->data);		
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// MINI CART DATA
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * mini_cart_data
	 * This function is called by the '__construct()' to set item data to be displayed on the 'Mini Cart' menu.
	 */ 
	private function mini_cart_data()
	{
		$this->data['mini_cart_items'] = $this->flexi_cart_admin->cart_items();
	}
	public function insert_html(){
	    
	    
	    $des = $this->input->post('email_template');
	    if($des != ''){
	    $data_array = array(
	        'email_template' => $des
	        );
	        $this->db->where('id', 1);
       $this->db->update('email_tem', $data_array);
       $this->load->view(ADMIN_VIEW_FOLDER.'/locations/email_list');
       $this->session->set_flashdata('success','okay');
}

       $dat = $this->db->query("select * from email_tem where id = 1");
       $main['test'] = $dat->result_array();
	        
	    $this->load->view(ADMIN_VIEW_FOLDER.'/locations/insert_html',$main);
	    
            
	}
	public function send_email(){
	    
	    

         $template = getValuee("email_template","email_tem","id",1);
      
 	   $dat = $this->db->query("select * from email_list");
 	  $waqas = $dat->result_array();
 	  foreach($waqas as $we){
 	       $email_nam = $we['email'];
	      
	 $this->load->library('email');

$this->email->from('online@densol.com.au', 'Densol');
$this->email->to($email_nam);

$this->email->subject('Subscribe Offer');
$this->email->message($template);

$this->email->send();
 	  } 
	  
	    
	    $this->load->view(ADMIN_VIEW_FOLDER.'/locations/email_list');
	    $this->session->set_flashdata('success','okay');
	}
	function email_list()
	{
		// Check if POST data has been submitted, if so, call the custom demo model function to handle the submitted data.

		
		// Get an array of all zones.
		$this->data['location_zone_data'] = $this->flexi_cart_admin->get_db_location_zone_array();
	
		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		
		$this->data['page_heading'] = "Email Subscription List";
		$this->data['sessions'] = $this->session->userdata();
		$this->load->view(ADMIN_VIEW_FOLDER.'/locations/email_list',$this->data);
		// $this->load->view('demo/admin_examples/locations/zone_update_view', $this->data);
	}
}


/* End of file admin_library.php */
/* Location: ./application/controllers/admin_library.php */