<?php
    require_once "config/init.php";

    if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
        header("location:index.php" );
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="theme/main.css"> -->
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="main.js"></script>

    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-color: #333;
        /* display: flex; */
        /* align-items: center; */
        /* justify-content: center; */
        /* height: 100vh; */
    }

    /* .login-container {
        background-color: #595757;
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 331px;
        text-align: center;
        height: 83vh; */
    /* } */
    .login-container {
        /* background-color: #595757; */
        /* border-radius: 8px; */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 40%;
        /* width: 331px; */
        text-align: center;
        height: max-content;
        background-image: linear-gradient(360deg, rgba(87, 139, 254, 0.12) 1.65%, rgba(87, 139, 254, 0) 19%, #0b0f17);
        /* display: inline-block; */
        margin: 0px;
        float: left;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .login-header {
        /* background: linear-gradient(to right, #3E514D, #484747); */
        color: #fff;
        padding: 20px;
    }
    .login-form {
        padding: 20px;
        width: 80%;        
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        font-size: 14px;
        color: white;
        display: block;
        margin-bottom: 8px;
        text-align: left;
    }
    .form-group input {
        color: white;
        /* width: calc(100% - 20px); */
        width: 100%;
        padding: 6px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        display: block;
        margin-bottom: 10px;
        box-sizing: border-box;
        background-color: #333 !important;
    }
    .form-group input:focus {
        outline: none;
        border-color: #007bff;
    }
    .validation-indicator {
        display: none;
        font-size: 12px;
        color: #dc3545;
        text-align: left;
    }
    .signup-button {
        color: #fff;
        padding: 7px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        background: linear-gradient(to right, #3E514D, #484747);
    }
    .signup-button:hover {
        background-color: #0056b3;
    }
    .additional-links {
        margin-top: 20px;
        font-size: 14px;
        color: #007bff;
        text-align: center;
    }
    .additional-links p,
    a {
        color: white;
    }
    .additional-links a:hover {
        color: #DECBD7;
    }
    .login_main {
        display: flex;
        justify-content: center;
        margin-top: 3vh;
        margin-bottom: 4vh;
    }
    .byk {
        width: 78%;
        /* background-color: antiquewhite; */
        /* background-image: url(images/p1.jpg); */
        /* border-top-left-radius: 8px; */
        border-bottom-left-radius: 8px;
        /* background-size: cover;*/
    }
    .byj {
        width: 60%;
        /* background-color: black; */
        height: 100%;
        display: inline-block;
        /* margin: 0px; */
        /* background-image: url(images/p1.jpg); */
        background: url(images/p1.jpg) no-repeat center center;
        background-size: cover;
        box-sizing: border-box;
    }
    /* .message-popup {
        position: fixed;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        padding: 15px;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        display: none;
        z-index: 9999;
    } */
    .success {
        background-color: #28a745;
    }
    .danger {
        background-color: #dc3545;
    }

    @media (max-width: 1000px) {
        .byk {
            width: 90%;
        }
        .login-container {
            width: 45%;
        }
        .byj {
            width: 55%;
        }
    }
    @media (max-width: 480px) {
        .login-container {
            width: 100%;
            border-radius: 8px;
        }
        .login-header{
            padding: 15px;
        }
        .form-group {
            margin-bottom: 17px;
        }
        .byj{
            display: block;
            width: auto;
            border-radius: 8px;
        }
        .form-group label {
            font-size: 15px;
            font-weight: 600;
        }
        .login-button{
            font-weight: 700;
        }
        .additional-links {
            font-size: 16px;
        }
    }
    @media (max-width: 390px) {
        .login_main {
            margin-top: 5vh;
        }
        .additional-links {
            font-size: 15px;
        }
    }
    #otpForm{
        display: none;
    }
    .otp-button {
        color: #fff;
        padding: 7px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        background: linear-gradient(to right, #3E514D, #484747);
    }
    .otp-button:hover {
        background-color: #0056b3;
    }
    .opt-msg{
        font-size: 13px;
        text-align: start;
        color: white;
        background-color: gray;
        border-radius: 2px;
    }
    
    #password {
        position: relative;
    }
    .toggle-password {
        position: absolute;
        top: 0px;
        /* left: 38%; */
        right: 0px;
        /* display: inline-block; */
        /* transform: translateY(-50%); */
        cursor: pointer;
        border: none;
        background: transparent;
        padding: 4px;
    }
    .toggle-password:focus {
        outline: none;
    }
    #pass-hide{
      display: none;
    }
    #pass-hide,#pass-show{
      width: 21px;
    }
    .pass-div{
        position: relative;
    }
    /* input:-internal-autofill-selected { */
        /* background-color: #your-desired-color; Override autofill background color */
        /* color: #333; Change the text color */
        /* color: white; 
        background-color: #333;
    } */
    </style>
</head>

