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
    <title>inCase</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script async type="text/javascript" src="function.js"></script>
</head>
<body>
    <?php
    navbar();
    ?>

    <div class="slideshow">
        <a href="neon.php"><img class="banner" src="images/banner/banner1.jpg"></a>
        <a href="pastel.php"><img class="banner" src="images/banner/banner2.jpg"></a>
        <a href="black-&-white.php"><img class="banner" src="images/banner/banner3.jpg"></a>
        <button class="bannerbutton bannerbutton_left" onclick="plusDivs(-1)">&#10094</button>
        <button class="bannerbutton bannerbutton_right" onclick="plusDivs(1)">&#10095</button>
    </div>

    <div class="section"> 
        <div class="section-title">
            <h1>Popular Products</h1>
        </div>
        <div class="product-items">
            <?php
            $result = $database->getData(3);
            $row = mysqli_fetch_assoc($result);
            productGallery($row['product_page'], $row['product_image_small'], $row['product_name'], $row['product_price']);
            $result = $database->getData(4);
            $row = mysqli_fetch_assoc($result);
            productGallery($row['product_page'], $row['product_image_small'], $row['product_name'], $row['product_price']);
            $result = $database->getData(1);
            $row = mysqli_fetch_assoc($result);
            productGallery($row['product_page'], $row['product_image_small'], $row['product_name'], $row['product_price']);
            $result = $database->getData(2);
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

    <div class="collections">
        <div class="section-title">
            <h1>Collections</h1>
        </div>
        <div class="collection-items">
            <!-- a collection -->
            <div class="collection">
                <a href="neon.php">
                    <img src="images/neon/neon-collection.jpg" class="collection-img" alt="product image">  
                    <div class="collection-label">
                        <h2 class="collection-name">Neon</h2>  
                        <button type="button">View Collection</button>
                    </div>
                </a>
            </div>
            <!--end collection-->
            <!-- a collection -->
            <div class="collection">
                <a href="pastel.php">
                    <img src="images/pastel/pastel-collection.jpg" class="collection-img" alt="product image">
                    <div class="collection-label">
                        <h2 class="collection-name">Pastel</h2>  
                        <button type="button">View Collection</button>
                    </div>
                </a>
            </div>
            <!--end collection-->
            <!--a collection-->
            <div class="collection">
                <a href="black-&-white.php">
                    <img src="images/b&w/b&w-collection.jpg" class="collection-img" alt="product image">
                    <div class="collection-label">
                        <h2 class="collection-name">Black & White</h2>  
                        <button type="button">View Collection</button>
                    </div>
                </a>
            </div>
            <!--end collection-->
        </div>
    </div>

    <?php
        footer();
    ?>

</body>
</html>