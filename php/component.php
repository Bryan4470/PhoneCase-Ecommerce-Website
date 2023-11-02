<?php

function navbar(){
    echo "<nav class='navbar'>
        <div>            
            <a href='home.php'><img src='images/logo-nav.png' class='logo' alt='logo'></a>
        </div>
        <ul class='nav-list' id='navi-list'>
            <li class='item'><a href='home.php'>Home</a></li>
            <li class='item dropdown'>
                <a tabindex='0' class='dropbtn'>Collections</a>
                <div class='dropdown-content'>
                    <a href='black-&-white.php'>Black & White</a>
                    <a href='neon.php'>Neon</a>
                    <a href='pastel.php'>Pastel</a>
                </div>
            </li>
            <li class='item cart'><a href='cart.php'>Cart</a></li>
        </ul>
        <div>            
            <a href='cart.php'><img src='images/cart.png' class='cart' alt='cart'></a>
        </div>
        <div class='menu' id='toggle-button'> 
            <div class='menu-line'></div>
            <div class='menu-line'></div>
            <div class='menu-line'></div>
        </div>
    </nav>";
}

function cartElement($productimg, $productname, $productmodel, $productprice, $productquantity, $productid){
    $element = "
        <form action='' method='post' class='cart-items'>
            <div class='cart-row'>
                <div class='cart-item cart-column'>
                    <img class='cart-item-image' src=$productimg width='100' height='100'>
                    <span class='cart-item-title'><b>$productname</b><br><br><span class='cart-item-model'>$productmodel</span></span>
                </div>
                <span class='cart-price cart-column'>RM$productprice</span>
                <div class='cart-quantity cart-column'>
                    <span class='cart-quantity'>$productquantity</span>
                    <button class='btn btn-danger' type='submit' name='remove'>Remove</button>
                    <input type='hidden' name='product_id' value='$productid'>
                    <input type='hidden' name='product_model' value='$productmodel'>
                    <input type='hidden' name='product_name' value='$productname'>
                    <input type='hidden' name='product_price' value='$productprice'>
                    <input type='hidden' name='product_img' value='$productimg'>
                    <input type='hidden' name='product_quantity' value='$productquantity'>
                </div>
            </div>             
        </form>
    ";
    echo $element;
}

function orderDetails($productimg, $productname, $productmodel, $productprice, $productquantity){
    echo "
            <div class='cart-row'>
                <div class='cart-item cart-column'>
                    <img class='cart-item-image' src=$productimg width='100' height='100'>
                    <span class='cart-item-title'><b>$productname</b><br><br><span class='cart-item-model'>$productmodel</span></span>
                </div>
                <span class='cart-price cart-column'>RM$productprice</span>
                <div class='cart-quantity cart-column'>
                    <span class='cart-quantity' name='quantity'>X$productquantity</span>
                </div>
            </div>             
    ";
}

function product($productname, $productprice, $productimg, $productimg2, $productid){
    echo "
    <div class='products'>
        <div class='product-gallery'>
            <img class='banner prodimg' src='$productimg'>
            <img class='banner prodimg' src='$productimg2'>
            <button class='bannerbutton bannerbutton_left' onclick='plusDivs(-1)'>&#10094</button>
            <button class='bannerbutton bannerbutton_right' onclick='plusDivs(1)'>&#10095</button>
        </div>

        <div class='product-desc'>
            <div class='desc'>
                <h1>$productname</h1>
            </div>
            <div class = 'desc'>
                RM $productprice
            </div>
            <form action = '' method = 'POST'>
                <div class = 'desc'>
                    <select name = 'product_model' id = 'models' placeholder = 'Models'>
                        <option value = 'iPhone 13 Pro Max'>iPhone 13 Pro Max</option>
                        <option value = 'iPhone 13 Pro'>iPhone 13 Pro </option>
                        <option value = 'iPhone 13'>iPhone 13</option>
                        <option value = 'iPhone 13 Mini'>iPhone 13 Mini</option>
                        <option value = 'iPhone 12 Pro Max'>iPhone 12 Pro Max</option>
                        <option value = 'iPhone 12 Pro'>iPhone 12 Pro </option>
                        <option value = 'iPhone 12'>iPhone 12</option>
                        <option value = 'iPhone 12 Mini'>iPhone 12 Mini</option>
                        <option value = 'iPhone 11 Pro Max'>iPhone 11 Pro Max</option>
                        <option value = 'iPhone 11 Pro'>iPhone 11 Pro </option>
                        <option value = 'iPhone 11'>iPhone 11</option>
                        <option value = 'iPhone XS Max'>iPhone XS Max</option>
                        <option value = 'iPhone XS'>iPhone XS</option>
                        <option value = 'iPhone XR'>iPhone XR</option>
                        <option value = 'iPhone X'>iPhone X</option>
                    </select>
                </div>
                <div class = 'desc'>
                    <button type = 'button' id = 'decrement'>-</button>
                    <input type = 'number' id = 'quantity' name = 'product_quantity' value='1' min = '1'>
                    <button type = 'button' id = 'increment'>+</button>
                </div>
                <div class = 'desc'>
                    <button type='submit' name = 'add_to_cart' id = 'submit'>Add to Cart</button>
                    <input type='hidden' name='product_id' value='$productid'>
                    <input type='hidden' name='product_name' value='$productname'>
                    <input type='hidden' name='product_price' value='$productprice'>
                    <input type='hidden' name='product_img' value='$productimg'>
                </div>
            </form>
        </div>
    </div>
    ";
}

