<?php 
	require ('api_conf.php');
	require ('projects.php');
	
	$co = new MPower_Checkout_Invoice();	

	foreach ($products as $value) {
		$co->addItem($value['name'], '','',$value['amount']);
		$total_amount = $value['amount'];

	};
	$co->setTotalAmount($total_amount);

	if($co->create()) {
	  header("Location: ".$co->getInvoiceUrl());
	}else{
	  echo $co->response_text;
	}
 ?>