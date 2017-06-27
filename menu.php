<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/26/2017
 * Time: 12:10 PM
 */

// start session
session_start();

include "config/database.php";

include_once "objects/food.php";
include_once  "objects/food_image.php";


$database = new Database();
$db = $database->getConnection();

$food = new Food($db);
$food_images = new FoodImage($db);

// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

// set page title
$page_title="Grab n Go Menu";

// page header html
include 'layout_head.php';

echo "<div class='col-md-12'>";
    if($action=='added'){
        echo "<div class='alert alert-info'>";
        echo "Product was added to your cart!";
        echo "</div>";
    }

    if($action=='exists'){
        echo "<div class='alert alert-info'>";
        echo "Product already exists in your cart!";
        echo "</div>";
    }
echo "</div>";

$stmt=$food->read($from_record_num, $records_per_page);

$num = $stmt->rowCount();

if ($num>0){
    $page_url="menu.php?";
    $total_rows=$food->count();

    include_once "read_products_template.php";
}

else {
    echo "<div class 'col-md-12'>";
    echo "<div class='alert alert-danger'>No Products Loaded from Database :(</div>";
    echo "</div>";
}

// layout footer code
include 'layout_foot.php';
?>