<?php
require '../connection.php';
$id = $_GET['id'];
$sql = "UPDATE orders SET o_status='Approved' where order_id=$id";
if ($conn->query($sql) === TRUE) {
    header("location: ../../admin/orders/approved_orders.php");
    echo $sql;
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
