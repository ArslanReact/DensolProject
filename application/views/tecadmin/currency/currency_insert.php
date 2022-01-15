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
                                <h5 class="m-b-10">Insert New Currency</h5>
                                <p>Insert New Currency by entring required detail</p>
                            </div>
                            <div class="btn-group">
                                <a href="<?php echo base_url().ADMIN_FOLDER; ?>/currency" class="btn btn-all text-white">Manage Curencies</a>
                            </div>
                        </div>



                <div class="table-responsive m-t-20">
                <?php echo form_open(current_url());?>
                <table class="table table-bordered m-t-10">
                    <thead class="thead-dark">
                        <tr>
                            <th cscope="col" title="The name of the currency."> Name</th>
                            <th scope="col" title="The exchange rate of the currency compared to the carts default currency."> Exchange Rate </th>
                            <th scope="col" title="The currency symbol to display with currency values. For example '$' to display '$9.99'."> Symbol HTML </th>
                            <th scope="col" title="If checked, the currency symbol will be suffixed to the end of the currency value rather than the front. For example<br/> Checked: '9.99&euro;',<br/> Unchecked: '&pound;9.99'.">
                                Suffix </th>
                            <th scope="col" title="The character used to separate currencies in excess of a thousand.<br/> For example, the comma in '1,000'."> Thousand </th>
                            <th scope="col" title="The character used to separate a currencies decimal value.<br/> For example, the period in '99.99'."> Decimal </th>
                            <th scope="col" title="If checked, the currency will be set as 'active'."> Status </th>
                            <th scope="col" title="Copy or remove a specific row and its data.">  Copy / Remove </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        for($i = 0; ($i == 0 || (isset($validation_row_ids[$i]))); $i++) { 
                            $row_id = (isset($validation_row_ids[$i])) ? $validation_row_ids[$i] : $i;
                    ?>
                        <tr>
                            <td>
                                <input type="text" name="insert[<?php echo $row_id; ?>][name]" value="<?php echo set_value('insert['.$row_id.'][name]');?>" class="form-control"/>
                            </td>
                            <td>
                                <input type="text" name="insert[<?php echo $row_id; ?>][exchange_rate]" value="<?php echo set_value('insert['.$row_id.'][exchange_rate]');?>" class="form-control validate_decimal"/>
                            </td>
                            <td>
                                <input type="text" name="insert[<?php echo $row_id; ?>][symbol]" value="<?php echo set_value('insert['.$row_id.'][symbol]');?>" class="form-control validate_alpha"/>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <input type="hidden" name="insert[<?php echo $row_id; ?>][symbol_suffix]" value="0"/>
                                <input type="checkbox" name="insert[<?php echo $row_id; ?>][symbol_suffix]" value="1" <?php echo set_checkbox('insert['.$row_id.'][symbol_suffix]', '1'); ?>/>
                                <div class="checkbox-visible"></div>
                                </div>
                            </td>
                            <td>
                                <input type="text" name="insert[<?php echo $row_id; ?>][thousand]" value="<?php echo set_value('insert['.$row_id.'][thousand]');?>" class="form-control validate_alpha"/>
                            </td>
                            <td>
                                <input type="text" name="insert[<?php echo $row_id; ?>][decimal]" value="<?php echo set_value('insert['.$row_id.'][decimal]');?>" class="form-control validate_alpha"/>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <input type="hidden" name="insert[<?php echo $row_id; ?>][status]" value="0"/>
                                <input type="checkbox" name="insert[<?php echo $row_id; ?>][status]" value="1" <?php echo set_checkbox('insert['.$row_id.'][status]', '1', TRUE); ?>/>
                                    <div class="checkbox-visible"></div>
                                </div>
                            </td>
                            <td class="align_ctr">
                                <input type="button" value="+" class="copy_row btn btn-all"/>
                                <input type="button" value="x" <?php echo ($i == 0) ? 'disabled="disabled"' : NULL;?> class="remove_row btn btn-all"/>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                <input type="submit" name="insert_currency" value="Insert New Currency" class="btn btn-all"/>
                            </td>
                        </tr>
                    </tbody>
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