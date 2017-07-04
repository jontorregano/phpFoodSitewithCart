<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 7/3/2017
 * Time: 10:52 PM
 */

include 'config/database.php';

include_once "objects/food.php";
include_once "objects/food_image.php";
include_once  "objects/orders.php";

$database = new Database();
$db = $database->getConnection();

$order = new Orders($db);
$food = new Food($db);
$food_images = new FoodImage($db);

// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 9; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

$page_title="Orders";

include 'layout_head.php';

$stmt=$order->read($from_record_num, $records_per_page);

$num = $stmt->rowCount();

if ($num>0){
    $page_url="orders.php?";
    $total_rows=$order->count();

    echo "<div class='cart-row'>";
    echo "<div class='col-md-8'>";
    echo "<div class='food-name m-b-10px'><h4>{$food_list}</h4></div>";
    // update quantity
    echo "<form class='update-quantity-form'>";
    echo "<div class='food-id' style='display:none;'>{$id}</div>";
    echo "<div class='input-group'>";
    echo "<input style='margin-bottom: 10px;' type='number' name='quantity' value='{$created_on}' class='form-control cart-quantity' min='1' />";
    echo "<span class=''>";
    echo "<button class='btn btn-danger btn-circle update-quantity' type='submit'>Update</button>";
    echo "</span>";
    echo "</div>";
    echo "</form>";
}

else {
    echo "<div class 'col-md-12'>";
    echo "<div class='alert alert-danger'>No Orders in Database :(</div>";
    echo "</div>";
}

include 'layout_foot.php';
?>