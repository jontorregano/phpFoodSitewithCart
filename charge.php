<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/28/2017
 * Time: 4:53 PM
 */

  require_once('./config.php');

// connect to database
include 'config/database.php';

// include objects
include_once "objects/food.php";
include_once "objects/food_image.php";
include_once "objects/orders.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$food = new Food($db);
$food_image = new FoodImage($db);
$food_order = new Order($db);

session_start();

if(count($_SESSION['cart'])>0) {

    // get the product ids
    $ids = array();
    foreach ($_SESSION['cart'] as $id => $value) {
        array_push($ids, $id);
    }

    $stmt = $food->readByIds($ids);

    $total = 0;
    $item_count = 0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $quantity = $_SESSION['cart'][$id]['quantity'];
        $sub_total = $price * $quantity;

        $item_count += $quantity;
        $total += $sub_total;
    }
}

  $token  = $_POST['stripeToken'];

  $customer = \Stripe\Customer::create(array(
      'email' => 'customer@example.com',
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $total * 100,
      'currency' => 'usd',
  ));

// set page title
$page_title="Thank You!";

// include page header HTML
include_once 'layout_head.php';

echo "<div class='col-md-12'>";

if(count($_SESSION['cart'])>0) {

    // get the product ids
    $ids = array();
    foreach ($_SESSION['cart'] as $id => $value) {
        array_push($ids, $id);
    }

    $stmt = $food->readByIds($ids);

    $total = 0;
    $item_count = 0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $quantity = $_SESSION['cart'][$id]['quantity'];
        $sub_total = $price * $quantity;

        //echo "<div class='product-id' style='display:none;'>{$id}</div>";
        //echo "<div class='product-name'>{$name}</div>";

        // =================
        echo "<div class='cart-row'>";
        echo "<div class='col-md-8'>";

        echo "<div class='food-name m-b-10px'><h4>{$name}</h4></div>";
        echo $quantity > 1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";

        echo "</div>";

        echo "<div class='col-md-4'>";
        echo "<h4>&#36;" . number_format($price, 2, '.', ',') . "</h4>";
        echo "</div>";
        echo "</div>";
        // =================

        $item_count += $quantity;
        $total += $sub_total;
    }

    $sql = "INSERT INTO food_orders (food_list, food_total, created_on) VALUES (:$name, :$total, :current_timestamp)";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':$name', $_POST['food_list'], PDO::PARAM_STR);
    $stmt->bindParam(':$total', $_POST['food_total'], PDO::PARAM_STR);
    $stmt->bindParam(':current_timestamp',$_POST['created_on'], PDO::PARAM_STR);

    $stmt->execute();
}

// tell the user order has been placed
echo "<div class='alert alert-success'>";
echo "<strong>Your order has been placed!</strong> Thank you very much!";
echo "</div>";

echo "</div>";

//if ($_POST) {

    //include 'config/database.php';


// remove items from the cart
session_destroy();

// include page footer HTML
include_once 'layout_foot.php';
?>