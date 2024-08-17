<?php
session_start();
include 'header.php';

if(isset($_COOKIE['cart'])) {
    $cart_items = $_COOKIE['cart'];
    require "../model/connection.php";
    $stmt = mysqli_prepare($conn, "SELECT * FROM product WHERE productId = ?");
    ?>
    <head>
        <link rel="stylesheet" type="text/css" href="showCart.css">
    </head>
    <table>
        <tr>
            <th>Product Image</th>
            <th>Product Name & Price</th>
            <th></th>
            <th></th>
        </tr>
    <?php
    foreach($cart_items as $product_id => $product) {
        mysqli_stmt_bind_param($stmt, "i", $product_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        ?>
        <tr>
            <td><img src="../<?php echo $row['pic']; ?>" height="200" width="200"></td>
            <td><?php echo $row['productName']; ?> (<?php echo $row['price']; ?> TK)</td>
            <td>
                <form action="../controller/deleteCart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $row['productId']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['productName']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                    <button class="delete-button" type="submit" name="delete_cart_item">Delete</button>
                </form>
            </td>
            <td><button class="buy-button">
                <a href="productInfo.php?productId=<?php echo $product_id; ?>" style="text-decoration:none;">Buy Now</a>
            </button></td>
        
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Your cart is empty.";
}

include 'footer.php';
?>
