<?php

// Fetch information from logged in user
if(isset($_SESSION["username"])){
    $statement = $pdo->prepare("SELECT users.name, users.surname, users.email, users.adress, users.phone_number FROM users WHERE users.username = :username");

    $statement->execute(
        [
            ":username" => $_SESSION["username"]
        ]
    );

    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
}
