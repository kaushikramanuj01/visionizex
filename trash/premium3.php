<?php
require_once 'config/init.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <style>
    /* Add some basic styling for the table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Style the button */
    .buy-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border: none;
        border-radius: 4px;
    }
    </style>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Package</th>
                <th>Price</th>
                <th>Credit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Basic Package</td>
                <td>Rs.1000</td>
                <td>2000</td>
                <td> <a href="buy.php?pack=1" class="buy-button">Buy</a></td>
            </tr>
            <tr>
                <td>Standard Package</td>
                <td>Rs.1500</td>
                <td>4000</td>
                <td><a href="buy.php?pack=2" class="buy-button">Buy</a></td>
            </tr>
            <tr>
                <td>Premium Package</td>
                <td>Rs.2000</td>
                <td>6000</td>
                <td><a href="buy.php?pack=3" class="buy-button">Buy</a></td>
            </tr>
        </tbody>
    </table>

    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>