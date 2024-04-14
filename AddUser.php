<?php
echo  "The new user you fill is ".$_REQUEST["UserName"];
require_once "FunctionTable.php";
$Use=$_REQUEST["UserName"];
$ObjFile = new FileManager();
$ObjFile->FileName = "User.txt";
$ObjFile->Separator=",";

$UseObj=new User();
$UseObj->Fullname=$_POST["UserName"];
$UseObj->Gender=$_POST["Gender"];
$UseObj->InsertUser($ObjFile);

header("location:User.php");

?>