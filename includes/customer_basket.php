<?php

include 'database_connection.php';
include 'fetch_basket.php';

// Add every added product to a variable.
$quantity = 0;
if(isset($_SESSION["username"])){
    foreach($products_basket as $single_product_basket){
        $quantity += $single_product_basket["quantity"];
    }
}


// Link to checkout and display quantity of products in parentheses.
if(isset($_SESSION["username"]) && $quantity != 0){
    echo "<div class='basket'>";
    echo "<a href='views/checkout.php' class='checkout_basket'>" . "Gå till kassan" . "(" . $quantity . ")" . "</a>";
    echo "</div>";
}else{
    echo "<div class='basket'>";
    echo "<a href='views/checkout.php' class='checkout_basket'>" . "Gå till kassan" . "</a>";
    echo "</div>";
}

?>