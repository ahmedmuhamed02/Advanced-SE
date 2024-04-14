<?php
include_once "db.php";
$sqlstmt = "SELECT * FROM usertype";
$resultDataset = $conn->query($sqlstmt);
$UserInfoObj = array(); 
if (isset($_REQUEST["userId"]))
{
$userId=$_REQUEST["userId"];
$sql="select * from user Where Id=$userId";
$UserInfoDs=$conn->query($sql);
$UserInfoObj=$UserInfoDs->fetch_assoc();


}

?>
<form action=adduserdb.php method="POST">
    FullName <input type = text name= "FullName" <br>
    DOB <input type = text name= "DOB"> <br>
    <select name="UserTypeId">
    <?php

    while ($row = $resultDataset->fetch_assoc())
     {
    echo "<option value=" . $row["Id"] . ">" . $row["Name"] . "</option>";

     }

    ?>   

    </select>
    <br>
    <input type="submit">

</form>

