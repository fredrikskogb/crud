<?php

include 'database_connection.php';

// Fetch already existing usernames and emails.
$statement = $pdo->prepare("SELECT username, email FROM users");
$statement->execute();

$fetched_users = $statement->fetchAll(PDO::FETCH_ASSOC);


// If username or email already exist, go back to register_view.php with error message.
foreach($fetched_users as $fetched_user){
    if($_POST["username_register"] === $fetched_user["username"]){
        header('Location: ../views/register_view.php?username_register=reserved');
        exit();
    }elseif($_POST["email"] === $fetched_user["email"]){
        header('Location: ../views/register_view.php?email=reserved');
        exit();   
    }
}

// Else run this code:
// String length requirements to run.
if(strlen($_POST["username_register"]) > 3 && strlen($_POST["password"]) > 5 && strlen($_POST["email"]) > 3 && strlen($_POST["name"]) > 1  && strlen($_POST["surname"]) > 1 && strlen($_POST["adress"]) > 3 && strlen($_POST["phone_number"]) > 3){

    $username = $_POST["username_register"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $adress = $_POST["adress"];
    $phone_number = $_POST["phone_number"];

    //Encrypt password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Execute puts values to statement and runs it.

    $statement = $pdo->prepare("INSERT INTO users (username, password, email, name, surname, adress, phone_number) VALUES (:username, :password, :email, :name, :surname, :adress, :phone_number)");
    $statement->execute(
        [
            ":username" => $username,
            ":password" => $hashed_password,
            ":email" => $email,
            ":name" => $name,
            ":surname" => $surname,
            ":adress" => $adress,
            ":phone_number" => $phone_number
        ]
    );
    //Then redirect to login.
    header('Location: ../views/login_view.php');
}else{
    header('Location: ../views/register_view.php?error_message=true');
    exit();
}   
 

?>