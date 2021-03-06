<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
      .clearfix:after {
      content: "";
      display: table;
      clear: both;
      }

      a {
      color: #0087C3;
      text-decoration: none;
      }

      
    </style>
  </head>
  <body>
    <div style="position: relative; width: 700px; height: 29.7cm; margin: 0 auto; color: #555555;background: #FFFFFF; font-family: Arial, sans-serif; font-size: 14px; font-family: Tahoma;">
    <header class="clearfix" style="margin-bottom: 5px;border-bottom: 3px solid #0087c3;height:140px;">
      <div style="float: left;margin-top: 8px;">
        <img style="height: 100px;" alt="DENSOL" src="https://tecmyer.com.au/projects/densol/files/frontend/images/logo.png">
      </div>
      <div style="float: right;text-align: right;">
        <h2 style="font-size: 20px;font-weight: 700;margin: 0;color: #4bb851;">DENSOL PTY LTD</h2>
        <div>ABN: 81162387368</div>
        <div>6 Moonah Ave. Brookfield 3338</div>
        <div>1300 920 097 / 0433033403</div>
        <div><a href="mailto:sales@densol.com.au">sales@densol.com.au</a></div>
        <div><a href="https://www.densol.com.au">www.densol.com.au</a></div>
      </div>
    </header>
    <main>
      <div style="border-bottom:3px solid #8f9193;padding-bottom: 6px;margin-bottom: 25px;height:20px;" class="clearfix">
        <div style="float: left;width: 100%;">
          <h1 style="color: #0087C3;font-size: 20px;line-height: 20px;font-weight: normal;padding: 0;float: left;margin: 0;">ORD #<?php echo ORDER_NUMBER_PREFIX.$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];?></h1>
          <div style="font-size: 1.1em;color: #777777;float: right;text-align: right;">Issue Date: <?php echo date('m d Y', strtotime($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'date')]));?></div>
        </div>
      </div>
      <div style="margin-bottom: 25px; float:left; width:100%" class="clearfix">
        <div style="padding-left: 6px;border-left: 6px solid #0087C3;float: left;">
          <div style="color: #0087c3;font-size: 20px;     font-weight: 700;">Billing Address</div>
          <h2 style="font-size: 16px;font-weight: normal;margin: 0;"><?php echo $summary_data['ord_demo_bill_name'];?></h2>
          <div class="address"><?php echo $summary_data['ord_demo_bill_address_01'];?> <?php echo $summary_data['ord_demo_bill_address_02'];?> <?php echo $summary_data['ord_demo_bill_city'];?><br><?php echo $summary_data['ord_demo_bill_state'];?> <?php echo $summary_data['ord_demo_bill_post_code'];?> <?php echo $summary_data['ord_demo_bill_country'];?></div>
          <div class="email"><a href="mailto:<?php echo $summary_data['ord_demo_email'];?>"><?php echo $summary_data['ord_demo_email'];?></a></div>
          <div class="phone"><?php echo $summary_data['ord_demo_phone'];?></div>
        </div>
        <div style="padding-right: 6px;border-right: 6px solid #0087C3;float: right;text-align: right;">
          <div style="color: #0087c3;font-size: 20px;     font-weight: 700;">Shipping Address</div>
          <h2 style="font-size: 16px;font-weight: normal;margin: 0;"><?php echo $summary_data['ord_demo_ship_name'];?></h2>
          <div class="address"><?php echo $summary_data['ord_demo_ship_address_01'];?> <?php echo $summary_data['ord_demo_ship_address_02'];?> <?php echo $summary_data['ord_demo_ship_city'];?><br><?php echo $summary_data['ord_demo_ship_state'];?> <?php echo $summary_data['ord_demo_ship_post_code'];?> <?php echo $summary_data['ord_demo_ship_country'];?></div>
          <div class="email"><a href="mailto:<?php echo $summary_data['ord_demo_email'];?>"><?php echo $summary_data['ord_demo_email'];?></a></div>
          <div class="phone"><?php echo $summary_data['ord_demo_phone'];?></div>
        </div>
      </div>
      <table style="border-collapse: collapse;width: 100%;border-color: #ade6ff;">
        <thead style="background: #0087c3;color: white;">
          <tr>
            <th class="no" width="50" style="text-align:center;">#</th>
            <th class="desc">SKU</th>
            <th class="desc">ITEM</th>
            <th class="qty" width="50">QTY</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $xd=1;
                foreach($item_data as $row) {
                $order_detail_id = $row[$this->flexi_cart_admin->db_column('order_details', 'id')];
                $query = $this->db->query("select ord_det_item_fk from order_details where ord_det_id =$order_detail_id");
                $result = $query->result_array();
                $itemid = $result[0]['ord_det_item_fk'];
                $query = $this->db->query("select * from products where id =$itemid");
                $result = $query->result_array();
                $sku = $result[0]['article'];
                
                // FOr DISCOUNT
                $invno = $summary_data[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];
                $queryy = $this->db->query("SELECT * FROM order_summary WHERE ord_order_number='$invno'");
                $resultt = $queryy->result_array();
                $cartid = $resultt[0]['ord_cart_data_fk'];
      
                $queryy = $this->db->query("select * from cart_data where cart_data_id =$cartid");
                $resultt = $queryy->result_array();
                $cart_data_array_josn = $resultt[0]['cart_data_array'];
                $cart_data_array = unserialize($cart_data_array_josn);
                $finalarray = $cart_data_array['settings']['discounts']['active_summary']['total'];
            ?>
          <tr>
            <td class="no" style="text-align:center;"><?php echo str_pad($xd,2,"0",STR_PAD_LEFT);?></td>
            <td class="desc"><?php echo $sku;?></td>
            <td class="desc"><?php echo $row[$this->flexi_cart_admin->db_column('order_details', 'item_name')];?>
            <?php 
              echo (! empty($row[$this->flexi_cart_admin->db_column('order_details', 'item_options')])) ? '<br/>'.$row[$this->flexi_cart_admin->db_column('order_details', 'item_options')] : NULL; 
            ?>
            </td>
            <td class="qty" style="text-align:center;"><?php echo round($row[$this->flexi_cart_admin->db_column('order_details', 'item_quantity')], 2); ?></td>

          </tr>
            <?php $xd++;} ?>
        </tbody>
      </table>
      <div style="font-size: 2em;margin-bottom: 50px;">Thank you!</div>
      <div style="padding-left: 6px; border-left: 6px solid #0087C3;">
        <div>COMMENTS:</div>
      </div>
    </main>
    <footer style="margin-top:20px; color: #0087c3;width: 100%;height: 30px;position: relative;bottom: 0;border-top: 3px solid #8f9193;padding: 8px 0;text-align: center;">
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
    </div>
  </body>
</html>