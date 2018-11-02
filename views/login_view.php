<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/views_style.css" type="text/css">
</head>
<body>

<div class="wrapper_user_information">
    <form action="../includes/login.php" method="POST">

        <?php
            if(isset($_GET["login_failed"])){
                echo "<p class = 'error_message'>" . "Användare eller lösenord felaktigt." . "</p>";
            }
        ?>

        <label for="login_username">Användarnamn</label>
        <input type="text" name="username" placeholder="Användarnamn" id="login_username">

        <label for="login_password">Lösenord</label>
        <input type="password" name="password" placeholder="Lösenord" id="login_password">

        <input type="submit" value="Logga in">
    </form>
</div>

</body>
</html>