<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/28/2017
 * Time: 4:40 PM
 */
require_once('vendor/autoload.php');

$stripe = array(
    "secret_key"      => "sk_test_HpI1uYpy79IP0ysxlCjEbUaA",
    "publishable_key" => "pk_test_JMR0ZKQLR3yyv2PcrapciIWj"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>