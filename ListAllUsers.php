<?php
include_once "db.php"; 
$cat = $_REQUEST["catid"]; 
$sql = "SELECT * FROM user WHERE UserTypeId = $cat"; 
$resultDataset = $conn->query($sql);

while ($row = $resultDataset->fetch_assoc()) {
    echo $row["Id"] . "-" . $row["FullName"] . "-" . $row["DOB"] . " | <a href=ShowUsersDonation.php?UserId=".$row["Id"]."> Show All Donations </a> <a href=listproductcategory.php?UserId=".$row["Id"].">- Donate now </a>| <a href=adduser.php?UserId=".$row["Id"]."> Edit User </a> <hr>";
}

?>