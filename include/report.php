<?php
include('include/connect.php');
$date=date("Y-m-d");
$dt=strtotime($date);

$sql="SELECT report_date

FROM stock_report

ORDER by report_date DESC limit 1";
$result=mysqli_query($conn,$sql);

while($data=$result->fetch_object())
            {
                 $end_date=$data->report_date; 
            }
$end_dt= strtotime($end_date);

if(($dt-$end_dt)/86400 > 29)
{
	$sql="INSERT INTO `stock_report`(`report_date`, `manager_ID`) VALUES ('$date', (SELECT manager_ID FROM `manager` ORDER BY manager_ID DESC LIMIT 1))";
$result=mysqli_query($conn,$sql);
}


?>