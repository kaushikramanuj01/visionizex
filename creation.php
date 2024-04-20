<?php
require_once 'config/init.php';
include 'navbar.php';

$where = array("completed" => 1); // Customize the WHERE clause as needed
$sort = "id DESC"; // Customize the sorting as needed
$allimages = $SubDB->execute("tblgenerated", $where,$sort,"");
// print_r($allimages);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="main.js"></script>
    <title>Creation</title>
    <style>
    body {
        background-color: #333;
    }

    .gallery {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        /* padding: 0px 17px; */
        width: 96%;
    }

    .gallery img {
        /* width: 186px; */
        width: 182px;
        /* width: -webkit-fill-available; */
        border-radius: 6px;
    }

    .main_gallery {
        margin-top: 30px;
        width: -webkit-fill-available;
        display: flex;
        justify-content: center;

    }

    .gallery a:hover {
        opacity: 0.6;
    }

    /* .gallery-image:hover {
            filter: grayscale(100%) invert(100%) sepia(100%) saturate(500%) brightness(150%); /* Adjust the filter properties as needed 
            } */



    /* ######################## */

    /* Slideshow container */
    .slideshow-container {    
        /* max-width: 1000px; */
        /* max-width: 93%; */
        position: relative;
        /* margin: auto; */
        width: 96%;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: -webkit-fill-available;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    /* .numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
} */


    /* The dots/bullets/indicators */
    .dot {
        height: 5px;
        width: 50px;
        margin: 0 2px;
        background-color: #717171;
        border-radius: 10px;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #bbb;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {
            font-size: 11px
        }
    }

    .mySlides img {
        height: 200px;
    }

    .dot_div {
        text-align: center;
        bottom: 4px;
        position: absolute;
        width: 100%;

    }
    .img_div{
        /* margin-right: 14px; */
        width: fit-content;
    }
    .main_slider_con{
        display: flex;
        justify-content: center;

    }
    .gallery img{
        width: 150px;
    }
    .loader {
        /* border: 4px solid #f3f3f3; Light grey */
        border: 4px solid #937575;
        /* border-top: 4px solid #3498db; Blue */
        /* border-top: 4px solid #4d6c81; */
        border-top: 4px solid #4d6c8100;
        border-radius: 50%;
        width: 8px;
        height: 8px;
        animation: spin 1s linear infinite;
        display: none; /*Initially hide loader*/
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .loader_div{
        margin-top: 20px;
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>

<body>

    <div class="main_slider_con">
        <div class="slideshow-container">

            <div class="mySlides fade">
                <!-- <div class="numbertext">1 / 3</div> -->
                <img src="images/slider/p3.jpg" style="width:100%">
                <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
                <!-- <div class="numbertext">2 / 3</div> -->
                <img src="images/slider/p4.jpg" style="width:100%">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
                <!-- <div class="numbertext">3 / 3</div> -->
                <img src="images/slider/p5.jpg" style="width:100%">
                <div class="text">Caption Three</div>
            </div>
            <div class="dot_div">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>

        </div>
    </div>
    <!-- <br> -->



    <div class="main_gallery">
        <input type="hidden" name="pageno" value="1" id="pageno">
        <input type="hidden" name="perpage" value="10" id="perpage">
        <input type="hidden" name="loadmore" value="1" id="loadmore">
        <div class="gallery" id="gallery">
            <!-- ?php 
            foreach($allimages as $value){

                $image_path = $value['local_img'];
                $_id = $value['_id'];

                if($image_path!==""){
                    $final_img_path = "images/".$image_path;
                }else{
                    $final_img_path = $value['image_url'];
                }
                
                if($final_img_path !==""){
            ?>

            <a href="#"><img src="?php echo $final_img_path; ?>" alt="?php echo $_id;?>" srcset="" -->
            <!-- class="gallery-image"></a> -->

            <!-- ?php } } ?> -->
        </div>
    </div>
    <div class="loader_div">
        <div class="loader" id="img_loader"></div> 
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
// var isLoading = false;

        fillimage();

        function fillimage() {
            var perpageele = document.getElementById('perpage');
            var perpage = perpageele.value;
            var pagenoele = document.getElementById('pageno');
            var pageno = pagenoele.value;

            const url = "api/creation";
            const method = "POST";
            const headerdata = {
                "Content-Type": "application/json"
            };
            const paramsdata = JSON.stringify({
                action: "gallery",
                pageno: pageno,
                perpage: perpage
            });

            ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

            function errorCallback(error) {
                // console.error('Error:', error);
                $(".generation_msg_box").hide();
                showPopupMessage("Server Error", 0);
                isLoading = false; // Reset the data loading flag
                $("#img_loader").hide();
            }

            function successCallback(data) {
                // console.log(data);
                if (data.status == 1) {
                    // console.log(data.data);

                    var gallery = document.getElementById('gallery');
                    // gallery.innerHTML = gallery.innerHTML + data.data;

                    gallery.innerHTML += data.data;


                    var pageno = document.getElementById('pageno');
                    pageno.value = data.nextpage;
                    
                    var loadmore = document.getElementById('loadmore');
                    loadmore.value = data.loadmore;

                    //     $("#generatedText").text(data.generatedText);
                    //     $("#generatedText").show();

                } else {
                    // console.log(data.message);
                }
                isLoading = false; // Reset the data loading flag
                $("#img_loader").hide();
                // if (data.imgurl) {
                //     // $("#imageResult").attr("src", 'images/' + data.image_name);
                //     // $("#imageResult").attr("src", data.imgurl);
                //     $("#generatedImage").show();
                //     $(".slider-container").hide();
                //    var main_img_html = '<a href="#"><img id="imageResult" src="'+data.imgurl+'" alt="Generated Image"></a>';
                //    var main_img_div = document.getElementById('main_img_div');
                //     // Append HTML content at the beginning of the div
                //     main_img_div.innerHTML = main_img_html;
                //     // Your HTML content to be appended
                //     var newHtmlContent = '<a href="#"><img src="'+data.imgurl +'" alt="images" srcset=""></a>';
                //     // var newHtmlContent = '<a href="#"><img src="images/' + data.image_name +
                //     //     '" alt="images" srcset=""></a>';
                //     // Get the reference to the div
                //     var myDiv = document.getElementById('grid_sc');
                //     // Append HTML content at the beginning of the div
                //     myDiv.innerHTML = newHtmlContent + myDiv.innerHTML;
                //     // refresh credit count
                //     // var credit = ?php echo json_encode($SubDB->countcredit()); ?>;
                //     console.log(data.credit);
                //     // Get the credit_count element by its ID
                //     var credit_count = document.getElementById("credit_count");
                //     // Check if the credit_count element exists
                //     if (credit_count) {
                //         // Update the content of the span with the credit value
                //         credit_count.textContent = data.credit;
                //     }
                //     showPopupMessage(data.message, 1);
                // } else {
                //     showPopupMessage(data.message, 0);
                //     // showPopupMessage("Something wrong, please try again! ", 0);
                //     console.error('API response does not contain imageUrl field.');
                // }
                // $(".generation_msg_box").hide();
            }

        }

        // Flag to indicate whether data is currently being loaded
        var isLoading = false;
        // Function to check if the user has scrolled to the bottom of the page
        function isScrolledToBottom() {
            return window.innerHeight + window.scrollY >= document.body.offsetHeight;
        }
        // Function to load more data (replace this with your actual data loading logic)
        function loadMoreData() {
            if (isLoading) {
                return; // If data is already being loaded, do nothing
            }   
            // console.log("Loading more data...");
            isLoading = true; // Set the loading flag to true
            $("#img_loader").show();
            fillimage(); // Your data loading logic here
            // After data loading is complete, set the loading flag back to false
            // This ensures that the function can be called again when the user scrolls to the bottom next time
            // isLoading = false;
        }
        // Event listener for the scroll event
        window.onscroll = function() {
            // Check if the user has scrolled to the bottom of the page
            if (isScrolledToBottom()) {
                var loadmoreele = document.getElementById('loadmore');
                var loadmore = loadmoreele.value;       
                // console.log(loadmore);
                // console.log("isLoading" + isLoading);
                if(loadmore == "1"){
                    // Load more data when the user reaches the bottom
                    loadMoreData();
                }
            }
        };
    })

    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>