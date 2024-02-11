<?php
include 'config/DBconfig.php';
include 'config/init.php';
require('razorpay-php-2.9.0/config.php');
require('razorpay-php-2.9.0/Razorpay.php');
// Create the Razorpay Order

$login = $_SESSION['login'];
if($login !== 1){
    header("location:login.php" );
}

use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);

// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders

$package = isset($_GET['pack']) ? $_GET['pack'] : 0;
$useremail = isset($_SESSION['useremail']) ? ($_SESSION['useremail']) : "";

$package_info = $SubDB->getpackage($package);

// print_r($package_info);

$price = (int)$package_info['amount'];
$credit = (int)$package_info['credit'];

// echo "\nthis is price".$price."\n";
// $price = 1500;
// $credit = 4000;

$_SESSION['price'] = $price;
$_SESSION['credit'] = $credit;
$_SESSION['package'] = $package;

// Array ( [0] => Array ( [id] => 1 [_id] => 62ecd05a06ad68e [name] => Classic [code] => 2 [amount] => 20 [duration] => 30 [isactive] => 1 [credit] => 2000 [date] => 2024-01-26 20:45:38 ) )

if($useremail !== ""){
    
    $where = array("email" => $useremail); // Customize the WHERE clause as needed
    $userData = $SubDB->execute("tblcustmaster", $where,"","");

    if(sizeof($userData) > 0){
        $customername = $userData[0]['name'];
        $contactno = "9925884594";

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
        // echo $displayCurrency;
        // echo $displayCurrency;
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
            "description"       => "AI for Everyone",
            "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
            "prefill"           => [
            "name"              => $customername,
            "email"             => $useremail,
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy</title>
    <style>
        .main_container {
            /* background-color: black; */
            width: -webkit-fill-available;
            height: 90%;
            border: 2px solid;
            display: flex;
            justify-content: center;
        }
        .sub_div {
            width: 47%;
            /* background: aqua; */
            font-family: sans-serif;
        }
        .rj-div {
            display: flex;
            /* background: antiquewhite; */
            align-items: center;
            width: max-content;
            height: max-content;
            margin-top: 7vh;
            cursor: pointer;
        }
        .rj-div img {
            width: 17px;
        }
        .rj-div span {
            font-size: 14px;
            margin-left: 5px;
        }
        .rj-b {
            margin-top: 6vh;
            /* text-align-last: center; */
        }
        .rj-b span {
            font-size: 21px;
        }
        .rj-c {
            margin-top: 25px;
            border-bottom: 2px solid black;
        }
        .rv-a {
            display: inline-block;
        }
        .rv-b {
            display: inline-block;
            float: right;
        }
        .rj-d {
            margin-top: 7px;
        }
        .rv-c {
            float: right;
        }
        .rj-e {
            margin-top: 15px;
            border-bottom: 2px solid black;
        }
        .rv-d {
            float: right;
        }
        .rj-f {
            margin-top: 20px;
        }
        .rv-e {
            float: right;
        }
        .razorpay-payment-button {
            margin: 5vh 0px;
            padding: 3px 14px;
            border-radius: 5px;
            border: 1px solid black;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- <button id="backButton">Go Back</button> -->

    <div class="main_container">
        <div class="sub_div">

            <div class="rj-div" id="backButton">
                <img src="images/logo/left-arrow-icon.svg" alt="" srcset="">
                <span>BACK</span>
            </div>

            <div class="rj-b">
                <div>
                    <span>
                        Subscribe to PicsPic Plus Subscription
                    </span>
                </div>
            </div>

            <div class="rj-c">
                <div class="rv-a">PicsPic Plus Subscription</div>
                <div class="rv-b"><?php echo $price; ?></div>
            </div>

            <div class="rj-d">
                <span>Subtotal</span>
                <span class="rv-c"><?php echo $price; ?></span>
            </div>

            <div class="rj-e">
                <span>Tax</span>
                <span class="rv-d">Enter address to calculate</span>
            </div>

            <div class="rj-f">
                <span>Total due today</span>
                <span class="rv-e"><?php echo $price; ?></span>
            </div>

            <form action="verify.php" method="POST">
                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key']?>"
                    data-amount="<?php echo $data['amount']?>" data-currency="INR"
                    data-name="<?php echo $data['name']?>" data-image="<?php echo $data['image']?>"
                    data-description="<?php echo $data['description']?>"
                    data-prefill.name="<?php echo $data['prefill']['name']?>"
                    data-prefill.email="<?php echo $data['prefill']['email']?>"
                    data-prefill.contact="<?php echo $data['prefill']['contact']?>" data-notes.shopping_order_id="3456"
                    data-order_id="<?php echo $data['order_id']?>" <?php if ($displayCurrency !== 'INR') { ?>
                    data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
                    <?php if ($displayCurrency !== 'INR') { ?>
                    data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>>
                </script>
                <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                <input type="hidden" name="shopping_order_id" value="3456">
            </form>

        </div>
    </div>

    <script>
        document.getElementById("backButton").addEventListener("click", function() {
            goBack();
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
<?php
    }
}
?>