<?php
include('include/login_check.php'); 
include('include/connect.php');
$sql="SELECT * FROM supplier";
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
            <img class="logo" src="pictures/ppl.png">
        </div>  
    </div>
    
    <div class="container">     
        <table id="customers">
            <tr> 
               <th>Supplier ID</th>
                <th>Supplier Name</th>
                <th>Supplier Address</th>
            
            </tr>  
            <?php
            while($data=$result->fetch_object())
            {
                 $id=$data->supplier_id; 
                $name=$data->supplier_name; 
                $add=$data->supplier_address;  
                ?>
                <tr> 
               <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $add ?></td>

                <td><a href="update_supplier.php?sid=<?php echo $id;?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
                 <td><a href="delete_supplier.php?did=<?php echo $id;?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>
            
                <?php                             
                }
                ?>
        </table>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            <button type="button" class="btn " style="float: right;">
                <a href="manager_control.php">Back to Menu</a>
            </div>
        </div>  
        <br/>
    </div> 
    
</body>
</html>