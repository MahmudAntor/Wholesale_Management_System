<?php
include('include/login_check.php');	
include('include/connect.php');
$pass_id = $_GET['did'];

$sql = "SELECT * FROM customer WHERE Customer_ID = '$pass_id'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)!==0)
{
	$sql2="DELETE FROM customer WHERE Customer_ID = '$pass_id'";
	mysqli_query($conn,$sql2);
	header('Location: customer_list.php');
}
else
echo "Can't delete";

?>