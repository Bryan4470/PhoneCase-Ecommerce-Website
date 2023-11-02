<?php

session_start();
require_once("php/component.php");

if(isset($_POST["remove"])){
    foreach($_SESSION["shopping_cart"] as $key => $value){
        $removeitem=array(
                'product_id' => $_POST["product_id"],
                'product_name'=>$_POST["product_name"],
                'product_model' =>$_POST["product_model"],
                'product_price'=>$_POST["product_price"],
                'product_quantity'=>$_POST["product_quantity"],
                'product_img'=>$_POST["product_img"]
            );
        if($removeitem == $_SESSION["shopping_cart"][$key]){
            unset($_SESSION["shopping_cart"][$key]);  
        }
    }  
    
}
newsletter();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart — inCase</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script async type="text/javascript" src="function.js"></script>
</head>
<body>
    <?php
        navbar();
    ?>
    
    <div class="section"> 
        <div class="section-title">
            <h1>Cart</h1>
        </div>
        <div class="container">         
        <?php
        if(!empty($_SESSION["shopping_cart"])){
            echo "
            <div class='cart-row'>
                <span class='cart-item cart-header cart-column'>ITEM</span>
                <span class='cart-price cart-header cart-column'>PRICE</span>
                <span class='cart-quantity cart-header cart-column'>QUANTITY</span>
            </div> ";
            $total = 0;  
            foreach($_SESSION["shopping_cart"] as $key => $value){  
                $img = $value["product_img"];
                $name = $value["product_name"];
                $model = $value["product_model"];
                $quantity = $value["product_quantity"];
                $price = $value["product_price"];
                $id = $value["product_id"];
                cartElement($img, $name, $model, $price, $quantity, $id);   
                $total = $total + ($quantity * $price); 
            } 
            echo "
            <div class='cart-total'>
                <strong class='cart-total-title'>Total:</strong>
                <span class='cart-total-price'>
                    RM $total
                </span>
            </div>
                <a href='checkout.php'><button class='btn btn-primary btn-purchase' name='checkout' type='button'>Checkout</button></a>";
            
        }
        else{
            $total = 0;
            echo "
            <div class='section-title'>
                <h3>Your cart is empty!</h3>
            </div>";
        }
        ?>
            
            
        </div>
    </div>
    <?php
        footer();
    ?>
</body>
</html>