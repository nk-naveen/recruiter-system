<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'signup');

	if(isset($_POST['updation']))
	{
		$id = $_POST['update_id'];

		$cname = $_POST['cname'];
		$cwebsite = $_POST['cwebsite'];
		$cnum = $_POST['cnum'];
		$caddress = $_POST['caddress'];
		$ccity = $_POST['ccity'];
		$cstate = $_POST['cstate'];
		$ccountry = $_POST['ccountry'];
		$industrylist = $_POST['industrylist'];


		$query = " UPDATE company_databse SET cname='$cname',cwebsite='$cwebsite',cnum='$cnum',caddress='$caddress',ccity='$ccity', cstate='$cstate', ccountry='$ccountry', industrylist='$industrylist' WHERE id='$id' ";
		$res = mysqli_query($connection, $query);

		if($res) 
		{
			echo '<script> alert("data updated"); </script>';	
			header("Location: index.php");
		}
		else
		{
			echo '<script> alert("data  not updated"); </script>';

		}

	}
?>