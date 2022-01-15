<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?php echo base_url("files/backend/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url("files/backend/css/main.css");?>">
    <link rel="icon" href="<?php echo base_url("files/assets/images/favicon.ico");?>" type="image/x-icon">
    <link rel="shortcut icon" id="favicon" href="<?php echo base_url("files/assets/images/favicon.png");?>"> 
</head>
  <body>
    <!-- Side Navbar -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
    <div class="page">
      <!-- navbar-->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->
      <section class="dashboard-header section-padding">
        <div class="container-fluid">
          <div class="row d-flex align-items-md-stretch">
            <h4 class="col-md-12 title-heading"><?php echo $page_heading;?></h4>
          </div>
          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                <h2 class="display h4">Insert Items to <?php echo $group_data[$this->flexi_cart_admin->db_column('discount_groups', 'name')]; ?></h2>
                <p style="margin-bottom:10px;">Insert items to Selected Discount Group</p>
                <p class="text-center" style="margin-bottom:10px;">
                <a class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER; ?>/discount_groups">Manage Discount Item Groups</a> | 
                <a class="btn btn-primary" href="<?php echo base_url().ADMIN_FOLDER; ?>/update_discount_group/<?php echo $group_data[$this->flexi_cart_admin->db_column('discount_groups', 'id')]; ?>">Manage <?php echo $group_data[$this->flexi_cart_admin->db_column('discount_groups', 'name')]; ?> Discount Item Group</a>
                </p>
                <div class="table-responsive dt-responsive">

                <?php echo form_open(current_url());?>
                <table class="table table-striped table-bordered nowrap">
                    <thead>
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
                                <input type="button" value="+" class="copy_row btn btn-success"/>
                                <input type="button" value="x" <?php echo ($i == 0) ? 'disabled="disabled"' : NULL;?> class="remove_row btn btn-danger"/>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" style="border-right:none;">
                                <strong>Insert Item Method:</strong><br/>
                                <select name="insert_method" class="form-control" 
                                    title="Set whether to append or replace all items returned by the SQL WHERE statement to existing items within the group.">
                                    <option value="append">Append New Items to Existing Group Items</option>
                                    <option value="replace" <?php echo set_select('insert_method', 'replace'); ?>>Replace Existing Group Items with New Items</option>
                                </select>
                            </td>
                            <td colspan="3" class="align_r">
                                <input type="submit" name="insert_discount_group_items" value="Insert Discount Item Group Items" class="btn btn-success large"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php echo form_close();?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div>
    <!-- JavaScript files-->
	<?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
	
  </body>
</html>