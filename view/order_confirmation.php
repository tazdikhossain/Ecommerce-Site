<?php
session_start();

include 'header.php';

// Get the order details from the database
$order_id = $_GET['order_id'];

$sql = "SELECT * FROM orders WHERE order_id = $order_id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);


// Get the product details from the database
$product_id = $row['productId'];
$sql = "SELECT * FROM product WHERE productId = $product_id";
$result1 = mysqli_query($conn, $sql);
if (!$result1) {
    die('Query failed: ' . mysqli_error($conn));
}
$product = mysqli_fetch_assoc($result1);

$productName = $product['productName'];
$price = $product['price'];

// Send confirmation email to the customer
$to = $row['email_address'];
$subject = 'Order Confirmation';
$message = 'Thank you for your order!<br><br>';
$message .= 'Product Name: '.$productName.'<br>';
$message .= 'Payment Method: '.$row['payment_method'].'<br>';
$message .= 'Total Price: '.$price.' TK<br>';
$message .= 'Full Name: '.$row['full_name'].'<br>';
$message .= 'Email Address: '.$row['email_address'].'<br>';
$message .= 'Phone Number: '.$row['phone_number'].'<br><br>';
$message .= 'Your order will be shipped within 3-5 business days.<br><br>';
$message .= 'Thank you for shopping with us!<br>';
$headers = 'From: sssshishir1290@gmail.com' . "\r\n" .
            'Reply-To: sssshishir1290@gmail.com' . "\r\n" .
           'Content-type: text/html; charset=UTF-8' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

?>
<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="order_confirmation.css">
</head>
<body>
    <h1 align="center">Order Confirmation</h1>
    <p>Your order has been placed successfully!</p>
    <p><b>Product Name: </b><?php echo $productName; ?></p>
    <p><b>Payment Method: </b><?php echo $row['payment_method']; ?></p>
    <p><b>Total Price: </b><?php echo $price; ?> TK</p>
    <p><b>Full Name: </b><?php echo $row['full_name']; ?></p>
    <p><b>Email Address: </b><?php echo $row['email_address']; ?></p>
    <p><b>Phone Number: </b><?php echo $row['phone_number']; ?></p>
    <p>You will receive an email confirmation shortly. Thank you for shopping with us!</p>

</body>
</html>

<?php
include 'footer.php';
?>

