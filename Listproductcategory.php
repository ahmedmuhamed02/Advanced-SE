<?php
include_once "db.php";
$UserId=$_REQUEST["UserId"];
$sqlstmt = "SELECT * FROM productcategory";
$resultDataset = $conn->query($sqlstmt);

while ($row = $resultDataset->fetch_assoc()) {
    $sql= "SELECT count(*) FROM product WHERE CategoryId=".$row["Id"] ;
    $resultDataset1 = $conn->query($sql);
    $row1 = mysqli_fetch_array($resultDataset1) ;
    echo "<a href=Listallproducts.php?catid=" . $row["Id"] . "&UserId=".$UserId.">" . $row["Name"] ."(".$row1[0]. ")</a> <hr>";

}
?>

