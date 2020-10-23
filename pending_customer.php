<?php
include('include/login_check.php'); 
include('include/connect.php');
$sql="SELECT customer.customer_id, customer_name, customer_address, SUM(selling_payment.sell_unit_price*selling_payment.sell_quantity-selling_payment.received_amount) AS pending FROM customer, selling_payment WHERE customer.customer_id=selling_payment.customer_id GROUP BY customer_name having pending>0";
$result=mysqli_query($conn,$sql);
?>

<html>
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
        <h2>Customer who have not paid their pending amount:</h2>
         <table id="customers">
            <tr class="info"> 
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Customer Address</th>
                <th>Pending amount</th>
            </tr>
            <?php
                     while($r = mysqli_fetch_assoc($result)){
                             echo '<tr><td>'.$r['customer_id'].'</td><td>'.$r['customer_name'].'</td><td>'.$r['customer_address'].'</td><td>'.$r['pending'].'</td></tr>';
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