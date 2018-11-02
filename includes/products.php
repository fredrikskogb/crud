<?php

include 'database_connection.php';

// Fetch products
$statement = $pdo->prepare("SELECT * FROM products");

$statement->execute();

$products = $statement->fetchAll(PDO::FETCH_ASSOC);

// Display information of all products.
foreach($products as $single_product){
    ?>
    <div class='product_wrapper'>
        <h3> <?= $single_product["product"]; ?> </h3>
    
        <img src="images/<?= $single_product['image'];?>">

        <p class='product_description'> <?= $single_product["description"]; ?> </p>
        <p> <?= $single_product["price"]; ?> kr/kg</p>
    
        <form action="includes/insert_to_basket_from_products.php" method="POST">
            <input type="number" name="amount" min=1 placeholder="Antal kg." value="<?php $single_product['unit_price']?>">
            <input type="hidden" name="product_name" value="<?= $single_product["product"]; ?>">
            <input type="hidden" name="unit_price" value="<?= $single_product["price"]; ?>">
            <input type="submit" value="Lägg till i varukorgen">
        </form>
    </div>
<?php
}

?>