<body>
    <?php
    include "navbar.php";
    ?>

    <!-- <div id="messagePopup" class="message-popup"></div> -->

    <div class="login_main">
        <div class="byk">
            <div class="login-container">
                <div class="login-header">
                    <h2>Sign Up</h2>
                </div>
                <div class="login-form">
                    <form id="signupForm" action="" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                            <div class="validation-indicator" id="nameValidation"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                            <div class="validation-indicator" id="emailValidation"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="pass-div">
                                <input type="password" id="password" name="password" required>
                                <button type="button" class="toggle-password" id="togglePassword">
                                    <img src="images/logo/hide.png" alt="icon" id="pass-hide" srcset="">
                                    <img src="images/logo/show.png" alt="icon" id="pass-show" srcset="">
                                </button>
                            </div>
                            <div class="validation-indicator" id="passValidation"></div>
                        </div>
                        <button type="button" class="signup-button" id="signup-button">Sign Up</button>
                    </form>
                    <form id="otpForm">
                        <input type="hidden" name="temp_email" id="temp_email">
                        <div class="form-group">
                            <!-- <input type="text" class="otp-input" id="otp1" maxlength="1"> -->
                            <label for="otp">Enter Code</label>
                            <input type="text" id="otp" class="otp-input" name="otp" maxlength="6" required>
                            <div class="validation-indicator" id="otpValidation"></div>

                            <div class="opt-msg">Please Enter Code that send to your email id.</div>
                        </div>

                        <button type="button" class="otp-button" id="otp-button">Submit Code</button>
                    </form>
                    <div class="additional-links">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                        <!-- <p><a href="#">Forgot Password?</a></p> -->
                    </div>
                </div>
            </div>

            <div class="byj"></div>
        </div>
    </div>

    <!-- <script src="js/main.js"></script> -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {

    $("#signup-button").on("click", function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();

        // ! data validation code start
            if (isValidEmail(email)) {
                document.getElementById('emailValidation').style.display = 'none';
            } else {
                $("#emailValidation").text("Plese enter valid Email.");
                var error = 1;
                document.getElementById('emailValidation').style.display = 'block';
            }
            var checknameresult = checkname(name);
            if(checknameresult == 0){
                var msg = "Please enter your Name.";
                $("#nameValidation").text(msg);
                var error = 1;
                document.getElementById('nameValidation').style.display = 'block';
            } else{
                // $("#name-error").text("");
                document.getElementById('nameValidation').style.display = 'none';
            }
            var checkpassresult = checkpassword(password);
            $("#passValidation").text(checkpassresult.msg);
            if(checkpassresult.status==0){
                var error = 1;
                document.getElementById('passValidation').style.display = 'block';
            }else{
                document.getElementById('passValidation').style.display = 'none';
            }
            if(error == 1){ return; }
        // ! data validation code end
        
        // const url = "api/signup";
        const url = "api/login";
        const method = "POST";
        const headerdata = {
            "Content-Type": "application/json"
        };
        const paramsdata = JSON.stringify({
            action: "signup",
            name: name,
            email: email,
            password: password,
        });

        ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

        function successCallback(data) {
            var jsonString = JSON.stringify(data);
            var jsondata = JSON.parse(jsonString);

            console.log("success"+jsondata.message);
            console.log("success"+jsondata.status);

            showPopupMessage(jsondata.message, jsondata.status);

            if (jsondata.success == 1) {
                // set hidden field
                document.getElementById('temp_email').value = email;           
                
                document.getElementById('signupForm').style.display = 'none';
                document.getElementById('otpForm').style.display = 'block';
            }
        }

        function errorCallback(error) {
            console.log("fail");
            console.error('Error:', error);
            showPopupMessage("Server Error", 0);
        }
    });

    // ! OTP compare start
    $("#otp-button").on("click", function() {
        var entered_otp = $("#otp").val();
        var temp_email = $("#temp_email").val();

        const url = "api/login";
        const method = "POST";
        const headerdata = {
            "Content-Type": "application/json"
        };
        const paramsdata = JSON.stringify({
            action: "compare-code",
            email: temp_email,
            entered_otp: entered_otp,
        });
        ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

        function successCallback(data) {
            var jsonString = JSON.stringify(data);
            var jsondata = JSON.parse(jsonString);

            console.log("success");

            if (jsondata.success == 1) {
                // document.getElementById('signupForm').style.display = 'block';
                // document.getElementById('otpForm').style.display = 'none';
                var parameter1 = '1';
                // var parameter2 = 'value2';
                var redirectUrl = 'index.php?l=' + encodeURIComponent(parameter1);
                window.location.href = redirectUrl;
            }else{
                showPopupMessage(jsondata.message, jsondata.status);
            }
        }

        function errorCallback(error) {
            console.log("fail");
            console.error('Error:', error);
            showPopupMessage("Server Error", 0);
        }

        // const inputText = $("#inputText").val();
        // $("#loader").show();
        // generateText(inputText);
    });
    // ! OTP compare end

    // ! important backup start
    // $("#signup-button").on("click", function() {
    //     var name = $("#name").val();
    //     var email = $("#email").val();
    //     var password = $("#password").val();

    //     // ! data validation code start
    //         if (isValidEmail(email)) {
    //             document.getElementById('emailValidation').style.display = 'none';
    //         } else {
    //             $("#emailValidation").text("Plese enter valid Email.");
    //             var error = 1;
    //             document.getElementById('emailValidation').style.display = 'block';
    //         }
    //         var checknameresult = checkname(name);
    //         if(checknameresult == 0){
    //             var msg = "Please enter your Name.";
    //             $("#nameValidation").text(msg);
    //             var error = 1;
    //             document.getElementById('nameValidation').style.display = 'block';
    //         } else{
    //             // $("#name-error").text("");
    //             document.getElementById('nameValidation').style.display = 'none';
    //         }
    //         var checkpassresult = checkpassword(password);
    //         $("#passValidation").text(checkpassresult.msg);
    //         if(checkpassresult.status==0){
    //             var error = 1;
    //             document.getElementById('passValidation').style.display = 'block';
    //         }else{
    //             document.getElementById('passValidation').style.display = 'none';
    //         }
    //         if(error == 1){ return; }
    //     // ! data validation code end
        
    //     // const url = "api/signup";
    //     const url = "api/login";
    //     const method = "POST";
    //     const headerdata = {
    //         "Content-Type": "application/json"
    //     };
    //     const paramsdata = JSON.stringify({
    //         action: "signup",
    //         name: name,
    //         email: email,
    //         password: password,
    //     });

    //     ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

    //     function successCallback(data) {
    //         var jsonString = JSON.stringify(data);
    //         var jsondata = JSON.parse(jsonString);

    //         console.log("success");
    //         showPopupMessage(jsondata.message, jsondata.status);

    //         if (jsondata.success == 1) {
    //             var parameter1 = '1';
    //             // var parameter2 = 'value2';
    //             var redirectUrl = 'index.php?l=' + encodeURIComponent(parameter1);
    //             // window.location.href = redirectUrl;
                
    //             document.getElementById('signupForm').style.display = 'none';
    //             document.getElementById('otpForm').style.display = 'block';
    //         }

    //         // if (data.generatedText) {
    //         //     console.log(data.generatedText);
    //         //     $("#generatedText").text(data.generatedText);
    //         //     $("#generatedText").show();
    //         // } else {
    //         //     console.error('API response does not contain generatedText field.');
    //         // }
    //         // if (data.imgurl) {
    //         //     $("#imageResult").attr("src", data.imgurl);
    //         //     $("#generatedImage").show();
    //         // } else {
    //         //     console.error('API response does not contain imageUrl field.');
    //         // }
    //     }

    //     function errorCallback(error) {
    //         console.log("fail");
    //         console.error('Error:', error);
    //     }

    //     // const inputText = $("#inputText").val();
    //     // $("#loader").show();
    //     // generateText(inputText);
    // });
    // ! important backup end

    // function showPopupMessage(message, status) {
    //     console.log("showPopupMessage show ");
    //     var popup = document.getElementById('messagePopup');
    //     // Set the appropriate class based on status
    //     var className = (status === 1) ? 'success' : 'danger';
    //     // Set the message and class
    //     popup.innerHTML = message;
    //     popup.className = 'message-popup ' + className;
    //     // Show the popup
    //     popup.style.display = 'block';
    //     // Hide the popup after 4 seconds
    //     setTimeout(function() {
    //         popup.style.display = 'none';
    //     }, 8000);
    // }
    // Example usage
    // Replace 'Your message here', 0 with your actual message and status
    // showPopupMessage('Your message here', 0);
    // function validateForm() {
    //     var name = document.getElementById('name').value;
    //     var email = document.getElementById('email').value;
    //     var password = document.getElementById('password').value;
    //     // Simple validation for demonstration purposes
    //     if (!name || !email) {
    //         alert('Please enter your name and email.');
    //     } else if (!password || password.length < 6) {
    //         alert('Password must be at least 6 characters.');
    //     } else {
    //         // Implement your server-side validation and registration logic here
    //         alert('Registration successful!');
    //     }
    // }

    //! password toggel start
        const togglePasswordButton = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        
        togglePasswordButton.addEventListener('click', function() {
            // Toggle the password field type
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                document.getElementById('pass-hide').style.display = 'block';
                document.getElementById('pass-show').style.display = 'none';
                // togglePasswordButton.textContent = 'Hide Password';
            } else {
                passwordInput.type = 'password';
                document.getElementById('pass-hide').style.display = 'none';
                document.getElementById('pass-show').style.display = 'block';
                // togglePasswordButton.textContent = 'Show Password';
            }
        });
    //! password toggel end

    });
    </script>
</body>
</html>