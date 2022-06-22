<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'signup');

if (isset($_POST['insertion'])) 
{
	$cname = $_POST['cname'];
	$cwebsite = $_POST['cwebsite'];
	$cnum = $_POST['cnum'];
	$caddress = $_POST['caddress'];
	$ccity = $_POST['ccity'];
	$cstate = $_POST['cstate'];
	$ccountry = $_POST['ccountry'];
	$industrylist = $_POST['industrylist'];

	$query = "INSERT INTO company_databse (`cname`,`cwebsite`,`cnum`,`caddress`,`ccity`,`cstate`,`ccountry`,`industrylist`) VALUES ('$cname','$cwebsite','$cnum','$caddress','$ccity','$cstate','$ccountry','$industrylist')";
	$res = mysqli_query($connection, $query);

	if($res)
	{
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }

}
?>