<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tecshopping extends MY_Controller {
	public $userlogin = false;
	function __construct() 
	{
		parent::__construct();

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
		$this->load->model('paymentModel');
		// Load CI libraries and helpers.
		$this->load->library('session');
		$this->load->helper('text');
 		$this->load->helper('url');
 		$this->load->helper('form');

 		// Example of defining a specific language to return flexi carts status and error messages.
 		// The defined language file must be added to the CI application directory as 'application/language/[language_name]/flexi_cart_lang.php'.
 		// Alternatively, CI's default language can be set via the CI config. file.
 		// Note: This must be defined before $this->load->library('flexi_cart').
 		// $this->lang->load('flexi_cart', 'spanish');

 		// IMPORTANT! This global must be defined BEFORE the flexi cart library is loaded! 
 		// It is used as a global that is accessible via both models and both libraries, without it, flexi cart will not work.
		$this->flexi = new stdClass;

		// Load 'standard' flexi cart library by default.
		$this->load->library('flexi_cart');	
		
		// Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
		// $this->load->vars('base_url', 'http://localhost/flexi_cart/');
		// $this->load->vars('includes_dir', 'http://localhost/flexi_cart/includes/');
		$this->load->vars('current_url', $this->uri->uri_to_assoc(1));
		
		// Load cart data to be displayed via 'Mini Cart' menu.
		$this->mini_cart_data();
		if(!$this->is_logged_in()){
		$this->userlogin = false;
		}else{
		$this->userlogin = true;
		}
	}

	/**
	 * FLEXI CART DEMO
	 * Many of the functions within this controller load a custom model called 'demo_cart_model' that has been created for the purposes of this demo.
	 * The 'demo_cart_model' file is not part of flexi cart, it is included to demonstrate how some of the functions of flexi cart can be used.
	 */
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// VIEW CART
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * index
	 * Forwards to 'view_cart'.
	 */ 
	function index() 
	{
		$this->view_cart();
	}



	function wooProd()
	{
		if($this->input->post('slug')){
			$params = array(
				"key" => "ck_413081d9d7d5b03b2ab3fa47380fa0d11de069bc", // Add your own Consumer Key here
				"secret" => "cs_675b152f525e29ac0b5484aaf138f30bfbccd938", // Add your own Consumer Secret here
				"url" => "https://intercel.com.au", // Add the home URL to the store you want to connect to here
				"is_ssl" => TRUE, // TRUE if this store uses SSL (optional)
			);
			$sslug = $this->input->post('slug');
			$this->load->library('WooCommerce',$params);
			$products = $this->woocommerce->get_products_by_category(array("filter[category]"=>$sslug));

			// echo "<pre>";
			// print_r($products);
			// echo "</pre>";
			echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">';
			echo '<div class="container" style="width:800px;margin:0 auto;">';
			echo '<div class="row">';
			foreach($products->products as $product){
			echo '<div class="col-md-3">';
			echo '<img src="'.$product->featured_src.'" class="img-fluid">';
			echo '<h4>'.$product->title.'</h4>';
			echo '<h5>'.$product->price.'</h5>';
			echo '</div>';
			}
			echo '</div>';
			echo '</div>';


		}else{
			$dd = array(
				'style' => 'width:300px; margin:50px auto; text-align:center'
			);
			echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">';
			echo '<h1 style="text-align:center">Import Product from Wordpress</h1>';
			// echo '<form style="width:300px; margin:50px auto;" class="text-center" method="post">';
			echo form_open(base_url(uri_string()),$dd);
			echo '<div class="form-group">';
			echo '<label for="exampleInputEmail1">Enter Category Slug</label>';
			echo '<input type="text" name="slug" class="form-control">';
			echo '</div>';
			echo '<div class="form-group">';
			echo '<button type="submit" class="btn btn-primary">Get Products</button>';
			echo '</div>';
			echo '</form>';
		}
		// echo $return;

	}


	function wooProd2()
	{
		// Setup API credentials
		$params = array(
			"key" => "ck_413081d9d7d5b03b2ab3fa47380fa0d11de069bc", // Add your own Consumer Key here
			"secret" => "cs_675b152f525e29ac0b5484aaf138f30bfbccd938", // Add your own Consumer Secret here
			"url" => "https://intercel.com.au", // Add the home URL to the store you want to connect to here
			"is_ssl" => TRUE, // TRUE if this store uses SSL (optional)
		);


		// Initialize the class
		$this->load->library('WooCommerce',$params);
		$products = $this->woocommerce->get_products_by_category(array("filter[category]"=>$sslud));

		// foreach($categories as $cat){
		// 	echo "id: ".$cat->id.", name: ".$cat->name.", parent: ".$cat->parent."<br>";
		// }

		echo "<pre>";
		print_r($products);
		echo "</pre>";
		// if($products){
		// 	foreach($products->products as $product){
		// 		echo $product->title."<br>";
		// 	}
		// }
	}
	
	/**
	 * view_cart
	 * View and manage the contents of the cart.
	 */ 
	function view_cart() 
	{
		// print_r($this->session->userdata("flexi_cart"));
		// die();
		// Update cart contents and settings.
		if ($this->input->post('update'))
		{
			$this->update_cart();

		}
		// Update discount codes.
		else if ($this->input->post('update_discount'))
		{
			$this->update_discount_codes();
		}
		// Remove discount code.
		else if ($this->input->post('remove_discount_code'))
		{
			$this->remove_discount_code();
		}
		// Remove all discount codes.
		else if ($this->input->post('remove_all_discounts'))
		{
			$this->remove_all_discounts();
		}
		// Clear / Empty cart contents.
		else if ($this->input->post('clear'))
		{
			$this->clear_cart();
		}
		// Destroy all cart items and settings and reset to default settings.
		else if ($this->input->post('destroy'))
		{
			$this->destroy_cart();
		}
		// Navigate to checkout page.
		else if ($this->input->post('checkout'))
		{
			// Check if order surpasses the required minimum order value.
			if ($this->flexi_cart->minimum_order_status() && $this->flexi_cart->location_shipping_status(FALSE))
			{
				// Minimum order value has been reached, proceed to the checkout page.
				if($this->session->userdata("logged_in")==1){
					$checkoutlink = "checkout/";
				}else{
					if(GUEST_CHECKOUT){$checkoutlink = "checkout/";
					}else{$checkoutlink = "login/";}
				}
				redirect(base_url($checkoutlink));

			}

			// Minimum order value has not been reached, set a custom error message notifying the user.			
			if (! $this->flexi_cart->minimum_order_status())
			{
				$this->flexi_cart->set_error_message('The minimum order value of '.$this->flexi_cart->minimum_order().' has not been reached.', 'public');
			}
			
			// There are no items in the cart that can currently be shipped to the current shipping location, set a custom error message notifying the user.
			if (! $this->flexi_cart->location_shipping_status(FALSE))
			{
				$this->flexi_cart->set_error_message('There are no items in the cart that can currently be shipped to the current shipping location.', 'public');
			}
				
			// Set a message to the CI flashdata so that it is available after the page redirect.
			$this->session->set_flashdata('message', $this->flexi_cart->get_messages());
			
			redirect('cart');
		}

		###+++++++++++++++++++++++++++++++++###
		
		// Get required data on cart items, discounts and surcharges to display in the cart.
		$this->data['cart_items'] = $this->flexi_cart->cart_items(); 
		$this->data['reward_vouchers'] = $this->flexi_cart->reward_voucher_data();
		$this->data['discounts'] = $this->flexi_cart->summary_discount_data();
		$this->data['surcharges'] = $this->flexi_cart->surcharge_data();

		###+++++++++++++++++++++++++++++++++###

		// This example shows how to lookup countries, states and post codes that can be used to calculate shipping rates.
		$sql_select = array($this->flexi_cart->db_column('locations', 'id'), $this->flexi_cart->db_column('locations', 'name')); 	
		$this->data['countries'] = $this->flexi_cart->get_shipping_location_array($sql_select, 0);
		$this->data['states'] = $this->flexi_cart->get_shipping_location_array($sql_select, 1);
		$this->data['postal_codes'] = $this->flexi_cart->get_shipping_location_array($sql_select, 2);
		$this->data['shipping_options'] = $this->flexi_cart->get_shipping_options(); 
		
		// Uncomment the lines below to use the manual shipping example. Read more below.
		# $this->load->model('demo_cart_model');
		# $this->data['shipping_options'] = $this->demo_cart_model->demo_manual_shipping_options(); 
		
		/**
		 * By default, this demo is setup to show how to implement shipping rates with a database.
		 * In the 2 steps below is an example showing how to manually set and define shipping options and rates.
		 *
		 * To use this example follow these steps:
		 * #1: Replace the four "$this->data" arrays set above with "$this->data['shipping_options'] = $this->demo_cart_model->demo_manual_shipping_options();".
		 * #2: Set "$config['database']['shipping_options']['table']" and "$config['database']['shipping_rates']['table']" to FALSE via the config file.
		*/
		
		###+++++++++++++++++++++++++++++++++###
		
		// Get any status message that may have been set.
		$this->data['message'] = $this->session->flashdata('message');	

		$headdata['beforeheads'] = getMeta("cart",0);
		$footerdata['footer'] = "";

        $bannerdata['title'] = "Cart Page";

        $bannerdata['brudcrumb'] = "";

        $bannerdata['banner'] = base_url("files/frontend/images/about-P-bg.jpg");

        $this->data['head'] = $this->load->view('includes/head', $headdata, TRUE);

        $this->data['header'] = $this->load->view('includes/header', NULL, TRUE);

        $this->data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);

        $this->data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
		$this->data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);

		$this->load->view('cart', $this->data);
	}
		
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// CART CONTROLS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	/**
	 * update_cart
	 * Gets the carts item and shipping data from form inputs, and updates the cart.
	 * The view cart page uses AJAX to seamlessly update values in the cart without reloading the page.
	 * This function is accessed from the 'View Cart' page via a form input field named 'update'.
	 */ 
	function update_cart()
	{
		// Load custom demo function to retrieve data from the submitted POST data and update the cart.
		$this->load->model('demo_cart_model');
		$this->demo_cart_model->demo_update_cart();
		
		// If the cart update was posted by an ajax request, do not perform a redirect.
		if (! $this->input->is_ajax_request())
		{
			// Set a message to the CI flashdata so that it is available after the page redirect.
			$this->session->set_flashdata('message', $this->flexi_cart->get_messages());
					
			redirect('cart');
		}
	}

	/**
	 * delete_item
	 * Deletes and item from the cart using the '$row_id' supplied via the url link.
	 * This function is accessed from the 'View Cart' page via an items 'Remove' link.
	 */ 
	function delete_item($row_id = FALSE) 
	{
		// The 'delete_items()' function can accept an array of row_ids to delete more than one row at a time.
		// However, this example only uses the 1 row_id that was supplied via the url link.
		$this->flexi_cart->delete_items($row_id);
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());

		redirect('cart');		
	}
	
	/**
	 * clear_cart
	 * Clears (Empties) all item, discount and surcharge data from the cart.
	 * This function is accessed from the 'View Cart' page via a form input field named 'clear'.
	 */ 
	function clear_cart()
	{
		// The 'empty_cart()' function allows an argument to be submitted that will also reset all shipping data if 'TRUE'.
		$this->flexi_cart->empty_cart(TRUE);

		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());

		redirect('cart');
	}
	
	/**
	 * destroy_cart
	 * Destroys all cart items and settings and resets cart to its default settings.
	 * This function is accessed from the 'View Cart' page via a form input field named 'destroy'.
	 */ 
	function destroy_cart()
	{
		$this->flexi_cart->destroy_cart();

		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());
		
		redirect('cart');
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// INSERT ITEMS TO CART
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * insert_link_item_to_cart
	 * Inserts an item to the cart from the 'Add items to cart via a link' page.
	 * The settings for each item are defined via the custom demo function 'demo_insert_link_item_to_cart()'.
	 */ 
	function insert_link_item_to_cart($item_id = 0)
	{
		$this->load->model('demo_cart_model');
		
		$this->demo_cart_model->demo_insert_link_item_to_cart($item_id);

		redirect('cart');		
	}

	/**
	 * insert_form_item_to_cart
	 * Inserts an item to the cart from the 'Add items to cart via a form' page.
	 * The settings for each item are defined via the custom demo function 'demo_insert_form_item_to_cart()'.
	 */ 
	function insert_form_item_to_cart($item_id = 0)
	{
		$this->load->model('demo_cart_model');
		$this->demo_cart_model->demo_insert_form_item_to_cart($item_id);
		// echo "After everything";
		// echo "<hr><div>";
		// print_r($this->session->userdata('flexi_cart'));
		// echo "</div><hr>";
		$this->session->set_flashdata("success", "Item Successfully Added To Cart");
		redirect($_SERVER['HTTP_REFERER']);
	}

	/**
	 * insert_ajax_link_item_to_cart
	 * Inserts an item to the cart via a link from the 'Add Item to Cart via Ajax' page.
	 * The settings for each item are defined via the custom demo function 'demo_insert_ajax_link_item_to_cart()'.
	 */ 
	function insert_ajax_link_item_to_cart($item_id = 0)
	{
		$this->load->model('demo_cart_model');
		
		$this->demo_cart_model->demo_insert_ajax_link_item_to_cart($item_id);

		redirect('cart');		
	}

	/**
	 * insert_ajax_form_item_to_cart
	 * Inserts an item to the cart via a form from the 'Add Item to Cart via Ajax' page.
	 * The settings for each item are defined via the custom demo function 'demo_insert_ajax_form_item_to_cart()'.
	 */ 
	function insert_ajax_form_item_to_cart()
	{
		$this->load->model('demo_cart_model');
		
		$this->demo_cart_model->demo_insert_ajax_form_item_to_cart();

		redirect('cart');		
	}

	/**
	 * insert_discount_item_to_cart
	 * Inserts an item to the cart from the 'Add discount items to cart' page.
	 * The settings for each item are defined via the custom demo function 'demo_insert_discount_item_to_cart()'.
	 */ 
	function insert_discount_item_to_cart($item_id = 0) 
	{
		$this->load->model('demo_cart_model');
		
		$this->demo_cart_model->demo_insert_discount_item_to_cart($item_id);
		
		redirect('cart');		
	}
	
	/**
	 * insert_database_item_to_cart
	 * Inserts an item to the cart from the 'Add database items to cart' page.
	 * The settings for each item are defined via the custom demo function 'demo_insert_database_item_to_cart()'.
	 */ 
	function insert_database_item_to_cart($item_id = 0)
	{
		$this->load->model('demo_cart_model');
		
		$this->demo_cart_model->demo_insert_database_item_to_cart($item_id);
		
		redirect('cart');		
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// DISCOUNTS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * update_discount_codes
	 * Updates all discount codes that have been submitted to the cart.
	 * This function is accessed from the 'View Cart' page via a form input field named 'update_discount'.
	 */ 
	function update_discount_codes()
	{
		// Get the discount codes from the submitted POST data.
		$discount_data = $this->input->post('discount');
		
		// The 'update_discount_codes()' function will validate each submitted code and apply the discounts that have activated their quantity and value requirements.
		// Any previously set codes that have now been set as blank (i.e. no longer present) will be removed.
		// Note: Only 1 discount can be applied per item and per summary column. 
		// For example, 2 discounts cannot be applied to the summary total, but 1 discount could be applied to the shipping total, and another to the summary total.
		$this->flexi_cart->update_discount_codes($discount_data);
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());

		redirect('cart');
	}

	/**
	 * set_discount
	 * Set a manually defined discount to the cart, rather than using the discount database table.
	 * This function is accessed from the 'Discounts / Surcharges' page.
	 * The settings for each discount are defined via the custom demo function 'demo_set_discount()'.
	 */ 
	function set_discount($discount_id = FALSE)
	{
		$this->load->model('demo_cart_model');
		
		$this->demo_cart_model->demo_set_discount($discount_id);
		
		redirect('cart');
	}
	
	/**
	 * remove_discount_code
	 * Removes a specific discount code from the cart.
	 * This function is accessed from the 'View Cart' page via a form input field named 'remove_discount_code'.
	 */ 
	function remove_discount_code()
	{
		// This examples gets the discount code from the array key of the submitted POST data.
		$discount_code = key($this->input->post('remove_discount_code'));

		// The 'unset_discount()' function can accept an array of either discount ids or codes to delete more than one discount at a time.
		// Alternatively, if no data is submitted, the function will delete all discounts that are applied to the cart.
		// This example uses the 1 discount code that was supplied via the POST data.
		$this->flexi_cart->unset_discount($discount_code);
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());

		redirect('cart');
	}
	
	/**
	 * remove_all_discounts
	 * Removes all discounts from the cart, including discount codes, manually applied discounts and reward vouchers.
	 * This function is accessed from the 'View Cart' page via a form input field named 'remove_all_discounts'.
	 */ 
	function remove_all_discounts()
	{
		// The 'unset_discount()' function can accept an array of either discount ids or codes to delete more than one discount at a time.
		// Alternatively, if no data is submitted, the function will delete all discounts that are applied to the cart.
		// This example removes all discount data.
		$this->flexi_cart->unset_discount();		
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());

		redirect('cart');
	}

	/**
	 * unset_discount
	 * Removes a specific active item or summary discount from the cart.
	 * This function is accessed from the 'View Cart' page via a 'Remove' link located in the description of an active discount.
	 */ 
	function unset_discount($discount_id = FALSE)
	{
		// The 'unset_discount()' function can accept an array of either discount ids or codes to delete more than one discount at a time.
		// Alternatively, if no data is submitted, the function will delete all discounts that are applied to the cart.
		// This example uses the 1 discount id that was supplied via the url link.
		$this->flexi_cart->unset_discount($discount_id);

		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());
		
		redirect('cart');
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// SURCHARGES
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * set_surcharge
	 * Set a manually defined surcharge to the cart.
	 * This function is accessed from the 'Discounts / Surcharges' page.
	 * The settings for each surcharge are defined via the custom demo function 'demo_set_surcharge()'.
	 */ 
	function set_surcharge($surcharge_id = FALSE)
	{
		$this->load->model('demo_cart_model');
		
		$this->demo_cart_model->demo_set_surcharge($surcharge_id);
		
		redirect('cart');
	}

	/**
	 * unset_surcharge
	 * Removes a specific surcharge from the cart.
	 * This function is accessed from the 'View Cart' page via a 'Remove' link located in the description of a surcharge.
	 */ 
	function unset_surcharge($surcharge_id = FALSE)
	{
		// The 'unset_surcharge()' function can accept an array of surcharge ids to delete more than one surcharge at a time.
		// Alternatively, if no data is submitted, the function will delete all surcharges that are applied to the cart.
		// This example uses the 1 surcharge id that was supplied via the url link.
		$this->flexi_cart->unset_surcharge($surcharge_id);
		
		redirect('cart');
	}	
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// CART GUEST CHECKOUT
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	
	/**
	 * GUEST checkout
	 * The example 'Checkout' page collects the users billing, shipping and contact details, before the user confirms their order.
	 * Note: As this is only a demo, the checkout page does not connect to a online payment gateway to process the order transaction.
	 * Therefore, when the user data is submitted, it transfers directly to the 'Checkout Complete' page.
	 */ 
	function proceedPayment($oid,$cemail)
	{
        log_message('DEBUG', 'step3 completed');
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// die();
        $payment_data = $this->input->post('checkout');
        $payment_id = $payment_data['payment']['id'];
        $payment_db_data = $this->paymentModel->get_single_payment($payment_id);
		if($payment_id==0){// Credit Account
			//echo "Bank Transfer(".$oid."-".$cemail.")<br>";
			$sql_update = array(
                'payment_type' => 0,
                'txn_id' => null,
                'total_paid' => 0.00,
                'payer_email' => null,
                'payment_status' => null,
                'ord_status' => 1,
                'paypal_status' => null
            );
			$sql_where = array('ord_order_number' => $oid);
			$this->load->library('flexi_cart_admin');
			if($this->flexi_cart_admin->update_db_table_data("order_summary", $sql_update, $sql_where)){
				$this->checkout_complete($oid,$cemail,$payment_id);
			}else{
				log_message('ERROR', 'Credit payment return failed(database add data error)');
			}
		}elseif($payment_id==1){// Direct Bank Transfer
			//echo "Bank Transfer(".$oid."-".$cemail.")<br>";
			$sql_update = array(
				'payment_type' => 1,
				'txn_id' => null,
				'total_paid' => 0.00,
				'payer_email' => null,
				'payment_status' => null,
				'ord_status' => 1,
				'paypal_status' => null
			);
			$sql_where = array('ord_order_number' => $oid);
			$this->load->library('flexi_cart_admin');
			if($this->flexi_cart_admin->update_db_table_data("order_summary", $sql_update, $sql_where)){
				$this->checkout_complete($oid,$cemail,$payment_id);
			}else{
				log_message('ERROR', 'Bank transfer payment return failed(database add data error)');
			}
		}elseif($payment_id==2){// Paypal
            log_message('DEBUG', 'step5 completed');
			$sql_update = array(
				'payment_type' => 2,
			);
			$sql_where = array('ord_order_number' => $oid);
			$this->load->library('flexi_cart_admin');
			if($this->flexi_cart_admin->update_db_table_data("order_summary", $sql_update, $sql_where)){
				log_message('DEBUG', 'Paypal payment start added)');
			}else{
				log_message('ERROR', 'Paypal payment start Error)');
			}
			$this->load->library('paypal_lib');
			$returnURL = base_url().'checkout-complete/'.$oid.'/'; //payment success url
			$cancelURL = base_url().'paypal/cancel/'.$oid.'/'; //payment cancel url
			$notifyURL = base_url().'paypal-ipn/'; //ipn url
			$logo = base_url().'files/frontend/images/logo.png';
			$this->paypal_lib->add_fieldd('return', $returnURL);
			$this->paypal_lib->add_fieldd('cancel_return', $cancelURL);
			$this->paypal_lib->add_fieldd('notify_url', $notifyURL);
			$this->paypal_lib->add_fieldd('custom', $oid.':'.$cemail);
			$this->paypal_lib->add_fieldd('item_name', "Total products cost");
			
			$total = $this->flexi_cart->total(TRUE,FALSE);
		
			$discountvalue = 7.5/100*$total;
			$final_total = $total - $discountvalue;
			$final_total = round($final_total,1);
			$this->paypal_lib->add_fieldd('amount',  $final_total);
			$this->paypal_lib->image($logo);
			//$this->paypal_lib->dump();
            log_message('DEBUG', 'step6 completed');
			$this->paypal_lib->paypal_auto_form();
			$this->flexi_cart->destroy_cart();
			die();
		}elseif($payment_id==3){// Stripe
			//echo "Stripe here(".$oid."-".$cemail.")<br>";
			require_once(APPPATH.'libraries/stripe/init.php');
			if($payment_db_data->is_live==1){
				$api_secret = $payment_db_data->api_secret;
			}else{
				$api_secret = 'sk_test_A86RuZMZNJsrMSW2lSffZAL400wr3EmGeB';
			}
			$cardholdername = $payment_data['billing']['name'];
			$cardnumber = $payment_data['payment'][3]['cardnumber'];
			$cardexpm = $payment_data['payment'][3]['cardexm'];
			$cardexpy = $payment_data['payment'][3]['cardexy'];
			$cardcvc = $payment_data['payment'][3]['cardcvc'];
			$stripesuccess = 0;
			$stripeerror = array();
			\Stripe\Stripe::setApiKey($api_secret);

			try {
				// Use Stripe's library to make requests...
				$rrresult = \Stripe\Token::create([
					'card' => [
						'name' => $cardholdername,
						'number' => $cardnumber,
						'exp_month' => $cardexpm,
						'exp_year' => $cardexpy,
						'cvc' => $cardcvc,
					],
				]);
				$stripesuccess = 1;
				$stripetoken = $rrresult['id'];
				//echo "stripe token: ".$stripetoken;
			  } catch(\Stripe\Exception\CardException $e) {
				// Since it's a decline, \Stripe\Exception\CardException will be caught
				$stripeerror[0] = $e->getError()->message;
			  } catch (\Stripe\Exception\RateLimitException $e) {
				// Too many requests made to the API too quickly
				$stripeerror[1] = $e->getError()->message;
			  } catch (\Stripe\Exception\InvalidRequestException $e) {
				// Invalid parameters were supplied to Stripe's API
				$stripeerror[2] = $e->getError()->message;
			  } catch (\Stripe\Exception\AuthenticationException $e) {
				// Authentication with Stripe's API failed (maybe you changed API keys recently)
				$stripeerror[3] = $e->getError()->message;
			  } catch (\Stripe\Exception\ApiConnectionException $e) {
				// Network communication with Stripe failed
				$stripeerror[4] = $e->getError()->message;
			  } catch (\Stripe\Exception\ApiErrorException $e) {
				// Display a very generic error to the user, and maybe send yourself an email
				$stripeerror[5] = $e->getError()->message;
			  } catch (Exception $e) {
				// Something else happened, completely unrelated to Stripe
				$stripeerror[6] = $e->getError()->message;
			  }


			if($stripesuccess != 1){
				foreach($stripeerror as $stripeerr){
					if($stripeerr != ""){
						$this->session->set_flashdata('message', '<p class="error_msg">'.$stripeerr.'</p>');
					}
				}
			}else{
				$stripe2success = 0;
				$stripe2error = array();
				try {
					// Use Stripe's library to make requests...
					$charge = \Stripe\Charge::create ([
						"amount" => $this->flexi_cart->total(TRUE,FALSE) * 100,
						"currency" => "aud",
						"source" => $stripetoken,
						"description" => "website payment, ORD#".$oid 
					]);
					$stripe2success = 1;
				  } catch(\Stripe\Exception\CardException $e) {
					// Since it's a decline, \Stripe\Exception\CardException will be caught
					$stripe2error[0] = $e->getError()->message;
				  } catch (\Stripe\Exception\RateLimitException $e) {
					// Too many requests made to the API too quickly
					$stripe2error[1] = $e->getError()->message;
				  } catch (\Stripe\Exception\InvalidRequestException $e) {
					// Invalid parameters were supplied to Stripe's API
					$stripe2error[2] = $e->getError()->message;
				  } catch (\Stripe\Exception\AuthenticationException $e) {
					// Authentication with Stripe's API failed (maybe you changed API keys recently)
					$stripe2error[3] = $e->getError()->message;
				  } catch (\Stripe\Exception\ApiConnectionException $e) {
					// Network communication with Stripe failed
					$stripe2error[4] = $e->getError()->message;
				  } catch (\Stripe\Exception\ApiErrorException $e) {
					// Display a very generic error to the user, and maybe send yourself an email
					$stripe2error[5] = $e->getError()->message;
				  } catch (Exception $e) {
					// Something else happened, completely unrelated to Stripe
					$stripe2error[6] = $e->getError()->message;
				  }

				if($stripe2success != 1){
					foreach($stripeerror as $stripeerr){
						if($stripeerr != ""){
							$this->session->set_flashdata('message', '<p class="error_msg">'.$stripeerr.'</p>');
						}
					}
				}else{
					$sql_update = array(
						'payment_type' => 3,
						'txn_id' => $charge->balance_transaction,
						'total_paid' => $charge->amount/100,
						'payer_email' => null,
						'payment_status' => "Completed",
						'ord_status' => 2,
						'paypal_status' => $charge->status,
						'payment_data' => json_encode($charge)
					);
					$sql_where = array('ord_order_number' => $oid);
					$this->load->library('flexi_cart_admin');
					if($this->flexi_cart_admin->update_db_table_data("order_summary", $sql_update, $sql_where)){
						$this->checkout_complete($oid,$cemail,$payment_id);
					}else{
						log_message('ERROR', 'Stripe payment return failed(database add data error)');
					}




				}
			}
			
			//$this->checkout_complete($oid,$cemail,$payment_id);
		}elseif($payment_id==4){// eWay
            log_message('DEBUG', 'Step4 is completed.');
		    require_once(APPPATH.'libraries/eway-rapid/include_eway.php');
            log_message('DEBUG', 'Step5 is completed.');
			if($payment_db_data->is_live==1){
                log_message('DEBUG', 'Step6 is completed.');
				$api_key = $payment_db_data->api_key;
				$api_password = $payment_db_data->api_password;
				$apiEndpoint = \Eway\Rapid\Client::MODE_PRODUCTION;
				$apicheck = "Live";
			}else{
                log_message('DEBUG', 'Step7 is completed.');
				$api_key = '60CF3CjW7giMLyjqblKMsotGjU3Tfifph13px6BU3qBNzE0bWC/xzT4usVAVk1BjUCprhH';
				$api_password = 'mNALBckn';
				$apiEndpoint = \Eway\Rapid\Client::MODE_SANDBOX;
				$apicheck = "SANDBOX";
			}

			$client = \Eway\Rapid::createClient($api_key, $api_password, $apiEndpoint);
            log_message('DEBUG', 'Step8 is completed.');
			$fullname = $payment_data['billing']['name'];
			if (strpos($fullname, ' ') !== false) {
				$xsp = explode(" ",$fullname,2);
				$firstname = $xsp[0];
				$lastname = $xsp[1];
			}else{
				$firstname = $fullname;
				$lastname = null;
			}
			$cardnumber = str_replace("-","",$payment_data['payment'][4]['cardnumber']);
			$cardexpm = $payment_data['payment'][4]['cardexm'];
			$cardexpyy = $payment_data['payment'][4]['cardexy'];
			$cardexpy = substr($cardexpyy, -2);
			$cardcvc = $payment_data['payment'][4]['cardcvc'];
            log_message('DEBUG', 'Step9 is completed.');
			$transaction = [
				'Customer' => [
					'FirstName' => $firstname,
					'LastName' => $lastname,
					'CompanyName' => $payment_data['billing']['company'],
					'Street1' => $payment_data['billing']['add_01'],
					'Street2' => $payment_data['billing']['add_02'],
					'City' => $payment_data['billing']['city'],
					'State' => $payment_data['billing']['state'],
					'Country' => strtolower(getValuee("iso2","countries","name",$payment_data['billing']['country'])),
					'PostalCode' => $payment_data['billing']['post_code'],
					'Phone' => $payment_data['phone'],
					'Email' => $payment_data['email'],
					'CardDetails' => [
						'Name' => $fullname,
						'Number' => $cardnumber,
						'ExpiryMonth' => $cardexpm,
						'ExpiryYear' => $cardexpy,
						'CVN' => $cardcvc,
					]
				],
				'Payment' => [
					'TotalAmount' => $this->flexi_cart->total(TRUE,FALSE) * 100,
					'InvoiceNumber' => 'ORD/INV# '.$oid,
					'InvoiceDescription' => 'website total payment',
					'InvoiceReference' => $oid,
					'CurrencyCode' => 'AUD',
				],
				'TransactionType' => \Eway\Rapid\Enum\TransactionType::PURCHASE,
				'Capture' => true,
			];
            log_message('DEBUG', 'Step10 is completed.');
			$response = $client->createTransaction(\Eway\Rapid\Enum\ApiMethod::DIRECT, $transaction);
//			echo '<pre>';
//			print_r($response);
//			echo '</pre>';
//			die();
            log_message('DEBUG', 'Step11 is completed.');
			if ($response->TransactionStatus) {
                log_message('DEBUG', 'Step12 is completed.');
				$sql_update = array(
					'payment_type' => 4,
					'txn_id' => $response->TransactionID,
					'total_paid' => $response->Payment->TotalAmount/100,
					'payer_email' => null,
					'payment_status' => "Completed",
					'ord_status' => 2,
					'paypal_status' => "yes",
					'payment_data' => json_encode($response)
				);
				$sql_where = array('ord_order_number' => $oid);
				$this->load->library('flexi_cart_admin');
				if($this->flexi_cart_admin->update_db_table_data("order_summary", $sql_update, $sql_where)){
					$this->checkout_complete($oid,$cemail,$payment_id);
				}else{
					log_message('ERROR', 'eWay payment return failed(database add data error)');
				}
			} else {
                log_message('DEBUG', 'Step13 is completed.');
				if ($response->getErrors()) {
					foreach ($response->getErrors() as $error) {
						$this->session->set_flashdata('message', '<p class="error_msg">Error: '.\Eway\Rapid::getMessage($error).'</p>');
					}
				} else {
					$this->session->set_flashdata('message', '<p class="error_msg">Sorry, your payment was declined</p>');
				}
                redirect(base_url('checkout/'));
			}
		}elseif($payment_id==5){// Invoice Me
			//echo "Bank Transfer(".$oid."-".$cemail.")<br>";
			$sql_update = array(
				'payment_type' => 5,
				'txn_id' => null,
				'total_paid' => 0.00,
				'payer_email' => null,
				'payment_status' => null,
				'ord_status' => 1,
				'paypal_status' => null
			);
			$sql_where = array('ord_order_number' => $oid);
			$this->load->library('flexi_cart_admin');
			if($this->flexi_cart_admin->update_db_table_data("order_summary", $sql_update, $sql_where)){
				$this->checkout_complete($oid,$cemail,$payment_id);
			}else{
				log_message('ERROR', 'Bank transfer payment return failed(database add data error)');
			}
		}
	}


    function proceedPaymentTesting($oid,$cemail,$paymentid=0)
    {
        log_message('DEBUG', 'step3 completed');
        if($paymentid == 0) {
            $payment_data = $this->input->post('checkout');
            $payment_id = $payment_data['payment']['id'];
        }else{
            $payment_id = $paymentid;
            log_message('DEBUG', 'step4 completed');
        }
        $payment_db_data = $this->paymentModel->get_single_payment($payment_id);
        if($payment_id==2){// Paypal
            log_message('DEBUG', 'step5 completed');
            $this->load->library('paypal_lib');
            $returnURL = base_url().'checkout-complete/'.$oid.'/'; //payment success url
            $cancelURL = base_url().'paypal/cancel/'.$oid.'/'; //payment cancel url
            $notifyURL = base_url().'paypal-ipn/'; //ipn url
            $logo = base_url().'files/frontend/images/logo.png';
            $this->paypal_lib->add_fieldd('return', $returnURL);
            $this->paypal_lib->add_fieldd('cancel_return', $cancelURL);
            $this->paypal_lib->add_fieldd('notify_url', $notifyURL);
            $this->paypal_lib->add_fieldd('custom', $oid.':'.$cemail);
            $this->paypal_lib->add_fieldd('item_name', "Total products cost");
            log_message('DEBUG', 'step5 completed');
            $this->paypal_lib->add_fieldd('amount',  $this->flexi_cart->total(TRUE,FALSE));
            $this->paypal_lib->image($logo);
            log_message('DEBUG', 'step6 completed');
            //$this->paypal_lib->dump();
            log_message('DEBUG', 'step7 completed');
            $this->paypal_lib->paypal_auto_form();
            $this->flexi_cart->destroy_cart();
            log_message('DEBUG', 'step8 completed');
            die();
        }
    }



	
	function paypal_ipn()
	{
		$this->load->library('paypal_lib');
		//paypal return transaction details array
		$paypalInfo    = $this->input->post();
		$paypalURL = $this->paypal_lib->paypal_url;        
		$result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
		file_put_contents(UPLOADPATH.'younow.txt', json_encode($paypalInfo));
		file_put_contents(UPLOADPATH.'younow2.txt', json_encode($result));
		$return_custom = explode(':',$paypalInfo['custom']);
		$order_number = $return_custom[0];
		$usersendemail = $return_custom[1];
		if($paypalInfo["payment_status"]=="Pending"){
			$paymentpendingreason = $paypalInfo["pending_reason"];
		}else{
			$paymentpendingreason = NULL;
		}
		$sql_update = array(
			'payment_type' => 2,
			'txn_id' => $paypalInfo["txn_id"],
			'total_paid' => $paypalInfo["mc_gross"],
			'payer_email' => $paypalInfo["payer_email"],
			'payment_status' => $paypalInfo["payment_status"],
			'ord_status' => 2,
			'paypal_status' => $result,
			'pending_reason' => $paymentpendingreason,
			'payment_data' => json_encode($paypalInfo)
		);
		$sql_where = array('ord_order_number' => $order_number);

		$this->load->library('flexi_cart_admin');

		if($this->flexi_cart_admin->update_db_table_data("order_summary", $sql_update, $sql_where)){
		    $this->send_email_to_user($order_number,$usersendemail);
			log_message('DEBUG', 'Paypal IPN data updated');
		}else{
			log_message('ERROR', 'Paypal IPN data not updated');
		}

	}


    function orderPayLater()
    {
        $this->load->helper('security');
        $order_number = sanitize($this->input->post('invoice',TRUE));
        $email = sanitize($this->input->post('email',TRUE));
        $captcha = sanitize($this->input->post('captcha',TRUE));
        if($order_number ==""){
            $formnotice["errors"] = array("Invoice number is Required!");
            $this->session->set_userdata('formnotice', $formnotice);
            redirect(base_url('pay-online'));
            return false;
        }
        if($email ==""){
            $formnotice["errors"] = array("Email address is Required!");
            $this->session->set_userdata('formnotice', $formnotice);
            redirect(base_url('pay-online'));
            return false;
        }
        if($captcha ==""){
            $formnotice["errors"] = array("Captcha is Required!");
            $this->session->set_userdata('formnotice', $formnotice);
            redirect(base_url('pay-online'));
            return false;
        }
        if($captcha != $this->session->userdata('captcha')){
            $formnotice["errors"] = array("Invalid Captcha");
            $this->session->set_userdata('formnotice', $formnotice);
            redirect(base_url('pay-online'));
            return false;
        }
        if (strpos($order_number, '-') !== false) {
            $orderParts = explode("-", $order_number);
            $invoice = $orderParts[1];
        }else{
            $invoice = $order_number;
        }
        $sql_where = array("ord_order_number" => $invoice);
        $order_query = $this->db->get_where('order_summary', $sql_where);
        if ($order_query->num_rows() == 1){
            log_message('DEBUG', 'step1 completed');
            $orderSummaryData = $order_query->row_array();
            $cemail = $orderSummaryData['ord_demo_email'];
            $payment_type = $orderSummaryData['payment_type'];
            $cart_id = $orderSummaryData['ord_cart_data_fk'];
            $paymentStatus = $orderSummaryData['payment_status'];
            if($email != $cemail){
                $formnotice["errors"] = array("Email not found in our records!");
                $this->session->set_userdata('formnotice', $formnotice);
                log_message('DEBUG', 'Email not found in our records!');
                redirect(base_url('pay-online'));
                return false;
            }
            if($payment_type != 2){
                $formnotice["errors"] = array("Only Paypal payment method allowed!");
                $this->session->set_userdata('formnotice', $formnotice);
                log_message('DEBUG', 'Only Paypal payment method allowed!');
                redirect(base_url('pay-online'));
                return false;
            }
            if($paymentStatus == "Completed"){
                $formnotice["errors"] = array("This order is already Paid!");
                $this->session->set_userdata('formnotice', $formnotice);
                log_message('DEBUG', 'This order is already Paid!');
                redirect(base_url('pay-online'));
                return false;
            }

            log_message('DEBUG', 'step2 completed');
            $this->just_load_cart_data($cart_id);
            $this->proceedPaymentTesting($invoice, $cemail,$payment_type);
            return true;
        }else{
            $formnotice["errors"] = array("Invalid Invoice Number!");
            $this->session->set_userdata('formnotice', $formnotice);
            log_message('DEBUG', 'Invalid Invoice Number!');
            redirect(base_url('pay-online'));
            return false;
        }
    }


	function checkout()
	{
		$this->load->model('demo_cart_model');

		// Check whether the cart is empty using the 'cart_status()' function and redirect the user away if necessary.
		if (! $this->flexi_cart->cart_status())
		{
			$this->flexi_cart->set_error_message('You must add an item to the cart before you can checkout.', 'public');
			// Set a message to the CI flashdata so that it is available after the page redirect.
			$this->session->set_flashdata('message', $this->flexi_cart->get_messages());
			redirect('cart');
		}
		
		// Check whether the user has submitted their details and that the information is valid.
		// The custom demo function 'demo_save_order()' validates the data using CI's validation library and then saves the cart to the database using the 'save_order()' function.
		// If the data is saved successfully, the user is redirected to the 'Checkout Complete' page.
		if ($this->input->post('checkout'))
		{	
			// echo "<pre>";
			// print_r($_POST['checkout']['captcha']);
			// echo "</pre>";
			// echo "<pre>";
			// print_r($this->session->userdata('captcha'));
			// echo "</pre>";
			// die();
			$response = $this->demo_cart_model->demo_save_order();
			// Set a message to the CI flashdata so that it is available after the page redirect.
			$this->session->set_flashdata('message', $this->flexi_cart->get_messages());
			// Check that the order saved correctly.
			if ($response)
			{
				// Attach the saved order number to the redirect url.
				//redirect(base_url('checkout-complete/'.$this->flexi_cart->order_number()));
				$this->proceedPayment($this->flexi_cart->order_number(),$response);
				return false;
			}else{
			$this->session->set_flashdata('message', '<p class="status_msg">Something wrong please try again</p>');
			}
		}

		// Get all countries to list via a select menu as countries the user can be 'Billed to'.
		// In this example, the 'Shipped to' country is fixed by the shipping location and option they selected via the 'View Cart' page.
		$sql_select = array($this->flexi_cart->db_column('locations', 'id'), $this->flexi_cart->db_column('locations', 'name'));		
		$this->data['countries'] = $this->flexi_cart->get_shipping_location_array($sql_select, 0); 

		$this->data['payments'] = $this->paymentModel->get_front_payments(); 
		$this->data['cart_items'] = $this->flexi_cart->cart_items(); 
		$this->data['reward_vouchers'] = $this->flexi_cart->reward_voucher_data();
		$this->data['discounts'] = $this->flexi_cart->summary_discount_data();
		$this->data['surcharges'] = $this->flexi_cart->surcharge_data();
		// Get any status message that may have been set.
		$this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
		$headdata['beforeheads'] = getMeta("cart",0);
		$footerdata['footer'] = "";
        $bannerdata['title'] = "Cart Page";
        $bannerdata['brudcrumb'] = "";
		$bannerdata['banner'] = base_url("files/frontend/images/about-P-bg.jpg");
		if(!$this->is_logged_in()){
		$this->data['loginuser'] = false;
		}else{
		$this->data['loginuser'] = true;
		}
		$formdd['return_page'] = "checkout/";
        $this->data['loginform'] = $this->load->view('user/login', $formdd, TRUE);
        $this->data['head'] = $this->load->view('includes/head', $headdata, TRUE);
        $this->data['header'] = $this->load->view('includes/header', NULL, TRUE);
        $this->data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
        $this->data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
		$this->data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);

		$this->load->view('checkout', $this->data);
		
	}
	
	/**
	 * checkout_complete
	 * The example 'Checkout Complete' page displays a confirmation of the users order, displaying their order number.
	 * On a real world site, this page is typically accessed after the user has entered their payment details via a online payment gateway.
	 */
    function savePdfFile($id){
        if($id){
            $order_number = $id;
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
                    $invoicepath = UPLOADPATH.'invoices/'.ORDER_NUMBER_PREFIX.$order_number.".pdf";
                    $this->load->library('pdf');
                    $this->dompdf->loadhtml($pdfHtml);
                    $this->dompdf->setPaper('A4', 'portrait');
                    $this->dompdf->render();

                    $pdf_file =   $this->dompdf->output();
                    file_put_contents($invoicepath, $pdf_file);
                    return $invoicepath;
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

    function sendorderEmailToUser($order_number,$useremail=null)
    {
        if($useremail){
            $customeremail = $useremail;
        }else{
            $paypalInfo2 = $this->input->post();
            $returncustom = explode(':',$paypalInfo2['custom']);
            $customeremail = $returncustom[1];
        }
        $this->load->library('flexi_cart_admin');
        $data['order_number'] = $order_number;
        if ($customeremail)
        {
            $data['user_email'] = $customeremail;
            $this->flexi_cart_admin->email_order($data['order_number'], $data['user_email'], 'Order Details', FALSE, $this->savePdfFile($order_number));
        }
    }



	function checkout_complete($order_number,$useremail=null,$paymenttype=0) 
	{
		// $paypalInfo = $this->input->post();
		// echo "GET: <pre>";
		// print_r($paypalInfo);
		// echo "</pre>";
		//https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_view-a-trans&id=32T25246RX683231A
		
		
		if($useremail){
			$customeremail = $useremail;
		}else{
		$paypalInfo2 = $this->input->post();
		$paypalInfo3 = $this->input->get();
		$returncustom = explode(':',$paypalInfo2['custom']);
		$customeremail = $returncustom[1];
		}
		// echo "GET<pre>";
		// print_r($paypalInfo3);
		// echo "</pre>";
		// echo "POST<pre>";
		// print_r($paypalInfo2);
		// echo "</pre>";
		// echo "Order number: ".$order_number."<br>";
		// echo "Email: ".$customeremail."<br>";
		// echo "paymentid: ".$paymenttype."<br>";
		// die();
		// $paypalInfo = $this->input->get();
		// $data['txn_id'] = $paypalInfo["tx"];
		// $data['payment_amt'] = $paypalInfo["amt"];
		// $data['currency_code'] = $paypalInfo["cc"];
		// $data['status'] = $paypalInfo["st"];
		// $data['order_number'] = $paypalInfo["cm"];
		// Note: This example uses the 'get_db_order_summary_row_array()' and 'update_db_order_summary()' function which are located in the flexi cart ADMIN library.
		$this->load->library('flexi_cart_admin');

		// Get the confrimed order number to display to the user.
		$this->data['order_number'] = $order_number;

		// Get the users email address that was just saved with the order data.
		// $sql_where = array($this->flexi_cart_admin->db_column('order_summary', 'order_number') => $this->data['order_number']);
		// $order_data = $this->flexi_cart_admin->get_db_order_summary_row_array('ord_demo_email', $sql_where);
		if ($customeremail)
		{
			//echo "success";
			// $this->data['user_email'] = $order_data['ord_demo_email'];		
			$this->data['user_email'] = $customeremail;		
			
			// In many real world cases, the cart data may need to be later updated once saved - for example to save the response from an online payment gateway.
			// With such an example, the 'update_order_summary()' admin library function can be used.			
			# $this->flexi_cart_admin->update_db_order_summary(array('update_column' => 'update_value'), $this->data['order_number']);
			// A real world site would typically now send the user an order acknowledgement email.
			$this->flexi_cart_admin->email_order($this->data['order_number'], $this->data['user_email'], 'Order Details', FALSE, $this->savePdfFile($order_number));
		}
		// }else{
		// 	echo "no success";
		// }
		
		// Destroy the cart.
		// Note: once checkout is complete, it is better to use the 'destroy_cart()' function rather than 'empty_cart()' to ensure all session data from the
		// now completed order is removed, rather than just removing the items in the cart.
		$this->flexi_cart->destroy_cart();
		// echo "order successfully completed";
		$headdata['beforeheads'] = getMeta("paypal",0);
		$footerdata['footer'] = "";

		$bannerdata['title'] = "Order Completed";

		$bannerdata['brudcrumb'] = "";

		$bannerdata['payment'] = $this->paymentModel->get_single_payment($paymenttype);
		$bannerdata['banner'] = base_url("files/frontend/images/about-P-bg.jpg");

		$this->data['head'] = $this->load->view('includes/head', $headdata, TRUE);

		$this->data['header'] = $this->load->view('includes/header', NULL, TRUE);

		$this->data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);

		$this->data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
		$this->data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);

        // $this->load->view('paypal/cancel',$data);
		$this->load->view('order/success', $this->data);
	}



	function checkout_cancel($order_number) 
	{
		$this->load->library('flexi_cart');
		$headdata['beforeheads'] = getMeta("paypal",0);
		
		$footerdata['footer'] = "";

		$bannerdata['title'] = "Payment cancel";

		$bannerdata['brudcrumb'] = "";

		$bannerdata['banner'] = base_url("files/frontend/images/about-P-bg.jpg");
		$data['order_number'] = $order_number;
		$data['head'] = $this->load->view('includes/head', $headdata, TRUE);
		$data['header'] = $this->load->view('includes/header', NULL, TRUE);
		$data['banner'] = $this->load->view('includes/cms_banner', $bannerdata, TRUE);
		$data['footer'] = $this->load->view('includes/footer', $footerdata, TRUE);
		$data['scripts'] = $this->load->view('includes/index_scripts', NULL, TRUE);
		$this->flexi_cart->destroy_cart();
		$this->load->view('order/cancel',$data);
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
	// SAVE / LOAD CART DATA
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * load_save_cart_data
	 * Either load or save the carts session data from/to the the database.
	 * This function is accessed from the 'Save / Load Cart Data' page.
	 */ 
	function load_save_cart_data() 
	{
		// The load/save/delete cart data functions require the flexi cart ADMIN library.
		$this->load->library('flexi_cart_admin');
		
		// Create an SQL WHERE clause to list all previously saved cart data for a specific user.
		// For this example, the user id will be set as 1. In a real world application, this would be the logged-in users id.
		// This examples also prevents cart session data from confirmed orders being loaded, by checking the readonly status is set at '0'.
		$sql_where = array(
			$this->flexi_cart->db_column('db_cart_data', 'user') => 1,
			$this->flexi_cart->db_column('db_cart_data', 'readonly_status') => 0
		);

		// Get a list of all saved carts that match the SQL WHERE statement.
		$this->data['saved_cart_data'] = $this->flexi_cart_admin->get_db_cart_data_array(FALSE, $sql_where);

		// Get any status message that may have been set.
		$this->data['message'] = $this->session->flashdata('message');
		
		//$this->load->view('demo/feature_examples/features_save_load_cart_view', $this->data);
	}

	/**
	 * save_cart_data
	 * Saves the users current cart to the database so that it can be reloaded at a later date.
	 * This function is accessed from either the 'View Cart' or the 'Save / Load Cart Data' page.
	 */ 
	function save_cart_data() 
	{
		// The load/save/delete cart data functions require the flexi cart ADMIN library.
		$this->load->library('flexi_cart_admin');

		// For this example, the user id will be set as 1. 
		// In a real world application, this would be the logged-in users id.
		$user_id = 1;
	
		// Save the cart data to the database.
		$this->flexi_cart_admin->save_cart_data($user_id);

		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());
		
		redirect('cart');
	}

	/**
	 * load_cart_data
	 * Loads saved cart data into the users current cart, overwriting any existing cart data in their current session.
	 * A custom function 'demo_update_loaded_cart_data()' has been included to ensure that all loaded item data is up-to-date with the current item database table. 
	 * This function is accessed from the 'Save / Load Cart Data' page.
	 */ 
	function load_cart_data($cart_data_id = 0) 
	{
		// The load/save/delete cart data functions require the flexi cart ADMIN library.
		$this->load->library('flexi_cart_admin');
		$this->load->model('demo_cart_model');

		// Load saved cart data array.
		// This data is loaded into the browser session as if you were shopping with the cart as normal.
		$this->flexi_cart_admin->load_cart_data($cart_data_id);
		
		// To ensure that the prices and other data of all loaded items are still correct, a custom demo function has been made to loop through each item in the cart, 
		// query the demo item database table and retrieve the current item data.
		// As flexi cart does not manage item tables, this function has to be custom made to suit each sites requirements, this is an example of how it can be achieved.
		// Note that cart items including selectable options would potentially require a more complex query.	
		$this->demo_cart_model->demo_update_loaded_cart_data();
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());

		redirect('cart');
	}


    function just_load_cart_data($cart_data_id = 0)
    {
        // The load/save/delete cart data functions require the flexi cart ADMIN library.
        $this->load->library('flexi_cart_admin');
        $this->load->model('demo_cart_model');

        // Load saved cart data array.
        // This data is loaded into the browser session as if you were shopping with the cart as normal.
        $this->flexi_cart_admin->load_cart_data($cart_data_id);

        // To ensure that the prices and other data of all loaded items are still correct, a custom demo function has been made to loop through each item in the cart,
        // query the demo item database table and retrieve the current item data.
        // As flexi cart does not manage item tables, this function has to be custom made to suit each sites requirements, this is an example of how it can be achieved.
        // Note that cart items including selectable options would potentially require a more complex query.
        $this->demo_cart_model->demo_update_loaded_cart_data();
    }

	/**
	 * delete_cart_data
	 * Deletes specific saved cart data from the database.
	 * This function is accessed from the 'Save / Load Cart Data' page.
	 */ 
	function delete_cart_data($cart_data_id = 0) 
	{
		// The load/save/delete cart data functions require the flexi cart ADMIN library.
		$this->load->library('flexi_cart_admin');

		// Delete the saved cart data from the database.
		$this->flexi_cart_admin->delete_db_cart_data($cart_data_id);
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());

		redirect('load_save_cart_data');
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// NAVIGATION MENU FUNCTIONS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * currency
	 * Set which currency to display cart pricing in.
	 * This function is accessed from the navigation menu 'Feature Examples'.
	 */ 
	function currency($currency_identifier)
	{
		// Update cart currency using url parameter.
		$this->flexi_cart->update_currency($currency_identifier);
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());

		redirect('cart');
	}

	/**
	 * pricing_tax
	 * Set whether to display cart pricing including or excluding tax.
	 * This function is accessed from the navigation menu 'Feature Examples'.
	 */ 
	function pricing_tax($tax_status)
	{
		// Check whether tax is to be included or excluded from pricing.
		$tax_status = ($tax_status == 'inc');
		
		// Update tax pricing status.
		$this->flexi_cart->set_prices_inc_tax($tax_status);
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());

		redirect('cart');
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
	// SET MISC CART SETTINGS
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

	/**
	 * misc_features
	 * A list of miscellaneous features that are also available in flexi cart.
	 * The features include setting a minimum order value, changing tax location, changing cart statuses and converting weights and currencies.
	 * This page is accessed from the 'Miscellaneous' page listed in the navigation menu 'Feature Examples'.
	 */ 
	function misc_features() 
	{
		$this->load->model('demo_cart_model');

		// Check if the 'Change Tax Rate' form input has been submitted.
		if ($this->input->post('tax_location'))
		{
			$this->demo_cart_model->demo_update_tax();
		}
		
		// Set country location data for use with tax location demo.
		$sql_select = array($this->flexi_cart->db_column('locations', 'id'), $this->flexi_cart->db_column('locations', 'name'));		
		$this->data['countries'] = $this->flexi_cart->get_shipping_location_array($sql_select, 0); 
		
		// Get any status message that may have been set.
		$this->data['message'] = $this->session->flashdata('message');	
	
		$this->load->view('demo/feature_examples/features_misc_view', $this->data);
	}

	/**
	 * minimum_order
	 * Sets the minimum order value required to checkout.
	 * This function is accessed from the 'Miscellaneous' page.
	 */ 
	function minimum_order($value)
	{
		// Set the minimum order value.
		$this->flexi_cart->set_minimum_order($value);
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());

		redirect('standard_library/misc_features');
	}

	/**
	 * user_status
	 * Toggles a custom status that in this demo represents whether a user has logged in.
	 * Discounts can be set to only be applied if a custom status is active, i.e. only logged in users.
	 * This function is accessed from the 'Miscellaneous' page.
	 */ 
	function user_status($status)
	{
		// Check whether the user is logging in or out. 
		$status = ($status == 'login');
	
		// Update the carts custom status.
		$this->flexi_cart->set_custom_status_1($status);
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', $this->flexi_cart->get_messages());
		
		redirect('standard_library/misc_features');		
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
		$this->data['mini_cart_items'] = $this->flexi_cart->cart_items();
	}
}

/* End of standard_library.php */
/* Location: ./application/controllers/standard_library.php */