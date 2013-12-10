<?php
session_start();
include ('includes/config.php');
include ('includes/db.php');
/*
 * This section below checking if user is logged in/checking for inactivity 
 * may be best put in a reusable function so it is easily reused/updated
*/

// check that the user is logged in
if (!isset($_SESSION['email']))
{
	header("Location:../views/register.html?unauthorized");
}

// check for inactivity
if (time() > $_SESSION['last_active'] + $config['session_timeout'])
{
	// log out user
	session_destroy();
	header("Location: ../views/register.html?timeout");
}
else
{
	// update the session variable
	$_SESSION['last_active'] = time();
}



if (isset($_POST['register']))
{
	//passing the parameters
		$fname = htmlentities($_POST["fname"], ENT_QUOTES);
		$lname = htmlentities($_POST["lname"], ENT_QUOTES);
		$number = htmlentities($_POST["number"], ENT_QUOTES);
		$email = htmlentities($_POST["email"], ENT_QUOTES);
		$pass1 = htmlentities($_POST["pass1"], ENT_QUOTES);
		$pass2 = htmlentities($_POST["pass2"], ENT_QUOTES);
		
	// process form
	if ($_POST['fname'] == '' || $_POST['pass1'] == '' || $_POST['pass2'] == '' || $_POST['email'] == '' || $_POST['lname']=='' || $_POST['number'] =='')
	{
		// both fields need to be filled in
		if ($_POST['fname'] == '') {header("Location: ../views/register.html?First_Name_Required"); }
		if ($_POST['lname'] == '') {header("Location: ../views/register.html?Last_Name_Required"); }
		if ($_POST['pass1'] == '') {header("Location: ../views/register.html?Password_Required");} 
		if ($_POST['pass2'] == '') {header("Location: ../views/register.html?Cofirmed_password_Required"); }
		if ($_POST['email'] == '') {header("Location: ../views/register.html?Email_Required"); }
		if ($_POST['number'] == '') {header("Location: ../views/register.html?Phone_Number_Required"); }
	}
	else if ($_POST['pass1'] != $_POST['pass2'])
	{
		// both password fields need to match
		header("Location: ../views/register.html?Passwords_do_not_match");
		
	
	}
	else if (!preg_match('/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/', $email))
	{
		// email is invalid
		header("Location: ../views/register.html?Invalid_email_format");
	
	}
	else
	{	
		
		// check if the email is taken
		$check = $mysqli->prepare("SELECT * FROM register_table WHERE email = ? AND phoneNumber = ?");
		$check->bind_param("ss", $email,$number);
		$check->execute();
		$check->store_result();
		if ($check->num_rows != 0)
		{
			// email is already in use
			header("Location: ../views/register.html?User_already_exist");
			exit;
		}
	
		
		// insert into database
		if ($stmt = $mysqli->prepare("INSERT register_table(phoneNumber,fname,lname,email,password) VALUES (?,?,?,?,?)"))
		{
			$stmt->bind_param("sssss", $number, $fname,$lname,$email, md5($pass1.$config['salt']));
			$stmt->execute();
			$stmt->close();
			// show form
			header("Location: ../views/success.html?Welcome_to_Fundr_Africa");
			exit;
		}
		else
		{
			echo "ERROR: Could not prepare MySQLi statement.";
		}
	}
}

else
{
	// show form
	header("Location: ../index.html");
}

// close db connection
$mysqli->close();

?>