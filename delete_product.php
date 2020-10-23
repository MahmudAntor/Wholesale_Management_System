<?php
include('include/login_check.php');	
include('include/connect.php');
$pass_id = $_GET['did'];

$sql = "SELECT * FROM stock WHERE stock_ID = '$pass_id'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)!==0)
{
	$sql2="DELETE FROM stock WHERE stock_ID = '$pass_id'";
	mysqli_query($conn,$sql2);
	header('Location: product.php');
}
else
echo "Can't delete";

?>