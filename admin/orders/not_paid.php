<?php
require '../../connection.php';
$sql = "SELECT * FROM orders o INNER JOIN tbl_user u ON o.user_id = u.user_id AND o_status='Approved' AND paid_amount=0";
$result=mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tags
  -->
  <title>User Page | Caterpro</title>
  <meta name="title" content="CaterPro">
  <meta name="description" content="This is a business agency html template made by codewithsadee">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap" rel="stylesheet">

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="../assets/images/hero-bg.jpg">
  <link rel="preload" as="image" href="../assets/images/hero-slide-1.jpg">
  <link rel="preload" as="image" href="../assets/images/hero-slide-2.jpg">
  <link rel="preload" as="image" href="../assets/images/hero-slide-3.jpg">

</head>

<body>

  <?php include '../includes/nav.php'?>
  <main>
    <article>
      <section class="section hero has-bg-image" aria-label="home"
        style="background-image: url('../../assets/images/hero-bg.jpg')">
        <div class="nav-container">
          <a href="approved_orders.php">All</a>
          <a href="not_paid.php">Not Paid</a>
          <a href="advance_paid.php">Advance Paid</a>
        </div>
        <div class="container">
          <?php
          if(mysqli_num_rows($result)>0)
            {
              while($row=mysqli_fetch_array($result))
              {
                echo "<div class='order-card'>
                <h1>$row[2]</h1>
                <h2>$row[5]</h2>
                <br>
                <h3>Order Details</h3>
                <div style='color: #ff6487;'>
                    <p>Status: $row[6]</p>
                    <p>Delivery Time: $row[3]</p>
                    <p>Total Guests: $row[4]</p>
                    <p>Paid: $row[8]</p>
                    <p>Balance to be Paid: $row[7]</p>
                </div>
                <br>
                <h3>User Details</h3>
                <div style='color: #fff896;'>
                    <p>Id: $row[9]</p>
                    <p>Email: $row[10]</p>
                    <p>Address: $row[12]</p>
                    <p>Phone: $row[13]</p>
                </div>";
                echo "</div>";
              }
            }
          ?>
            <!-- <div class="order-card">
                <h1>Hi, i'm John Doe</h1>
                <h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
                <img class="me" src="https://via.placeholder.com/200x200&text=my image" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis eaque nisi assumenda quo consequatur corporis necessitatibus aperiam delectus, animi nemo magnam, alias soluta, eos explicabo hic. Natus doloribus necessitatibus voluptatibus!</p>
                <button>Learn more about me</button> -->
            </div>

        </div>
      </section>

      <!-- 
    - custom js link
  -->
      <script src="../assets/js/script.js"></script>

      <!-- 
    - ionicon
  -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>