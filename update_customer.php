<?php
	include('include/login_check.php');    
	
	$error="";
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		include('include/connect.php');         
		
        $id=$_POST['SID'];
		$name=$_POST['name'];
		$add=$_POST['add'];

            $sql="SELECT * FROM customer WHERE customer_id='$id'";
            $stid  = mysqli_query($conn, $sql);
            $info = mysqli_fetch_assoc($stid);
	
            if (mysqli_num_rows($stid) != 0)
            {
				echo 'ok';
		      	$sql="UPDATE `customer` SET `customer_name`='$name', `customer_address`='$add' WHERE customer_id='$id'";
				$stid  = mysqli_query($conn, $sql);
				
				header('Location: customer_list.php');
		    }
            else{
                $error="This customer Doesn't exist";
            }
	}

    else 
    {
        include('include/connect.php');
        $pass_id = $_GET['sid'];
        $sql_pass = "SELECT * FROM customer WHERE customer_id='$pass_id'";

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
            <img class="logo" src="pictures/up.png">
        </div>  
    </div>
    
    <div class="container">
    
        <form action="update_customer.php" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Customer ID</label></div>
                    <span class="error"><?php echo $error ?></span>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="SID" value="<?= $rslt['customer_id'] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Customer Name</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="name" value="<?= $rslt['customer_name'] ?>" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Customer Address</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="add" value="<?= $rslt['customer_address'] ?>" required="required">
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