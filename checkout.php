<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/26/2017
 * Time: 2:08 PM
 */

// start session
session_start();

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

// set page title
$page_title="Checkout";

// include page header html
include 'layout_head.php';

if(count($_SESSION['cart'])>0){

    // get the product ids
    $ids = array();
    foreach($_SESSION['cart'] as $id=>$value){
        array_push($ids, $id);
    }

    $stmt=$food->readByIds($ids);

    $total=0;
    $item_count=0;
    $tax_rate=0.10;
    $grandtotal=0;
    $tax = 0;
    $total_order = '';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $quantity=$_SESSION['cart'][$id]['quantity'];
        $sub_total=$price*$quantity;

        //echo "<div class='product-id' style='display:none;'>{$id}</div>";
        //echo "<div class='product-name'>{$name}</div>";

        // =================
        echo "<div class='cart-row'>";
        echo "<div class='col-md-8'>";

        echo "<div class='food-name m-b-10px'><h4>{$name}</h4></div>";
        echo $quantity>1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";

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

        $order_string = "Food {$name} Quantity {$quantity}<br><br>";
        $total_order .= $order_string;
    }

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
        echo "</div>";
    echo "</div>";

    $customer_names = $customer_comment = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_names = test_input($_POST["customer_name"]);
        $customer_comment = test_input($_POST["customer_comment"]);
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

else{
    echo "<div class='col-md-12'>";
    echo "<div class='alert alert-danger'>";
    echo "No products found in your cart!";
    echo "</div>";
    echo "</div>";
}

?>

<?php require_once('./config.php'); ?>

<div class="col-md-12 text-center">
    <form action="charge.php" method="POST">
        <h4 class="text-center" style="padding-top: 1%">Customer Information</h4>
        <div class="text-center">
            Name: <input type="text" name="customer_name">
            <br><br>
            Comment / Food Options: <textarea name="customer_comment" rows="3" cols="40"></textarea>
            <br><br>
        </div>
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $stripe['publishable_key']; ?>"
                data-amount="<?php echo round($grandtotal,2) * 100 ?>"
                data-name="Food Purchase"
                data-description="Complete Purchasing Food"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
        </script>
    </form>
</div>

<?php
include 'layout_foot.php';
?>

