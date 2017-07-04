<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/28/2017
 * Time: 4:40 PM
 */
require_once('vendor/autoload.php');

$stripe = array(
    "secret_key"      => "sk_test_sS5FtRnx8kdSixHYwzoiMPxa",
    "publishable_key" => "pk_test_tpYhNaR95tgLDMFFoWuDS7gQ"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>