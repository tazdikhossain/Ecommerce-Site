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
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	  $full_name = $_POST['full_name'];
	  $email_address = $_POST['email_address'];
	  $phone_number = $_POST['phone_number'];

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