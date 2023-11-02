<?php
//start session 
session_start();
require_once('php/createdb.php');
require_once('php/component.php');
//create instance of createdb class
$database = new createdb("Productdb", "Producttb");
newsletter();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black & White — inCase</title>
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
            <h1>Black & White</h1>
        </div>
        <div class="product-items">
        <?php
            $result = $database->getData(5);
            $row = mysqli_fetch_assoc($result);
            productGallery($row['product_page'], $row['product_image_small'], $row['product_name'], $row['product_price']);
            $result = $database->getData(6);
            $row = mysqli_fetch_assoc($result);
            productGallery($row['product_page'], $row['product_image_small'], $row['product_name'], $row['product_price']);
            $result = $database->getData(7);
            $row = mysqli_fetch_assoc($result);
            productGallery($row['product_page'], $row['product_image_small'], $row['product_name'], $row['product_price']);
            ?>
        </div>
    </div>
    <?php
        footer();
    ?>
</body>
</html>