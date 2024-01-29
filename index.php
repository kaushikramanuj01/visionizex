<?php
require_once 'config/init.php';
include 'navbar.php';

// $user_id = json_encode($IIS->getuseremail());

$p = isset($_GET['p']) ? $_GET['p'] : 0;
$l = isset($_GET['l']) ? $_GET['l'] : 0;

$useremail = json_encode(isset($_SESSION['useremail']) ? ($_SESSION['useremail']) : "");
$useremail_decode = isset($_SESSION['useremail']) ? ($_SESSION['useremail']) : "";

?>
<script>
<?php  if(isset($_SESSION['user_prompts'])){?>
var user_prompts = <?php echo $_SESSION['user_prompts']; ?>;
console.log(user_prompts);
<?php } ?>
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <!-- <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <title>Navigation Bar</title>
    <style>
    body {
        background-color: #333;
    }

    .input_container {
        display: flex;
        justify-content: space-between;
        margin: 13px;
    }

    .user_input {
        /* width: 90rem; */
        width: 95%;
        display: flex;
        justify-content: space-around;
    }

    .user_input input {
        /* width: 75vw; */
        width: 100%;
        font-size: 16px;
        border-radius: 27px;
        padding: 6px;
        background-color: transparent;
        border: 1px solid #7c7c7c;
        color: #d0cfcf;
        box-shadow: white 2px 5px 25px -18px;
    }

    .user_input textarea {
        display: none;
    }

    .generate_btn {
        text-decoration: none;
        color: white;
        /* height: 45px; */
        /* display: inline-block; */
        /* border: 2px solid white; */
        font-size: 20px;
        border-radius: 27px;
        /* width: 9rem; */
        width: 13%;
        min-width: 6rem;
        text-align: center;
        margin-left: 10px;
        background-color: ff4f6e;
        border: 2px solid #ff4f6e;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
        font-family: sans-serif;
        transition: background-color 0.3s ease;
    }

    .generate_btn a {
        text-decoration: none;
        color: white;
    }

    .generate_btn:hover {
        background-color: transparent;
        border: 2px solid #ff4f6e;
        cursor: pointer;
    }

    .surprise_btn {
        /* width: 10rem; */
        width: 11%;
        min-width: max-content;
        /* min-width: 7rem; */
        /* border: 2px solid white; */
        border-radius: 27PX;
        text-align: center;
        border: 2px solid #ff4f6e;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: sans-serif;
        padding: 0px 4px;
    }

    .surprise_btn:hover {
        cursor: pointer;
    }

    .surprise_btn{
        text-decoration: none;
        color: white;
        font-size: 20px;

    }

    .body_container {
        display: flex;
        margin-top: 40px;
        justify-content: space-between;
        margin-right: 13px;
    }

    .image {
        width: 85%;
        height: fit-content;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .main_img {
        justify-content: center;
    display: flex;
    width: -webkit-fill-available;
    /* width: 39%; */
    /* height: auto; */
    height: -webkit-fill-available;
    }

    .main_img a {
        /* width: fit-content;
        display: contents; */
    }

    .main_img img {
        width: -webkit-fill-available;
    /* /* width: 76%; */
    }

    .main_img_div {
        text-align: center;
    width: fit-content;
    width: 41%;
    }

    .hist_panel {
        background-color: #555353;
        padding-top: 10px;
        width: 15%;
        /* margin-right: 13px; */
        border-radius: 10px;
        height: 80vh;
    }

    .grid {
        display: flex;
        justify-content: center;
        height: 92%;
        overflow-y: scroll;
    }

    .grid_sc {
        display: flex;
        flex-direction: column;
        /* margin: 10px; */
        gap: 9px;
        width: 90%;
        /* justify-content: center; */
    }

    .grid_sc a {}

    .grid_sc img {
        width: -webkit-fill-available;
    }

    .recent_t h6 {
        padding: 0px;
        margin: 0px;
        margin-left: 9px;
        color: white;
        margin-bottom: 7px;
        font-size: 15px;
        font-family: sans-serif;
        font-weight: 600;
    }

    .grid::-webkit-scrollbar {
        width: 12px;
        /* Width of the scrollbar */
    }

    .grid::-webkit-scrollbar-track {
        background-color: #f1f1f1;
        /* Track color */
    }

    .grid::-webkit-scrollbar-thumb {
        background-color: #888;
        /* Thumb color */
        border-radius: 6px;
        /* Border radius of the thumb */
    }

    .grid::-webkit-scrollbar-thumb:hover {
        background-color: #555;
        /* Thumb color on hover */
    }

    /* For Firefox */
    /* You can customize these styles */
    /* Note: scrollbar-color and scrollbar-width are currently supported only in Firefox */
    /* scrollbar-width: thin | auto | none; */
    /* scrollbar-color: scrollbar-thumb-color scrollbar-track-color; */
    /* Replace the colors with your preferred colors */
    /* Example: scrollbar-color: #888 #f1f1f1; */
    /* Example: scrollbar-color: #888 transparent; */
    /* Example: scrollbar-width: 12px; */

    .grid {
        scrollbar-width: thin;
        scrollbar-color: #888 #f1f1f1;
    }

    .grid:hover {
        scrollbar-color: #555 #f1f1f1;
    }

    .creation {
        display: none;
    }


    /* Styles for the slider container and slides */
    .slider-container {
        width: 38%;
        margin: auto;
        overflow: hidden;
        position: relative;
    }

    .slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }
    
    .slide {
        width: -webkit-fill-available;
        flex: 0 0 100%;
        box-sizing: border-box;
        position: relative;
    }

    .slide img {
        width: -webkit-fill-available;
        height: auto;
    }

    /* Style for text overlay */
    .text-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: -webkit-fill-available;
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    .loading-bar {
        width: 100px;
        height: 10px;
        background-color: #00ff00;
        /* Add your preferred color with # */
    }

    .generation_msg_box {
        width: max-content;
        margin: auto;
        display: none;
    }


    #loading-text {
        font-size: 20px;
        position: relative;
        width: max-content;
        text-align: center;
        color: white;
        font-family: sans-serif;
        margin-right: 49px;
        margin-bottom: 25px;
    }

    .dot {
        display: inline-block;
        opacity: 0;
        animation: blink 1s infinite;
    }

    @keyframes blink {
        50% {
            opacity: 1;
        }
    }

    #loading-btn {
        padding: 10px 20px;
        margin-top: 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .downloadButton {
        background-color: transparent;
        border: 2px solid #747373;
        width: 35px;
        margin: 0PX 7PX;
        padding: 3PX;
        cursor: pointer;
    }

    .generate-btns{
        display: flex;
    }
    /* Add your media queries for responsiveness here */
    @media screen and (max-width: 1044px) {
        .hist_panel {
            width: 17%;
        }
        .image {
            width: 83%;
        }
        /* .input_container {
            flex-direction: row;
        }

        .user_input {
            width: 70%;
        }

        .generate_btn,
        .surprise_btn {
            width: 25%;
        }

        .main_img_div {
            width: 60%;
        } */

    }

    @media screen and (max-width: 950px) {
        .main_img_div{
            width: calc(41% + 50px);
        }
    }

    @media screen and (max-width: 750px) {
        .image {
            width: 80%;
        }
        .hist_panel {
            width: 20%;
        }
        .main_img_div{
            width: calc(51% + 50px) !important;
        }
    }

    @media screen and (max-width: 520px) {
        .generate_btn{
            min-width: 4rem;
        }
        .image {
            width: 78%;
        }
        .hist_panel {
            width: 22%;
        }
        .main_img{
            justify-content: start;
        }
        .main_img_div {
            width: calc(55% + 50px) !important;
            margin-left: 13px;
        }
    }
    
    @media screen and (max-width: 390px) {
        .input_container{
            display: block;
        }
        .user_input{
            width: 100%;
        }
        .user-input{
            display: none;
        }
        .user-area{
            display: block !important;
            width: -webkit-fill-available;
            height: 70px;
            border-radius: 4px;
            font-size: 14px;
            font-family: sans-serif;
        }
        .generate_btn{
            margin: 0px;
            width: 54vw;
            font-size: 17px !important;
            display: inline-block;   
        }
        .surprise_btn{
            width: 27vw;
            display: inline-block;
            font-size: 17px !important;
        }
        .surprise_btn{
            font-size: 17px !important;
        }
        .generate-btns{
            margin-top: 10px;
            gap: 8px;
        }
    }
    
    @media screen and (max-width: 350px) {
        .body_container{
            display: block;
        }
        .image{
            width: 100%;
        }
        .hist_panel{
            width: 96%;
            height: max-content;
            margin-bottom: 50px;
            margin-top: 15px;
            margin-left: 13px;
        }
        .grid::-webkit-scrollbar {
            width: 10px;
        }
        .grid_sc {
            flex-direction: row;
            margin: 10px 0px;
        }
        .grid_sc img{
            width: 60px;
        }
    }

    </style>
