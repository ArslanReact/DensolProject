<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="icon" type="image/png" href="<?=base_url();?>files/backend/images/favicon.ico"/>
    <link rel="stylesheet" href="<?=base_url();?>files/backend/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme_bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme-style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <style>
      /* Content Wraps --------------------------------------------------------------------------------------------------------------------------------------------- */
      .w100, .w66, .w50, .w33 {float:left; margin:0 10px 0 0; padding:10px 15px;}
      .w100.float_r, .w66.float_r, .w50.float_r, .w33.float_r {float:right;}
      .w100 {width:100%; margin:0 0 10px;}
      .w66 {width:100%;}
      .w50 {width:100%;}
      .w33 {width:100%;}
      .r_margin {margin-right:0;}

      .pad_10 {padding:5px 10px;}
      .w100.pad_10 {width:100%; margin-bottom:0;}
      .w66.pad_10 {width:100%;}
      .w50.pad_10 {width:100%;}
      .w33.pad_10 {width:100%;}

      .position_left {float:left; max-width:100%; margin-right:10px; padding-right:20px; width: 100%;}
      .position_right {float:left; max-width:440px;}
      .w100.pad_10 .position_left {max-width:450px;}
      .w100.pad_10 .position_right {max-width:450px;}

      .pad_l_20 {padding-left:20px;} /* Pad cart discount/surcharge data */

      .content_wrap.nav_bg {background:url(../images/nav_wrap_red_bg.png) repeat-x #900;}
      .content_wrap.intro_bg {background:url(../images/intro_wrap_bg.png) repeat-x #f0f0f0;}
      .content_wrap.main_content_bg {min-height:475px; padding-top:10px; background:url(../images/main_content_wrap_bg.png) repeat-x #E9E2D9;}
      .content_wrap.footer_bg {background:url(../images/footer_wrap_bg.png) repeat-x;}

      .content {position:relative; width:960px; margin:0 auto; padding:10px 0;}

      fieldset {width:100%; margin:10px auto; padding:10px 15px; background-color:#f0f0f0; border:2px solid #aaa;}
      fieldset legend{display:inline-block; width:auto;padding:0 5px; font-size:18px;}
      fieldset.w50 {margin:5px 10px 5px 0;}
      fieldset.w50.r_margin {margin-right:0;}
      .frame {margin-top:10px; background-color:#f0f0f0; border:2px solid #aaa;}

      .frame_note {margin-top:5px; margin-bottom:15px; padding:10px; background-color:#e6e6e6; border:1px solid #ccc;}
      .frame_note hr {margin-top:10px; margin-bottom:10px;}
      .frame_note p:last-child {margin:0;}
      .frame_note:last-child {margin-bottom:5px;}
  </style>
  <body>
    <!-- Side Navbar -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
    <div class="col-xl-10 col-lg-9">
        <!-- dashboard content -->
        <div class="content-page-admin">
            <!-- navbar-->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->

            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>
            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="m-b-10">Insert New Discount</h5>
                        <p>Insert New Discount by entring required detail</p>
                        <div class="btn-group w-50 m-b-30">
                            <a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/item_discounts">Manage Item Discounts</a>
			            	<a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/summary_discounts" style="margin: 0px 10px;">Manage Summary Discounts</a>
				            <a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/discount_groups">Manage Discount Groups</a>
                        </div>
                <div class="p-b-15 p-r-15 p-l-15 m-t-15 m-b-30">
                <?php echo form_open(current_url());?>
                    <h4 class="m-b-20">Type / Location</h4>
<div class="all-round-border p-b-15 p-r-15 p-l-15 m-t-15 m-b-30 p-t-10" style="display: flow-root;">
<div class="row">
                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_type">Discount Type:</label>
								<select id="discount_type" name="insert[type]" class="form-control" 
									title="<strong>Field Required</strong><br/> Sets whether the discount is an item or summary discount, or a reward voucher.">
									<option value="0"> - Select Discount Type - </option>
								<?php 
									foreach($discount_types as $type) { 
										$id = $type[$this->flexi_cart_admin->db_column('discount_types', 'id')];
								?>
									<option value="<?php echo $id; ?>" <?php echo set_select('insert[type]', $id); ?>>
										<?php echo $type[$this->flexi_cart_admin->db_column('discount_types', 'type')];?>
									</option>
								<?php } ?>
								</select>
							</div>
                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_method">Discount Method:</label>
								<select id="discount_method" name="insert[method]" class="form-control" 
									title="<strong>Field Required</strong><br/> Set which cart value to apply the discount to."
								>
									<option value="0" class="parent_id_0"> - Select Discount Method - </option>
								<?php 
									foreach($discount_methods as $method) { 
										$id = $method[$this->flexi_cart_admin->db_column('discount_methods', 'id')];
								?>
									<option value="<?php echo $id; ?>" class="parent_id_<?php echo $method[$this->flexi_cart_admin->db_column('discount_methods', 'type')];?>" <?php echo set_select('insert[method]', $id); ?>>
										<?php echo $method[$this->flexi_cart_admin->db_column('discount_methods', 'method')];?>
									</option>
								<?php } ?>
								</select>
							</div>
                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_tax_method">Tax Appliance Method:</label>
								<select id="discount_tax_method" name="insert[tax_method]" class="form-control" 
									title="Set how tax should be applied to the discount."
								>
									<option value="0"> - Select Tax Method - </option>
									<option value="0">Carts Default Tax Method</option>
								<?php 
									foreach($discount_tax_methods as $tax_method) { 
										$id = $tax_method[$this->flexi_cart_admin->db_column('discount_tax_methods', 'id')];
								?>
									<option value="<?php echo $id; ?>" <?php echo set_select('insert[tax_method]', $id); ?>>
										<?php echo $tax_method[$this->flexi_cart_admin->db_column('discount_tax_methods', 'method')];?>
									</option>
								<?php } ?>
								</select>
							</div>
</div>
    <div class="row">
    <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_location">Location:</label>
								<select id="discount_location" name="insert[location]" class="form-control" 
									title="Set the location that the discount is applied to."
								>
									<option value="0"> - All Locations - </option>
								<?php 
									foreach($locations_inline as $location) { 
										$id = $location[$this->flexi_cart_admin->db_column('locations', 'id')];
								?>
									<option value="<?php echo $id; ?>" <?php echo set_select('insert[location]', $id); ?>>
										<?php echo $location[$this->flexi_cart_admin->db_column('locations', 'name')];?>
									</option>
								<?php } ?>
								</select>
							</div>
    <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_zone">Zone:</label>
								<select id="discount_zone" name="insert[zone]" class="form-control" 
									title="Set the zone that the discount is applied to. <br/>Note: If a location is set, it has priority over a zone rule."
								>
									<option value="0"> - All Zones - </option>
								<?php 
									foreach($zones as $zone) { 
										$id = $zone[$this->flexi_cart_admin->db_column('location_zones', 'id')];
								?>
									<option value="<?php echo $id; ?>" <?php echo set_select('insert[zone]', $id); ?>>
										<?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'name')];?>
									</option>
								<?php } ?>
								</select>
							</div>
</div>
</div>
                    <h4 class="m-b-20">Target Group / Item</h4>
                    <div class="all-round-border p-b-15 p-r-15 p-l-15 m-t-15 m-b-30 p-t-10" style="display: flow-root;">

                    <div class="row">
                        <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_group">Apply Discount to Group:</label>
								<select id="discount_group" name="insert[group]" class="form-control" 
									title="Set the discount to apply if an item in a particular discount group is added to the cart."
								>
									<option value="0"> - Not applied to a Group - </option>
								<?php 
									foreach($discount_groups as $group) { 
										$id = $group[$this->flexi_cart_admin->db_column('discount_groups', 'id')];
								?>
									<option value="<?php echo $id; ?>" <?php echo set_select('insert[group]', $id); ?>>
										<?php echo $group[$this->flexi_cart_admin->db_column('discount_groups', 'name')];?>
									</option>
								<?php } ?>
								</select>
							</div>

                        <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_item">Apply Discount to Item:</label>
								<select id="discount_item" name="insert[item]" class="form-control" 
									title="Set the discount to apply if a particular item is added to the cart."
								>
									<option value="0"> - Not applied to an Item - </option>	
								<?php foreach($items as $item) {?>
									<option value="<?php echo $item['id']; ?>" <?php echo set_select('insert[item]', $item['id']); ?>>
										<?php echo $item['article'];?>
									</option>
								<?php } ?>
								</select>
							</div>

                    </div>
                    </div>
                    <h4 class="m-b-20">Code / Description</h4>
                    <div class="all-round-border p-b-15 p-r-15 p-l-15 m-t-15 m-b-30 p-t-10" style="display: flow-root;">

                    <div class="row">
							<div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_code">Code:</label>
								<input type="text" id="discount_code" name="insert[code]" value="<?php echo set_value('insert[code]');?>" class="form-control" 
									title="Set the code required to apply the discount. Leave blank if the discount is activated via item quantities or values."
								/>
							</div>


							<div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_desc">Description:</label>
								<textarea id="discount_desc" name="insert[description]" class="form-control" 
									title="A short description of the discount that is displayed to the customer."
								><?php echo set_value('insert[description]');?></textarea>
							</div>

					</div>
                    </div>

                    <h4 class="m-b-20">Requirements / Discount</h4>
                    <div class="all-round-border p-b-15 p-r-15 p-l-15 m-t-15 m-b-30 p-t-10" style="display: flow-root;">
                        <div class="row">

                        <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_qty_req">Quantity Required to Activate:</label>
								<input type="text" id="discount_qty_req" name="insert[quantity_required]" value="<?php echo set_value('insert[quantity_required]');?>" class="form-control" 
									title="Set the quantity of items required to activate the discount.<br/> For example, for a 'buy 5 get 2 free' discount, the quantity would be 7 (5+2)."
								/>
							</div>
							<div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_qty_disc">Discount Quantity:</label>
								<input type="text" id="discount_qty_disc" name="insert[quantity_discounted]" value="<?php echo set_value('insert[quantity_discounted]');?>" class="form-control" 
									title="Set the quantity of items that the discount is applied to.<br/> For example, for a 'buy 5 get 2 free' discount, the quantity would be 2."
								/>
							</div>


							<div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_value_req">Value Required to Activate:</label>
								<input type="text" id="discount_value_req" name="insert[value_required]" value="<?php echo set_value('insert[value_required]');?>" class="form-control" 
									title="Set the value required to active the discount.<br/> For item discounts, the value is the total value of the discountable items.<br/> For summary discounts, the value is the cart total."
								/>
							</div>
							<div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_value_disc">Discount Value:</label>
								<input type="text" id="discount_value_disc" name="insert[value_discounted]" value="<?php echo set_value('insert[value_discounted]');?>" class="form-control" 
									title="Set the value of the discount that is applied.<br/> For percentage discounts, this value is used as the discount percentage.<br/> For 'flat fee' and 'new value' discounts, this is the discounted currency value."
								/>
							</div>
                    </div>
					</div>
                    <h4 class="m-b-20">Functionality</h4>

                    <div class="all-round-border p-b-15 p-r-15 p-l-15 m-t-15 m-b-30 p-t-10" style="display: flow-root;">
<div class="row">
							<div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_recursive">Discount Recursive:</label>
                                <div class="checkbox mr-2">
								<input type="hidden" name="insert[recursive]" value="0"/>
								<input type="checkbox" id="discount_recursive" name="insert[recursive]" value="1" <?php echo set_checkbox('insert[recursive]', '1'); ?> class="tooltip_trigger" 
									title="If checked, the discount can be repeated multiples times to the same cart.<br/> For example, if checked, a 'Buy 1, get 1 free' discount can be reapplied if 2, 4, 6 (etc) items are added to the cart.<br/> If not checked, the discount is only applied for the first 2 items."
								/>
                                    <div class="checkbox-visible"></div>
                                </div>
							</div>
							<div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_non_combinable">Non Combinable Discount:</label>
                                <div class="checkbox mr-2">
								<input type="hidden" name="insert[non_combinable]" value="0"/>
								<input type="checkbox" id="discount_non_combinable" name="insert[non_combinable]" value="1" <?php echo set_checkbox('insert[non_combinable]', '1'); ?> class="tooltip_trigger" 
									title="If checked, the discount cannot be and combined and used with any other discounts or reward vouchers."
								/>
                                <div class="checkbox-visible"></div>
                            </div>
							</div>

							<div class="col-xl-4 col-lg-4 m-b-15">

								<label for="discount_void_reward">Void Reward Points:</label>
                                <div class="checkbox mr-2">
								<input type="hidden" name="insert[void_reward]" value="0"/>
								<input type="checkbox" id="discount_void_reward" name="insert[void_reward]" value="1" <?php echo set_checkbox('insert[void_reward]', '1'); ?> class="tooltip_trigger" 
									title="If checked, any reward points earnt from items within the cart will be reset to zero whilst the discount is used."
								/>
                                <div class="checkbox-visible"></div>
                            </div>
							</div>
							<div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_force_shipping">Force Shipping Discount:</label>
                                <div class="checkbox mr-2">
								<input type="hidden" name="insert[force_shipping]" value="0"/>
								<input type="checkbox" id="discount_force_shipping" name="insert[force_shipping]" value="1" <?php echo set_checkbox('insert[force_shipping]','1'); ?> class="tooltip_trigger" 
									title="If checked, the discount value will be 'forced' on the carts shipping option calculations, even if the selected shipping option has not been set as being discountable."
								/>
                                    <div class="checkbox-visible"></div>
                                </div>
							</div>
</div>
					</div>

                    <h4 class="m-b-20">Custom Cart Statuses</h4>
                    <div class="all-round-border p-b-15 p-r-15 p-l-15 m-t-15 m-b-30 p-t-10" style="display: flow-root;">
                        <div class="row">


                            <div class="p-t-15 p-l-15 p-r-15">
								<small>
									Three individual custom cart statuses can be set to affect whether discounts become active.<br/>
									The custom statuses can contain any string or integer values, if the value then matches the the custom status of a discount, then provided all other discount conditions are also matched, the discount is activated.
								</small>
								<small>
									For example, a custom status could check whether a user is logged in, by default it is set to false (0), when a user then logs in, the status could be set to true (1) which would then enable the discount.
								</small>

                            </div>
                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_custom_status_1">Custom Status #1:</label>
								<input type="text" id="discount_custom_status_1" name="insert[custom_status_1]" value="<?php echo set_value('insert[custom_status_1]'); ?>" class="width_75"/>
							</div>
                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_custom_status_2">Custom Status #2:</label>
								<input type="text" id="discount_custom_status_2" name="insert[custom_status_2]" value="<?php echo set_value('insert[custom_status_2]'); ?>" class="width_75"/>
							</div>
                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_custom_status_3">Custom Status #3:</label>
								<input type="text" id="discount_custom_status_3" name="insert[custom_status_3]" value="<?php echo set_value('insert[custom_status_3]'); ?>" class="width_75"/>
							</div>


                        </div>
                    </div>
                    <h4 class="m-b-20">Usage Status / Validity</h4>
                    <div class="all-round-border p-b-15 p-r-15 p-l-15 m-t-15 m-b-30 p-t-10" style="display: flow-root;">
                        <div class="row">



                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_usage_limit">Usage Limit:</label>
								<input type="text" id="discount_usage_limit" name="insert[usage_limit]" value="<?php echo set_value('insert[usage_limit]');?>" class="form-control" 
									title="<strong>Field Required</strong><br/>Set the number of times remaining that the discount can be used."
								/>
							</div>
                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_valid_date">Valid Date (yyyy-mm-dd):</label>
								<input type="text" id="discount_valid_date" name="insert[valid_date]" value="<?php echo set_value('insert[valid_date]', date('Y-m-d'));?>" maxlength="10" class="form-control" 
									title="<strong>Field Required</strong><br/>Set the start date that the discount is valid from."
								/>
							</div>
                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_expire_date">Expire Date (yyyy-mm-dd):</label>
								<input type="text" id="discount_expire_date" name="insert[expire_date]" value="<?php echo set_value('insert[expire_date]', date('Y-m-d', strtotime('3 Month')));?>" maxlength="10" class="form-control" 
									title="<strong>Field Required</strong><br/>Set the expiry date that the discount is valid until."
								/>
								
							</div>


                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_status">Active Status:</label>
								<input type="hidden" name="insert[status]" value="0"/>
								<input type="checkbox" id="discount_status" name="insert[status]" value="1" <?php echo set_checkbox('insert[status]', '1', TRUE); ?> class="tooltip_trigger" 
									title="If checked, the discount will be set as 'active'."
								/>
							</div>
                            <div class="col-xl-4 col-lg-4 m-b-15">
								<label for="discount_order_by">Order By:</label>
								<input type="text" id="discount_order_by" name="insert[order_by]" value="<?php echo set_value('insert[order_by]');?>" class="form-control" 
									title="Set the order that the discount is applied to the cart if other discounts are active. The lower the number, the higher priority."
								/>
							</div>


                        </div>
                    </div>
					<fieldset>
						<legend>Insert Discount</legend>
						<input type="submit" name="insert_discount" value="Insert Discount" class="btn btn-success"/>
					</fieldset>
				<?php echo form_close();?>

                </div>
              </div>
                </div>
            </div>

      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div>
    </div>
    <!-- JavaScript files-->
	<?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
	
  </body>
</html>