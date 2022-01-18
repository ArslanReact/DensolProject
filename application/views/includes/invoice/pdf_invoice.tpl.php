<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AR Instrument Invoice <?php echo ORDER_NUMBER_PREFIX.$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];?></title>
    <?php $fontsppath = base_url('files/backend/fonts/SourceSansPro-Regular.ttf');?>
    <style>
      *{margin:0;padding:0}
      @page { margin: 0px; }
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
      max-width: 100%; 
      margin:0 10px;
      height: 29.7cm; 
      color: #555555;
      background: #FFFFFF; 
      font-size: 14px; 
      font-family: sans-serif;
      }

      header {
      margin-bottom: 5px;
      border-bottom: 3px solid #0087c3;
      position:relative;
      height:113px;
      line-height:15px;
      }

      #logo {
      margin-top: 8px;
      /* display: inline-block;
      width: 50%; */
      position:absolute;
      left:0;
      }

      #logo img {
          height: 100px;
      }

      #company {
      text-align: right;
      /* display: inline-block;
      width: 49.8%; */
      position:absolute;
      right:0;
      margin-top: 18px;
      }


      #details {
      position:relative;
      height:122px;
      line-height:15px;
      border-left: 5px solid #0087C3;
      border-right: 5px solid #0087C3;
      }

      #client {
      padding-left:5px;
      position:absolute;
      left:0;
      }
      #client2 {
      transform:translateY(-0px);
      padding-right:5px;
      text-align: right;
      position:absolute;
      right:0;
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
           margin-top:5px;
      font-size: 1.4em;
      font-weight: normal;
      }

      #invoicebox {
      border-bottom: 3px solid #8f9193;
      padding-bottom: 6px;
      margin-bottom: 20px;
      position:relative;
      height:20px;
      }
      #invoice {
      position:relative;
      width: 100%;
      }

      #invoice h1 {
      color: #0087C3;
      font-size: 20px;
      line-height: 15px;
      font-weight: normal;
      padding: 0;
      margin: 0;
      position:absolute;
      left:0;
      }

      #invoice .date1 {
      font-size: 1.1em;
      color: #777777;
      width: 146px;
      position:absolute;
      right:0;
      }
      #invoice .date2 {
      font-size: 16px;
      color: #777777;
      text-align: right;
      position:absolute;
      line-height:14px;
      right:0;
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
        border-top: 3px solid #8f9193;
        padding: 8px 0;
        margin-top:20px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <header class="clearfix">
        <?php 
$data = file_get_contents('https://tecmyer.com.au/projects/densol/files/frontend/images/logo.png');
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
      <div id="logo">
        <img src="<?php echo $base64; ?>">
      </div>
      <div id="company">
        <h2 class="name">DENSOL PTY LTD</h2>
        <div>ABN: 81162387368</div>
        <div>6 Moonah Ave. Brookfield 3338</div>
        <div>1300 920 097 / 0433033403</div>
        <div><a href="mailto:sales@densol.com.au">sales@densol.com.au</a></div>
        <div><a href="www.densol.com.au">www.densol.com.au</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="invoicebox" class="clearfix">
        <div id="invoice">
          <h1>ORD #<?php echo ORDER_NUMBER_PREFIX.$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];?></h1>
          <div class="date2">Issue Date: <?php echo date('m/d/Y', strtotime($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'date')]));?></div>
        </div>
      </div>
      <div id="details" class="clearfix" style="clear:both;">
        <div id="client">
          <div class="to">Billing Address</div>
          <h2 class="name"><?php echo $summary_data['ord_demo_bill_name'];?></h2>
          <div class="company"><?php echo $summary_data['ord_demo_bill_company']; ?></div>
          <div class="address"><?php echo $summary_data['ord_demo_bill_address_01'];?> 
          <br><?php echo $summary_data['ord_demo_bill_address_02'];?>
          <br><?php echo $summary_data['ord_demo_bill_city'];?> <?php echo $summary_data['ord_demo_bill_state'];?> <?php echo $summary_data['ord_demo_bill_post_code'];?> <?php echo $summary_data['ord_demo_bill_country'];?></div>
          <div class="email"><a href="mailto:<?php echo $summary_data['ord_demo_email'];?>"><?php echo $summary_data['ord_demo_email'];?></a></div>
          <div class="phone"><?php echo $summary_data['ord_demo_phone'];?></div>
        </div>
        <div id="client2">
          <div class="to">Shipping Address</div>
          <h2 class="name"><?php echo $summary_data['ord_demo_ship_name'];?></h2>
          <div class="company"><?php echo $summary_data['ord_demo_ship_company']; ?></div>
          <div class="address"><?php echo $summary_data['ord_demo_ship_address_01'];?> <br>
          <?php echo $summary_data['ord_demo_ship_address_02'];?> <br> 
          <?php echo $summary_data['ord_demo_ship_city'];?> <?php echo $summary_data['ord_demo_ship_state'];?> <?php echo $summary_data['ord_demo_ship_post_code'];?> <?php echo $summary_data['ord_demo_ship_country'];?></div>
          <div class="email"><a href="mailto:<?php echo $summary_data['ord_demo_email'];?>"><?php echo $summary_data['ord_demo_email'];?></a></div>
          <div class="phone"><?php echo $summary_data['ord_demo_phone'];?></div>
        </div>
        <br>
        <br>
      </div>
      <div class="table-responsive">
      <table style="border-collapse: collapse;width: 100%;border-color: #ade6ff; margin-top: 12px;">
        <thead style="background: #0087c3;color: white;">
          <tr>
            <th class="no" width="50"  style="text-align:center;">#</th>
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
            ?>
          <tr>
            <td class="no" style="text-align:center;"><?php echo str_pad($xd,2,"0",STR_PAD_LEFT);?></td>
            <td><?php echo $sku; ?></td>
            <td class="desc"><?php echo $row[$this->flexi_cart_admin->db_column('order_details', 'item_name')];?>
            <?php 
              echo (! empty($row[$this->flexi_cart_admin->db_column('order_details', 'item_options')])) ? '<br/>'.$row[$this->flexi_cart_admin->db_column('order_details', 'item_options')] : NULL; 
            ?>
            </td>

            <td class="qty"  style="text-align:center;"><?php echo round($row[$this->flexi_cart_admin->db_column('order_details', 'item_quantity')], 2); ?></td>
  
          </tr>
          <?php  $xd++;} ?>
        </tbody>
      </table>
      </div>
      <div id="thanks">Thank you!</div>
      <div id="notices">

        <div class="notice">COMMENTS: <?php echo $summary_data['ord_demo_comments'];?></div>
     
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>