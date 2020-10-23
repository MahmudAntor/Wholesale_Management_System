<?php
  include('include/login_check.php'); 
	$date=date("Y-m-d");
  include('include/report.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
  </head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<style>

.injected-text {
    margin-bottom: -25px;
    text-align: center;
  }
  .bigbox{
  	background-color: #CC99FF  ;
  	padding: 50px;

  }



#copyright {
    position: absolute;
    bottom: 0;
}
s


.red-text {
    color: white;
  }
.blue-box {
    background-color:#9932CC;
    padding: 20px;
    
  }
  .size {
width: 100%;
height: 100%;

}
.box {
    border-style: solid;
    border-color: black;
    border-width: 5px;
    text-align: center;
  }
  
  .green-box {
    background-color:#9932CC ;
    padding: 3px;
    border: 1px solid black;
  }
  .padding2 {
    {
    padding-right: 50% ;
    padding-top: 60%;
}
}


 </style>

  <body>
  <div class="box bigbox">
  <div class="size">
  
  

  <div class="jumbotron text-center">
  <h1 class=" blue-box animated zoomIn" "font-fastyle=mily:Courier; style="color:white;">Wholesale Management Page</h1>
  <div class="container">
        <div class="row">
            <img class="logo" style="border:5px solid #9932CC" src="pictures/lg.jpg">
        </div>  

    <title>Wholesale</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/pos.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>       
</head>

   
                <p class="green-box animated fadeInUp" style="color:white;">Menu</p>
			<div class="green-box">	<ul class="nav nav-pills nav-stacked ">
					
					<li class="dropdown">
					  <a class="bg-warning" data-toggle="dropdown">Stock Info<span class="caret"></span></a>
					  <ul class="dropdown-menu pull-right">
						<li><button type="button" class="btn btn-block btn-default animated slideInLeft"><a href="product.php">stock list</a></button></li>
						<li><button type="button" class="btn btn-block btn-default animated slideInRight"><a href="add_product.php">Buy stock</a></button></li>
						<li><button type="button" class="btn btn-block btn-default animated slideInLeft"><a href="buy_stock.php">stock to buy</a></button></li>
						<li><button type="button" class="btn btn-block btn-default animated slideInRight"><a href="sell_stock.php">Sell stock</a></button></li>
					  </ul>
					</li>
					<li class="dropdown">
					  <a class="bg-warning" data-toggle="dropdown">Customer Info<span class="caret"></span></a>
					  <ul class="dropdown-menu pull-right">
						  <li><button type="button" class="btn btn-block btn-default animated slideInLeft"><a href="customer_list.php">Customer list</a></button></li>
						  <li><button type="button" class="btn btn-block btn-default animated slideInRight"><a href="add_customer.php">Customer add</a></button></li>
						  <li><button type="button" class="btn btn-block btn-default animated slideInLeft"><a href="pending_customer.php">Customer pending list</a></button></li>
					  </ul>
					</li>
					<li class="dropdown">
					  <a class="bg-warning" data-toggle="dropdown">Supplier Info<span class="caret"></span></a>
					  <ul class="dropdown-menu pull-right">
						  <li><button type="button" class="btn btn-block btn-default animated slideInLeft"><a href="supplier_list.php">Supplier list</a></button></li>
						  <li><button type="button" class="btn btn-block btn-default animated slideInRight"><a href="add_supplier.php">supplier add</a></button></li>
						  <li><button type="button" class="btn btn-block btn-default animated slideInLeft"><a href="pending_supplier.php">supplier pending list</a></button></li>
					  </ul>
					</li>

					<li class="dropdown">
				<a class="bg-warning" data-toggle="dropdown">Report<span class="caret"></span></a>
					  <ul class="dropdown-menu pull-right">
						  <li><button type="button" class="btn btn-block btn-default animated slideInRight"><a href="profit.php">Profit info of this month</a></button></li>
						  
					  </ul>
					</li></div>
					</div>
				
				
				
    
            
			 <button type="button" class="btn btn-info" style="float: right;">
                
            <a href="include/logout.php">Log Out</a><br/></button>
            </div>
            
          </div>

    </div>  
    </div>  
    </div></div>
     
</body> 
</html>