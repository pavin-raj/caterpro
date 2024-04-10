<?php
require 'connection.php';
session_start();

if(!isset($_SESSION['user_type'])) {  

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // $myusername = mysqli_real_escape_string($conn,$_POST['username']);
        // $mypassword = mysqli_real_escape_string($conn,$_POST['password']);  
        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];  

    
        $sql = "SELECT admin_id FROM tbl_admin WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);     
        $count_admin = mysqli_num_rows($result);

        $sql = "SELECT user_id FROM tbl_user WHERE email = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count_user = mysqli_num_rows($result);
        
        // If result matched $myusername and $mypassword, table row must be 1 row
            
        if($count_admin == 1) {
            session_start();
            //  session_register("myusername");
            $_SESSION['user_type'] = 1;
            
            header("location: admin/dashboard.php");
        }
        if($count_user == 1) {
            session_start();
            //  session_register("myusername");
            $_SESSION['user_type'] = 2;
            $_SESSION['user_id'] = $row['user_id'];
            
            header("location: user/index.php");
        }   
        else {
            $error = "Your Login Name or Password is invalid";
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
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>
<body class="form-bg">
    <div class="form-container">
        <form action="" method="POST" class="signin-container" id="signin-form" name="sigin-form">
            <span class="signin-brand"><img src="assets/images/logo.png" alt="" width="100" height="100"><h3 class="signin-brand__text">CaterPro</h3></span>
            <h2>Sign in</h2>
            <ul>
                <li><input type="text" name="username" id="username" placeholder="Email, phone, or username" onkeypress="if (event.keyCode==13) next()"></li>
                <li><input type="password" name="password" id="password" placeholder="Password" onkeypress="if (event.keyCode==13) signin()"></li>
                <li class="reg-cta">No account? <a href="register.php">Create one!</a></li>
                <li class="button-container">
                    <a href="index.php" class="button-secondary"><input type="button"  value="Back"></a>
                    <input class="button-primary" type="button" name="next-btn" id="next-btn" value="Next" onclick="next()">
                    <input class="button-primary" type="button" name="signin-btn" id="signin-btn" value="Sign In" onclick="signin()">
                </li>
            </ul>
        </form>
    </div>


    <script src="./assets/js/script.js"></script>
</body>
</html>


<?php
}
else {
    header("location: index.php");
}
?>