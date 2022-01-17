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
    <header class="clearfix" style="padding: 10px 0;margin-bottom: 5px;border-bottom: 1px solid #AAAAAA;height:90px;">
      <div style="float: left;margin-top: 8px;">
        <img style="height: 58px;" alt="Intercel" src="https://tecmyer.com.au/projects/densol/files/frontend/images/logo.png">
      </div>
      <div style="float: right;text-align: right;">
        <h2 style="font-size: 1.4em;font-weight: normal;margin: 0;">DENSOL PTY LTD</h2>
        <div>Brookfield VIC</div>
        <div>1300 920 097</div>
        <div><a href="mailto:sales@densol.com.au">sales@densol.com.au</a></div>
      </div>
    </header>
    <main>
      <div style="border-bottom: 1px solid #AAAAAA;padding-bottom: 6px;margin-bottom: 25px;height:20px;" class="clearfix">
        <div style="float: left;width: 100%;">
          <h1 style="color: #0087C3;font-size: 20px;line-height: 20px;font-weight: normal;padding: 0;float: left;margin: 0;">ORD #<?php echo ORDER_NUMBER_PREFIX.$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];?></h1>
          <div style="font-size: 1.1em;color: #777777;float: right;text-align: right;">Issue Date: <?php echo date('m d Y', strtotime($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'date')]));?></div>
        </div>
      </div>
      <div style="margin-bottom: 25px; float:left; width:100%" class="clearfix">
        <div style="padding-left: 6px;border-left: 6px solid #0087C3;float: left;">
          <div style="color: #777777;font-size: 16px;">Billing Address:</div>
          <h2 style="font-size: 16px;font-weight: normal;margin: 0;"><?php echo $summary_data['ord_demo_bill_name'];?></h2>
          <div class="address"><?php echo $summary_data['ord_demo_bill_address_01'];?> <?php echo $summary_data['ord_demo_bill_address_02'];?> <?php echo $summary_data['ord_demo_bill_city'];?><br><?php echo $summary_data['ord_demo_bill_state'];?> <?php echo $summary_data['ord_demo_bill_post_code'];?> <?php echo $summary_data['ord_demo_bill_country'];?></div>
          <div class="email"><a href="mailto:<?php echo $summary_data['ord_demo_email'];?>"><?php echo $summary_data['ord_demo_email'];?></a></div>
          <div class="phone"><?php echo $summary_data['ord_demo_phone'];?></div>
        </div>
        <div style="padding-right: 6px;border-right: 6px solid #0087C3;float: right;text-align: right;">
          <div style="color: #777777;font-size: 16px;">Shipping Address:</div>
          <h2 style="font-size: 16px;font-weight: normal;margin: 0;"><?php echo $summary_data['ord_demo_ship_name'];?></h2>
          <div class="address"><?php echo $summary_data['ord_demo_ship_address_01'];?> <?php echo $summary_data['ord_demo_ship_address_02'];?> <?php echo $summary_data['ord_demo_ship_city'];?><br><?php echo $summary_data['ord_demo_ship_state'];?> <?php echo $summary_data['ord_demo_ship_post_code'];?> <?php echo $summary_data['ord_demo_ship_country'];?></div>
          <div class="email"><a href="mailto:<?php echo $summary_data['ord_demo_email'];?>"><?php echo $summary_data['ord_demo_email'];?></a></div>
          <div class="phone"><?php echo $summary_data['ord_demo_phone'];?></div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0" style="width: 100%;border:0;border-collapse: collapse;border-spacing: 0;margin-bottom: 20px;">
        <thead>
          <tr>
            <th style="padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;white-space: nowrap;font-weight: normal;color: #FFFFFF;font-size: 1.6em;background: #9c9c9c;">#</th>
            <th style="padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;white-space: nowrap;font-weight: normal;text-align: left;">ITEM</th>
            <th style="padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;white-space: nowrap;font-weight: normal;background: #DDDDDD;font-size: 1.2em;" >UNIT PRICE</th>
            <th style="padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;white-space: nowrap;font-weight: normal;font-size: 1.2em;" class="qty">QUANTITY</th>
            <th style="padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;white-space: nowrap;font-weight: normal;background: #9c9c9c;color: #FFFFFF;font-size: 1.2em;">TOTAL</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $xd=1;
                foreach($item_data as $row) {
                $order_detail_id = $row[$this->flexi_cart_admin->db_column('order_details', 'id')];
            ?>
            <tr>
                <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;color: #FFFFFF;font-size: 1.6em;background: #9c9c9c;"><?php echo str_pad($xd,2,"0",STR_PAD_LEFT);?></td>
                <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;text-align: left;"><h3 style="color: #333333;font-size: 1.2em;font-weight: normal;margin: 0 0 0.2em 0;"><?php echo $row[$this->flexi_cart_admin->db_column('order_details', 'item_name')];?></h3>
                <?php 
                    echo (! empty($row[$this->flexi_cart_admin->db_column('order_details', 'item_options')])) ? '<br/>'.$row[$this->flexi_cart_admin->db_column('order_details', 'item_options')] : NULL; 
                ?>
                </td>
                <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;background: #DDDDDD;font-size: 1.2em;" >
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
                <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;font-size: 1.2em;" class="qty"><?php echo round($row[$this->flexi_cart_admin->db_column('order_details', 'item_quantity')], 2); ?></td>
                <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;background: #9c9c9c;color: #FFFFFF;font-size: 1.2em;">
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
            <?php 
                // If an item discount exists.
                if (! empty($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_description')])) { 
            ?>
            <tr>
            <td style="text-align: right;padding: 5px 20px;background: #9effb7;text-align: left;border-bottom: 1px solid #FFFFFF;" colspan="5" style="background-color:#ecfccb; border-top:1px solid #999; border-bottom:1px solid #999;">
                    Discount: <?php echo $row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_description')];?>
                </td>
            </tr>
            <?php } $xd++;} ?>
        </tbody>
        <tfoot>
          <tr>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;border-top: none;border: none;" colspan="2"></td>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;border-top: none;" colspan="2">SUBTOTAL</td>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;border-top: none;"><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'item_summary_total')], TRUE, 2, TRUE);?></td>
          </tr>
            <?php
                if( $summary_data['payment_type'] == 2){          
                    ?>
          <tr>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border: none;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;color: #000;font-size: 1.4em;border-top: 1px solid #000;border: none; " colspan="2"></td>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border: none;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;color: #000;font-size: 1.4em;border-top: 1px solid #000; " colspan="2">Paypal Discount</td>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border: none;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;color: #000;font-size: 1.4em;border-top: 1px solid #000; ">
                <?php
                 echo $this->flexi_cart_admin->format_currency(7.5/100*$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'total')]);
               ?>                
            </td>
          </tr>
          <?php } ?>

          <tr>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;border: none;" colspan="2"></td>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;" colspan="2"><?php echo "INCLUDED TAX @ ".$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'tax_rate')];?>%</td>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;">
               
                 <?php if( $summary_data['payment_type'] == 2){ 
                 echo $this->flexi_cart_admin->format_currency($summary_data['ord_total']/11); 
                 }else { 
                   echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'tax_total')], TRUE, 2, TRUE);
                    } ?>
            </td>
          </tr>
          <tr>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;border: none;" colspan="2"></td>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;" colspan="2">SHIPPING: <?php echo $summary_data[$this->flexi_cart_admin->db_column('order_summary', 'shipping_name')];?></td>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border-bottom: 1px solid #FFFFFF;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;"><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'shipping_total')], TRUE, 2, TRUE);?></td>
          </tr>
          <tr>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border: none;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;color: #000;font-size: 1.4em;border-top: 1px solid #000;border: none; " colspan="2"></td>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border: none;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;color: #000;font-size: 1.4em;border-top: 1px solid #000; " colspan="2">GRAND TOTAL</td>
            <td style="text-align: right;padding: 20px;background: #EEEEEE;text-align: center;border: none;padding: 10px 20px;background: #FFFFFF;border-bottom: none;font-size: 1.2em;white-space: nowrap;border-top: 1px solid #AAAAAA;color: #000;font-size: 1.4em;border-top: 1px solid #000; ">
                <?php
                if( $summary_data['payment_type'] == 2){
                 echo $this->flexi_cart_admin->format_currency($summary_data['ord_total']-7.5/100*$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'total')]);
             }else{
                 echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'total')], TRUE, 2, TRUE);
                
             }
               ?>                
            </td>
          </tr>
        </tfoot>
      </table>
      <div style="font-size: 2em;margin-bottom: 50px;">Thank you!</div>
      <div style="padding-left: 6px; border-left: 6px solid #0087C3;">
        <div>COMMENTS:</div>

      </div>
    </main>
    <footer style="color: #777777;width: 100%;height: 30px;position: absolute;bottom: 0;border-top: 1px solid #AAAAAA;padding: 8px 0;text-align: center;">
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
    </div>
  </body>
</html>