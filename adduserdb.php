<?php
include_once "db.php"; 
$FullName =$_REQUEST["FullName"]; 
$DOB=$_REQUEST["DOB"];
$UserTypeId=$_REQUEST["UserTypeId"];

$sql="INSERT INTO user (FullName, UserTypeId, DOB) VALUES ('$FullName', '$UserTypeId', '$DOB')";

$conn->query($sql);
header('location:ListUserType.php');
?>