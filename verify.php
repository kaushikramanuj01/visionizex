<?php

// include 'constants.php';
// require('config.php');
include 'config/DBconfig.php';
include 'config/init.php';
require('razorpay-php-2.9.0/config.php');
require('razorpay-php-2.9.0/Razorpay.php');

// session_start();
//db connection
// $conn=mysqli_connect($host,$username,$password,$dbname);
// $con=mysqli_connect($host,$username,$password,$dbname2);
// $conn = mysqli_connect($host, $username, $password, $dbname);
// require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;
$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);
    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $email = $_SESSION['useremail'];
    $price = $_SESSION['price'];

    $_id = $SubDB->generateUniqueID();
    $inst = [
        '_id'=>$_id,
        'order_id'=>$razorpay_order_id,
        'razorpay_payment_id'=>$razorpay_payment_id,
        'status'=>'success',
        'userid'=>$email,
        'price'=>$price,
    ];
    $where = array();
    print_r($inst);
    $message = $SubDB->performCRUD("tblpayment", "i", $inst, $where);
    echo $message;
    // $image_count = $_SESSION['image_count'];
    // $sql = "INSERT INTO `payment` (`order_id`, `razorpay_payment_id`, `status`, `email`, `price` ,`image_count`) VALUES ('$razorpay_order_id', '$razorpay_payment_id', 'success', '$email', '$price','$image_count')";

    //! insert credit start

    $package = $_SESSION['package'];
    $credit = $_SESSION['credit'];

    //! add in history table
    $h_id = $SubDB->generateUniqueID();
    $payment_date = date('Y-m-d H:i:s'); // Current date and time
    $expire_date = date('Y-m-d H:i:s', strtotime('+30 days', strtotime($payment_date)));
    $inst_h = [
        '_id'=>$h_id,
        'userid'=>$email,
        'status'=>'success',
        'price'=>$price,
        'package'=>$package,
        'credit'=>$credit,
        'payment_date'=>$payment_date,
        'expire_date'=>$expire_date,
    ];
    $where = array();
    $message = $SubDB->performCRUD("tblhistory", "i", $inst_h, $where);
    // ! end add in history table

    // $credit_id = $SubDB->generateUniqueID();
    // $inst_credit = array(
    //     "_id" => $credit_id,
    //     "userid" => $email,
    //     "credit" => $credit,
    //     "type" => "credit",
    // );

    // $rk = $SubDB->performCRUD("tblcredit", "i", $inst_credit, $where);

    // //! insert credit end

    // if(mysqli_query($conn, $sql)){
    //     echo "payment details inserted to db";
    // }
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";


    // $con=mysqli_connect($host,$username,$password,$dbname2);

    // Insert data into download page         

    // $cart_sql = "SELECT * FROM `cart` where `user_id` = '$email' ";
    // execute the query
    // $result = mysqli_query($con, $cart_sql) or die(mysqli_error());
    // if ($result == TRUE) {
    //         $count = mysqli_num_rows($result);
    //         //count rows to check whether we have in database or not
    //         //check the num of rows
    //         if($count>0){
    //             //we have data in database
    //             while($rows=mysqli_fetch_assoc($result)){
    //                 //get all data from database.
    //                 //while loop will run as long as we have data in database.
    //                 // var_dump($rows);
    //                 //get individual data
    //                 $cart_id=$rows['id'];
    //                 $img_id=$rows['img_id'];
    //                 $img_ctg = $rows['img_ctg'];
    //                 $image_sql = "SELECT * FROM $img_ctg where id = '$img_id' ";
    //                 // execute the query
    //                 $image_result = mysqli_query($con, $image_sql) or die(mysqli_error());
                
    //                 if ($image_result == TRUE) {
    //                     // echo "yes";       
    //                     $count2 = mysqli_num_rows($image_result);
    //                     $rows2=mysqli_fetch_assoc($image_result);
    //                     if($count2>0){
    //                         // echo "yes2";       
    //                         //get individual data
    //                         $img_name = $rows2['image_name'];
    //                         $img_price = $rows2['price'];
    //                         // isert image into download table 

    //                         // the query
    //                         $sql2 = "INSERT INTO `download` (`email`,`razorpay_payment_id`,`img_id`, `img_ctg`,`img_name`,`img_price`) VALUES ('$email','$razorpay_payment_id','$img_id', '$img_ctg','$img_name','$img_price')";
    //                         // execute the query
    //                         $result2 = mysqli_query($conn, $sql2) or die(mysqli_error());
    //                     }
    //                 }
    //             }
    //         }
    // } //1
    // redirect user to download page . 
    header("location:index.php");
    // header("location:".  SITEURL."index.php?payment_complete&email=".$email);
}
else
{
    $html = "<p>Your payment failed</p>";
            //  <p>{$error}</p>";
}

echo $html;
?>