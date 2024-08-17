<?php
  session_start();

  include 'header.php';
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="productInfo.css">
</head>
<body>

<div class="product-details">
  <?php
    require_once "../model/connection.php";

    if (isset($_GET['productId'])) {
      $productId = $_GET['productId'];
      
    } else {
      die("Product ID not specified.");
    }

    // Get the product details from the database
    $sql = "SELECT * FROM product WHERE productId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $productId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        $details = $product['productDetails'];
        $price = $product['price'];
        $productName = $product['productName'];
        $product_pic = $product['pic'];
    }

  ?>

    <br><br>
  
  <div class="product-image">
    <img src="../<?php echo $product_pic ?>" alt="<?php echo $productName ?>">
  </div>
  <div class="product-info">
    <br>
    <h1><u><?php echo $productName ?></u></h1><br><br>
    <p id="price"><b>Price:</b> <?php echo $price ?> TK</p><br><br>
    <p><?php echo nl2br($details) ?></p>
  </div>
  
    <form action="../controller/addToCart.php" method="POST" class="cta1">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
        <input type="hidden" name="product_price" value="<?php echo $price; ?>">
        <input type="submit" value="Add to cart" name="add_to_cart">
    </form>

    
    <form action="buyProduct.php" class="BuyNow" novalidate>
        <input type="hidden" name="pic" value="<?php echo $product_pic; ?>">
        <input type="hidden" name="product_price" value="<?php echo $price; ?>">
        <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
        <input type="hidden" name="productId" value="<?php echo $productId; ?>">
        <input type="submit" name="BuyNow" value="Buy Now">
    </form>
  
</div>
</body>
</html>

<?php
  mysqli_close($conn);
  include 'footer.php';
?>
