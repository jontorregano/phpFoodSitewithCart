<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/26/2017
 * Time: 1:18 PM
 */
session_start();

include 'config/database.php';

include_once 'objects/food.php';
include_once 'objects/food_image.php';

$database = new Database();
$db = $database->getConnection();

$food = new Food($db);
$food_image = new FoodImage($db);

$page_title="Shopping Cart";

include 'layout_head.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";

echo "<div class='col-md-12'>";
    if($action=='removed'){
        echo "<div class='alert alert-info'>";
        echo "Product was removed from your cart!";
        echo "</div>";
    }

    else if($action=='quantity_updated'){
        echo "<div class='alert alert-info'>";
        echo "Product quantity was updated!";
        echo "</div>";
    }
echo "</div>";

if(count($_SESSION['cart'])>0){

    // get the product ids
    $ids = array();
    foreach($_SESSION['cart'] as $id=>$value){
        array_push($ids, $id);
    }

    $stmt=$food->readByIds($ids);

    $total=0;
    $item_count=0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $quantity=$_SESSION['cart'][$id]['quantity'];
        $sub_total=$price*$quantity;

        // =================
        echo "<div class='cart-row'>";
        echo "<div class='col-md-8'>";

        echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";

        // update quantity
        echo "<form class='update-quantity-form'>";
        echo "<div class='product-id' style='display:none;'>{$id}</div>";
        echo "<div class='input-group'>";
        echo "<input type='number' name='quantity' value='{$quantity}' class='form-control cart-quantity' min='1' />";
        echo "<span class='input-group-btn'>";
        echo "<button class='btn btn-default update-quantity' type='submit'>Update</button>";
        echo "</span>";
        echo "</div>";
        echo "</form>";

        // delete from cart
        echo "<a href='remove_from_cart.php?id={$id}' class='btn btn-default'>";
        echo "Delete";
        echo "</a>";
        echo "</div>";

        echo "<div class='col-md-4'>";
        echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>";
        echo "</div>";
        echo "</div>";
        // =================

        $item_count += $quantity;
        $total+=$sub_total;
    }

    echo "<div class='col-md-8'></div>";
    echo "<div class='col-md-4'>";
    echo "<div class='cart-row'>";
    echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
    echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
    echo "<a href='checkout.php' class='btn btn-success m-b-10px'>";
    echo "<span class='glyphicon glyphicon-shopping-cart'></span> Proceed to Checkout";
    echo "</a>";
    echo "</div>";
    echo "</div>";

}

// no products were added to cart
else{

    echo "<div class='col-md-12'>";
    echo "<div class='alert alert-danger'>";
    echo "No products found in your cart!";
    echo "</div>";
    echo "</div>";
}

//contents here

include_once 'layout_foot.php';

?>