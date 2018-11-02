<?php

if(isset($_SESSION["username"])){
    $statement = $pdo->prepare("SELECT * FROM customer_basket JOIN users ON customer_basket.user_id = users.id AND users.username = :username");

    $statement->execute(
        [
            ":username" => $_SESSION["username"]
        ]
    );

    $products_basket = $statement->fetchAll(PDO::FETCH_ASSOC);
}

