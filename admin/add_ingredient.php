<?php
require '../connection.php';

if(($_SERVER['REQUEST_METHOD'])=='POST') {
  $name=mysqli_real_escape_string($conn, $_POST['name']);
  $rate=mysqli_real_escape_string($conn, $_POST['rate']);
  // $dish_rate=mysqli_real_escape_string($conn, $_POST['dish_rate']);
  $unit=mysqli_real_escape_string($conn, $_POST['unit']);

  $sql = "INSERT INTO tbl_ingredients (name, rate, unit)
    VALUES ('$name', '$rate', '$unit')";

   if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
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
  <title>Admin Dashboard | Caterpro</title>
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
  <link rel="stylesheet" href="../assets/css/style.css">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="../assets/images/hero-bg.jpg">
  <link rel="preload" as="image" href="../assets/images/hero-slide-1.jpg">
  <link rel="preload" as="image" href="../assets/images/hero-slide-2.jpg">
  <link rel="preload" as="image" href="../assets/images/hero-slide-3.jpg">

</head>

<body>
<?php include 'includes/nav.php'?>
  <main>
    <article>

      <section class="section admin-form_container has-bg-image" aria-label="home"
        style="background-image: url('../assets/images/hero-bg.jpg')">
        <form class="container" method="post">
            <!-- REGISTRATION CONTAINER: ADDED F1OR CATERPRO -->
            <!----------------------------- Form box ----------------------------------->
            <div class="admin-form">
              <!-- ----------------- login form ------------------------ -->
                <div class="login-container" id="login">
                  <div class="top">
                  <!-- <span>Start by adding dishes for your customers</span> -->
                  <header class="admin-form__header">Add Ingredient</header>
                  </div>
                  <div class="form-box">
                  <input type="text" class="form-field" name="name" placeholder="Ingredient Name">
                  <i class='bx bx-bowl-rice'></i>
                  </div>
                  <div class="form-box">
                  <input type="text" class="form-field" name="rate" placeholder="Rate">
                  <i class='bx bx-money' ></i>
                  </div>
                  <div class="form-box form-field">
                    Choose the unit type
                    <select name="unit" id="unit">
                        <option value="gm">Gram</option>
                        <option value="millilitre">Millilitre</option>
                    </select>
                  </div>
                  <div class="form-box">
                  <input type="submit" class="form-submit" name="submit" value="Save">
                  </div>
                  <div class="two-col">
                  <!-- <div class="one">
                      <input type="checkbox" id="login-check">
                      <label for="login-check"> Remember Me</label>
                  </div>
                  <div class="two">
                      <label><a href="#">Forgot password?</a></label>
                  </div> -->
                </div>
              </div>
            </div>
          </form>
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