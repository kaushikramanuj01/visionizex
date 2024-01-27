<?php

// include '../partials/connection.php';
// include 'constants.php';
// include 'connection.php';
include 'config/DBconfig.php';
include 'config/init.php';
require('razorpay-php-2.9.0/config.php');
require('razorpay-php-2.9.0/Razorpay.php');
// session_start();
// Create the Razorpay Order

use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);

// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders




if($_SERVER['REQUEST_METHOD'] == 'POST')
{  
  $price = $_POST['tot_price'];
  $_SESSION['price'] = $price;

  $email = $_POST['email'];
  $_SESSION['email'] = $email;

  $count = $_POST['image_count'];
  $_SESSION['image_count'] = $count;
  // echo $email;
  // echo $price;
  // $user_email = $_POST['email'];
  
  // $select_user_sql ="SELECT * FROM `user_data` where `email` = '$email' ";
 
  // execute the query
  // $result = mysqli_query($conn, $select_user_sql) or die(mysqli_error());
  $result = TRUE;
  
  if ($result == TRUE) 
  {
    // $count = mysqli_num_rows($result);
    // $rows=mysqli_fetch_assoc($result);
    
    $fname = "fname";
    $lname = "lname";
    $customername = $fname.$lname;
    $contactno = "9925884555";    
    // $fname = $rows['fname'];
    // $lname = $rows['lname'];
    // $customername = $fname.$lname;
    // $contactno = $rows['mobileno'];    
  } 
}

// $contactno = $_POST['contactno'];
$orderData = [
    'receipt'         => "3456",
    'amount'          => $price * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "PicsPic ",
    "description"       => "images for Everyone",
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $customername,
    "email"             => $email,
    "contact"           => $contactno,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
?>

<form action="verify.php" method="POST">
    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key']?>"
        data-amount="<?php echo $data['amount']?>" data-currency="INR" data-name="<?php echo $data['name']?>"
        data-image="<?php echo $data['image']?>" data-description="<?php echo $data['description']?>"
        data-prefill.name="<?php echo $data['prefill']['name']?>"
        data-prefill.email="<?php echo $data['prefill']['email']?>"
        data-prefill.contact="<?php echo $data['prefill']['contact']?>" data-notes.shopping_order_id="3456"
        data-order_id="<?php echo $data['order_id']?>" <?php if ($displayCurrency !== 'INR') { ?>
        data-display_amount="<?php echo $data['display_amount']?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?>
        data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>>
    </script>
    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
    <input type="hidden" name="shopping_order_id" value="3456">
</form>