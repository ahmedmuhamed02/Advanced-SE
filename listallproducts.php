<?php
include_once "db.php"; 
$cat = $_REQUEST["catid"]; 
$UserId=$_REQUEST["UserId"];
$sql = "SELECT * FROM product WHERE CategoryId = $cat"; 
$resultDataset = $conn->query($sql);

while ($row = $resultDataset->fetch_assoc()) {
    echo $row["ProductName"] ." -In stock :".$row["InventoryQuantity"]."<a href=addtocart.php?PID=".$row["Id"]."&UserId=$UserId> Add to Cart"."| <hr>";
}

?>