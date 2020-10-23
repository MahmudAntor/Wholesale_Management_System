<?php
include('include/login_check.php'); 
if ($_SERVER["REQUEST_METHOD"]=="POST"){
include('include/connect.php');
$inp_qua=$_POST['qua'];

$sql="SELECT stock.Stock_ID sid, stock.Stock_name sname, stock.Stock_quantity, buying_payment.buy_unit_price

FROM stock

RIGHT OUTER JOIN (buying_provides RIGHT OUTER JOIN buying_payment ON buying_provides.buy_pay_no=buying_payment.buy_pay_no) ON stock.Stock_ID=buying_provides.Stock_ID

RIGHT OUTER JOIN (selling_provides RIGHT OUTER JOIN selling_payment ON selling_provides.sell_pay_no=selling_payment.sell_pay_no) ON stock.Stock_ID=selling_provides.Stock_ID
where stock.Stock_quantity < '$inp_qua'

UNION

SELECT stock.Stock_ID sid, stock.Stock_name sname, stock.Stock_quantity, buying_payment.buy_unit_price

FROM stock

LEFT OUTER JOIN (buying_provides LEFT OUTER JOIN buying_payment ON buying_provides.buy_pay_no=buying_payment.buy_pay_no) ON stock.Stock_ID=buying_provides.Stock_ID

LEFT OUTER JOIN (selling_provides LEFT OUTER JOIN selling_payment ON selling_provides.sell_pay_no=selling_payment.sell_pay_no) ON stock.Stock_ID=selling_provides.Stock_ID
where stock.Stock_quantity < '$inp_qua'";
$result=mysqli_query($conn,$sql);
}
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
            <img class="logo" src="pictures/box.jpg">
        </div>  
    </div>
    <div class="container">
     <form action="buy_stock.php" method="post">
     <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="qua" required="required">
                        <button type="submit" name="submit" class="btn btn-sm btn-primary btn-block">Minimum Quantity</button>
                    </div>
                </div>
            </div>
    </form>
   

        <table id="customers">
            <tr> 
               <th>Stock ID</th>
                <th>Stock Name</th>
                <th>Stock Quantity</th>
                <th>Stock Cost</th>
             </tr>

            <?php
            $count=0;
            if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])){
            while($data=$result->fetch_object())
            {
                $count++; 
                 $id=$data->sid; 
                $name=$data->sname; 
                $qua=$data->Stock_quantity; 
                 $cost=$data->buy_unit_price; 
                ?>
                <tr> 
               <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $qua ?></td>
                <td><?php echo $cost ?></td>

                <td><a href="update_product.php?sid=<?php echo $id;?>"><button type="button" class="btn btn-primary">Add Stock</button></a></td>
                </tr>
            
                <?php                       
                }
            }
            if($_SERVER["REQUEST_METHOD"]=="POST" && mysqli_num_rows($result) < 1 && isset($_POST['submit'])){
                echo "NO ITEMS NEED TO BE BOUGHT"; }
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