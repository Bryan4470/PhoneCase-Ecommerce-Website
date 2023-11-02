<?php

session_start();
require_once("php/component.php");

$servername = "localhost";
$username = "root";
$password = null;
$dbname = "productdb";
$handler = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST["complete_order"])){
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["cust_address"];
    $city = $_POST["city"];
    $state = $_POST["cust_state"];
    $postcode = $_POST["postcode"];
    $phone = $_POST["phone_no"];
    $payment = $_POST["credit_card_number"];

    $insert_query = "INSERT INTO customertb (
    email,
    firstname,
    lastname,
    cust_address,
    city,
    cust_state,
    postcode,
    phone_number,
    credit_card_number
    ) VALUES (
    '$email',
    '$firstname',
    '$lastname',
    '$address',
    '$city',
    '$state',
    '$postcode',
    '$phone',
    '$payment'
    )";

    if (mysqli_query($handler, $insert_query)){
        echo "Data inserted successfully";
        } else{
        echo "Error inserting data: ".mysqli_error($handler);
        }

    foreach($_SESSION["shopping_cart"] as $key => $value){
        unset($_SESSION["shopping_cart"][$key]);
        echo "<script>alert('Order Successful!')</script>";
        echo "<script>window.location = 'home.php'</script>";
    }  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout — inCase</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="checkout-section">
        <div class="container">
            <img class="checkout-logo" src="images/logo-nav.png" width=100 alt="Logo">

            <ul class="pages">
                <li><a href="cart.php">Cart</a></li>
                <li>Information & Payment</li>
            </ul>
            <form class="checkout-form" action="checkout.php" method="POST">
                <div>
                    <div>
                        <h2 class="heading">Contact Information</h2>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                  
                </div>
                <div class="shipping-information">
                    <h2 class="heading">Shipping Address</h2>
                    <div>
                        <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
                        <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
                    </div>
                    <div>
                        <input type="text" id="address" name="cust_address" placeholder="Address" required>  
                    </div>
                    <div>
                        
                        <input type="text" id="city" name="city" placeholder="City" required>
                    </div>
                    <div>
                        <select name="cust_state" id="state">
                            <option selected>State/Territory</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Perak">Perak</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Johor">Johor</option>
                            <option value="Terengganu">Terengganu</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Penang">Penang</option>
                            <option value="Malacca">Malacca</option>
                        </select>
                        <input type="text" id="postcode" name="postcode" placeholder="Postcode" required>
                    </div>
                    <div>
                        <input type="text" id="phone_no" name="phone_no" placeholder="Phone Number" required>
                    </div>
                    
                </div>
    
                <div class="payment-information">
                    <div>
                        <h2 class="heading">Payment</h2>
                        <input type="text" id="payment" name="credit_card_number" placeholder="Credit Card Number" required>
                    </div>   
                </div>
    
                <div class="submit-form">
                        <button type="submit" name="complete_order" id="complete-order">Complete Order</button>
                    <a href="cart.php">Return to cart</a>
                </div>
            </form>
        </div>
        <div class="order-summary">
            <form action='cart.php' method='post' class='cart-items'>
            <?php
                $total = 0;  
                foreach($_SESSION["shopping_cart"] as $keys => $value){  
                    $img = $value["product_img"];
                    $name = $value["product_name"];
                    $model = $value["product_model"];
                    $quantity = $value["product_quantity"];
                    $price = $value["product_price"];
                    orderDetails($img, $name, $model, $price, $quantity);
                    $total = $total + ($quantity * $price); 
                } 
                ?>
            </form>
            <?php
            echo "
                <div class='cart-total'>
                    <strong class='cart-total-title'>Total:</strong>
                    <span class='cart-total-price'>
                        RM$total
                    </span>
                </div>";
            ?>
        </div>
    </div>
    
</body>
</html>