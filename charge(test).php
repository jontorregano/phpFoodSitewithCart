<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 7/7/2017
 * Time: 4:15 PM
 */
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="libs/bootstrap-3.3.7/css/bootstrap.min.css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- container -->
    <div class="container">

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

        if($_POST){
            // include database connection
            include 'config/database.php';

            // get database connection
            $database = new Database();
            $db = $database->getConnection();

            try{

                // insert query
                $query = "INSERT INTO food_orders SET food_list=:food_list, food_total=:food_total, created_on=:created_on";

                // prepare query for execution
                $stmt = $db->prepare($query);

                // posted values
                $food_list=htmlspecialchars(strip_tags($_POST['food_list']));
                $food_total=htmlspecialchars(strip_tags($_POST['food_total']));

                // bind the parameters
                $stmt->bindParam(':food_list', $food_list);
                $stmt->bindParam(':food_total', $food_total);

                // specify when this record was inserted to the database
                $created_on=date('Y-m-d H:i:s');
                $stmt->bindParam(':created_on', $created_on);

                // Execute the query
                if($stmt->execute()){
                    echo "<div class='alert alert-success'>Record was saved.</div>";
                }else{
                    echo "<div class='alert alert-danger'>Unable to save record.</div>";
                }
            }
                // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
        }
    }
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

        <!-- html form here where the product information will be entered -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='food_list' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type='text' name='food_total' class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save' class='btn btn-primary' />
                        <a href='cart.php' class='btn btn-danger'>Back to read products</a>
                    </td>
                </tr>
            </table>
        </form>


        <div class="page-header">
            <h1>Create Product</h1>
        </div>

    <!-- dynamic content will be here -->

    </div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="libs/jquery-3.2.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="libs/bootstrap-3.3.7/js/bootstrap.min.js"></script>

</body>
</html>