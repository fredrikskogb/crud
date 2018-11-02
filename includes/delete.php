<?php
session_start();
include 'database_connection.php';

$statement = $pdo->prepare("DELETE FROM customer_basket WHERE customer_basket.user_id = :id");

$statement->execute(
    [
        ":id" => $_SESSION["id"],
    ]
);

header('Location: ../views/checkout.php');
?>