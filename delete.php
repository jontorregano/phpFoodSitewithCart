<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 7/11/2017
 * Time: 12:01 PM
 */

// include database connection
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

try {

    // get record ID
    // isset() is a PHP function used to verify if a value is there or not
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Order was not found.');

    // delete query
    $query = "DELETE FROM food_orders WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $id);

    if($stmt->execute()){
        // redirect to read records page and
        // tell the user record was deleted
        header('Location: orders.php?action=deleted');
    }else{
        die('Unable to delete record.');
    }
}

// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>