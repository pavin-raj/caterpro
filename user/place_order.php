<?php
require '../connection.php';
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

  <?php include 'nav.php'?>
  <main>
    <article>
      <section class="section admin-form_container has-bg-image" aria-label="home"
        style="background-image: url('../assets/images/hero-bg.jpg')">
        <form class="container" method="post" action="my_orders/pending_orders.php">
            <!-- REGISTRATION CONTAINER: ADDED F1OR CATERPRO -->
            <!----------------------------- Form box ----------------------------------->
            <div class="admin-form">
              <!-- ----------------- login form ------------------------ -->
                <div class="login-container" id="login">
                  <div class="top">
                  <!-- <span>Start by adding dishes for your customers</span> -->
                  <header class="admin-form__header">Place Order</header>
                  </div>
                  <div class="form-section">
                      <div class="form-box">
                          <input type="date" class="form-field" name="date" id="date" placeholder="Date">
                          <i class='bx bx-bowl-rice'></i>
                      </div>
                      <div class="form-box">
                          <input type="time" class="form-field" name="time" id="time" placeholder="Time">
                          <i class='bx bx-money' ></i>
                      </div>
                  </div>
                 

                  <div class="form-box">
                  <input type="text" class="form-field" name="delivery_address" id="delivery_address" placeholder="Delivery Address">
                  <i class='bx bx-detail' ></i>
                  </div>

                  <div class="form-box">
                  <input type="number" class="form-field" name="guest_count" id="guest_count" placeholder="Guest Count">
                  <i class='bx bx-detail' ></i>
                  </div>

                  <!-- <div class="form-section">
                      <div class="form-box">
                          <input type="number" class="form-field" name="veg_guest" placeholder="Veg Guests">
                          <i class='bx bx-bowl-rice'></i>
                      </div>
                      <div class="form-box">
                          <input type="number" class="form-field" name="non_veg_guest" placeholder="Non Veg Guests">
                          <i class='bx bx-bowl-rice'></i>
                      </div>
                  </div> -->

                  <div class="form-section">
                    <div class="form-box form-field">
                      Choose dishes
                      <select name="dish" id="dish">
                        <?php
                          $sql="SELECT * FROM tbl_dish";
                          if($result=mysqli_query($conn,$sql))
                          {
                            if(mysqli_num_rows($result)>0)
                            {
                              while($row=mysqli_fetch_array($result))
                              echo "<option value='$row[dish_id]'>$row[dish_name]</option>"; 
                            }
                          }
                        ?>  
                      </select>
                    </div>
                    <div class="form-box">
                      <input type="button" class="form-submit" name="add" value="Add" onclick="getDishInfo()">
                    </div>
                  </div>

                  <input name="table-inp">
                  <div class="table-container">
                      <div class="table-responsive">
                        <table class="table" id="table">
                          <thead>
                            <tr>
                              <th scope="col">Dish</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Rate</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          
                          <?php 
                          $html='<tbody id="table-body"> </tbody>';
                          echo $html;
                          ?>


                          <tbody> 
                            <tr>
                                <td></td>
                                <td></td>
                                <td class='noBorder'>TOTAL</td>
                                <td class='noBorder'><input type="text" id='total' name='total' disabled style="color: white;"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>

                  <div class="form-box">
                  <input type="submit" class="form-submit" name="submit" value="Save" onclick="insertOrder()">
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