<?php
session_start();

//Include required info and database connection

include '../includes/database_connection.php';

include '../includes/fetch_basket.php';

include '../includes/fetch_user_information.php';

include '../includes/head.php';

?>

<!-- Link separate css file -->
<link rel="stylesheet" href="../css/views_style.css">
</head>

<body>

<?php

//ECHO CUSTOMER INFORMATION AND PRODUCTS.
echo "<div class='checkout'>";
if(isset($_SESSION["username"])){
    
    //Echo customer information.
    echo "<p>" . "Dina uppgifter:" . "</p>";
    foreach($users as $user){
        echo "<p>" . $user["name"] . "</p>";
        echo "<p>" . $user["surname"] . "</p>";
        echo "<p>" . $user["email"] . "</p>";
        echo "<p>" . $user["adress"] . "</p>";
        echo "<p>" . $user["phone_number"] . "</p>";
        break;
    }

    //If basket is empty.
    if(empty($products_basket)){
        echo "<p>" . "Din varukorg är tom. " . "<a href='../index.php'>" . "Gå tillbaka" . "</a>" . "</p>";
    }else{

        echo "</br>";

        //Else echo product, quantity and price.
        echo "<p>" . "Dina varor:" . "</p>";

        //Set specific product to erase from database with GET through the loop.
        
        $total_price = 0;

        foreach($products_basket as $single_product_basket){
            
            echo "<p>" . $single_product_basket["quantity"] . " " . $single_product_basket["product"] . " " . $single_product_basket["unit_price"] * $single_product_basket["quantity"] . "kr" . "</p>";
            
            $total_price += $single_product_basket["quantity"] * $single_product_basket["unit_price"];

            ?><a href="checkout.php?remove=<?=$single_product_basket['product']?>"> Ta bort </a>
            
        <?php  
        }
        


        /*
        Delete row in the database table where product corresponds with GET and logged in user. 
        When completed refresh the page to checkout.php
        */
        if(isset($_GET["remove"])){
            $product = $_GET["remove"];
            $statement = $pdo->prepare("DELETE FROM customer_basket WHERE product = :product AND username = :username");
    
            $statement->execute(
        [
            ":product" => $product,
            ":username" => $_SESSION["username"]
        ]
        );
        //Refresh page
        header("Location: checkout.php?");
    
        }

        // $total_price from foreach product loop.
        echo "<p>" . "Totalpris: $total_price kr" . "</p>";
        
    }
    
//Display if user is not logged in
}else{
    ?>
    <div>
        <p>Du måste vara inloggad för att slutföra beställning. <a href="login_view.php">Logga in</a> <a href="register_view.php">Registrera</a></p>
    </div>
    <?php
}

echo "</div>";

//Link to complete order to confirm.php
echo "<div class='order'>";
if(isset($_SESSION["username"]) && isset($single_product_basket["quantity"])){
    if($single_product_basket["quantity"] > 0){
        echo "<a href='../includes/order_purchase.php' class='confirm'>" . "BESTÄLL" . "</a>";
        echo "<p class='confirm_paragraph'>" . "Efter du tryckt \"beställ\" debiteras din order." . "</p>";
    }
}
echo "</div>";

?>
</body>
</html>