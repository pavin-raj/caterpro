<?php
require '../connection.php';

if(isset($_POST['submit']))
{
  $price = $_GET['price'];
  $id=$_GET['id'];
  $mode=$_GET['mode'];
  if($mode==1)
  $sql="UPDATE orders SET paid_amount=$price where order_id=$id";
  else
  $sql="UPDATE orders SET paid_amount=paid_amount+$price where order_id=$id";
  $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="row">
  <div class="col-75">
    <div class="container">
      <form method="post">

        <div class="row">

          <div class="col-50">
            <h3>Payment</h3>
            <!-- <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div> -->
            <label for="cname">Amount</label>
            <input type="text" id="amount" name="amount" disabled>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <input type="submit" value="Continue to checkout" class="btn" name='submit'>
      </form>
    </div>
  </div>

</div> 
  <script>
        let price = new URLSearchParams(window.location.search).get('price');
        document.getElementById('amount').placeholder = price;
  </script>
</body>
</html>
