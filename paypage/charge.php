<?php
require_once('../vendor/autoload.php');

\Stripe\Stripe::setApiKey('sk_test_AfP8gxA4OSKeCQhEYTtCncTp00g4OLFjuV');

//Sanitize POST array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

// Create customer in Stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
  ));

  // Charge Customer
$charge = \Stripe\Charge::create(array(
    "amount" => 100,
    "currency" => "usd",
    "description" => "Complete book info",
    "customer" => $customer->id
  ));

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);

