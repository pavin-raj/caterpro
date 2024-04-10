<?php


// Establish database connection
require 'connection.php';
if (!$conn) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve dish details from the form arrays
    // $dishNames = $_POST["dish_name"];
    $quantities = $_POST["quantity"];
    // $rates = $_POST["rate"];

    // Loop through the arrays and insert each dish into the database
    for ($i = 0; $i < count($quantities); $i++) {
        // $dishName = $conn->real_escape_string($dishNames[$i]);
        $quantity = $conn->real_escape_string($quantities[$i]);
        // $rate = $conn->real_escape_string($rates[$i]);

        // You can perform additional validation here if needed

        // Insert data into the database
        $sql = "INSERT INTO tbl_order_dish (orderid, dishid, quantity) VALUES (4,2, $quantity)";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    echo "Dish details stored successfully";
}

$conn->close();
?>
