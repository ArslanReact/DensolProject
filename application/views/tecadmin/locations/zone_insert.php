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
  <div>
    <!-- Side Navbar -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
      <div class="col-xl-10 col-lg-9">
          <!-- dashboard content -->
          <div class="content-page-admin">
      <!-- navbar-->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->
              <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>

          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                  <h5 class="m-b-10">Insert New Location Zone</h5>
                <p>Insert New Location Zone by entring required detail</p>
                <p class="text-left" style="margin-bottom:10px;">
                    <a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/zones">Manage Zones</a>
                </p>
                <div class="table-responsive dt-responsive">

                <?php echo form_open(current_url());?>
                <table class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th class="info_req tooltip_trigger"
                                title="<strong>Field Required</strong><br/>The name of the zone.">
                                Name
                            </th>
                            <th class="tooltip_trigger"
                                title="A brief description of the purpose of the zone and the regions covered.">
                                Description
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="If checked, the zone will be set as 'active'.">
                                Status
                            </th>
                            <th class="spacer_125 align_ctr tooltip_trigger" 
                                title="Copy or remove a specific row and its data.">
                                Copy / Remove
                            </th>
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
                                <textarea name="insert[<?php echo $row_id; ?>][description]" class="form-control"><?php echo set_value('insert['.$row_id.'][description]');?></textarea>
                            </td>
                            <td class="align_ctr">
                                <input type="hidden" name="insert[<?php echo $row_id; ?>][status]" value="0"/>
                                <input type="checkbox" name="insert[<?php echo $row_id; ?>][status]" value="1" <?php echo set_checkbox('insert['.$row_id.'][status]', '1', TRUE); ?>/>
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
                            <td colspan="4">
                                <input type="submit" name="insert_zone" value="Insert New Location Zones" class="btn btn-all"/>
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
    <script src="<?=base_url();?>files/backend/js/jquery-3.4.1.min.js"></script>
    <script src="<?=base_url();?>files/backend/js/admin_global.js"></script>
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
  </body>
</html>