function checkout($productname, $productprice, $productid, $total){
    echo "<button class='btn btn-primary btn-purchase' name='checkout' type='button'>Checkout</button>
            <input type='hidden' name='product_id' value='$productid'>
            <input type='hidden' name='product_name' value='$productname'>
            <input type='hidden' name='product_price' value='$productprice'>
            <input type='hidden' name='total' value='$total'>
    ";
}

function productGallery($productpage, $productimgsmall, $productname, $productprice){
    echo " <div class='product'>
                <a href='$productpage'>
                    <img src='$productimgsmall' class='product-img' alt='product image'>   
                    <div class='product-info'> 
                        <h3 class='product-name'>$productname</h3>
                        <p class='product-price'>RM$productprice</p>
                    </div>
                </a>  
            </div>
            ";
}

function footer(){
    echo "
        <div class='footer'>
            <div class='row'>
                <div class='footer-col footer-1'>
                    <h2>About Us</h2>
                    <p>InCase is a company based in Malaysia that produes custom-designed phone cases for Apple Iphones. This E-commerce platform is tailored for easy, secure and fast Online Shopping experience from the convenience and safety of your homes. Accessible, easy and enjoyable, an Online Shopping experience that we aspire to deliver.</p>
                </div>
                <div class='footer-col footer-2'>
                    <h2>Contact Us</h2>
                    <ul>
                        <li>Email: Incase@gmail.com</li>
                        <li>Phone: 010-0010-9980</li>
                        <li>Fax: 010-0010-9980</li>
                    </ul><br>
                    <div class='social-links'>
                        <a href='#'><i class='fab fa-facebook-f'></i></a>
                        <a href='#'><i class='fab fa-twitter'></i></a>
                        <a href='#'><i class='fab fa-instagram'></i></a>
                        <a href='#'><i class='fab fa-linkedin-in'></i></a>
                    </div>
                </div>

                <form class='newsletter footer-col' method='POST'>
                    <h2>Newsletter</h2>
                    <p>Subscribe to receive monthly promotions, early access, and more!</p>
                    <input type='email' name='news_email' id='newsletter-email' placeholder='Email Address' required>
                    <button type='submit' name='subscribe' id='newsletter-email-btn' onClick='newsletter();'>Subscribe</button>
                </form>
            </div>
        </div>

    ";

}

function addToCart(){

//create instance of createdb class
$database = new createdb("Productdb", "Producttb");

if(isset($_POST["add_to_cart"])){
    
    //check does variable shopping cart contain data
    if(isset($_SESSION["shopping_cart"])){
        $b=array(
            'product_id' => $_POST["product_id"],
            'product_model' =>$_POST["product_model"] 
        );
        $a = filterArrayByKeys($_SESSION["shopping_cart"], ['product_id','product_model']);
        if(in_array($b, $a)){
            echo "<script>alert('Product is already added in the cart!')</script>";         
        } 
        else{
            //number of elements in the array
            $item_array = array(
                'product_id' => $_POST["product_id"],
                'product_name'=>$_POST["product_name"],
                'product_model' =>$_POST["product_model"],
                'product_price'=>$_POST["product_price"],
                'product_quantity'=>$_POST["product_quantity"],
                'product_img'=>$_POST["product_img"]
            );

            $_SESSION['shopping_cart'][] = $item_array;
        } 
    }
    //if no data 
    else{
        $item_array = array(
            'product_id'=>$_POST["product_id"],
            'product_name'=>$_POST["product_name"],
            'product_model' =>$_POST["product_model"],
            'product_price'=>$_POST["product_price"],
            'product_quantity'=>$_POST["product_quantity"],
            'product_img'=>$_POST["product_img"]
        );
        $_SESSION["shopping_cart"][] = $item_array;
    }
}
}


function filterArrayByKeys(array $input, array $column_keys)
{
    $result      = array();
    $column_keys = array_flip($column_keys); // getting keys as values
    foreach ($input as $key => $val) {
         // getting only those key value pairs, which matches $column_keys
        $result[$key] = array_intersect_key($val, $column_keys);
    }
    return $result;
}

function newsletter(){
    $servername = "localhost";
    $username = "root";
    $password = null;
    $dbname = "productdb";
    $handler = mysqli_connect($servername, $username, $password, $dbname);

    if(isset($_POST["subscribe"])){
        $email = $_POST["news_email"];

        $insert_query = "INSERT INTO newslettertb (email) VALUES ('$email')";

        if(!mysqli_query($handler, $insert_query)){
            echo "Error inserting data: ".mysqli_error($handler);
        } 
    }
}
?>