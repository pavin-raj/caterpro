<?php
require '../connection.php';

session_start();

// Prepare and execute SQL INSERT statements
$total=$_GET["total"];
$userId = $_SESSION['user_id'];
$date = $_GET['date'];
$time = $_GET['time'];
$guest_count = $_GET['guest_count'];
$delivery_address = $_GET['delivery_address'];
$o_status = 'Pending';
$paid_amount=0.0;

$insertQuery = "INSERT INTO orders (user_id, o_date, o_time, guest_count, delivery_address, o_status, total_amount, paid_amount) 
VALUES (?,?,?,?,?,?,?,?)";
$stmt = mysqli_prepare($conn, $insertQuery);

mysqli_stmt_bind_param($stmt, "ississdd", $userId, $date, $time, $guest_count, $delivery_address, $o_status, $total, $paid_amount);
if (mysqli_stmt_execute($stmt)){
    header("location: my_orders.php");
}
mysqli_stmt_close($stmt);
mysqli_close($conn);



$htmlFile = '../user/place_order.php';
$html = file_get_contents($htmlFile);

$dom = new DOMDocument();
$dom->loadHTML($html);
$xpath = new DOMXPath($dom);

$tableRows = $xpath->query('//tbody');

// Prepare the SQL statement
$insertQuery = "INSERT INTO tbl_order_dish (order_id, dish_id, quantity) VALUES (1,1, ?)";
$stmt = $conn->prepare($insertQuery);

// Loop through each tbody element
foreach ($tableBodies as $tableBody) {
  // Check if the tbody has children
  if ($tableBody.children.length > 0) {
    // Loop through each row in the tbody
    foreach ($tableBody.children as $row) {
      // Extract dish name and quantity
      $dishName = $row.querySelector('#name').textContent;
      $quantity = $row.querySelector('.item_count').value;

      // Bind and execute the prepared statement with the extracted data
      $stmt->bind_param("ss", $dishName, $quantity);
      $stmt->execute();

      // Add a success message for each inserted dish
      $dishes[] = ["message" => "Dish '$dishName' inserted with quantity $quantity"];
    }
  } else {
    // Log a message if a tbody is empty
    echo "Empty tbody found";
  }
}

exit;