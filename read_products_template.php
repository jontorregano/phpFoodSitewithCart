<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/26/2017
 * Time: 12:31 PM
 */

if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
}

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract ($row);

    // creating box
    echo "<div class='col-md-4 m-b-20px text-center'>";

    // product id for javascript access
    echo "<div class='product-id display-none'>{$id}</div>";

    echo "<a href='menu_item.php?id={$id}' class='product-link'>";
    // select and show first product image
    $food_images->food_id=$id;
    $stmt_food_image=$food_images->readFirst();

    while ($row_food_image = $stmt_food_image->fetch(PDO::FETCH_ASSOC)){
        echo "<div class='m-b-10px'>";
        echo "<img src='uploads/images/{$row_food_image['name']}' class='w-45-pct text-center' />";
        echo "</div>";
    }

    // product name
    echo "<div style=' font-weight: bold; font-size: 18px;' class='product-name m-b-10px text-center'>{$name}</div>";
    echo "</a>";

    echo "<div style='color:#800000; font-weight: bold;' class='product-name m-b-10px text-center'>Price: $ {$price}</div>";
    echo "</a>";

        //add to cart button
        echo "<div class='m-b-10px text-center'>";
            if(array_key_exists($id,$_SESSION['cart'])){
                echo "<a href='cart.php' class='btn btn-danger btn-circle w-45-pct'>";
                    echo "Update Cart";
                echo "</a>";
            }else{
                echo "<a href='add_to_cart.php?id={$id}&page={$page}' class='btn btn-circle btn-white w-45-pct'>Add to Cart</a>";
            }
        echo "</div>";
    echo "</div>";
}

include_once "paging.php";

?>
