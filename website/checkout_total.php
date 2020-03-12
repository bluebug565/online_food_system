<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Foody</title>
<link rel="icon" href="images/favicon5.ico" style="width: 32px; height: 32px">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Foody Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!---->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<link href="css/styles.css" rel="stylesheet">
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
	

</head>
<body>

<body>
<div class="header head">
	<div class="container">
		<div class="logo animated wow pulse" data-wow-duration="1000ms" data-wow-delay="500ms">
			<h1><a href="index.php"><span>F</span><img src="images/oo.png" alt=""><img src="images/oo.png" alt="">dy</a></h1>
		</div>
		<?php require("header_menu.php") ?>
	<div class="clearfix"></div>
	</div>
	<!-- start search-->	
		
</div>



<div class="blog">
	<div class="container">
		
		<?php
			$order = $_SESSION['orderDetails'];
			
			$cart_src=mysqli_query($con,"SELECT c.*, i.* FROM cart_table c INNER JOIN items_table i ON c.items_id=i.items_id WHERE c.id=".$_SESSION['user_info']['id']." AND c.status='0'") or die(mysqli_error($con));
			
			$Total = 0;
			while($rec = mysqli_fetch_assoc($cart_src))
			{
				$Total = $Total + ($rec['qty']*$rec['price']);
			}
			$gst = floatval(0.05*$Total);
			$toPay = $gst + $Total + 30;
			
		
			$area_id = $order[5];
			$sub_id = $order[6];
			$qry_area = mysqli_query($con, "SELECT `area_name` from `area_table` WHERE `area_id`='$area_id'") or die(mysqli_error($con));
			$area = mysqli_fetch_assoc($qry_area);
			$qry_sub_area = mysqli_query($con, "SELECT `sub_name` from `sub_area_table` WHERE `sub_id`='$sub_id'") or die(mysqli_error($con));
			$sub_area = mysqli_fetch_assoc($qry_sub_area);
		?>
		 <!--Main layout-->
 <main class="mt-5 pt-4">
    <div class="container wow fadeIn">
      <!-- Heading -->
      <h1 class="my-5 h2 text-center" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'"><u><b>Order Details</b></u></h1><br><br>
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-md-8 mb-4">
          <!--Card-->
          <div class="card">
			   <div><h3><u>Billing Address :</u></h3><br>
			   <p style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: 1.2em"><?php echo $order[4]?><br>
			   Area - <?php echo $area['area_name']?><br>
			   Sub Area - <?php echo $sub_area['sub_name']?>
			   </p>
			   </div>
			   <br><br><br>
			   <h3><u>Delivery Address :</u></h3><br>
			   <p style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'; font-size: 1.2em"><?php echo $order[4]?><br>
			   Area - <?php echo $area['area_name']?><br>
			   Sub Area - <?php echo $sub_area['sub_name']?>
			   </p>
			   <br><br><br>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h3 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted"><u>Order Details</u></span>
          </h3><br>

          <!-- Cart -->
			<form method="post" name="frm">
			<table class="table table-responsive">
				<tbody style="font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, 'sans-serif'; font-size: 1.1em">
					<tr>
						<td>Total Shopping</td>
						<td>&#8358;<?php echo sprintf("%.2f",$Total)?></td>
					</tr>
					<tr>
						<td>Delivery Charge</td>
						<td>&#8358;30.00</td>
					</tr>
					<tr>
						<td>(CGST+SGST) 18%</td>
						<td>&#8358;<?php echo sprintf("%.2f", $gst)?></td>
					</tr>
					<tr>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td><h3>Total</h3></td>
						<td><h3>&#8358;<?php echo sprintf("%.2f", $toPay)?></h3></td>
					</tr>
				</tbody>
			</table>
			</form>
          <!-- Cart -->
				<button class="btn btn-primary btn-lg btn-block" type="submit" id="submit"><h3 style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, 'sans-serif'">Place Order</h3></button>
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
		<?php
			array_push($_SESSION['orderDetails'], $toPay);
		?>
		<script type="text/javascript">
			$("#submit").on('click', function(){
				var total = <?php echo $toPay?>;
				$.ajax({
					type:"post",
					url:"order_placed.php",
					success:function(resp){
						window.location.href = 'order_confirmation.php';
					}
				});
			})
		</script>	
	</div>
</div>
	<?php require("footer.php"); ?>	
	<!--//footer-->
</body>
</html>

