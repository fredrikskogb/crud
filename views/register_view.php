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
    <form action="../includes/register.php" method="POST">

            <input type="hidden" name="error_message">
            <?php
                if(isset($_GET["error_message"])){
                    echo "<p class = 'error_message'>" . "Alla fält ej ifyllda korrekt." . "</p>";
                }
            ?>
            <?php
                if(isset($_GET["username_register"])){
                    echo "<p class = 'error_message'>" . "Användarnamn upptaget" . "</p>";
                }
            ?>
            <label for="register_username">Användarnamn</label>
            <input type="text" name="username_register" placeholder="Användarnamn" id="register_username">
       
            <label for="register_password">Lösenord</label>
            <input type="password" name="password" placeholder="Minst 6 tecken" id="register_password">
                
            <?php
                if(isset($_GET["email"])){
                    echo "<p class = 'error_message'>" . "Ett konto har redan skapats med denna mail." . "</p>";
                }
            ?>
            <label for="register_email">E-postadress</label>
            <input type="text" name="email" placeholder="E-postadress" id="register_email">
     
            <label for="name">Förnamn</label>
            <input type="text" name="name" placeholder="Förnamn" id="register_name">
     
            <label for="register_surname">Efternamn</label>
            <input type="text" name="surname" placeholder="Efternamn" id="register_surname">
  
            <label for="register_adress">Adress</label>
            <input type="text" name="adress" placeholder="Adress" id="register_adress">
        
            <label for="register_phone_number">Telefonnummer</label>
            <input type="text" name="phone_number" placeholder="Telefonnummer" id="register_phone_number">

            <input type="submit" value="Registrera">

    </form>
</div>

</body>
</html>