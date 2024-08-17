<?php
session_start();
require_once "../model/connection.php";

if (isset($_POST['PlaceOrder'])) {
    $product_id = $_POST['product_id'];
    $payment_method = $_POST['payment_method'];
    $price = $_POST['price'];
    $customer_id = $_SESSION['customer_id'];

    echo $payment_method;

    $stmt = $conn->prepare("INSERT INTO orders (productId, userId, payment_method, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $product_id, $customer_id, $payment_method, $price);

    if ($stmt->execute()) {
        echo "Order placed successfully!";
    } else {
        echo "Error placing order.";
    }
}
?>
