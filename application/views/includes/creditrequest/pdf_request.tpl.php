<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AR Instrument Credit Request PDF</title>
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
      border-bottom: 3px solid #3eb64e;
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
        border-top: 3px solid #3fb64c;
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
        <h2 class="name">AR INSTRUMED PTY LTD</h2>
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
          <h1>Credit Account Number# <?php echo $result['request_no']; ?></h1>
          <div class="date2">Submitted Date & Time : <?php echo $result['creation_date']; ?></div>
        </div>
      </div>
      
      
      <div id="thanks" style="text-align:center;">Credit Request Form</div>
      <table style="width:100%;">
          <tr>
              <td>Business Name:</td>
              <td><?php echo $result['business_name']; ?></td>
          </tr>
          <tr>
              <td>Trading Name:</td>
              <td><?php echo $result['trading_name']; ?></td>
          </tr>
        <tr>
              <td>Business Email:</td>
              <td><?php echo $result['business_email']; ?></td>
          </tr>
            <tr>
              <td>Name of Proprietor:</td>
              <td><?php echo $result['name_of_proprietor']; ?></td>
          </tr>
            <tr>
              <td>Delivery Building:</td>
              <td><?php echo $result['d_building']; ?></td>
          </tr>
        <tr>
              <td>Delivery Suite:</td>
              <td><?php echo $result['d_suite']; ?></td>
          </tr>
            <tr>
              <td>Delivery Postcode:</td>
              <td><?php echo $result['d_postcode']; ?></td>
          </tr>
        <tr>
              <td>Delivery City:</td>
              <td><?php echo $result['d_city']; ?></td>
          </tr>
            <tr>
              <td>Delivery State:</td>
              <td><?php echo $result['d_state']; ?></td>
          </tr>
        <tr>
              <td>Postal Building:</td>
              <td><?php echo $result['p_building']; ?></td>
          </tr>
                    <tr>
              <td>Postal Suite:</td>
              <td><?php echo $result['p_suite']; ?></td>
          </tr>
                    <tr>
              <td>Postal Postcode:</td>
              <td><?php echo $result['p_postcode']; ?></td>
          </tr>
                    <tr>
              <td>Postal City:</td>
              <td><?php echo $result['p_city']; ?></td>
          </tr>
                    <tr>
              <td>Postal State:</td>
              <td><?php echo $result['p_state']; ?></td>
          </tr>
                    <tr>
              <td>Phone:</td>
              <td><?php echo $result['phone']; ?></td>
          </tr>
                    <tr>
              <td>Fax:</td>
              <td><?php echo $result['fax']; ?></td>
          </tr>
                    <tr>
              <td>Mobile No:</td>
              <td><?php echo $result['mobile_no']; ?></td>
          </tr>
                    <tr>
              <td>Email:</td>
              <td><?php echo $result['email']; ?></td>
          </tr>
                    <tr>
              <td>Business Q1:</td>
              <td><?php echo $result['business_q1']; ?></td>
          </tr>
                    <tr>
              <td>Business Q2:</td>
              <td><?php echo $result['business_q2']; ?></td>
          </tr>
                    <tr>
              <td>Business Category:</td>
              <td><?php echo $result['business_category']; ?></td>
          </tr>
                    <tr>
              <td>Trade Ref Person 1:</td>
              <td><?php echo $result['trade_ref_person1']; ?></td>
          </tr>
                    <tr>
              <td>Trade Refperson1 Phone:</td>
              <td><?php echo $result['trade_ref_person1_phone']; ?></td>
          </tr>
                    <tr>
              <td>Trade Ref Person 2:</td>
              <td><?php echo $result['trade_ref_person2']; ?></td>
          </tr>
                    <tr>
              <td>Trade Ref Person2 Phone:</td>
              <td><?php echo $result['trade_ref_person2_phone']; ?></td>
          </tr>
                    <tr>
              <td>Read Condition:</td>
              <td><?php echo $result['read_condition']; ?></td>
          </tr>
      </table>
      
    </main>
    <footer>
      This pdf was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>