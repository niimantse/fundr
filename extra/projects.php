<?php 
	$total_amount = 0;
	$products = array();

	if (isset($_POST['account_alias'])) {
		$account_alias = $_POST['account_alias'];
		
	}

	if (isset($_POST['FundrAfrica'])) {
		$amount = $_POST['amount'];
		$products[] = array(
			'name' => 'FundrAfrica',
			'amount' => $amount,
			);
	}
 ?>
