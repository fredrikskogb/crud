<?php
session_start();

include 'database_connection.php';


if(isset($_POST["amount"])){
    $statement = $pdo->prepare("INSERT INTO customer_basket (user_id, username, product, quantity, unit_price) VALUES (:user_id, :username, :product, :quantity, :unit_price)");
    $statement->execute(
    [
        ":user_id" => $_SESSION["user_id"],
        ":username" => $_SESSION["username"],
        ":product" => $_POST["product_name"],
        ":quantity" => $_POST["amount"],
        ":unit_price" => $_POST["unit_price"]
    ]
);
}

header('Location: ../index.php');