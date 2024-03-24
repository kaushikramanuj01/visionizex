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
    body {
        background-color: #333;
    }

    .main_cart {
        display: flex;
        width: -webkit-fill-available;
        /* height: 80%; */
        /* background-color: white; */
        align-items: center;
        justify-content: center;
        margin-bottom: 31px;
    }

    .sub_cart {
        background-color: #505050;
        width: 79%;
        height: max-content;
        border-radius: 12px;
        box-shadow: -6px 8px 22px 0px black;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        padding: 15px 0px;
        margin-top: 35px;
    }

    .pack_box {
        /* background-color: white; */
        width: 30%;
        /* height: 86vh; */
        height: auto;
        margin: 0px 11px;
        border-radius: 17px;
        text-align: center;
        color: white;
        font-family: monospace;
        /* font-family: system-ui; */
        position: relative;
        z-index: 4;
        /* background-image: url(images/p5.jpg); */
        /* color: black;*/
        /* background-image: linear-gradient(170deg, rgba(87, 139, 254, 0.12) 0.65%, rgba(87, 139, 254, 0) 19%, #0b0f17); */
        background-color: #0b0f17;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .pack_box h5 {
        font-size: 22px;
        margin: 0px;
        margin-top: 20px;
        display: inline-block;
    }

    .pack1 {
        /* background-color: #703333; */
        background-image: linear-gradient(170deg, rgba(87, 139, 254, 0.12) 0.65%, rgba(87, 139, 254, 0) 19%, #0b0f17);
    }

    .pack2 {
        background-color: #316033;
    }

    .pack3 {
        background-color: #71621F;
    }

    .b_g1 {
        /* background-color: #703333db; */
        background-image: linear-gradient(170deg, rgba(87, 139, 254, 0.12) 0.65%, rgba(87, 139, 254, 0) 19%, #0b0f17);
    }

    .b_g2 {
        /* background-color: #316033e0; */
        background-image:linear-gradient(170deg, rgba(214, 81, 169, 0.12) 0.65%, rgba(214, 81, 169, 0) 19%, #0b0f17);
    }
    
    .b_g3 {
        background-image:linear-gradient(170deg, rgba(255, 190, 76, 0.12) 0.65%, rgba(255, 190, 76, 0) 19%, #0b0f17);
        /* background-color: #71621fe3; */
    }

    .pack_box span {
        width: 100%;
    display: block;
    /* position: absolute; */
    /* bottom: 15px; */
    height: auto;
    margin-top: 20px;
    }

    .buy_btn {
        /* color: #703333; */
        text-decoration: none;
        /* border: 2px solid black; */
        border-radius: 4px;
        padding: 5px;
        font-size: 15px;
        background-color: white;
        font-weight: 600;
        box-shadow: -3px 3px 10px -3px black;
    }

    .b_btn1 {
        color: #703333;
        opacity: 0.8;
        cursor: no-drop;
    }

    .b_btn2 {
        color: #316033;
    }

    .b_btn3 {
        color: #71621F;
    }

    .background_color {
        width: -webkit-fill-available;
        height: -webkit-fill-available;
        position: absolute;
        z-index: -1;
        /* background-color: #703333e3; */
        border-radius: 17px;
    }

    ul {
        text-align: start;
    }
    ul li{
        margin-bottom: 5px;
    }
    /* .current{
        display: inline-block;
    margin-left: 6px;
    } */
    .info_box{
        border: 1px solid #242c3e;
        border-radius: 12px;
        background-color: #101622;
        margin-top: 20px;
        width: 91%;
        margin-bottom: 15px;
    }    
    .title-s{
        margin-top: 3px;
        font-size: 16px;
    }
    .rv-div{
        display: flex;
        justify-content: center;
    }

    @media screen and (max-width: 1024px) {
        .sub_cart {
            width: 88%;
        }
    }
    @media screen and (max-width: 770px) {
        .sub_cart {
            width: 92%;
        }
        .sub_cart{
            width: 95%;
        }
        .pack_box{
            width: 32%;
            margin: 0px 4px;
        }
        .pack_box h5{
            font-size: 19px;
            margin-top: 14px;
        }
        .buy_btn{
            padding: 4px;
            font-size: 14px;            
        }
        .info_box {
            font-size: 14px;
        }
    }
    @media screen and (max-width: 480px) {
        .rv-div {
            flex-wrap: wrap;
        }
        .pack_box {
            width: 46%;
        }
        .mt14{
            margin-top: 14px;
        }
    }
    @media screen and (max-width: 390px) {
        .sub_cart{
            padding: 3px 0px;
        }
        .pack_box {
            width: 85%;
            margin-top: 10px;
        }
        .pack_box h5 {
            font-size: x-large;
        }
        .title-s {
            font-size: 18px;
        }
        .buy_btn {
            padding: 6px;
            font-size: 17px;
        }
    }
    </style>
</head>

<body>

    <div class="main_cart">
        <div class="sub_cart">
        <div class="rv-div"> 
            <div class="pack_box b_g1">
                <div class="background_color b_g1"></div>
                <h5>Basic</h5>
                <!-- <div class="current">(Current)</div> -->
                <div class="title-s">
                    USD $0
                </div>
                <br>
                <span>
                    <a href="javascript:void(0);" class="buy_btn b_btn1">Free</a>
                </span>
                <div class="info_box">
                    <p>Get started with our Free package and enjoy basic features at no cost. Ideal for beginners or those looking to explore our platform.
                        </p>
                        
                        <ul>
                            <li>Generate a limited number of images per month.</li>
                            <li>Generated images are publicly accessible.</li>
                            <li>Images are generated at a lower resolution.</li>
                            <li>Longer processing time for image generation.</li>
                        </ul>
                </div>
            </div>
            <div class="pack_box b_g2">
                <div class="background_color b_g2"></div>

                <h5>Classic</h5>
                <!-- <div class="current">(Current)</div> -->
                <div class="title-s">
                    Rs. 1500 / 2000 Credit Points
                </div>
                <span>
                    <a href="buy.php?pack=2" class="buy_btn b_btn2">Buy Now</a>
                </span>

                <div class="info_box">
                <p>Upgrade to our Classic package for access to additional features and enhanced functionality. Perfect for users seeking more advanced tools and capabilities.</p>
                <ul>
                    <li>Generate an unlimited number of images.</li>
                    <li>Keep your generated images private.</li>
                    <li>Images are generated at high resolution.</li>
                    <li>Enjoy quicker processing time for image generation.</li>
                </ul>
                </div>
            </div>
            <div class="pack_box b_g3 mt14">
                <div class="background_color b_g3"></div>

                <h5>Expert</h5>
                <!-- <div class="current">(Current)</div> -->
                <div class="title-s">
                    USD 2000 / 4000 Credit Points
                </div>
                <span>
                    <a href="buy.php?pack=3" class="buy_btn b_btn3">Buy Now</a>
                </span>

                <div class="info_box">
                <p>Unlock the full potential of our platform with our Expert package. Gain access to premium features and exclusive benefits designed for power users and professionals.</p>
                <ul>
                    <li>Generate an unlimited number of images.</li>
                    <li>Keep your generated images private.</li>
                    <li>Images are generated at high resolution.</li>
                    <li>Enjoy quicker processing time for image generation.</li>
                </ul>
            </div>

            </div>
        </div>
    </div>

    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>