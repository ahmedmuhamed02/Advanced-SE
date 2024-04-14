<?php
include_once "db.php";
$DonationId=$_REQUEST["DonationId"];
$sql = "SELECT * FROM DonationDetails WHERE DonationId = $DonationId"; 
$resultDataset = $conn->query($sql);

while ($row = $resultDataset->fetch_assoc())
 {

    echo $row["PriceOfDonation" ] ;
    //$sql="select * from Product where Id=".$row["ProductId"];
    $sql = "SELECT * FROM product, productcategory WHERE product.Id=".$row["ProductId"]." and CategoryId = productcategory.Id";
    $ProductDs = $conn->query($sql);
    $ProductObj=$ProductDs->fetch_assoc();
    echo $ProductObj["ProductName"] ."<br>". " Category Name: ".$ProductObj["Name"] ."<br>";
 }
?>