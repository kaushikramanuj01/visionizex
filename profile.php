<?php
require_once 'config/init.php';
include 'navbar.php';

// $user_id = json_encode($IIS->getuseremail());

$useremail = isset($_SESSION['useremail']) ? ($_SESSION['useremail']) : "";
$usercredit = $SubDB->countcredit();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Profile</title>
    <style>
        body {
            background-color: #333;
        }

        .main_div {
            display: flex;
            /* background-color: red; */
            width: 100%;
            height: max-content;
            align-items: center;
            justify-content: center;
            padding: 12px 0px;
            /* padding: 34px 0px; */
        }

        .sub_div {
            width: 85%;
            height: max-content;
            padding-bottom: 15px;
            background-color: #0b0f17;
            background-image: linear-gradient(170deg, rgba(87, 139, 254, 0.12) 0.65%, rgba(87, 139, 254, 0) 19%, #0b0f17);
        }

        .total_div_a {
            height: 7%;
            border-radius: 12px;
            background-color: #1f283b;
            margin-top: 15px;
            width: 25%;
            /* margin-bottom: 15px; */
            float: left;
            left: 25px;
            position: relative;
            color: white;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .total_div_a span{
            font-size: 17px;
            padding: 6px 0px;
        }

        /* .total_div_b {
            height: 7%;
            border-radius: 12px;
            background-color: #1f283b;
            margin-top: 15px;
            width: 25%;
            /* margin-bottom: 15px; 
            float: right;
            right: 25px;
            position: relative;
            color: white;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        } */

        /* ################ new ################### */

        @import 'https://fonts.googleapis.com/css?family=Open+Sans:600,700';

        * {
            font-family: 'Open Sans', sans-serif;
        }

        .rwd-table {
            margin: auto;
            min-width: 300px;
            max-width: 100%;
            border-collapse: collapse;
        }

        .rwd-table tr:first-child {
            border-top: none;
            /* background: #428bca; */
            background-color: #232e43;
            color: #fff;
        }

        .rwd-table tr {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            background-color: #f5f9fc;
        }

        .rwd-table tr:nth-child(odd):not(:first-child) {
            background-color: #ebf3f9;
        }

        .rwd-table th {
            display: none;
        }

        .rwd-table td {
            display: block;
        }

        .rwd-table td:first-child {
            margin-top: .5em;
        }

        .rwd-table td:last-child {
            margin-bottom: .5em;
        }

        .rwd-table td:before {
            content: attr(data-th) ": ";
            font-weight: bold;
            width: 120px;
            display: inline-block;
            color: #000;
        }

        .rwd-table th,
        .rwd-table td {
            text-align: left;
        }

        .rwd-table {
            color: #333;
            border-radius: .4em;
            overflow: hidden;
        }

        .rwd-table tr {
            border-color: #bfbfbf;
        }

        .rwd-table th,
        .rwd-table td {
            padding: .5em 1em;
        }

        @media screen and (max-width: 601px) {
            .rwd-table tr:nth-child(2) {
                border-top: none;
            }
        }

        @media screen and (min-width: 600px) {
            .rwd-table tr:hover:not(:first-child) {
                background-color: #d8e7f3;
            }

            .rwd-table td:before {
                display: none;
            }

            .rwd-table th,
            .rwd-table td {
                display: table-cell;
                padding: .25em .5em;
            }

            .rwd-table th:first-child,
            .rwd-table td:first-child {
                padding-left: 0;
            }

            .rwd-table th:last-child,
            .rwd-table td:last-child {
                padding-right: 0;
            }

            .rwd-table th,
            .rwd-table td {
                padding: 1em !important;
            }
        }


        /* THE END OF THE IMPORTANT STUFF */

        /* Basic Styling */
        /* body {
            background: #4B79A1;
            background: -webkit-linear-gradient(to left, #4B79A1, #283E51);
            background: linear-gradient(to left, #4B79A1, #283E51);
        } */

        h1 {
            text-align: center;
            font-size: 2.0em;
            color: #f2f2f2;
        }

        .container {
            display: block;
            text-align: center;
        }

        @-webkit-keyframes leftRight {
            0% {
                -webkit-transform: translateX(0)
            }

            25% {
                -webkit-transform: translateX(-10px)
            }

            75% {
                -webkit-transform: translateX(10px)
            }

            100% {
                -webkit-transform: translateX(0)
            }
        }

        @keyframes leftRight {
            0% {
                transform: translateX(0)
            }

            25% {
                transform: translateX(-10px)
            }

            75% {
                transform: translateX(10px)
            }

            100% {
                transform: translateX(0)
            }
        }
        .con2{
            margin-top: 4em;
        }

        @media screen and (max-width: 850px) {
            .total_div_a{
                width: 200px;
            }
        }
        
        @media screen and (max-width: 450px) {
            .sub_div {
                width: 95%;
            }
        }
        
        @media screen and (max-width: 390px) {
            .rwd-table {
                    min-width: 250px;
                    max-width: 90%;
            }
            .total_div_a{
                left: 15px;
            }
        }
    
    </style>
</head>

<body>

    <div class="main_div">
        <div class="sub_div">
            <div class="total_div_a">
                <span>Total Point .: <?php echo $usercredit; ?></span>
            </div>

            <!-- <div class="total_div_b">
                <span>Expire On .: 15-02-2024</span>
            </div> -->

            <!-- ############# NEW ################ -->

            <div class="container con2">
                <h1>Your Purchases</h1>
                <table class="rwd-table">
                    <tbody>
                        <tr>
                            <th>Package</th>
                            <th>Amount</th>
                            <th>Credit Point</th>
                            <th>Payment Date</th>
                            <!-- <th>Expire Date</th> -->
                            <!-- <th>Expired or Not</th> -->

                            <!-- <th>Invoice Number</th>
                            <th>Invoice Date</th>
                            <th>Due Date</th>
                            <th>Net Amount</th> -->
                        </tr>

                        <?php   
                            $where = array(
                                'userid'=>$useremail
                            );
                            $sort = "id DESC"; // Customize the sorting as needed
                            $history = $SubDB->execute("tblhistory", $where,$sort,"");

                            // $current_date = date('Y-m-d H:i:s');
                            // $current_date = date('Y-m-d');
                            foreach($history as $value){
                                $package_info = $SubDB->getpackage($value['package']);
                                $package_name = $package_info['name'];

                                // $expire_date_only_date = date('Y-m-d', strtotime($value['expire_date']));
                                // if (strtotime($current_date) > strtotime($expire_date_only_date)) {
                                //     // echo 'Package has expired.';
                                //     $valid = "Not Valid";
                                // } else {
                                //     // echo 'Package is still valid.';
                                //     $valid = "Valid";
                                // }
                                ?>

                                <tr>
                                    <td data-th="Package">
                                        <?php echo $package_name; ?>
                                    </td>
                                    <td data-th="Amount">
                                        <?php echo $value['price']; ?>
                                    </td>
                                    <td data-th="Credit Point">
                                        <?php echo $value['credit']; ?>
                                    </td>
                                    <td data-th="Payment Date">
                                        <?php echo $value['payment_date']; ?>
                                    </td>
                                </tr>
                        <?php
                            }

                        ?>

                    </tbody>
                </table>
                <!-- <h3>Resize Me</h3> -->
            </div>

        </div>
    </div>

    <div>
        <div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="main.js"></script>
</body>

</html>