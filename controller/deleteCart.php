
<?php
if(isset($_POST['delete_cart_item'])) {
    // Get product details
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    
    // Set cart item as a cookie
    setcookie("cart[$product_id][name]", $product_name,time() - 3600,'/');
    setcookie("cart[$product_id][price]", $product_price,time() - 3600,'/');
    
    header("Location: ../view/showCart.php");
    exit;
}
?>
