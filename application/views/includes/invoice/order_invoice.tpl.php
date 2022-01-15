<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DENSOL Invoice <?php echo ORDER_NUMBER_PREFIX.$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];?></title>
    <link rel="stylesheet" type="text/css" href="https://ar-instrumed.com.au/files/frontend/css/theme_bootstrap.min.css">
    <?php $fontsppath = base_url('files/backend/fonts/SourceSansPro-Regular.ttf');?>
    <style>
      @font-face {
      font-family: SourceSansPro;
      src: url(<?php echo $fontsppath;?>);
      }
      .clearfix:after {
      content: "";
      display: table;
      clear: both;
      }

      a {
      color: #0087C3;
      text-decoration: none;
      }

      body {
      position: relative;
      min-width: 500px;
      max-width: 50%; 
      height: 29.7cm; 
      margin: 0 auto; 
      color: #555555;
      background: #FFFFFF; 
      font-size: 14px; 
      font-family: sans-serif;
      }

      header {
      padding: 10px 0;
      margin-bottom: 5px;
      border-bottom: 3px solid #0087c3;
      }

      #logo {
      float: left;
      margin-top: 8px;
      }

      #logo img {
      height: 100;
      }

      #company {
            float: right;
            text-align: right;
            margin-top: 0;
      }


      #details {
      margin-bottom: 25px;
      }

      #client {
      padding-left: 6px;
      border-left: 6px solid #0087C3;
      float: left;
      }
      #client2 {
      padding-right: 6px;
      border-right: 6px solid #0087C3;
      float: right;
      text-align: right;
      }

      #client .to {
            color: #0087c3;
            font-size: 20px;
            font-weight: 700;
      }
      #client2 .to {
      color: #0087c3;
      font-size: 20px;font-weight: 700;
      }

      h2.name {
      font-size: 1.4em;
      font-weight: normal;
      margin: 0;
      }

      #invoicebox {
      border-bottom: 3px solid #3eb64e;
      padding-bottom: 6px;
      margin-bottom: 25px;
      }
      #invoice {
      float: left;
      width: 100%;
      }

      #invoice h1 {
      color: #0087C3;
      font-size: 2em;
      line-height: 20px;
      font-weight: normal;
      padding: 0;
      float: left;
      margin: 0;
      }

      #invoice .date1 {
      font-size: 1.1em;
      color: #777777;
      float: left;
      width: 180px;
      }
      #invoice .date2 {
      font-size: 1.1em;
      color: #777777;
      float: right;
      width: 180px;
      text-align: right;
      }
table thead tr th {
  border-bottom: 1px solid #0087c3;
}

