<?php
include_once "db.php";

$sqlstmt = "SELECT * FROM usertype";
$resultDataset = $conn->query($sqlstmt);

while ($row = $resultDataset->fetch_assoc()) {
    echo "<a href=ListAllUsers.php?catid=" . $row["Id"] . ">" . $row["Name"] . "</a> <hr>";

}
?>

