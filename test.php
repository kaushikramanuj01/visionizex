<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
        background: #428bca;
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
    body {
        background: #4B79A1;
        background: -webkit-linear-gradient(to left, #4B79A1, #283E51);
        background: linear-gradient(to left, #4B79A1, #283E51);
    }

    h1 {
        text-align: center;
        font-size: 2.4em;
        color: #f2f2f2;
    }

    .container {
        display: block;
        text-align: center;
    }

    h3 {
        display: inline-block;
        position: relative;
        text-align: center;
        font-size: 1.5em;
        color: #cecece;
    }

    h3:before {
        content: "\25C0";
        position: absolute;
        left: -50px;
        -webkit-animation: leftRight 2s linear infinite;
        animation: leftRight 2s linear infinite;
    }

    h3:after {
        content: "\25b6";
        position: absolute;
        right: -50px;
        -webkit-animation: leftRight 2s linear infinite reverse;
        animation: leftRight 2s linear infinite reverse;
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

    /*
    Don't look at this last part. It's unnecessary. I was just playing with pixel gradients... Don't judge.
*/
    /*
@media screen and (max-width: 601px) {
  .rwd-table tr {
    background-image: -webkit-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: -moz-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: -o-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: -ms-linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
    background-image: linear-gradient(left, #428bca 137px, #f5f9fc 1px, #f5f9fc 100%);
  }
  .rwd-table tr:nth-child(odd) {
    background-image: -webkit-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: -moz-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: -o-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: -ms-linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
    background-image: linear-gradient(left, #428bca 137px, #ebf3f9 1px, #ebf3f9 100%);
  }
}*/
    </style>
</head>




<body>
    <div class="container">
        <h1>Responsive Table</h1>
        <table class="rwd-table">
            <tbody>
                <tr>
                    <th>Supplier Code</th>
                    <th>Supplier Name</th>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>Net Amount</th>
                </tr>
                <tr>
                    <td data-th="Supplier Code">
                        UPS5005
                    </td>
                    <td data-th="Supplier Name">
                        UPS
                    </td>
                    <td data-th="Invoice Number">
                        ASDF19218
                    </td>
                    <td data-th="Invoice Date">
                        06/25/2016
                    </td>
                    <td data-th="Due Date">
                        12/25/2016
                    </td>
                    <td data-th="Net Amount">
                        $8,322.12
                    </td>
                </tr>
                <tr>
                    <td data-th="Supplier Code">
                        UPS3449
                    </td>
                    <td data-th="Supplier Name">
                        UPS South Inc.
                    </td>
                    <td data-th="Invoice Number">
                        ASDF29301
                    </td>
                    <td data-th="Invoice Date">
                        6/24/2016
                    </td>
                    <td data-th="Due Date">
                        12/25/2016
                    </td>
                    <td data-th="Net Amount">
                        $3,255.49
                    </td>
                </tr>
                <tr>
                    <td data-th="Supplier Code">
                        BOX5599
                    </td>
                    <td data-th="Supplier Name">
                        BOX Pro West
                    </td>
                    <td data-th="Invoice Number">
                        ASDF43000
                    </td>
                    <td data-th="Invoice Date">
                        6/27/2016
                    </td>
                    <td data-th="Due Date">
                        12/25/2016
                    </td>
                    <td data-th="Net Amount">
                        $45,255.49
                    </td>
                </tr>
                <tr>
                    <td data-th="Supplier Code">
                        PAN9999
                    </td>
                    <td data-th="Supplier Name">
                        Pan Providers and Co.
                    </td>
                    <td data-th="Invoice Number">
                        ASDF33433
                    </td>
                    <td data-th="Invoice Date">
                        6/29/2016
                    </td>
                    <td data-th="Due Date">
                        12/25/2016
                    </td>
                    <td data-th="Net Amount">
                        $12,335.69
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>Resize Me</h3>
    </div>
</body>

</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Outer div styles */
    .outer-div {
      position: relative;
      width: 100%;
      height: 300px; /* You can adjust the height as needed */
      overflow: hidden; /* Ensure the background image doesn't overflow */
    }

    /* Left side div styles */
    .left-div {
      width: 40%;
      height: 100%;
      float: left; /* Float the left div to the left */
      background-color: black; /* Black background color for the left div */
      color: white; /* Text color */
      box-sizing: border-box; /* Include padding and border in the width */
      padding: 20px; /* Optional: Add padding for better spacing */
    }

    /* Right side div styles */
    .right-div {
      width: 60%; /* The remaining 60% */
      height: 100%;
      background: url('images/p1.jpg') no-repeat center center;
      background-size: cover; /* Ensure the background image covers the entire space */
      box-sizing: border-box; /* Include padding and border in the width */
    }
  </style>
</head>
<body>

  <div class="outer-div">
    <div class="left-div">
      <p>This is the left side content. You can add text here.</p>
    </div>
    <div class="right-div"></div>
  </div>

</body>
</html> -->


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily UI</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
}

header {
    background-color: #333;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}

header h1 {
    color: #fff;
    font-size: 36px;
}

main {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px;
}

section {
    width: 31%;
    margin-bottom: 20px;
    background-color: #f4f4f4;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

section h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

#packs {
    width: 100%;
}

@media (max-width: 768px) {
    section {
        width: 48%;
    }
}

@media (max-width: 480px) {
    section {
        width: 100%;
    }
}

.book {
    width: 100%;
    margin-bottom: 20px;
    position: relative;
}

.book img {
    width: 100%;
    height: auto;
}

.book h3 {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    padding: 10px;
    margin: 0;
    font-size: 18px;
}
    </style>
</head>
<body>
    <header>
        <h1>Daily UI</h1>
    </header>
    <main>
        <section id="fantasy">
            <h2>FANTASY</h2>
            <-- Fantasy books go here --
        </section>
        <section id="classic">
            <h2>CLASSIC</h2>
            !-- Classic books go here --
        </section>
        <section id="mystery">
            <h2>MYSTERY</h2>
            !-- Mystery books go here --
        </section>
        <section id="packs">
            <h2>CHOOSE YOUR PACK</h2>
            !-- Packs go here --
        </section>
    </main>
    <section id="fantasy">
    <h2>FANTASY</h2>
    <div class="book">
        <img src="path/to/book-cover.jpg" alt="Book cover">
        <h3>The Sword in the Stone</h3>
    </div>
    !-- Add more books here --
</section>
    <footer>
        !-- Footer content goes here --
    </footer>
</body>
</html>
 -->

<!-- <=?php
require_once 'config/init.php';

echo $SubDB->countcredit();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button with Bottom Hover Effect</title>
    <style>
  @import url('https://fonts.googleapis.com/css?family=Lato:100&display=swap');

body, html {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  background: #5CA4EA;
  overflow: hidden;
  font-family: 'Lato', sans-serif;
}

.container {
  width: 400px;
  height: 400px;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  justify-content: center;
  align-items: center;
}

.center {
  width: 180px;
  height: 60px;
  position: absolute;
}

.btn {
  width: 180px;
  height: 60px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #91C9FF;
  outline: none;
  transition: 1s ease-in-out;
}

svg {
  position: absolute;
  left: 0;
  top: 0;
  fill: none;
  stroke: #fff;
  /* stroke-dasharray: 210 480;
  stroke-dashoffset: 150; */
  transition: 1s ease-in-out;
}

.btn:hover {
  transition: 1s ease-in-out;
  background: #4F95DA;
  stroke-dasharray: 210 480;
  stroke-dashoffset: 150;
}

.btn:hover svg {
  stroke-dashoffset: -40; 
   stroke-dasharray: 210 480;
  stroke-dashoffset: 150;
}

.btn span {
  color: white;
  font-size: 18px;
  font-weight: 100;
}

    </style>
</head>
<body>

<div class="container">
    <div class="center">
      <button class="btn">
        <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
        </svg>
        <span>HOVER ME</span>
      </button>
    </div>
  </div>

</body>
</html> -->



<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

!-- <form action="razorpay-php-2.9.0/pay.php" method="post"> --
<form action="razorpay-php-2.9.0/pay.php" method="post">

<input type="hidden" name="tot_price" value="1000"><br>
<input type="hidden" name="email" value="rk@gmail.com"><br>
<input type="hidden" name="image_count" value="2"><br>

<input type="submit" class="btn" name="Check Out" value="Proceed To Pay">

</form>

</body>
</html> -->

<!-- ?php
 require_once "config/init.php";

 echo $SubDB->generateUniqueID();
 exit();
//  $email ="kaushik";
//  $IIS->setuseremail($email);

 echo $user_id = $IIS->getuseremail();

 exit();
$userData = array(
    // "name" => "kaushik",
    "email" => "ramanuj_test22@gmail.com",
    "password" => "PASSWORD_DEFAULT" // Hash the password
);
$where = array(); // Use appropriate where conditions

$message = $SubDB->performCRUD("tblcustmaster", "i", $userData, $where);

print_r($message);

$userData = array(
    "name" => "kaushik_updated",
    // "email" => "ramanuj@gmail.com",
    "password" => "updated_PASSWORD_DEFAULT" // Hash the password
);
$where = array("email"=>"ramanuj@gmail.com"); // Use appropriate where conditions

$message = $SubDB->performCRUD("tblcustmaster", "u", $userData, $where);

print_r($message);


?> -->