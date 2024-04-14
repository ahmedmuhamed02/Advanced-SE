<?php
include_once "db.php";
$Tablename=$_REQUEST["Tablename"];
$Id=$_REQUEST["Id"];
$sql="delete from $Tablename Where Id=".$Id;
//echo ($sql);
 $conn->query($sql);
?>