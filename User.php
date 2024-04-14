</head>
<body>
    <h1>Users list</h1>
    <table border=1>

    <tr>
        <td>ID</td>
        <td>FullName</td>
        <td>Gender</td>
        <td>UserType</td>
        <td>Delete</td>
</tr>
<?php
require_once "FunctionTable.php";
$obj=new User();
$arr=[];

$arr=$obj->ListAllUsers();

for ($i=0;$i<count($arr);$i++)
{
    echo "<tr><td>".$arr[$i]->id."</td><td>".$arr[$i]->Fullname."</td><td>".$arr[$i]->Gender."</td><td>".$arr[$i]->Usertype."</td><td><a href=Delete.php?id=".$arr[$i]->id.">Delete</a></td></tr>";
}
?>
<tr>
    <td>
        <a href="AddUser.html">Add User<a>

    </td>
</tr>
</table>
</body>
</html>