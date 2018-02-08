<!DOCTYPE html>
<html>
<head>
<title>Pending Transaction</title>
<!--

    An email present from your friends at Litmus (@litmusapp)

    Email is surprisingly hard. While this has been thoroughly tested, your mileage may vary.
    It's highly recommended that you test using a service like Litmus (http://litmus.com) and your own devices.

    Enjoy!

 -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
            max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .padding-copy {
             padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="margin: 0 !important; padding: 0 !important;">

<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                    <td align="left" valign="top" style="padding: 10px 0;" class="logo">
                        <a href="" target="_blank">
                            <img alt="Logo" src="<?php echo base_url().'assets/images/logo.png'; ?>" width="80" height="80" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                        </a>
                    </td>
					<td align="right" style="font-size: 22px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 15px;" class="padding-copy">ORDER CONFIRMATION</td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <!-- COPY -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <!-- <tr>
                                <td align="left" style="font-size: 22px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">
									ORDER ID <span style="color:#27aae1;">#XX</span>
								</td>
                            </tr> -->
							 <tr>
                                <td align="left" style="font-size: 18px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">
									Your order has been confirmed!
								</td>
                            </tr>
                            <tr>
                                <td align="left" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
									Thank you for your order at Deepick. We have received your order and once we have received
your payment, we will send you an email confirmation. Please check your order summary below:
								</td>
                            </tr>
                        </table>
                    </td>
                </tr>
				 <tr>
                    <td>
                        <!-- COPY -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        	  <tr>
                                <td align="left" style="text-align:left; font-size: 18px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">
									ORDER ID <span style="color:#27aae1;">#<?php echo $orderid; ?></span>
								</td>
                            </tr>
                            <tr>
                                <td align="left" style="font-size: 18px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">
									SHIP TO:
									<br>
									<p style="font-size:14px">
										<?php echo $firstname.' '.$lastname; ?>
										<br>
										<?php echo $address; ?>
										<br>
										<?php echo $phone; ?>
										
									</p>
								</td>
								
                            </tr>
							<tr>								
								 <td align="right" valign="top" style="font-size: 18px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">
									SHIPPING METHOD: <span style="color:#27aae1;"><?php echo strtoupper($courier); ?></span>
								</td>
							</tr>               
                        </table>
						
                    </td>
					
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
	 <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <!-- COPY -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="left" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 10px;" class="padding-copy">
									ORDER SUMMARY
								</td>
                            </tr>
							
                        </table>
                    </td>
                </tr>
				 
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
	
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px; padding-top:5px;" class="padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            
              <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
				<thead>				
					<tr style="font-size: 14px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 10px;" >
						<th style="text-align:left">
							ITEM
						</th>
						<th style="text-align:left">
							QTY
						</th>
						<th style="text-align:left">
							UNIT PRICE
						</th>
						<th style="text-align:right">
							SUB TOTAL
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($cart as $rowid => $item): ?>
					<tr>
						<td style="font-size: 14px; color:#27aae1; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-bottom: 10px;">
							<?php echo $item['name']; ?><br />
							<?php echo $item['options']['size']; ?>
						</td>
						<td style="font-size: 14px; color:#27aae1; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-bottom: 10px;">
								<?php echo $item['qty']; ?>
						</td>
						<td style="font-size: 14px; color:#27aae1; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-bottom: 10px;">
								<?php echo $item['price']; ?>
						</td>
						<td style="font-size: 14px; color:#27aae1; text-align:right; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-bottom: 10px;">
							<?php echo $item['subtotal']; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot style="border-top:2px dashed #0e0f0e; font-size: 14px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 10px;">
					<tr>
						<td colspan=3 align="right" style="font-size: 14px; text-align:right; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 10px;">
							ITEM SUB TOTAL :
						</td>
						<td style="text-align:right" style="font-size: 14px; text-align:right; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 10px;">
							<?php echo $subtotal; ?>
						</td>
					</tr>
					<tr>
						<td colspan=3 align="right">
							SHIPPING :
						</td>
						<td style="text-align:right">
							<?php echo $shippingcost; ?>
						</td>
					</tr>
					<tr>
						<td colspan=3 align="right">
							TOTAL :
						</td>
						<td style="text-align:right">
							<?php echo $totalcart; ?>
						</td>
					</tr>
				</tfoot>
			</table>      
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                       
                                         <tr>
                                            <td align="left" style="padding: 0 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #000; font-style: italic;" class="padding-copy">
												Please transfer the final amount of IDR <?php echo $totalcart; ?> to:
													<p>
														<strong>
															Bank BCA<br />
															5025 7777 67 a/n Wulan Purnamasari
														</strong>
														<br />
														Please confirm your payment here <a href="<?php echo base_url().'confirm-payment'; ?>">Confim Payment</a>
														or email us at deepickecommerce@gmail.com with your proof of payment attached.
													</p>
											</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
   
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 20px 0px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td align="left" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
						Please contact us at deepickecommerce@gmail.com if you need any assistance regarding your order
                    </td>
					
                </tr>
				 <tr>
                    <td align="left" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#000;">
						<a href="<?php echo base_url(); ?>">www.deepick.co</a>
						<div style="float:right">&copy; <?php echo date("Y"); ?></div>
                    </td>
					
                </tr>
				
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>

</body>
</html>


</body>
</html>