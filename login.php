<?php
require_once "config/init.php";
include "navbar.php";

if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
    header("location:./" );
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
        padding-bottom: 45px;
    }

    .login-header {
        /* background: linear-gradient(to right, #3E514D, #484747); */
        color: #fff;
        padding: 20px;
    }

    .login-form {
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
        font-size: 12px;
        color: #dc3545;
        text-align: left;
    }

    .login-button {
        color: #fff;
        padding: 7px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        background: linear-gradient(to right, #31514a, #484747);
        margin-top: 30px;
        /* width: 125px; */
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 7px;
    }

    .login-button:hover {
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
        background: url(images/p5.jpg) no-repeat center center;
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
    /* .login-form input[type="text"]:-webkit-autofill {
    background-color: #333 !important;
        } */
            /* .login-form input:-webkit-autofill {
            background-color: #333 !important;
        } */

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

    #loader {
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

    <div class="login_main">
        <div class="byk">

            <div class="login-container">
                <div class="login-header">
                    <h2>Login</h2>
                </div>
                <div class="login-form">
                    <form id="loginForm" action="" method="post">
                        <div class="form-group">
                            <label for="userid">User ID</label>
                            <input type="text" id="userid" name="userid" required>
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
                        <button type="button" class="login-button" id="login-button">Login <div id="loader"></div> </button>
                    </form>
                    <div class="additional-links">
                        <p>Don't have an account? <a href="signup">Sign up here.</a></p>
                        <p>Forgot your password? <a href="forgotpassword">Click here to reset.</a></p>
                    </div>
                </div>
            </div>
            <div class="byj"></div>
        </div>
    </div>

    <!-- <script src="js/main.js"></script> -->
    <!-- <script src="main.js"></script> -->

    <script>
    document.addEventListener("DOMContentLoaded", function() {
   
    var userPromptInfo = prompter();
    var len_prompt = userPromptInfo.length;
    var user_prompt = userPromptInfo.prompt;

    $("#login-button").on("click", function() {
        var userid = $("#userid").val();
        var password = $("#password").val();

        if (isValidEmail(userid)) {
            document.getElementById('emailValidation').style.display = 'none';
        } else {
            $("#emailValidation").text("Please enter a valid email.");
            var error = 1;
            document.getElementById('emailValidation').style.display = 'block';
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

        $("#loader").show();
        const url = "api/login";
        const method = "POST";
        const headerdata = {
            "Content-Type": "application/json"
        };
        const paramsdata = JSON.stringify({
            action: "login",
            userid: userid,
            password: password,
        });

        ajaxrequest(method, url, headerdata, paramsdata, successCallback, errorCallback)

        function successCallback(data) {
            var jsonString = JSON.stringify(data);
            var jsondata = JSON.parse(jsonString);

            console.log("success");

            // showPopupMessage(jsondata.message, jsondata.status);
            $("#loader").hide();
            if (jsondata.success == 1) {
                document.getElementById('passValidation').style.display = 'none';
                var parameter1 = '1'; // for login indicate
                var redirectUrl = './?l=' + encodeURIComponent(parameter1);
                             
                window.location.href = redirectUrl;
            }else{
                console.log("kkjll");
                $("#passValidation").text(jsondata.message);
                document.getElementById('passValidation').style.display = 'block';
            }
        }

        function errorCallback(error) {
            console.log("fail");
            console.error('Error:', error);
            $("#loader").hide();
            showPopupMessage("Server Error", 0);
        }
    });

    // function validateForm() {
    //     var userid = document.getElementById('userid').value;
    //     var password = document.getElementById('password').value;

    //     // Simple validation for demonstration purposes
    //     if (!userid) {
    //         document.getElementById('useridValidation').style.display = 'block';
    //     } else {
    //         document.getElementById('useridValidation').style.display = 'none';
    //     }
    //     if (!password || password.length < 6) {
    //         document.getElementById('passwordValidation').style.display = 'block';
    //     } else {
    //         document.getElementById('passwordValidation').style.display = 'none';
    //     }
    //     Implement your server-side validation and authentication logic here
    // }
    //! toggel password visibility start
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
    //! toggel password visibility end

    });
    </script>

</body>
</html>