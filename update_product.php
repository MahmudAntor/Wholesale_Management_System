<?php
	include('include/login_check.php');    
	
	$error="";
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		include('include/connect.php');         
		
        $id=$_POST['SID'];
		$name=$_POST['name'];
		$qua=$_POST['Quantity'];
		$cost=$_POST['cost'];
        $price=$_POST['paid_amount'];

            $sql="SELECT * FROM stock WHERE stock_id='$id'";
            $stid  = mysqli_query($conn, $sql);
            $info = mysqli_fetch_assoc($stid);
	
            if (mysqli_num_rows($stid) != 0)
            {
				//echo 'ok';
		      	$sql="UPDATE `stock` SET `Stock_name`='$name', `Stock_quantity`=`Stock_quantity`+'$qua' WHERE Stock_ID='$id'";
				$stid  = mysqli_query($conn, $sql);

                $sql="UPDATE buying_provides, buying_payment SET buy_unit_price='$cost' WHERE buying_provides.Stock_ID='$id' AND buying_provides.buy_pay_no=buying_payment.buy_pay_no";
                $stid  = mysqli_query($conn, $sql);

                $sql="UPDATE selling_provides, selling_payment SET sell_unit_price='$price' WHERE selling_provides.Stock_ID='$id' AND selling_provides.sell_pay_no=selling_payment.sell_pay_no";
                $stid  = mysqli_query($conn, $sql);
				
				header('Location: product.php');
		    }
            else{
                $error="This Supplier Doesn't exist";
            }
	}

    else 
    {
        include('include/connect.php');
        $pass_id = $_GET['sid'];
        $sql_pass = "SELECT stock.Stock_ID sid, stock.Stock_name sname, stock.Stock_quantity, buying_payment.buy_unit_price, selling_payment.sell_unit_price

FROM stock

RIGHT OUTER JOIN (buying_provides RIGHT OUTER JOIN buying_payment ON buying_provides.buy_pay_no=buying_payment.buy_pay_no) ON stock.Stock_ID=buying_provides.Stock_ID

RIGHT OUTER JOIN (selling_provides RIGHT OUTER JOIN selling_payment ON selling_provides.sell_pay_no=selling_payment.sell_pay_no) ON stock.Stock_ID=selling_provides.Stock_ID

WHERE stock.Stock_ID = '$pass_id'

UNION

SELECT stock.Stock_ID sid, stock.Stock_name sname, stock.Stock_quantity, buying_payment.buy_unit_price, selling_payment.sell_unit_price

FROM stock

LEFT OUTER JOIN (buying_provides LEFT OUTER JOIN buying_payment ON buying_provides.buy_pay_no=buying_payment.buy_pay_no) ON stock.Stock_ID=buying_provides.Stock_ID

LEFT OUTER JOIN (selling_provides LEFT OUTER JOIN selling_payment ON selling_provides.sell_pay_no=selling_payment.sell_pay_no) ON stock.Stock_ID=selling_provides.Stock_ID
    
WHERE Stock.Stock_ID = '$pass_id'";

$st  = mysqli_query($conn, $sql_pass);
$rslt = mysqli_fetch_assoc($st);

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
            <img class="logo" src="pictures/box.jpg">
        </div>  
    </div>
    
    <div class="container">
    
        <form action="update_product.php" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Stock ID</label></div>
                    <span class="error"><?php echo $error ?></span>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="SID" value="<?= $rslt['sid'] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Stock Name</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="name" value="<?= $rslt['sname'] ?>" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Stock Quantity</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="Quantity" value="<?= $rslt['Stock_quantity'] ?>" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Stock Cost(Per unit)</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="cost" value="<?= $rslt['buy_unit_price'] ?>" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Stock price</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="paid_amount" value="<?= $rslt['sell_unit_price'] ?>">
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