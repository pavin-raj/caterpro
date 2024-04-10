<?php
require 'connection.php';

session_start();

if(!isset($_SESSION['user_type'])) { 

    if (isset($_POST["register"])) {
        $email=$_POST["email"];
        $password=$_POST["password"];
        $address=$_POST["address"];
        $phone=$_POST["phone"];

        $sql = "INSERT INTO tbl_user (email, password, address, phone)
        VALUES ('$email', '$password', '$address', '$phone')";

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
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="form-bg">
    <div class="form-container">
        <form action="" method="POST" class="signin-container">
            <span><i class="fa-solid fa-beer-mug-empty"></i> Catering</span>
                <h2>Registration</h2>
            <ul>
                <li><input type="text" name="email" placeholder="email"></li>
                <li><input type="password" name="password" placeholder="password"></li>
                <li><input type="password" name="retype_password" placeholder="retype password"></li>
                <li><textarea name="address" id="textarea" cols="30" rows="10" placeholder="address"></textarea></li>
                <li><input type="text" name="phone" placeholder="phone"></li>
                <li><input type="submit" value="Register" name="register"></li>
            </ul>
        </form>
    </div>
</body>
</html>

<?php
}
else {
    header("location: index.php");
}
?>