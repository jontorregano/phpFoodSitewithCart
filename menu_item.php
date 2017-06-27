<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/26/2017
 * Time: 2:13 PM
 */
session_start();

// include classes
include_once "config/database.php";
include_once "objects/food.php";
include_once "objects/food_image.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$food = new Food($db);
$food_image = new FoodImage($db);

// set page title
$page_title = "Menu Item";

// include page header HTML
include_once 'layout_head.php';

// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// set the id as product id property
$food->id = $id;

// to read single record product
$food->readOne();

// set food id
$food_image->food_id=$id;

// read all related product image
$stmt_food_image = $food_image->readByProductId();

// count all related product image
$num_food_image = $stmt_food_image->rowCount();

echo "<div class='col-md-1'>";
    // if count is more than zero
    if($num_food_image>0){
    // loop through all product images
    while ($row = $stmt_food_image->fetch(PDO::FETCH_ASSOC)){
        // image name and source url
        $food_image_name = $row['name'];
        $source="uploads/images/{$food_image_name}";
        echo "<img src='{$source}' class='product-img-thumb' data-img-id='{$row['id']}' />";
    }
    }else{ echo "No images."; }
        echo "</div>";

echo "<div class='col-md-4' id='product-img'>";
    // read all related product image
    $stmt_food_image = $food_image->readByProductId();
    $num_food_image = $stmt_food_image->rowCount();

    // if count is more than zero
    if($num_food_image>0){
        // loop through all product images
        $x=0;
        while ($row = $stmt_food_image->fetch(PDO::FETCH_ASSOC)){
            // image name and source url
            $food_image_name = $row['name'];
            $source="uploads/images/{$food_image_name}";
            $show_food_img=$x==0 ? "display-block" : "display-none";
            echo "<a href='{$source}' target='_blank' id='product-img-{$row['id']}' class='product-img {$show_food_img}'>";
            echo "<img src='{$source}' style='width:50%;' />";
            echo "</a>";
            $x++;
        }
        }else{ echo "No images."; }
            echo "</div>";

echo "<div class='col-md-5'>";

    echo "<div class='product-detail'>Price:</div>";
    echo "<h4 class='m-b-10px price-description'>&#36;" . number_format($food->price, 2, '.', ',') . "</h4>";

    echo "<div class='product-detail'>Product description:</div>";
    echo "<div class='m-b-10px'>";
    // make html
    $page_description = htmlspecialchars_decode(htmlspecialchars_decode($food->description));

    // show to user
    echo $page_description;
    echo "</div>";
echo "</div>";

echo "<div class='col-md-2'>";
    // if product was already added in the cart
    if(array_key_exists($id, $_SESSION['cart'])){
        echo "<div class='m-b-10px'>This product is already in your cart.</div>";
        echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
        echo "Update Cart";
        echo "</a>";
    }

// if product was not added to the cart yet
    else{
        echo "<form class='add-to-cart-form'>";
        // product id
        echo "<div class='product-id display-none'>{$id}</div>";
        echo "<div class='m-b-10px f-w-b'>Quantity:</div>";
        echo "<input type='number' value='1' class='form-control m-b-10px cart-quantity' min='1' />";
        // enable add to cart button
        echo "<button style='width:100%;' type='submit' class='btn btn-primary add-to-cart m-b-10px'>";
        echo "<span class='glyphicon glyphicon-shopping-cart'></span> Add to cart";
        echo "</button>";

        echo "</form>";
    }
echo "</div>";

// content will be here

// include page footer HTML
include_once 'layout_foot.php';