</head>

<body>
    <div class="input_container">
        <div class="user_input">
            <input type="text" id="promptInput" class="user-input" placeholder="Type your prompt here">

            <textarea id="promptInput" class="user-area" placeholder="Type your prompt here..."></textarea>

        </div>
        
        <div class="generate-btns">
            <a href="javascript:void(0)" class="generate_btn" id="generate">Generate</a>
            
            <!-- <div class="surprise_btn"> -->
            <a href="http://" class="surprise_btn">Surprise Me</a>
            <!-- </div> -->
        </div>

    </div>


    <div class="body_container" id="body_container">

        <div class="image">
            <div class="generation_msg_box">
                <div id="loading-text">Your image is generating, please wait<span class="dot">.</span>
                    <span class="dot">.</span><span class="dot">.</span>
                </div>
            </div>
            <?php

                $where = array("userid" => $useremail_decode);
                $sort = "id DESC"; // Customize the sorting as needed
                $selimg = $SubDB->execute("tblgenerated", $where,$sort,"");
            
                $where_blog = array();
                $selblog = $SubDB->execute("tblblogs", $where_blog,"","");

                if(sizeof($selimg) == 0){
            if(sizeof($selblog) > 0){
            ?>

            <div class="slider-container">
                <div class="slides">

                    <?php
                foreach($selblog as $value){
                    $b_img = $value['image'];
                    $b_title = $value['title'];
                    $b_id = $value['_id'];
                    ?>
                    <div class="slide" data-blog-id="<?php echo $b_id ?>">
                        <a href="javascript:void(0)" id="blog" class="blog-link">
                            <img src="images/<?php echo $b_img; ?>" alt="blog image">
                            <div class="text-overlay">
                                <p><?php echo $b_title; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="loading-bar"></div>
                </div>
            </div>
            <?php
         } }else{ 
            // $imgpath = $selimg[0]['image_url'];
            $imgpath = "images/".$selimg[0]['local_img'];
            if($selimg[0]['local_img'] == ""){
                $imgpath = $selimg[0]['image_url'];
            }
            // echo $imgpath;
            ?>

            <div class="main_img" id="main_img">
                <div class="main_img_div" id="main_img_div">
                    <a href="#">
                        <img id="imageResult" src="<?php echo $imgpath; ?>" alt="Generated Image">
                    </a>
                </div>
                <div>
                    <button id="downloadButton" class="downloadButton"><img src="images/logo/download-icon-w.png" alt=""
                            srcset=""></button>
                </div>
            </div>

            <?php  }  ?>

        </div>

        <div class="hist_panel">
            <div class="recent_t">
                <h6>Recent</h6>
            </div>
            <div class="grid">
                <div class="grid_sc" id="grid_sc">
                    <?php
                    foreach($selimg as $h_value){
                        $h_image = "images/".$h_value['local_img'];
                        if($h_value['local_img'] ==""){
                            $h_image = $h_value['image_url'];
                        }
                        ?>

                    <div class="h_image">
                        <a href="#">
                            <img src="<?php echo $h_image; ?>" alt="images" srcset="">
                        </a>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="creation" id="creation">
    </div> -->

    <script>
    document.addEventListener('DOMContentLoaded', function() {

        var buttonElement = document.getElementById('downloadButton');

        if (buttonElement) {
            buttonElement.addEventListener('click', function() {
                // document.getElementById('downloadButton').addEventListener('click', function() {
                // Assuming $imgpath contains the image URL
                // var imgpath = 'https://oaidalleapiprodscus.blob.core.windows.net/private/org-FcGDQxJWnchkRdLE62KanTMA/user-6Su4iMHxK7sNo1Eyxx1D4EcC/img-3HnYywLRo2gFjXKE0Hz6asLL.png';

                var imageElement = document.getElementById('imageResult');
                var imgpath = imageElement.src;

                // Create a form to submit the request
                var form = document.createElement('form');
                form.action = 'download.php'; // PHP script that handles the download
                form.method = 'POST';

                // Create a hidden input field to pass the image URL to the server
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'imgpath';
                input.value = imgpath;

                // Append the input field to the form
                form.appendChild(input);
                // Append the form to the document and submit it
                document.body.appendChild(form);
                form.submit();

                // Remove the form from the document
                document.body.removeChild(form);
            });
        }
            // document.getElementById('downloadButton').addEventListener('click', function() {
                //     // Replace 'image.jpg' with the actual image URL
                //     // var imageUrl = 'images/65a04a8519a0c.jpg';
                //         // Get the image element
                //     var imageElement = document.getElementById('imageResult');

                //     // Get the src attribute value
                //     var imageUrl = imageElement.src;

                //     // Create an anchor element
                //     var downloadLink = document.createElement('a');

                //     // Set the download link attributes
                //     downloadLink.href = imageUrl;
                //     downloadLink.download = 'downloaded_image.jpg';

                //     // Append the link to the document
                //     document.body.appendChild(downloadLink);

                //     // Trigger a click on the link
                //     downloadLink.click();

                //     // Remove the link from the document
                //     document.body.removeChild(downloadLink);
                // });


            // $(".generation_msg_box").hide();

            //! blog slider start
            let currentSlide = 0;
            const slides = document.querySelector('.slides');
            const totalSlides = document.querySelectorAll('.slide').length;
            const loadingBar = document.querySelector('.loading-bar');

            function showSlide(index) {
                if (slides) {
                    currentSlide = (index + totalSlides) % totalSlides;
                    const newPosition = -currentSlide * 100 + '%';
                    slides.style.transition = 'transform 0.5s ease-in-out';
                    slides.style.transform = 'translateX(' + newPosition + ')';
                }
            }

            function startLoadingBar() {
                if (loadingBar) {
                    loadingBar.style.transition = 'width 5s linear';
                    loadingBar.style.width = '100%';
                    setTimeout(() => {
                        loadingBar.style.transition = 'none';
                        loadingBar.style.width = '0%';
                        nextSlide();
                    }, 5000); // Change slide after 5 seconds
                }
            }

            function nextSlide() {
                showSlide(currentSlide + 1);
                startLoadingBar();
            }
            // Show the first slide initially
            showSlide(currentSlide);
            // Initial start of the loading bar sequence
            startLoadingBar();

            //! blog slider end

            user_id = <?php echo $useremail; ?>;

            p = <?php echo $p; ?>;
            var user_prompt_not = localStorage.getItem('user_prompt_not');
            console.log(user_prompt_not);

            if (p == 1 && !localStorage.getItem('user_prompt_not')) {
                // showPopupMessage("finaly kaushik , Phodenge!!", 1);
                // var user_prompts = ?php echo json_encode($_SESSION['user_prompts']); ?>;
                // Retrieve the session-like variable from local storage
                var user_prompt = localStorage.getItem('user_prompt');
                // Output the retrieved value
                console.log('user_prompt_rk:', user_prompt);
                // var user_prompts = "";

                $(".generation_msg_box").show();
                generate(user_prompt);
                // Removing the session data
                localStorage.removeItem('user_prompt');
                localStorage.setItem('user_prompt_not', "no");
            }
            //  var login =  ?php echo $_SESSION['login']; ?>;
            // var usernameFromPHP = ?php echo json_encode($_SESSION['username']); ?>;
            const url = "session";
            const method = "POST";
            const headerdata = {
                "Content-Type": "application/json"
            };
            const paramsdata = JSON.stringify({
                type: "login"
            });;
            ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

            function successCallback(data) {
                console.log(data);
                login = data;
            }

            function errorCallback(data) {
                // console.log(data);
                // console.error('Error:', error);
            }

            //! GENERATE function start

            function generate(inputText) {
                const url = "api/generate";
                const method = "POST";
                const headerdata = {
                    "Content-Type": "application/json"
                };
                const paramsdata = JSON.stringify({
                    text: inputText,
                    user_id: user_id
                });

                ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

                function errorCallback(error) {
                    // console.error('Error:', error);
                    $(".generation_msg_box").hide();
                    showPopupMessage("Server Error", 0);

                }

                function successCallback(data) {
                    if (data.generatedText) {
                        console.log(data.generatedText);
                        $("#generatedText").text(data.generatedText);
                        $("#generatedText").show();

                    } else {
                        console.error('API response does not contain generatedText field.');
                    }

                    if (data.imgurl) {
                        // $("#imageResult").attr("src", 'images/' + data.image_name);
                        // $("#imageResult").attr("src", data.imgurl);
                        $("#generatedImage").show();
                        $(".slider-container").hide();


                        var main_img_html = '<a href="#"><img id="imageResult" src="' + data.imgurl +
                            '" alt="Generated Image"></a>';

                        var main_img_div = document.getElementById('main_img_div');
                        // Append HTML content at the beginning of the div
                        main_img_div.innerHTML = main_img_html;


                        // Your HTML content to be appended
                        var newHtmlContent = '<a href="#"><img src="' + data.imgurl +
                            '" alt="images" srcset=""></a>';
                        // var newHtmlContent = '<a href="#"><img src="images/' + data.image_name +
                        //     '" alt="images" srcset=""></a>';
                        // Get the reference to the div
                        var myDiv = document.getElementById('grid_sc');
                        // Append HTML content at the beginning of the div
                        myDiv.innerHTML = newHtmlContent + myDiv.innerHTML;

                        // refresh credit count
                        // var credit = ?php echo json_encode($SubDB->countcredit()); ?>;
                        console.log(data.credit);
                        // Get the credit_count element by its ID
                        var credit_count = document.getElementById("credit_count");
                        // Check if the credit_count element exists
                        if (credit_count) {
                            // Update the content of the span with the credit value
                            credit_count.textContent = data.credit;
                        }

                        showPopupMessage(data.message, 1);

                    } else {
                        showPopupMessage(data.message, 0);
                        // showPopupMessage("Something wrong, please try again! ", 0);

                        console.error('API response does not contain imageUrl field.');
                    }

                    $(".generation_msg_box").hide();
                }
            }
            //! GENERATE function end

            //! generate button logic start

            $("#generate").on("click", function() {
                $(".generation_msg_box").show();

                const inputText = $("#promptInput").val();
                // $("#loader").show();
                // generateText(inputText);
                // Get a value from session storage
                // var login = sessionStorage.getItem('login');

                console.log(inputText);

                if (login == 1) {
                    // Output the retrieved value
                    console.log('session login:', login);
                    generate(inputText);
                } else {
                    // Set a value in local storage
                    localStorage.setItem('user_prompt', inputText);

                    // Retrieve the session-like variable from local storage
                    var user_prompt = localStorage.getItem('user_prompt');

                    // Output the retrieved value
                    console.log('user_prompt:', user_prompt);

                    var parameter1 = '1';
                    // var parameter2 = 'value2';
                    var redirectUrl = 'login.php?p=' + encodeURIComponent(parameter1);
                    window.location.href = redirectUrl;

                }
            });
            //! generate button logic end

            //! history image click
            // $("#h_image").on("click", function() {
            //     console.log("h_image_clicked");
            // });

            // Get all elements with class 'h_image'
            const hImages = document.querySelectorAll('.h_image');

            // Attach click event listeners to each 'h_image' element
            hImages.forEach(hImage => {
                hImage.addEventListener('click', function() {
                    // Get the image source within the clicked 'h_image' element
                    const imgSrc = this.querySelector('img').src;
                    console.log('Clicked image source:', imgSrc);

                    var mainimg_html = '<a href="#"> <img id="imageResult" src="' + imgSrc +
                        '" alt="Generated Image"></a>';

                    var main_img_div = document.getElementById('main_img_div');
                    // Append HTML content at the beginning of the div
                    main_img_div.innerHTML = mainimg_html;

                });
            });

        // Event listener to detect Enter key press only when input field is focused
        document.getElementById("promptInput").addEventListener("keyup", function(event) {
            if (event.key === "Enter" && document.activeElement === this) {
                // submitForm();
                $("#generate").click();
            }
        });

        // }
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="main.js"></script>
    <script>
    <?php
            if($l==1 && isset($_SESSION['login_msg'])){ ?>
    showPopupMessage("Tou are successfully loged in", 1);

    <?php
                unset($_SESSION['login_msg']);
            }
        ?>
    </script>
</body>

</html>