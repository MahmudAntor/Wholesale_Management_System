<?php
include('include/login_check.php'); 
$date=date("Y-m-d");
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    include('include/connect.php');

    $st=$_POST['st'];
    $end=$_POST['end'];
$sql="SELECT selling_provides.Stock_ID, stock.Stock_name, selling_payment.sell_unit_price, selling_payment.sell_quantity,
buying_payment.buy_unit_price, buying_payment.buy_quantity,
(selling_payment.received_amount-selling_payment.sell_quantity*buying_payment.buy_unit_price) AS Profit

FROM selling_provides JOIN
selling_payment JOIN
buying_provides JOIN
buying_payment JOIN
stock_report JOIN
stock

WHERE stock_report.report_date BETWEEN '$st' AND
 '$end' AND
selling_provides.report_ID=stock_report.report_ID AND
selling_provides.sell_pay_no= selling_payment.sell_pay_no AND
buying_provides.Stock_ID=selling_provides.Stock_ID AND
buying_provides.buy_pay_no=buying_payment.buy_pay_no AND
stock.Stock_ID=selling_provides.Stock_ID";
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
            <img class="logo" src="pictures/pr1.png">
        </div>  
    </div>
    
    
     <div class="container">
     <form action="profit.php" method="POST">
        <div class="form-group">
            <div class="row">
                <div class="col-md-2" style="text-align:center; margin-left: 100px;"><h4>Report from</h4></div>
                <div class="col-md-2">
                   <input type="text" class="form-control" value="<?php echo date('Y-m-d',strtotime($date . "-1 months")); ?>" name="st"/>
                </div>
                <div class="col-md-2" style="text-align:center"><h4>TO</h4></div>
                <div class="col-md-2">
                    <input type="text" class="form-control" value="<?php echo $date ?>" name="end" />
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
     
    
    <div class="container">     
        <table id="customers">
            <tr> 
                <th>Stock ID</th>
                <th>Stock Name</th>
                <th>Buy quantity</th>
                <th>Buy (UNIT) price</th>
                <th>Sell quantity</th>
                <th>Sell (UNIT) price</th>
                <th>Profit</th>
             </tr>


            <?php
            $count=0;
            $sum=0;
                
            if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])){
            while($data=$result->fetch_object())
            {
                 $id=$data->Stock_ID; 
                $name=$data->Stock_name; 
                $b_qua=$data->buy_quantity; 
                $s_qua=$data->sell_quantity;
                 $cost=$data->buy_unit_price; 
                $price=$data->sell_unit_price;
                $profit=$data->Profit;
                ?>
                <tr> 
               <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $b_qua ?></td>
                <td><?php echo $cost ?></td>
                <td><?php echo $s_qua ?></td>
                <td><?php echo $price ?></td>
                <td><?php echo $profit ?></td>
                </tr>
            <?php $count++;  $sum += $profit; ?>
                <?php                             
                }
            }
                ?>
        </table>
    </div>
    <h4 align="right">Total profit :<?php echo $sum;?> </h4>

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