<table border=1>
<?php
include_once "db.php";
$UserId=$_REQUEST["UserId"];
$sql="select * from user Where Id=$UserId";
$UserInfoDs=$conn->query($sql);
$UserInfoObj=$UserInfoDs->fetch_assoc();
?>
<tr>
    <td>
        User Full Name:
</td>
<td>
    <?php
    echo $UserInfoObj["FullName"];
    ?>
</td>
</tr>

<?php

$sql="SELECT * FROM mydonation WHERE DonorId =$UserId";

$resultDataset = $conn->query($sql);

while ($row = $resultDataset->fetch_assoc()) 
{
    $sql="SELECT * FROM paymentmethod WHERE Id =".$row["PaymentMethodId"] ;
    $dataset1= $conn->query($sql);
    $PaymentMethodDS= $dataset1->fetch_assoc();
    echo "<tr>";
echo "<td>Donation No.". $row["Id"]."</td>";
echo "<td><a href='DonationDetails.php?DonationId=". $row["Id"]."'>".$row["DonationDate"]."</a></td>";
echo "<td>Payment Method:".$PaymentMethodDS["Name"]."</td>";
echo "<td><a href='del.php?Id=".$row["Id"]."&Tablename=mydonation'>Delete</a></td>";
echo "</tr>";
}

?>
</table>