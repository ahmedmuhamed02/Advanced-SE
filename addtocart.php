<?php
include_once "db.php"; 
$PID = $_REQUEST["PID"]; 
$UserId=$_REQUEST["UserId"];
$DonationDate=date("y-m-d");
$DonationTme=date("h:i:sa");
$sql="insert into mydonation (DonorId,DonationDate,DonationTime,PaymentMethodId) values ($UserId,'$DonationDate','$DonationTme',1) ";
//echo $sql;
$conn->query($sql);
$Orderid=$conn->insert_id;    //akhr id etdaf
echo $Orderid;
$input = fgets(STDIN);
echo "You entered: $input";
$sql=" insert into donationdetails(DonationID,ProductId,Quantity) values ($Orderid,$PID,1)";
$conn->query($sql);
?> 