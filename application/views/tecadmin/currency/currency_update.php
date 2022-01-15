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
  <body>
    <!-- Side Navbar -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
    <div class="col-xl-10 col-lg-9">
        <!-- dashboard content -->
        <div class="content-page-admin">
      <!-- navbar-->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->
            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?=$page_heading;?></h4></div>
            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="align-items-center d-flex justify-content-between">
                            <div class="">
                                <h5 class="m-b-10">Manage Currencies</h5>
                                <p>A list of all Currencies</p>
                            </div>
                            <div class="btn-group">
                                <a href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_currency" class="btn btn-all text-white">Add New Currency</a>
                            </div>
                        </div>
                <div class="table-responsive m-t-20">
                <?php echo form_open(current_url());?>
                    <table class="table table-bordered m-t-10">
                        <thead class="thead-dark">
                        <tr>
                            <th cscope="col" title="The name of the currency."> Name </th>
                            <th cscope="col" title="The exchange rate of the currency compared to the carts default currency."> Exchange Rate </th>
                            <th cscope="col">Symbol</th>
                            <th cscope="col" title="The currency symbol to display with currency values. For example '$' to display '$9.99'."> Symbol HTML </th>
                            <th cscope="col" title="If checked, the currency symbol will be suffixed to the end of the currency value rather than the front. For example<br/> Checked: '9.99&euro;',<br/> Unchecked: '&pound;9.99'.">
                                Suffix
                            </th>
                            <th cscope="col" title="The character used to separate currencies in excess of a thousand.<br/> For example, the comma in '1,000'."> Thousand </th>
                            <th cscope="col" title="The character used to separate a currencies decimal value.<br/> For example, the period in '99.99'."> Decimal </th>
                            <th cscope="col" title="If checked, the currency will be set as 'active'."> Status </th>
                            <th cscope="col" title="If checked, the row will be deleted upon the form being updated."> Delete </th>
                        </tr>
                    </thead>
                    <?php if (! empty($currency_data)) { ?>	
                    <tbody>
                    <?php 
                        foreach ($currency_data as $row) { 
                            $currency_id = $row[$this->flexi_cart_admin->db_column('currency', 'id')];
                    ?>
                        <tr>
                            <td>
                                <input type="hidden" name="update[<?php echo $currency_id; ?>][id]" value="<?php echo $currency_id; ?>"/>
                                <input type="text" name="update[<?php echo $currency_id; ?>][name]" value="<?php echo set_value('update['.$currency_id.'][name]', $row[$this->flexi_cart_admin->db_column('currency', 'name')]); ?>" class="form-control"/>
                            </td>
                            <td>
                                <input type="text" name="update[<?php echo $currency_id; ?>][exchange_rate]" value="<?php echo set_value('update['.$currency_id.'][exchange_rate]', round($row[$this->flexi_cart_admin->db_column('currency', 'exchange_rate')],4)); ?>" class="form-control validate_decimal"/>
                            </td>
                            <td>
                                <?php echo $row[$this->flexi_cart_admin->db_column('currency', 'symbol')]; ?>
                            </td>
                            <td>
                                <input type="text" name="update[<?php echo $currency_id; ?>][symbol]" value="<?php echo set_value('update['.$currency_id.'][symbol]', $row[$this->flexi_cart_admin->db_column('currency', 'symbol')]); ?>" class="form-control validate_alpha"/>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <?php $symbol_suffix = (bool)$row[$this->flexi_cart_admin->db_column('currency', 'symbol_suffix')]; ?>
                                <input type="hidden" name="update[<?php echo $currency_id; ?>][symbol_suffix]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $currency_id; ?>][symbol_suffix]" value="1" <?php echo set_checkbox('update['.$currency_id.'][symbol_suffix]','1', $symbol_suffix); ?>/>
                                    <div class="checkbox-visible"></div>
                                </div>
                            </td>
                            <td>
                                <input type="text" name="update[<?php echo $currency_id; ?>][thousand]" value="<?php echo set_value('update['.$currency_id.'][thousand]', $row[$this->flexi_cart_admin->db_column('currency', 'thousand_separator')]); ?>" class="form-control validate_alpha"/>
                            </td>
                            <td>
                                <input type="text" name="update[<?php echo $currency_id; ?>][decimal]" value="<?php echo set_value('update['.$currency_id.'][decimal]', $row[$this->flexi_cart_admin->db_column('currency', 'decimal_separator')]); ?>" class="form-control validate_alpha"/>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <?php $status = (bool)$row[$this->flexi_cart_admin->db_column('currency', 'status')]; ?>
                                <input type="hidden" name="update[<?php echo $currency_id; ?>][status]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $currency_id; ?>][status]" value="1" <?php echo set_checkbox('update['.$currency_id.'][status]','1', $status); ?>/>
                                <div class="checkbox-visible"></div>
                                </div>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <input type="hidden" name="update[<?php echo $currency_id; ?>][delete]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $currency_id; ?>][delete]" value="1"/>
                                    <div class="checkbox-visible"></div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">
                                <input type="submit" name="update_currency" value="Update Currencies" class="btn btn-all"/>
                            </td>
                        </tr>
                    </tfoot>
                    <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="9">
                                There are no currencies setup to view.<br/>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
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