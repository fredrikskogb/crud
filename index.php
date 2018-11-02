<?php
session_start();

// Meta-information
include 'includes/head.php';
?>

<link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <h1>Välkommen till Fruktiga Loopar!</h1>
    <?php
        if(isset($_SESSION["username"])){
            echo "<p class='logged_in_user'>" . "Du är inloggad som " . $_SESSION["username"] . ". " . "<a href='includes/reset.php'>Logga ut</a>" . "</p>";
        }else{
            echo "<div class='login_register'>" . "<a href='views/login_view.php'>Logga in</a>" . "<a href='views/register_view.php'>Registrera</a>" . "</div>";
        }          
    ?>
</header>

<?php

include 'includes/customer_basket.php';

include 'includes/products.php';

?>

<footer>
</footer>
</body>

</html>