<?php
    include('include/login_check.php'); 
    
    $error="";
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        include('include/connect.php');
        
        $name=$_POST['name'];
        $des=$_POST['des'];
                $sql="INSERT INTO `supplier`(`supplier_id`, `supplier_name`, `supplier_address`) VALUES('NULL','$name','$des')";
                $stid  = mysqli_query($conn, $sql);
                
                header('Location: supplier_list.php');
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
            <img class="logo" src="pictures/add.png">
        </div>  
    </div>
    
    <div class="container">
        
        <form action="add_supplier.php" method="post">
        <fieldset>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Supplier Name</label></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="name" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-4 col-md-2"><label>Supplier Address</label></div>
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

            </fieldset>
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