<?php
    include('include/login_check.php');	
	
	$error="";
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		include('include/connect.php');
		
		$name=$_POST['name'];
		$des=$_POST['des'];
				$sql="INSERT INTO customer VALUES('NULL','$name','$des')";
				$stid  = mysqli_query($conn, $sql);
				
				header('Location: customer_list.php');
	}
?>

<html>
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
            <img class="logo" src="pictures/acs.png">
        </div>  
    </div>
    
    <div class="container">
        
        <form action="add_customer.php" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Customer Name</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="name" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Customer Address</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="des" required="required">
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
            <button type="button" class="btn " style="float: right;">
				<a href="manager_control.php">Back to Menu</a>
			</div>
        </div>  
		<br/>
    </div> 
    
</body>
</html>