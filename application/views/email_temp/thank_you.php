<!doctype html>
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <title></title>
  <style type="text/css">
 	body {
		width: 100%;
		margin: 0;
		padding: 0;
		-webkit-font-smoothing: antialiased;
		background-color: white;
	}
	@media only screen and (max-width: 600px) {
		table[class="table-row"] {
			float: none !important;
			width: 98% !important;
			padding-left: 20px !important;
			padding-right: 20px !important;
		}
		table[class="table-row-fixed"] {
			float: none !important;
			width: 98% !important;
		}
		table[class="table-col"], table[class="table-col-border"] {
			float: none !important;
			width: 100% !important;
			padding-left: 0 !important;
			padding-right: 0 !important;
			table-layout: fixed;
		}
		td[class="table-col-td"] {
			width: 100% !important;
		}
		table[class="table-col-border"] + table[class="table-col-border"] {
			padding-top: 12px;
			margin-top: 12px;
			border-top: 1px solid #E8E8E8;
		}
		table[class="table-col"] + table[class="table-col"] {
			margin-top: 15px;
		}
		td[class="table-row-td"] {
			padding-left: 0 !important;
			padding-right: 0 !important;
		}
		table[class="navbar-row"] , td[class="navbar-row-td"] {
			width: 100% !important;
		}
		img {
			max-width: 100% !important;
			display: inline !important;
		}
		img[class="pull-right"] {
			float: right;
			margin-left: 11px;
            max-width: 125px !important;
			padding-bottom: 0 !important;
		}
		img[class="pull-left"] {
			float: left;
			margin-right: 11px;
			max-width: 125px !important;
			padding-bottom: 0 !important;
		}
		table[class="table-space"], table[class="header-row"] {
			float: none !important;
			width: 98% !important;
		}
		td[class="header-row-td"] {
			width: 100% !important;
		}
	}
	@media only screen and (max-width: 480px) {
		table[class="table-row"] {
			padding-left: 16px !important;
			padding-right: 16px !important;
		}
	}
	@media only screen and (max-width: 320px) {
		table[class="table-row"] {
			padding-left: 12px !important;
			padding-right: 12px !important;
		}
	}
	@media only screen and (max-width: 458px) {
		td[class="table-td-wrap"] {
			width: 100% !important;
		}
		.table-responsive.mar-bottom-40
		{
		    margin-left: 10px;
            margin-right: 10px;
		}
		#spaceid
		{
		    display:none;
		}
		table#res_tab_dis tr td {
			display: table;
		}
		#flobd
		{
			float:left;
		}
		#flosd
		{
			float:right;
		}
	}
	 #spaceid
        {
            padding: 0px 48px;
        }
  </style>
