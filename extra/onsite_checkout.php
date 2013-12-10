<?php 
	@require ('api_conf.php');
	require ('projects.php');

	@$co = new MPower_Onsite_Invoice();	

	foreach ($products as $value) {
		$co->addItem($value['name'], '','',$value['amount']);
		$total_amount = $value['amount'];

	};
	$co->setTotalAmount($total_amount);


	if ($co->create($_POST["account_alias"])) {
	  
	  echo $co->getReceiptUrl();
	} else {
	  echo $co->getStatus();
	  echo $co->response_text;
	}

	
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Onsite Checkout</title>

    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="../../assets/js/html5shiv.js"></script>
<script src="../../assets/js/respond.min.js"></script>
<![endif]-->

<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/carousel.css">
<link rel="stylesheet" href="css/slider.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="css/ensembly.css">
<link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container formstyle">

      <form action="charge.php" method="post" class="form-signin">
        
        <input type="text" name="confirmation_code" placeholder="Confirmation Code" autofocus>
        <input type="hidden" value="<?php echo $co->token; ?>" name="opr_token">
        
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">Make Payment</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>


 <!-- <html>
 <head>
 	<title>Onsite Checkout</title>
 </head>
 <body>
 	<form method="post" action="charge.php">
		<input type="text" name="confirmation_code" placeholder="Confirmation Code">
		<input type="hidden" value="<?php echo $co->token; ?>" name="opr_token">
		<input type="submit" value="Make Payment">
	</form>
 </body>
 </html> -->