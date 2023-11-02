<?php

$servername = "localhost";
$username = "root";
$password = null;
$dbname = "productdb";
$handler = mysqli_connect($servername, $username, $password, $dbname);

if(!$handler){
    die("Connection failed: ".mysqli_connect_error());
    } else{
    echo "Connected successfully";
    }

  $sql = "INSERT INTO producttb(product_name, product_price, product_image, product_image2, product_image_small, product_page) VALUES
    ('Cotton Candy','25','images/pastel/cotton-candy.jpg', 'images/pastel/cotton-candy-2.jpg','images/pastel/cotton-candy-small.jpg','cotton-candy.php'),
    ('Pastel Dreams','25','images/pastel/pastel-dreams.jpg', 'images/pastel/pastel-dreams-2.jpg','images/pastel/pastel-dreams-small.jpg','pastel-dreams.php'),
    ('Arcade','25','images/neon/arcade.jpg', 'images/neon/arcade-2.jpg','images/neon/arcade-small.jpg','arcade.php'),
    ('Vaporwave','25','images/neon/vaporwave.jpg', 'images/neon/vaporwave-2.jpg','images/neon/vaporwave-small.jpg','vaporwave.php'),
    ('Nature','25','images/b&w/nature.jpg', 'images/b&w/nature-2.jpg','images/b&w/nature-small.jpg','nature.php'),
    ('Splash','25','images/b&w/splash.jpg', 'images/b&w/splash-2.jpg','images/b&w/splash-small.jpg','splash.php'),
    ('Spots','25','images/b&w/spots.jpg', 'images/b&w/spots-2.jpg','images/b&w/spots-small.jpg','spots.php')";


if (mysqli_query($handler, $sql)){
    echo "Data inserted successfully";
    } else{
    echo "Error inserting data: ".mysqli_error($handler);
    }

?>