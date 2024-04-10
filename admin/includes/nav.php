<!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo navbar-link" style="font-size: larger;">
        <!-- <img src="../assets/images/logo-light.svg" width="74" height="24" alt="Adex home" class="logo-light">

        <img src="../assets/images/logo-dark.svg" width="74" height="24" alt="Adex home" class="logo-dark"> -->
        CaterPro
      </a>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">
          <a href="#" class="logo">
            <img src="../assets/images/logo-light.svg" width="74" height="24" alt="Adex home">
          </a>

          <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">

          <li>
            <a href="/caterpro/admin/dashboard.php" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="#" class="navbar-link">Add</a>
            <div class="sub-menu">
              <ul>
                <li><a href="/caterpro/admin/add_dish.php">Dish</a></li>
                <li><a href="/caterpro/admin/add_ingredient.php">Ingredient</a></li>
                <li><a href="/caterpro/admin/ingredient_to_dish.php">Ingredient to Dish</a></li>
              </ul>
            </div>
          </li>

          <li>
            <a href="#" class="navbar-link">Orders</a>
            <div class="sub-menu">
              <ul>
                <li><a href="/caterpro/admin/orders/pending_orders.php">Pending</a></li>
                <li><a href="/caterpro/admin/orders/approved_orders.php">Approved</a></li>
              </ul>
            </div>
          </li>

          <li>
            <a href="/caterpro/admin/users.php" class="navbar-link">Users</a>
          </li>

          <li>
            <a href="/caterpro/logout.php" class="navbar-link">Logout</a>
          </li>

        </ul>

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-dribbble"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>

      <!-- <a href="signin.php" class="btn btn-primary">Sign In</a> -->

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>