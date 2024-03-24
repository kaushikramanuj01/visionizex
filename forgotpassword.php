<?php
require_once "config/init.php";
include "navbar.php";

if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="theme/main.css"> -->
    <link rel="stylesheet" href="styles.css">
    <!-- <script src="main.js"></script> -->
    <script src="main.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
    body {
        /* margin: 0;
        padding: 0;*/
        font-family: 'Arial', sans-serif;
        background-color: #333;
        /* background-color: #f8f9fa; */
        /* display: flex; */
        /* align-items: center; */
        /* justify-content: center; */
        /* height: 100vh; */
    }

    .forgot-container {
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
        padding-bottom: 45px;
    }

    .forgot-header {
        /* background: linear-gradient(to right, #3E514D, #484747); */
        color: #fff;
        padding: 20px;
    }

    .forgot-form {
        /* padding: 20px; */
        width: 80%;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 14px;
        /* color: #555; */
        display: block;
        margin-bottom: 8px;
        text-align: left;
        color: white;
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
        font-size: 13px;
        color: #dc3545;
        text-align: left;
    }

    .btl-design {
        color: #fff;
        padding: 7px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        background: linear-gradient(to right, #31514a, #484747);
        margin-top: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 7px;
    }

    .btl-design:hover {
        background-color: #0056b3;
    }

    .additional-links {
        margin-top: 30px;
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

    .forgot_main {
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
        background: url(images/p2.jpg) no-repeat center center;
        background-size: cover;
        box-sizing: border-box;
    }
    /* Target autofilled input fields */
    /* input:-webkit-autofill { */
    /* input:-internal-autofill-selected { */
        /* background-color: #your-desired-color; Override autofill background color */
        /* color: #333; Change the text color */
        /* color: white;
        background-color: #333;
    } */
    /* .forgot-form input[type="text"]:-webkit-autofill {
    background-color: #333 !important;
        } */
            /* .forgot-form input:-webkit-autofill {
            background-color: #333 !important;
        } */

    @media (max-width: 1000px) {
        .byk {
            width: 90%;
        }
        .forgot-container {
            width: 45%;
        }
        .byj {
            width: 55%;
        }
    }
    @media (max-width: 480px) {
        .forgot-container {
            width: 100%;
            border-radius: 8px;
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
        .btl-design{
            font-weight: 700;
        }
        .additional-links {
            font-size: 16px;
        }
    }
    @media (max-width: 390px) {
        .forgot_main {
            margin-top: 5vh;
        }
        .additional-links {
            font-size: 15px;
        }
    }
    #forgotForm{
        display: none;
    }
    .opt-msg{
        font-size: 13px;
        text-align: start;
        color: white;
        /* background-color: gray !important; */
        border-radius: 2px;
        margin-top: 5px;
    }

     /* Hide the arrow buttons for number input */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    #password {
        position: relative;
    }
    .toggle-password,.toggle-password2 {
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
    #pass-hide,#pass-hide2{
      display: none;
    }
    #pass-hide,#pass-show,#pass-hide2,#pass-show2{
      width: 21px;
    }
    .pass-div{
        position: relative;
    }
    /* Optionally, you can add styles to make the input field look consistent */
    /* input[type=number] {
        padding: 0.5em;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    } */

    
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
        display: none; /* Initially hide loader */
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    </style>
</head>

