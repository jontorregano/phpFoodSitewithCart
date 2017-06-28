<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/26/2017
 * Time: 1:07 PM
 */
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : "";
$quantity = isset ($_GET['quantity']) ? $_GET['quantity'] : 1;
$page = isset ($_GET['page']) ? $_GET['page'] : 1;

$quantity=$quantity<=0 ? 1 : $quantity;

$cart_item=array(
    'quantity'=>$quantity
);

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if(array_key_exists($id,$_SESSION['cart'])){
    header('Location: menu.php?action=exist&id=' . $id . '&page=' . $page);
}

else {
    $_SESSION['cart'][$id] = $cart_item;
    header('Location: menu.php?action=added&page=' . $page);
}
?>