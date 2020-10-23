<?php
include('include/login_check.php'); 
include('include/connect.php');
$sql="SELECT customer_id, customer_name, customer_address FROM customer ORDER BY customer_ID ASC";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
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
    <title>Wholesale</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/pos.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <img class="logo" src="pictures/cst.png">
        </div>  
    </div>
    
    <div class="container">     
        <table id="customers">
            <tr> 
               <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Address</th>
            
            </tr>  
              <?php
            while($data=$result->fetch_object())
            {
                 $id=$data->customer_id; 
                $name=$data->customer_name; 
                $add=$data->customer_address;  
                ?>
                <tr> 
               <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $add ?></td>

                <td><a href="update_customer.php?sid=<?php echo $id;?>"><button type="button" class="btn btn-primary">Edit</button></a></td></a></td>
                <td><a href="delete_customer.php?did=<?php echo $id;?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>
            
                <?php                             
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