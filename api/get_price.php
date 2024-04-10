<?php
require '../connection.php';
session_start();


$id=$_GET["id"];
$name=$_GET["name"];
$guest_count=$_GET["guest_count"];
$op_type=$_GET["op_type"];



$sql="call prcGetDishPrice($id,@price)";
$result1 = mysqli_query($conn, $sql);
// $result2 = mysqli_query($conn, "select @price");
$row = mysqli_fetch_assoc($result1);
$total=(int)$guest_count*(int)$row["price"];


echo "<tr>
<td class='noBorder' id='name'>$id. $name</td>
<td class='noBorder'><input type='number' value=$guest_count class='item_count'></td>
<td class='noBorder' >$total</td>
<td class='noBorder'><input type='button' value='Delete'></td>
</tr>";


// if ($op_type == 'insert')
// {
//     $conn = new mysqli($servername, $username, $password, $dbname);
//     // To get next auto increment value in mysql
//     $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$dbname' AND TABLE_NAME = 'tbl_order_dish'";
//     $result=mysqli_query($conn,$sql);
//     $row=mysqli_fetch_array($result);
//     $_SESSION['order_dishid'] = $row[0];


//     $conn = new mysqli($servername, $username, $password, $dbname);
//     $sql = "INSERT INTO tbl_order_dish (orderid, dishid, quantity)
//         VALUES ('1', '$id', '$guest_count')";
//     $conn->query($sql);
// }



// if ($op_type == 'update')
// {
//     $conn = new mysqli($servername, $username, $password, $dbname);
//     $userId = $_SESSION['order_dishid'];
//     $sql = "UPDATE tbl_order_dish set quantity=$guest_count where order_dishid = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("i", $userId);
//     $stmt->execute();
// }



?>