<?php
include('include/login_check.php'); 	
	
	$error="";
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		include('include/connect.php');
		
        $id=$_POST['SID'];
		$name=$_POST['name'];
		$qua=$_POST['Quantity'];
		$cost=$_POST['cost'];
        $p_amnt=$_POST['paid_amount'];

            $sql="SELECT * FROM Supplier WHERE supplier_id='$id'";
            $stid  = mysqli_query($conn, $sql);
	
            if (mysqli_num_rows($stid) != 0)
            {
				//echo 'ok';
		      	$sql="INSERT INTO `stock`(`Stock_name`, `Stock_quantity`) VALUES ('$name', '$qua')";
				$stid  = mysqli_query($conn, $sql);
				
                $sql="INSERT INTO `buying_payment`(`buy_unit_price`, `buy_quantity`, `paid_amount`, `supplier_id`) VALUES ('$cost', '$qua', '$p_amnt', '$id')";
                $stid  = mysqli_query($conn, $sql);

                $sql="INSERT INTO `buying_provides`(`Stock_ID`, `buy_pay_no`, `report_ID`) VALUES ((SELECT Stock_ID FROM stock ORDER BY Stock_ID DESC LIMIT 1), (SELECT buy_pay_no FROM buying_payment ORDER BY buy_pay_no DESC LIMIT 1), (SELECT report_ID FROM stock_report ORDER BY report_ID DESC LIMIT 1))";
                $stid  = mysqli_query($conn, $sql);

                $sql="INSERT INTO `bought_from`(`supplier_id`, `Stock_ID`) VALUES ($id, (SELECT Stock_ID FROM stock ORDER BY Stock_ID DESC LIMIT 1))";
                $stid  = mysqli_query($conn, $sql);

				header('Location: product.php');
		    }
            else{
                $error="This Supplier Doesn't exist";
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
            <img class="logo" src="pictures/bman.png">
        </div>  
    </div>
    
    <div class="container">
        
        <form action="add_product.php" method="post">
        <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Supplier ID</label></div>
                    <span class="error"><?php echo $error ?></span>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="SID" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Stock Name</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="name" required="required">
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
                    <div class="col-md-offset-4 col-md-2"><label>Stock Cost(Per unit)</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="cost" required="required">
                    </div>
                </div>
            </div>
        

            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Paid amount</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="paid_amount" required="required">
                    </div>
                </div>
            </div>
            
            </div>
			<div class="form-group">
                <div class="row">
                    <div class="col-md-offset-6 col-md-2">
                       <button type="submit" class="btn btn-sm btn-primary btn-block">Add</button>
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