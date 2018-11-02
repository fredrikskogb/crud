<?php
session_start();
include 'database_connection.php';
include 'fetch_user_information.php';
include '../includes/fetch_basket.php';

// Add chosen products into purchased orders database table.
foreach($products_basket as $single_product_basket){
    $product = $single_product_basket["product"];
    $quantity = $single_product_basket["quantity"];
    $total_price = $single_product_basket["quantity"] * $single_product_basket["unit_price"];

    $statement = $pdo->prepare("INSERT INTO purchased_orders (product, quantity, total_price, user_id) VALUES (:product, :quantity, :total_price, :user_id)");
    $statement->execute(
    [
        ":product" => $product,
        ":quantity" => $quantity,
        ":total_price" => $total_price,
        ":user_id" => $_SESSION["user_id"]
    ]
);
}

// Delete products from customer_basket database table.
$statement = $pdo->prepare("DELETE FROM customer_basket WHERE username = :username");
    
$statement->execute(
    [
        ":username" => $_SESSION["username"]
    ]
);

header('Location: ../views/confirm.php');

?>