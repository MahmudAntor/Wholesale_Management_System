<?php
	include('include/login_check.php');    
	
	$error="";
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		include('include/connect.php');
		
        $cid=$_POST['CID'];
		$sid=$_POST['SID'];
		$qua=$_POST['Quantity'];
		$price=$_POST['price'];
        $r_amnt=$_POST['r_amount'];

            $sqlc="SELECT * FROM Customer WHERE customer_id='$cid'";
            $sqls="SELECT * FROM stock WHERE stock_id='$sid'";
            $stidc  = mysqli_query($conn, $sqlc);
            $stids  = mysqli_query($conn, $sqls);
	
            if (mysqli_num_rows($stidc) != 0 && mysqli_num_rows($stids) != 0 )
            {
				//echo 'ok';
		      	$sql="UPDATE `stock` SET `Stock_quantity`= Stock_quantity-'$qua' WHERE Stock_ID='$sid'";
                $stid  = mysqli_query($conn, $sql);
				
                $sql="INSERT INTO `selling_payment`(`sell_unit_price`, `sell_quantity`, `received_amount`, `customer_id`) VALUES ('$price', '$qua', '$r_amnt', '$cid')";
                $stid  = mysqli_query($conn, $sql);

                $sql="INSERT INTO `selling_provides`(`Stock_ID`, `sell_pay_no`, `report_ID`) VALUES ('$sid', (SELECT sell_pay_no FROM selling_payment ORDER BY sell_pay_no DESC LIMIT 1), (SELECT report_ID FROM stock_report ORDER BY report_ID DESC LIMIT 1))";
                $stid  = mysqli_query($conn, $sql);

                $sql="INSERT INTO `sold_to`(`customer_id`, `Stock_ID`) VALUES ('$cid', '$sid')";
                $stid  = mysqli_query($conn, $sql);

				header('Location: product.php');
		    }
            else{
                $error="This customer Doesn't exist";
            }
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>WHOLESALE</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/pos.css">
<link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
</head>

<body>
	<div class="container">
        <div class="row">
            <img class="logo" src="pictures/sell.png">
        </div>  
    </div>
    
    <div class="container">
        
        <form action="sell_stock.php" method="post">
        <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Customer ID</label></div>
                    <span class="error"><?php echo $error ?></span>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="CID" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Stock ID</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="SID" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Stock Quantity</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="Quantity" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Stock price(Per unit)</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="price" required="required">
                    </div>
                </div>
            </div>
        

            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Received amount</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="r_amount" required="required">
                    </div>
                </div>
            </div>
            
            </div>
			<div class="form-group">
                <div class="row">
                    <div class="col-md-offset-6 col-md-2">
                       <button type="submit" class="btn btn-sm btn-primary btn-block">SELL</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
	<div class="container">
        <div class="row">
			<div class="col-md-offset-4 col-md-2">
				<a href="manager_control.php">Back to Menu</a>
			</div>
        </div>  
		<br/>
    </div> 
    
</body>
</html>