table th {
  border: 1px solid #0087c3;
}
table td{
     border: 1px solid #f3eeee;
}
      /*table {*/
      /*width: 100%;*/
      /*border-collapse: collapse;*/
      /*border-spacing: 0;*/
      /*margin-bottom: 20px;*/
      /*}*/

      /*table th,*/
      /*table td {*/
      /*padding: 0px;*/
      /*background: #EEEEEE;*/
      /*text-align: center;*/
      /*border-bottom: 1px solid #FFFFFF;*/
      /*}*/

      /*table th {*/
      /*white-space: nowrap;        */
      /*font-weight: normal;*/
      /*font-size:16px;*/
      /*}*/

      /*table td {*/
      /*text-align: right;*/
      /*}*/

      /*table td h3{*/
      /*color: #333333;*/
      /*font-size: 1.2em;*/
      /*font-weight: normal;*/
      /*margin: 0 0 0.2em 0;*/
      /*}*/

      /*table .no {*/
      /*color: #FFFFFF;*/
      /*font-size: 16px;*/
      /*background: #9c9c9c;*/
      /*}*/

      /*table .desc {*/
      /*text-align: left;*/
      /*}*/

      /*table .unit {*/
      /*background: #DDDDDD;*/
      /*}*/

      /*table .qty {*/
      /*}*/

      /*table .total {*/
      /*background: #9c9c9c;*/
      /*color: #FFFFFF;*/
      /*}*/

      /*table td.unit,*/
      /*table td.qty,*/
      /*table td.total {*/
      /*font-size: 1.2em;*/
      /*}*/

      /*table tbody tr:last-child td {*/
      /*border: none;*/
      /*}*/

      /*table tfoot td {*/
      /*padding: 10px 20px;*/
      /*background: #FFFFFF;*/
      /*border-bottom: none;*/
      /*font-size: 1.2em;*/
      /*white-space: nowrap; */
      /*border-top: 1px solid #AAAAAA; */
      /*}*/

      /*table tfoot tr:first-child td {*/
      /*border-top: none; */
      /*}*/

      /*table tfoot tr:last-child td {*/
      /*color: #000;*/
      /*font-size: 1.4em;*/
      /*border-top: 1px solid #000; */

      /*}*/

      /*table tfoot tr td:first-child {*/
      /*border: none;*/
      /*}*/

      #thanks{
      font-size: 2em;
      margin-bottom: 50px;
      }

      #notices{
      padding-left: 6px;
      border-left: 6px solid #0087C3;  
      }

      #notices .notice {
      font-size: 1.2em;
      }

      footer {
        color: #0087c3;
        width: 100%;
        height: 30px;
        position: relative;
        bottom: 0;
        border-top: 3px solid #3fb64c;
        padding: 8px 0;
        text-align: center;
        margin-top:30px;
      }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="https://ar-instrumed.com.au/files/frontend/images/logo.png">
      </div>
      <div id="company">
        <h2 class="name">DENSOL PTY LTD</h2>
        <div>ABN: 81162387368</div>
        <div>6 Moonah Ave. Brookfield 3338</div>
        <div>1300 920 097 / 0433033403</div>
        <div><a href="mailto:sales@densol.com.au">sales@densol.com.au</a></div>
        <div><a href="www.ar-instrumed.com.au">www.ar-instrumed.com.au</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="invoicebox" class="clearfix">
        <div id="invoice">
          <h1>ORD # <?php echo ORDER_NUMBER_PREFIX.$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];?></h1>
          <div class="date2">Issue Date: <?php echo date('m/d/Y', strtotime($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'date')]));?></div>
        </div>
      </div>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Billing Address:</div>
          <h2 class="name"><?php echo $summary_data['ord_demo_bill_name'];?></h2>
          <div class="company"><?php echo $summary_data['ord_demo_bill_company']; ?></div>
          <div class="address"><?php echo $summary_data['ord_demo_bill_address_01'];?> 
          <br><?php echo $summary_data['ord_demo_bill_address_02'];?>
          <br><?php echo $summary_data['ord_demo_bill_city'];?> <?php echo $summary_data['ord_demo_bill_state'];?> <?php echo $summary_data['ord_demo_bill_post_code'];?> <?php echo $summary_data['ord_demo_bill_country'];?></div>
          <div class="email"><a href="mailto:<?php echo $summary_data['ord_demo_email'];?>"><?php echo $summary_data['ord_demo_email'];?></a></div>
          <div class="phone"><?php echo $summary_data['ord_demo_phone'];?></div>
        </div>
        <div id="client2">
          <div class="to">Shipping Address:</div>
          <h2 class="name"><?php echo $summary_data['ord_demo_ship_name'];?></h2>
          <div class="company"><?php echo $summary_data['ord_demo_ship_company']; ?></div>
          <div class="address"><?php echo $summary_data['ord_demo_ship_address_01'];?> 
          <br><?php echo $summary_data['ord_demo_ship_address_02'];?> <br>
          <?php echo $summary_data['ord_demo_ship_city'];?> <?php echo $summary_data['ord_demo_ship_state'];?> <?php echo $summary_data['ord_demo_ship_post_code'];?> <?php echo $summary_data['ord_demo_ship_country'];?></div>
          <div class="email"><a href="mailto:<?php echo $summary_data['ord_demo_email'];?>"><?php echo $summary_data['ord_demo_email'];?></a></div>
          <div class="phone"><?php echo $summary_data['ord_demo_phone'];?></div>
        </div>
      </div>
      <div class="table-responsive">
      <table style="border-collapse: collapse;width: 100%;border-color: #ade6ff;">
        <thead style="background: #0087c3;color: white;">
          <tr>
            <th class="no" width="50" style="text-align:center;">#</th>
            <th class="desc">SKU</th>
            <th class="desc">ITEM</th>
            <th class="unit" width="50">PRICE</th>
            <th class="qty" width="50">QTY</th>
            <th class="total" width="50">TOTAL</th>
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
            <td class="unit">
            <?php 
                // If an item discount exists.
                if ($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_quantity')] > 0) 
                {
                    // If the quantity of non discounted items is zero, strike out the standard price.
                    if ($row[$this->flexi_cart_admin->db_column('order_details', 'item_non_discount_quantity')] == 0)
                    {
                        echo '<span style="text-decoration:line-through;">'.$this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_price')], TRUE, 2, TRUE).'</span><br/>';
                    }
                    // Else, display the quantity of items that are at the standard price.
                    else
                    {
                        echo number_format($row[$this->flexi_cart_admin->db_column('order_details', 'item_non_discount_quantity')]).' @ '.
                            $this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_price')], TRUE, 2, TRUE).'<br/>';
                    }
                    
                    // If there are discounted items, display the quantity of items that are at the discount price.
                    if ($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_quantity')] > 0)
                    {
                        echo number_format($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_quantity')]).' @ '.
                            $this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_price')], TRUE, 2, TRUE);
                    }
                }
                // Else, display price as normal.
                else
                {
                    echo $this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_price')], TRUE, 2, TRUE);
                }
            ?>
            </td>
            <td class="qty" style="text-align:center;"><?php echo round($row[$this->flexi_cart_admin->db_column('order_details', 'item_quantity')], 2); ?></td>
            <td class="total">
            <?php 
             
             
            
                // If an item discount exists, strike out the standard item total and display the discounted item total.
                if ($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_quantity')] > 0)
                {
                    echo '<span style="text-decoration:line-through;">'.$this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_price_total')], TRUE, 2, TRUE).'</span><br/>';
                    echo $this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_price_total')], TRUE, 2, TRUE);
                }
                // Else, display item total as normal.
                else
                {
                    echo $this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_price_total')], TRUE, 2, TRUE);
                }
             
            ?>
            </td>
          </tr>
            <?php $xd++;} ?>
          <tr>
            <td colspan="5" style="text-align:right; padding-right: 20px;">SUBTOTAL:</td>
            <td><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'item_summary_total')], TRUE, 2, TRUE);?></td>
          </tr>
          <?php
                if( $summary_data['payment_type'] == 2){
                    ?>
          <tr>
  
            <td colspan="5" style="text-align:right;  padding-right: 20px;">Paypal Discount:</td>
            <td>
                <?php
                
                 echo $this->flexi_cart_admin->format_currency(7.5/100*$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'total')]);
             
                ?>
                
                </td>
          </tr>
          <?php }?>          

          <?php 
              // If an item discount exists.
              if (!empty($finalarray)) { 
          ?>
          <tr>
            <td colspan="5" style="text-align:right; padding-right: 20px;"><?php echo $finalarray['description']; ?>:</td>
            <td>$<?php echo $finalarray['value']; ?></td>
          </tr>
          <?php } ?>          
          <tr>

            <td colspan="5" style="text-align:right; padding-right: 20px;"><?php echo "INCLUDED TAX @ ".$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'tax_rate')];?>%</td>
            <?php if( $summary_data['payment_type'] == 2){ ?>
                <td><?php echo $this->flexi_cart_admin->format_currency($summary_data['ord_total']/11); ?></td>
            <?php } else { ?>
                <td><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'tax_total')], TRUE, 2, TRUE);?></td>
            <?php } ?>
          </tr>
          
          <tr>
            <td colspan="5" style="text-align:right; padding-right: 20px;">SHIPPING: <?php echo $summary_data[$this->flexi_cart_admin->db_column('order_summary', 'shipping_name')];?></td>
            <td><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'shipping_total')], TRUE, 2, TRUE);?></td>
          </tr>
          <tr>
  
            <td colspan="5" style="text-align:right;  padding-right: 20px;">GRAND TOTAL:</td>
            <td>
                <?php
                if( $summary_data['payment_type'] == 2){
                 echo $this->flexi_cart_admin->format_currency($summary_data['ord_total']-7.5/100*$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'total')]);
             }else{
                 echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'total')], TRUE, 2, TRUE);
                
             }
               ?>
                
                </td>
          </tr>
        </tbody>
      </table>
      </div>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <?php
        $paymentby = getpaymentTypeById($summary_data['payment_type']);
        if($paymentby=="Credit"){
          $paymenttype = $paymentby;
          $userdd = getuserData($summary_data['ord_user_fk']);
          $paymentdays = ": ".$userdd->credit_type." Days";
        }else{
          $paymenttype = $paymentby;
          $paymentdays = "";
        }
        ?>
        <div class="notice">PAYMENT: <?php echo $paymenttype.$paymentdays;?></div>
        <div class="notice">COMMENTS: <?php echo $summary_data['ord_demo_comments'];?></div>
        <div class="notice">Paymeny Instructions: <?php if($paymenttype.$paymentdays == 'Invoice Me') { ?><br>
            <b>Bank Transfer:</b> AR Instrumed BSB: 013-270 <b>Account No:</b> 188388691 <br>
            
            <b>Cheque:</b> Cheque payable to AR INSTRUMED LTD. <br>
            <b>Pay Bill Online:</b> <a href="https://ar-instrumed.com.au/pay-online/">https://ar-instrumed.com.au/pay-online/</a>
        <?php } ?>
        </div>
        
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>