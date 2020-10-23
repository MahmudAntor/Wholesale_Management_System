<?php
include('include/login_check.php'); 
include('include/connect.php');
$sql="SELECT Supplier.supplier_id, supplier_name, supplier_address, SUM(buying_payment.buy_unit_price*buying_payment.buy_quantity-buying_payment.paid_amount) AS pending

FROM supplier, buying_payment

WHERE Supplier.supplier_id=buying_payment.supplier_id

GROUP BY supplier_name
having pending>0";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color:  #87CEEB;}

#customers tr:hover {background-color: #ddd ;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #6A5ACD;
    color: white;
}
 #foo {
    position: fixed;
    bottom: 0;
    right: 0;
  }
</style>
    <title>Shop</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/pos.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/total.js" type="text/javascript"></script> -->
</head>

<body>
    <div class="container">
        <div class="row">
            <img class="logo" src="pictures/pc2.png">
        </div>  
    </div> 
    
    <div class="container">
        <h2> Supplier who have not received their pending amount:</h2>
     <table id="customers">
            <tr> 
                <th>Supplier ID</th>
                <th>Supplier Name</th>
                <th>Supplier Address</th>
                <th>Pending amount</th></tr>
                <?php
                     while($r = mysqli_fetch_assoc($result)){
                             echo '<tr><td>'.$r['supplier_id'].'</td><td>'.$r['supplier_name'].'</td><td>'.$r['supplier_address'].'</td><td>'.$r['pending'].'</td></tr>';
                                 }
               ?>
       </table>
    </div>
	<div class="container">
        <div class="row">
			<div class="col-md-2">
				<a href="manager_control.php">Back to Menu</a>
			</div>
        </div>  
		<br/>
    </div> 
</body>
</html>