<?php 
session_start();
$price = $_SESSION['price'];
$name = $_SESSION['name'];
$image = $_SESSION['image'];




//stripeの記述
require '../../modules/libralys/vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'jpy',
      'unit_amount' => $price,
      'product_data' => [
        'name' => $name,
        // 'images' => ["$YOUR_DOMAIN/upload/$image"],//画面に表示はされるがバイナリ型に変換されている模様。
        // 'images' => ["https://i.imgur.com/EHyR2nP.png"],←元のstripeの記述

      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/f_success/',
  'cancel_url' => $YOUR_DOMAIN . '/f_error/',
]);

echo json_encode(['id' => $checkout_session->id]);




?>