</head>
<body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
 <div class="table-responsive mar-bottom-40" style="background-color: white;">
 	<center>
    <table class="header-row" width="100%" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
		<tbody>
			<tr>
				<td class="header-row-td" width="378" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #000000; margin: 0px; font-size: 18px; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">
					<center>
						<img src="<?php echo assets_url();?>images/logo.png" />
					</center><br>
						Thank you for placing your order with EverydayLanyards.com. Your order has been received and is now being processed. Your order details are shown below for your reference:
						<br>Your Order Number : <?php if(isset($order_no)) { echo $order_no; }?>
				</td>
			</tr>
		</tbody>
	</table>
	<table>
		<tr>
			<td align="center" width="36%" height="25" valign="top" style="background:#04aac2;font:bold 14px/25px Arial,Helvetica,sans-serif;color:#fff">
				<div><span id="flobd">Billing Details</span><span id="spaceid"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="flosd">Shipping Details</span></div>
			</td>           
		</tr>      
	</table>   
	<table>
		<tr>            
			<td>
				<span style="word-wrap: break-word;word-break: break-all;"><?php if(isset($bill_fname)) { echo $bill_fname.' '; } if(isset($bill_lname)) { echo $bill_lname; }?></span> <br>
				<span style="word-wrap: break-word;word-break: break-all;"><?php if(isset($bill_email)) { echo $bill_email; }?></span><br>
				<?php if(isset($bill_phno)) { echo $bill_phno; }?><br>
				<?php if(isset($bill_address1)) { echo $bill_address1; }?><br>
				<?php if(isset($bill_address)) { echo $bill_address; }?><br>
				<?php if(isset($bill_city)) { echo $bill_city; } if(isset($bill_state)){ echo ', '.$bill_state; } if(isset($bill_postcode)){ echo ' '.$bill_postcode; }?><br>
            	<?php if(isset($country_id)) { 
            		$result = $this->db->query("SELECT country FROM countries WHERE country_id = '2'");
        			$country= $result->row_array();
            		echo $country['country']; die;
            	} ?>
            </td>
		
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td>
				<span style="word-wrap: break-word;word-break: break-all;"><?php if(isset($first_name)) { echo $first_name.' '; }if(isset($last_name)) { echo $last_name; }?></span> <br>
				<span style="word-wrap: break-word;word-break: break-all;"><?php if(isset($email)) { echo $email; } ?></span><br>
				<?php if(isset($phone_no)) { echo $phone_no; }?><br>
				<?php if(isset($address_line1)) { echo $address_line1; }?><br>
				<?php if(isset($address_line2)) { echo $address_line2; }?><br>
				<?php if(isset($city)) { echo $city; } if(isset($state)){ echo ', '.$state; } if(isset($postcode)){ echo ' '.$postcode; }?><br>
            	<?php if(isset($country_id)) { 
            		$result = $this->db->query("SELECT country FROM countries WHERE country_id = '2'");
        			$country= $result->row_array();
            		echo $country['country']; die;  
            	} ?>
            </td>            			
		</tr>
	</table>
	
	<table>
		<tr>
			<td align="center" width="15%" height="25" valign="top" style="background:#04aac2;font:bold 14px/25px Arial,Helvetica,sans-serif;color:#fff">
				<div>Product Order Details</div>
			</td>
		</tr>
	</table>
    <table id="res_tab_dis" class="shopping-cart">
        <?php 
        if($this->session->userdata('orderData')) {
            $orderData = $this->session->userdata('orderData'); 
            //echo '<pre>'; print_r($orderData);
            foreach($orderData as $key) {
                $totalQty = $key['totalQty'];
                $totalPrice = $key['totalPrice'];
                $productId = $key['productId'];

                $result = $this->order_model->getAllValues($key['productId'], $key['productSize'], $key['hook'], $key['safetyAttachment'], $key['buckleAttachment'], $key['badgeHolder'], $key['productionTime'], $key['shippingTime'], $key['badgeReel'], $key['phoneLoop']);
                $color = explode( ',' , $key['colorQty']);
                $colorArr = array();
                
            ?>

        <tr class="hide_this<?php echo $key['productId'];?>">
            <td style="vertical-align: top;">
                <h4 class="product-name" style="text-align: center;">
				Polyester Lanyards
                   
                </h4>
                <div class="block-image"><img src="<?php echo base_url();?>uploads/admin/products/<?php echo $key['productImage']?>" alt="" class="img-responsive" height="200px" width="243px" /></div>
            </td>
            <td>
                
                <p><strong>Size:</strong> <?php echo $result['size'].' inch';?></p>
                <p><strong>Font Style:</strong>  <?php echo $key['fontStyle'];?></p>
                <p><strong>Message:</strong>  <?php echo $key['message'];?></p>
                <p><strong>Logo: </strong><?php if($key['attachLogo'] == 'No') { echo $key['attachLogo']; } else {?>  <img style="height: 30px; width: 30px;" src="<?php echo base_url(); echo 'uploads/attach_logo/thumb/'; echo $key['attachLogo'];?>" > <?php } ?></p>
                <p><strong>Hook:</strong>  <?php echo $result['hook'];?></p>
                <p><strong>Safety Breakway:</strong>  <?php echo $result['safetybreakway'];?></p>
                <p><strong>Buckle Attachment:</strong>  <?php echo $result['buckleatt'];?></p>
                <p><strong>Badge Holder:</strong>  <?php echo $result['badgeholder'];?></p>
                <p><strong>Badge Reel:</strong>  <?php echo $result['badgeReel'];?></p>
              
                <p><strong>Phone Loop:</strong>  <?php echo $result['phoneLoop'];?></p>
                 </td>
            <td>
                <p><strong>Wrapper:</strong>  <?php echo $key['individualBaging'];?></p>
                <p><strong>Production Time  :</strong>  <?php echo $result['ptdays'].' '.$result['ptext'];?></p>
           
                <p><strong>Shipping Time:</strong>  <?php echo $result['stdays'].' Days ( $'.$result['stprice'].' )';?></p>
                <p><strong>Proof Request:</strong> <?php echo $key['digitalProof'];?></p>
                <p><strong>Comments:</strong> <?php echo $key['specialInstruction'];?></p>
                <p><strong>Number of Imprint Colors:</strong>  <?php echo $key['imprintNum'];?></p>
                <p><strong>Imprint Colors:</strong> 
					<?php 
                        //echo $key['imprintColor'][0];
                        $imprints_colors = explode(",", $key['imprintColor'][0]);
                        foreach ($imprints_colors as $key => $value) {
                            $id =$value;
                            $color_name = $this->order_model->getColorName($id); ?>
                            <p><span style="width:10px; height:10px; border:#999 1px solid; background-color:<?php echo $color_name['hexcode']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo ' '.$color_name['color_name'];?></p>
                    <?php } ?>
                           <!-- <p><span style="width:10px; height:10px; border:#999 1px solid; background-color:white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>white</p>-->
                   
                </p>
                <p><strong>Lanyard Colors:</strong> </p>
                <?php 
                foreach ($color as $key) {
                    $idArr  = explode( ':' , $key);
                    $id = $idArr['0'];
                    $qty = $idArr['1'];
                    $name = $this->order_model->getColorName($id);
                ?>
                <p>
                    <span style="width:10px; height:10px; border:#999 1px solid; background-color:<?php echo $name['hexcode']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>:
                    <?php echo $name['color_name'];?>
                    Quantity: <?php echo $qty;?>
                </p>
                <?php } ?>
               
            </td>
            
            <td>
                <p><strong>Total Quantity :<?php echo $totalQty;?></strong></p>
                <p><strong>Unit Price :<?php 
                            // $price = substr($totalPrice,2);
                            // $u_price = (($price) / ($totalQty));
                            $unit_price = (($totalPrice) / ($totalQty));
                            // $unit_price = round($u_price, 2);
                            echo '$ '.$unit_price;
                        ?>
                    </strong></p>
                <p><strong>Total Price :<?php echo $totalPrice;?></strong></p>

            </td>
            
        </tr>
       <tr>
        <td colspan="4">
             <hr style="color: #CCC; height: 2px; background-color:#CCC;" />
        </td>
       </tr>
			<?php } ?>

    	<?php } ?>
    </table>
</center>
</div>
</body>
</html>