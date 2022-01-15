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
            <!-- Line Chart -->

                    <div class="align-items-center d-flex justify-content-between">
                        <div>
                            <h5 class="m-b-10">Insert Discount Group</h5>
                            <p>Insert New Discount Items Group</p>
                        </div>
                        <div class="btn-group"><a href="<?php echo base_url().ADMIN_FOLDER; ?>/discount_groups" class="btn btn-all text-white">Manage Discount Item Groups</a></div>
                    </div>

                <div class="table-responsive dt-responsive">

                <?php echo form_open(current_url());?>
                <h6 class="m-b-10">Discount Item Group</h6>
                <table class="table table-bordered m-t-15">
                    
                    <thead class="thead-dark">
                        <tr>
                            <th class="info_req tooltip_trigger"
                                title="<strong>Field Required</strong><br/>Set the name of the discount item group.">
                                Group Name
                            </th>
                            <th class="spacer_100 align_ctr tooltip_trigger" 
                                title="If checked, the discount item group will be set as 'active'.">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="insert_group[name]" value="<?php echo set_value('insert_group[name]');?>" class="form-control"/>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <input type="hidden" name="insert_group[status]" value="0"/>
                                <input type="checkbox" name="insert_group[status]" value="1" <?php echo set_checkbox('insert_group[status]', '1', TRUE); ?> />
                                    <div class="checkbox-visible"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <h6 class="m-b-10"> Insert Items to Group</h6>
                <table class="table table-bordered m-t-15">
                    <thead class="thead-dark">
                        <tr>
                            <th class="info_req tooltip_trigger"
                                title="Set the SQL WHERE operator used between each generated WHERE statement.<br/> Note: The operator of the first row is ignored.">
                                Operator
                            </th>
                            <th class="info_req tooltip_trigger"
                                title="Set the column that will be compared against the 'filter value'.">
                                Filter Column
                            </th>
                            <th class="info_req tooltip_trigger"
                                title="Set the match method used to compare the 'filter column' against the 'filter value'.">
                                Filter Match Method
                            </th>
                            <th class="tooltip_trigger"
                                title="Set the value to be compared against the 'filter column'.<br/> For methods requiring multiple values (WHERE x BETWEEN y AND z), separate values using a comma (y,z).">
                                Filter Value
                            </th>
                            <th class="spacer_150 align_ctr tooltip_trigger" 
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
                                <select name="insert_item[<?php echo $row_id; ?>][logic_operator]" class="form-control">
                                    <option value="AND">AND</option>
                                    <option value="OR" <?php echo set_select('insert_item['.$row_id.'][logic_operator]', 'OR'); ?>>OR</option>
                                </select>
                            </td>
                            <td>
                                <select name="insert_item[<?php echo $row_id; ?>][column_name]" class="form-control">
                                    <option value="id" <?php echo set_select('insert_item['.$row_id.'][column_name]', 'id'); ?>>Item ID</option>
                                    <option value="article" <?php echo set_select('insert_item['.$row_id.'][column_name]', 'article'); ?>>Item Article</option>
                                    <option value="name" <?php echo set_select('insert_item['.$row_id.'][column_name]', 'name'); ?>>Item Name</option>
                                    <option value="price" <?php echo set_select('insert_item['.$row_id.'][column_name]', 'price'); ?>>Item Price</option>
                                    <option value="weight" <?php echo set_select('insert_item['.$row_id.'][column_name]', 'weight'); ?>>Item Weight</option>
                                </select>
                            </td>
                            <td>
                                <select name="insert_item[<?php echo $row_id; ?>][comparison_operator]" class="form-control">
                                    <option value="=">Is equal to ( = )</option>
                                    <option value="!=" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', '!='); ?>>Is not equal to ( != )</option>
                                    <option value="<" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', '<'); ?>>Is less than ( < )</option>
                                    <option value="<=" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', '<='); ?>>Is less than or equal to ( <= )</option>
                                    <option value=">" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', '>'); ?>>Is more than ( > )</option>
                                    <option value=">=" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', '>='); ?>>Is more than or equal to( >= )</option>
                                    <option value="like" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'like'); ?>>Contains ( LIKE '%xxx%' )</option>
                                    <option value="not_like" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'not_like'); ?>>Does not contain ( NOT LIKE '%xxx%' )</option>
                                    <option value="begin_lik" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'begin_lik'); ?>>Begins with ( LIKE 'xxx%' )</option>
                                    <option value="not_begin_like" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'not_begin_like'); ?>>Does not begin with ( NOT LIKE 'xxx%' )</option>
                                    <option value="end_like" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'end_like'); ?>>Ends with ( LIKE '%xxx' )</option>
                                    <option value="not_end_like" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'not_end_like'); ?>>Does not end with ( NOT LIKE '%xxx' )</option>
                                    <option value="null" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'null'); ?>>Is null ( IS NULL )</option>
                                    <option value="not_null" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'not_null'); ?>>Is not null ( IS NOT NULL )</option>
                                    <option value="empty" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'empty'); ?>>Is empty ( = '' )</option>
                                    <option value="not_empty" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'not_empty'); ?>>Is not empty ( != '' )</option>
                                    <option value="between" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'between'); ?>>Is between ( BETWEEN X AND X )</option>
                                    <option value="not_between" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'not_between'); ?>>Is not between ( NOT BETWEEN X AND X )</option>
                                    <option value="in" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'in'); ?>>Is in list ( IN ('x', 'xx', 'xxx') )</option>
                                    <option value="not_in" <?php echo set_select('insert_item['.$row_id.'][comparison_operator]', 'not_in'); ?>>Is not in list ( NOT IN ('x', 'xx', 'xxx') )</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="insert_item[<?php echo $row_id; ?>][value]" value="<?php echo set_value('insert_item['.$row_id.'][value]');?>" class="form-control"/>
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
                            <td colspan="5">
                                <input type="submit" name="insert_discount_group" value="Insert New Discount Item Group" class="btn btn-all"/>
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