<body>

    <div class="forgot_main">
        <div class="byk">

            <div class="forgot-container">
                <div class="forgot-header">
                    <h2>Forgot Password</h2>
                </div>
                <div class="forgot-form">
                    <form id="forgotForm" action="" method="post">
                      
                        <div class="form-group">
                            <label for="forgot-code">Code</label>
                            <input type="number" id="forgot-code" name="forgot-code" required>
                            <div class="validation-indicator" id="forgot-codeValidation"></div>
                        </div>

                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <div class="pass-div">
                                <input type="password" id="new-password" name="new-password" required>
                                <button type="button" class="toggle-password" id="togglePassword">
                                    <img src="images/logo/hide.png" alt="icon" id="pass-hide" srcset="">
                                    <img src="images/logo/show.png" alt="icon" id="pass-show" srcset="">
                                </button>
                            </div>

                            <div class="validation-indicator" id="new-passwordValidation"></div>
                        </div>
                        <div class="form-group">
                            <label for="re-password">Rewrite New Password</label>
                            <div class="pass-div">
                                <input type="password" id="re-password" name="re-password" required>
                                <button type="button" class="toggle-password2" id="togglePassword2">
                                    <img src="images/logo/hide.png" alt="icon" id="pass-hide2" srcset="">
                                    <img src="images/logo/show.png" alt="icon" id="pass-show2" srcset="">
                                </button>
                            </div>
                            <div class="validation-indicator" id="re-passwordValidation"></div>
                        </div>

                        <button type="button" class="forgot-button btl-design" id="forgot-button">Change Password <div class="loader" id="loader_forg"></div> </button>
                    </form>

                    <form id="emailForm" action="" method="post">
                        <input type="hidden" name="temp_email" id="temp_email">
                        <div class="form-group">
                            <label for="userid">User ID</label>
                            <input type="text" id="userid" name="userid" required>
                            <div class="validation-indicator" id="emailValidation"></div>
                            <div class="opt-msg">We will send a verification code to your email.</div>
                        </div>
                        
                        <button type="button" class="email-button btl-design" id="email-button">Send Code <div class="loader" id="loader_code"></div> </button>
                    </form>

                    <div class="additional-links">
                        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                    </div>
                </div>
            </div>
            <div class="byj"></div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {

    // var userPromptInfo = prompter();
    // var len_prompt = userPromptInfo.length;
    // var user_prompt = userPromptInfo.prompt;

    $("#email-button").on("click", function() {
        var userid = $("#userid").val();

        if (isValidEmail(userid)) {
            document.getElementById('emailValidation').style.display = 'none';
        } else {
            $("#emailValidation").text("Plese enter valid Email.");
            var error = 1;
            document.getElementById('emailValidation').style.display = 'block';
        }
        if(error == 1){ return; }

        $("#loader_code").show();

        const url = "api/login";
        const method = "POST";
        const headerdata = {
            "Content-Type": "application/json"
        };
        const paramsdata = JSON.stringify({
            action: "forgot_pass",
            userid: userid,
        });

        ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

        function successCallback(data) {
            var jsonString = JSON.stringify(data);
            var jsondata = JSON.parse(jsonString);

            $("#loader_code").hide();

            console.log("success");

            showPopupMessage(jsondata.message, jsondata.status);

            if (jsondata.success == 1) {
                document.getElementById('temp_email').value = userid;           
                document.getElementById('emailForm').style.display = 'none';
                document.getElementById('forgotForm').style.display = 'block';
            }
        }

        function errorCallback(error) {
            console.log("fail");
            console.error('Error:', error);
            $("#loader_code").hide();
            showPopupMessage("Server Error", 0);
        }
    });

    // ! for reset password (new-password)
    $("#forgot-button").on("click", function() {
        var forgot_code = $("#forgot-code").val();
        var new_password = $("#new-password").val();
        var re_password = $("#re-password").val();
        var temp_email = $("#temp_email").val();

        // ! Data validation start
            var error = 0;

            var checkpassresult = checkpassword(new_password);
            $("#new-passwordValidation").text(checkpassresult.msg);
            if(checkpassresult.status==0){
                var error = 1;
                document.getElementById('new-passwordValidation').style.display = 'block';
            }else{
                document.getElementById('new-passwordValidation').style.display = 'none';
            }
            var checkpassresult = checkpassword(re_password);
            $("#re-passwordValidation").text(checkpassresult.msg);
            if(checkpassresult.status==0){
                var error = 1;
                document.getElementById('re-passwordValidation').style.display = 'block';
            }else{
                document.getElementById('re-passwordValidation').style.display = 'none';
            }
            // var checkpassresult = checkpassword(re_password);
            if(re_password !== new_password){
                var error = 1;
                $("#re-passwordValidation").text("Both passwords must be the same.");
                document.getElementById('re-passwordValidation').style.display = 'block';
            }else{
                document.getElementById('re-passwordValidation').style.display = 'none';
            }
        
            var checkcoderesult = checkotp(forgot_code);
            if(checkcoderesult.status == 0){
                $("#forgot-codeValidation").text(checkcoderesult.msg);
                error = 1;
                document.getElementById('forgot-codeValidation').style.display = 'block';
            } else{
                document.getElementById('forgot-codeValidation').style.display = 'none';
            }

            if(error == 1){ return; }

        // ! Data validation end

        $("#loader_forg").show();
            
        const url = "api/login";
        const method = "POST";
        const headerdata = {
            "Content-Type": "application/json"
        };
        const paramsdata = JSON.stringify({
            action: "forgot_code",
            forgot_code: forgot_code,
            new_password: new_password,
            re_password: re_password,
            temp_email: temp_email,
        });

        ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

        function successCallback(data) {
            var jsonString = JSON.stringify(data);
            var jsondata = JSON.parse(jsonString);

            $("#loader_forg").hide();

            console.log("success");

            if (jsondata.success == 1) {
                var parameter1 = '1'; // for login indicate
                var redirectUrl = 'login.php';
                window.location.href = redirectUrl;
            }else{
                showPopupMessage(jsondata.message, jsondata.status);
            }
        }

        function errorCallback(error) {
            console.log("fail");
            console.error('Error:', error);
            $("#loader_forg").hide();
            showPopupMessage("Server Error", 0);
        }
    });

    // ! toggel password start
        const togglePasswordButton = document.getElementById('togglePassword'); 
        const new_password = document.getElementById('new-password');
        const togglePasswordButton2 = document.getElementById('togglePassword2'); 
        const re_password = document.getElementById('re-password');
    
        togglePasswordButton.addEventListener('click', function() {
            // Toggle the password field type
            if (new_password.type === 'password') {
                new_password.type = 'text';
                document.getElementById('pass-hide').style.display = 'block';
                document.getElementById('pass-show').style.display = 'none';
                // togglePasswordButton.textContent = 'Hide Password';
            } else {
                new_password.type = 'password';
                document.getElementById('pass-hide').style.display = 'none';
                document.getElementById('pass-show').style.display = 'block';
                // togglePasswordButton.textContent = 'Show Password';
            }
        });
        togglePasswordButton2.addEventListener('click', function() {
            // Toggle the password field type
            if (re_password.type === 'password') {
                re_password.type = 'text';
                document.getElementById('pass-hide2').style.display = 'block';
                document.getElementById('pass-show2').style.display = 'none';
                // togglePasswordButton.textContent = 'Hide Password';
            } else {
                re_password.type = 'password';
                document.getElementById('pass-hide2').style.display = 'none';
                document.getElementById('pass-show2').style.display = 'block';
                // togglePasswordButton.textContent = 'Show Password';
            }
        });
    // ! toggel password end

    });
    </script>

</body>
</html>