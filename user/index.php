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
      <section class="section hero has-bg-image" aria-label="home"
        style="background-image: url('../assets/images/hero-bg.jpg')">
        <div class="container">
          <!-- HERO CONTAINER -->
          <div class="hero-content">
            <h1 class="h1 hero-title">Welcome, user</h1>
            <p class="hero-text">
              Collaborate with us for hassle free catering booking and delivery.
            </p>

            <!-- <div class="btn-wrapper">
              <a href="#" class="btn btn-primary">Explore Now</a>
              <a href="#" class="btn btn-outline">Contact Us</a>
            </div> -->

          </div>

          <div class="hero-slider" data-slider>
            <div class="slider-inner">
              <ul class="slider-container" data-slider-container>
                <li class="slider-item">
                  <figure class="img-holder" style="--width: 575; --height: 550;">
                    <img src="../assets/images/hero-slide-1.jpg" width="575" height="550" alt="" class="img-cover">
                  </figure>
                </li>

                <li class="slider-item">
                  <div class="hero-card">
                    <figure class="img-holder" style="--width: 575; --height: 550;">
                      <img src="../assets/images/hero-slide-2.jpg" width="575" height="550" alt="hero banner"
                        class="img-cover">
                    </figure>
                    <button class="play-btn" aria-label="play adex intro">
                      <ion-icon name="play" aria-hidden="true"></ion-icon>
                    </button>
                  </div>

                </li>

                <li class="slider-item">

                  <figure class="img-holder" style="--width: 575; --height: 550;">
                    <img src="../assets/images/hero-slide-2.jpg" width="575" height="550" alt="" class="img-cover">
                  </figure>

                </li>

              </ul>
            </div>

            <button class="slider-btn prev" aria-label="slide to previous" data-slider-prev>
              <ion-icon name="arrow-back"></ion-icon>
            </button>

            <button class="slider-btn next" aria-label="slide to next" data-slider-next>
              <ion-icon name="arrow-forward"></ion-icon>
            </button>

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