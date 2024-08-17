<?php
session_start(); // Start a session to retrieve the selected payment method

$payment_method = $_SESSION['payment_method'];
$product_price = $_GET['price'];
$product_id = $_SESSION['product_id'];

// Check if the payment method is set
if (!isset($payment_method)) {
  header("Location: select_payment_method.php");
  exit();
}

include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
  <link rel="stylesheet" type="text/css" href="checkout.css">
</head>
<body>

  <h1 align="center">Checkout</h1>

  <p class="text"><b>Payment Method: <?php echo $payment_method; ?></b></p>
  <p class="text"><b>Total Price: <?php echo $product_price; ?> TK</b></p>

  <form method="POST" novalidate onsubmit="return validateForm();" >
    <p id="checkout"></p>
    <p id="checkout">
      <?php
        if(isset($_GET['msg1'])){
          echo $_GET['msg1'];
        }
      ?>
    </p>
    <p>
      <label>
        Full Name:
        <input type="text" name="full_name">
      </label>
    </p>
    <p>
      <label>
        Email Address:
        <input type="email" name="email_address">
      </label>
    </p>
    <p>
      <label>
        Phone Number:
        <input type="tel" name="phone_number">
      </label>
    </p>
    <p>
      <label>
        Address:
        <input type="text" name="address">
      </label>
    </p>
    <p>
      <button type="submit">Place Order</button>
    </p>
  </form>
  <script src="checkout.js"></script>

</body>
</html>

<?php 
include 'footer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $full_name = $_POST['full_name'];
  $email_address = $_POST['email_address'];
  $phone_number = $_POST['phone_number'];

  if(empty($full_name) || empty($email_address) || empty($phone_number)){
    header("Location: checkout.php?msg1="."Fill up all the  information");
  }

  // Insert the order into the database
  $sql = "INSERT INTO orders (customerName, productId, price, payment_method, full_name, email_address, phone_number) 
          VALUES ('$customerName','$product_id', '$product_Price', '$payment_method', '$full_name', '$email_address', '$phone_number')";
  if (mysqli_query($conn, $sql)) {
    // Order placed successfully
    $order_id = mysqli_insert_id($conn); // get the ID of the newly inserted row
    // Redirect the user to a confirmation page
    header("Location: order_confirmation.php?order_id=$order_id");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>