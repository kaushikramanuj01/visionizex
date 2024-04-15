<?php
require_once 'config/init.php';
include 'navbar.php';

// $user_id = json_encode($IIS->getuseremail());
$l = isset($_GET['l']) ? $_GET['l'] : 0;
$useremail = json_encode(isset($_SESSION['useremail']) ? ($_SESSION['useremail']) : "");
$login = json_encode(isset($_SESSION['login']) ? ($_SESSION['login']) : "");
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
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="main.js"></script>
    <link rel="icon" href="images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="styles.css">
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <title>VisionizeX</title>
    <link rel="stylesheet" href="index_style.css">
</head>

<body>
    <div class="input_container">
        <div class="user_input">
            <input type="text" id="promptInput" class="user-text input_text" placeholder="Enter Your Prompt">
            <div class="loader" id="loader_input"></div>
            <textarea id="promptInputarea" class="user-area input_text" placeholder="Enter Your Prompt..."></textarea>
        </div>

        <div class="generate-btns">
            <a href="javascript:void(0)" class="generate_btn" id="generate">Generate</a>
            <a href="javascript:void(0)" class="surprise_btn" id="surprise">Surprise Me</a>
        </div>
    </div>

    <div class="body_container" id="body_container">

        <div class="image">
            <div class="generation_msg_box">
                <div id="loading-text">Your image is being generated. Please wait<span class="dot">.</span>
                    <span class="dot">.</span><span class="dot">.</span>
                </div>
            </div>
            <?php

                $where = array("userid" => $useremail_decode,"completed" => 1);
                $sort = "id DESC"; // Customize the sorting as needed
                $selimg = $SubDB->execute("tblgenerated", $where,$sort,"");
            
                $where_blog = array();
                $selblog = $SubDB->execute("tblblogs", $where_blog,"","");

                $imgpath="";
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
                            <!-- <div class="text-overlay">
                                <p>?php echo $b_title; ?></p>
                            </div> -->
                        </a>
                        <!-- <div>
                            //! start from here
                        </div> -->
                    </div>
                    <?php } ?>
                    <div class="loading-bar"></div>
                </div>
            </div>
            <?php
         } }
         else{ 
            // $imgpath = $selimg[0]['image_url'];
            $imgpath = "images/".$selimg[0]['local_img'];
            if($selimg[0]['local_img'] == ""){
                $imgpath = $selimg[0]['image_url'];
            }
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

            <!-- ?php  }  ?> -->

        </div>

        <?php if(isset($_SESSION['login'])){ ?>

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
        <?php } ?>

    </div>

    <!-- <div class="creation" id="creation">
    </div> -->
    <!-- Popup Message -->
    <!-- <div id="popup">
        <button onclick="closePopup()">&times;</button>
        <h2>Welcome!</h2>
        <p>Login to get a free token.</p>
    </div> -->

    <script>
    document.addEventListener('DOMContentLoaded', function() {

        user_id = <?php echo $useremail; ?>;
        selimg = <?php echo json_encode($selimg); ?>;
        console.log("HHHHHH" + selimg);
        if(selimg == 0){
            $("#main_img").hide();
        }
        var login = <?php echo $login; ?>;
        var userPromptInfo = prompter();
        var len_prompt = userPromptInfo.length;
        var user_prompt = userPromptInfo.prompt;

        // ! Download button start 
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
        // ! Download button end
        // document.getElementById('downloadButton').addEventListener('click', function() {
            // Replace 'image.jpg' with the actual image URL
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

        // ! CHECK FIRST TIME USER LOGIN START
        if (len_prompt > 1) {
            $(".generation_msg_box").show();
            generate(user_prompt);
            // Removing the session data
            localStorage.removeItem('user_prompt');
        }
        // ! CHECK FIRST TIME USER LOGIN END

        // var login =  ?php echo $_SESSION['login']; ?>;
        // var usernameFromPHP = ?php echo json_encode($_SESSION['username']); ?>;

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
                    $("#main_img").show();
                    $(".slider-container").hide();

                    var main_img_html = '<a href="#"><img id="imageResult" src="' + data.imgurl +
                        '" alt="Generated Image"></a>';

                    var main_img_div = document.getElementById('main_img_div');
                    // Append HTML content at the beginning of the div
                    if (main_img_div) {
                        main_img_div.innerHTML = main_img_html;
                        
                        if(data.i_count == 0){
                            showPopupMessage("The images may be generated in low quality because this website is a free portfolio website.", 1);
                        }
                        
                    } else {
                        console.error('Element with ID main_img_div not found.');
                    }
                    // main_img_div.innerHTML = main_img_html;

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

        //! SURPRISEME function start
        function surpriseme() {
            const url = "api/surprise";
            const method = "POST";
            const headerdata = {
                "Content-Type": "application/json"
            };
            const paramsdata = JSON.stringify({
                user_id: user_id
            });

            ajaxrequest(method, url, headerdata, paramsdata, successCallbacksurprise, errorCallbacksurprise)

            function errorCallbacksurprise(error) {
                // console.error('Error:', error);
                $("#loader_input").hide();
                showPopupMessage("Server Error", 0);
            }
            function successCallbacksurprise(data) {
                console.log(data);
                $("#loader_input").hide();

                if (data.success == 1) {
                    // $(".input_text").text(data.generatedText);
                    $(".input_text").val(data.generatedText);
                    // $("#generatedText").show();
                    console.log("this is generated by surprise api :: " + data.generatedText);

                } else {
                    console.error('API response does not contain generatedText field.');
                }
            }
        }
        //! SURPRISEME function end

        //! generate button logic start
            $("#generate").on("click", function() {
                // $(".generation_msg_box").show();

                var inputText = document.getElementById("promptInput").value.trim();
                // Check if input value is empty
                if (inputText === "") {
                    // If input value is empty, get value from textarea
                    inputText = document.getElementById("promptInputarea").value.trim();
                }
                // $("#loader").show();
                // generateText(inputText);
                // Get a value from session storage
                // var login = sessionStorage.getItem('login');
                console.log(inputText);

                if (login == 1) {
                    $(".generation_msg_box").show();
                    console.log('session login:', login);
                    generate(inputText);
                } else {
                    // Set a value in local storage
                    localStorage.setItem('user_prompt', inputText);
                   
                    console.log('user_prompt:', user_prompt);
                    var redirectUrl = 'login';
                    window.location.href = redirectUrl;
                }
            });
        //! generate button logic end
        
        //! SURPRISE button logic start
            $("#surprise").on("click", function() {
                $("#loader_input").show();
                // console.log("CLICK SURPRISE BUTTON");
                surpriseme();
            });
        //! SURPRISE button logic end

        //! history image click start
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
        //! history image click end

        //! Event listener to detect Enter key press only when input field is focused start
            document.getElementById("promptInput").addEventListener("keyup", function(event) {
                if (event.key === "Enter" && document.activeElement === this) {
                    // submitForm();
                    $("#generate").click();
                }
            });
        //! Event listener to detect Enter key press only when input field is focused end
        
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
                    }, 3000); // Change slide after 5 seconds
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
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="main.js"></script> -->
    <script>
    <?php
        if($l==1 && isset($_SESSION['login_msg'])){ ?>
            showPopupMessage("You are successfully loged in", 1);
    <?php
            unset($_SESSION['login_msg']);
            }
        ?>
    </script>
</body>
</html>