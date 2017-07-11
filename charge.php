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
    $tax_rate=0.10;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $quantity = $_SESSION['cart'][$id]['quantity'];
        $sub_total = $price * $quantity;

        $item_count += $quantity;

        $total+=$sub_total;
        $total_notax = $total;
        $tax = $total_notax * $tax_rate;
        $grandtotal = $tax + $total_notax;
    }
}

  $token  = $_POST['stripeToken'];

  $customer = \Stripe\Customer::create(array(
      'email' => '',
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => round($grandtotal * 100),
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

    $names = array();
    foreach ($_SESSION['cart'] as $name => $value) {
        array_push($names, $name);
    }

    $stmt = $food->readByIds($ids);
    $stmt = $food->readByNames($names);

    $total = 0;
    $item_count = 0;
    $tax_rate=0.10;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $quantity = $_SESSION['cart'][$id]['quantity'];
        $sub_total = $price * $quantity;

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

        $total+=$sub_total;
        $total_notax = $total;
        $tax = $total_notax * $tax_rate;
        $grandtotal = $tax + $total_notax;

        $order_string = "Name={$name}&Quantity={$quantity}";

        $customerName = $_POST["customer_name"];
        $customerComment = $_POST["customer_comment"];
    }

    echo "<div>";
    echo "<div class='col-md-12 text-align-center'>";
    echo "<div class='cart-row'>";
    if($item_count>1){
        echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
    }else{
        echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
    }
    echo "<h4>Sub Total: &#36;" . number_format($total, 2, '.', ',') . "</h4>";
    echo "<h4>Taxes: &#36;" . number_format($tax, 2, '.', ',') . "</h4>";
    echo "</div>";
    echo "</div>";

    echo "<div class='col-md-12 text-align-center'>";
    echo "<div class='cart-row'>";
    echo "<h4>Grand Total</h4>";
    echo "<h4>&#36;" . round($grandtotal,2) . "</h4>";
    echo "<h4>Customer Name: " . $customerName . "</h4>";
    echo "<h4>Comment /  Food Options: " . $customerComment . "</h4>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

        $insertOrder = $db->query("INSERT INTO food_orders (food_total, created_on, food_list, customer_names, 
          customer_comment) VALUES 
        ('" . $grandtotal . "', '" . date("Y-m-d H:i:s") . "' ,'" . $order_string . "','" . $customerName . "'
        ,'" . $customerComment . "')");
}

?>

<?php
// tell the user order has been placed
echo "<div class='alert alert-success text-center'>";
echo "<strong>Your order of has been placed!</strong> Thank you very much!";
echo "</div>";

echo "</div>";

// remove items from the cart
session_destroy();

// include page footer HTML
include_once 'layout_foot.php';
?>