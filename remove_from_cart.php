<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/26/2017
 * Time: 2:04 PM
 */

session_start();

$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

// remove the item from the array
unset($_SESSION['cart'][$id]);

// redirect to product list and tell the user it was added to cart
header('Location: cart.php?action=removed&id=' . $id);
?>