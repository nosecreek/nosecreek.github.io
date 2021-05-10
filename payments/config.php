<?php
require_once('stripe/init.php');

$stripe = array(
  "secret_key"      => "sk_live_70Ie8MgN80eEhrJ0czbHSFH4",
  "publishable_key" => "pk_live_ThjdPuRJgAnFxZI0zrsZ2CD9"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
