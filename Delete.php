<?php
echo $_GET["id"];
require_once "FunctionTable.php";
$obj = new User();
$obj->DeleteUser($_GET["id"]); 

header("location:User.php");
?>
