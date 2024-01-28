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
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-color: #333;
        /* display: flex; */
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .login-container {
        background-color: #595757;
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 331px;
        text-align: center;
        height: 83vh;
    }

    .login-header {
        background: linear-gradient(to right, #3E514D, #484747);
        color: #fff;
        padding: 20px;
    }

    .login-form {
        padding: 20px;
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
        width: calc(100% - 20px);
        padding: 6px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        display: block;
        margin-bottom: 10px;
        box-sizing: border-box;
        background-color: #333;
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

    @media (max-width: 400px) {
        .login-container {
            width: 90%;
        }
    }

    .login_main {
        display: flex;
        justify-content: center;
        margin-top: 3vh;
    }

    .message-popup {
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
    }

    .success {
        background-color: #28a745;
    }

    .danger {
        background-color: #dc3545;
    }
    </style>
</head>

<body>
    <?php
    include "navbar.php";
    ?>

    <div id="messagePopup" class="message-popup"></div>
    <div class="login_main">
        <div class="login-container">
            <div class="login-header">
                <h2>Sign Up</h2>
            </div>
            <div class="login-form">
                <form id="signupForm" action="your-server-endpoint" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="button" class="signup-button" id="signup-button">Sign Up</button>
                </form>
                <div class="additional-links">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                    <!-- <p><a href="#">Forgot Password?</a></p> -->
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="js/main.js"></script> -->

    <script>
    $("#signup-button").on("click", function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();

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

            console.log("success");

            showPopupMessage(jsondata.message, jsondata.status);

            if (jsondata.success == 1) {
                var parameter1 = '1';
                // var parameter2 = 'value2';
                var redirectUrl = 'index.php?l=' + encodeURIComponent(parameter1);
                window.location.href = redirectUrl;
            }

            // if (data.generatedText) {
            //     console.log(data.generatedText);
            //     $("#generatedText").text(data.generatedText);
            //     $("#generatedText").show();

            // } else {
            //     console.error('API response does not contain generatedText field.');
            // }
            // if (data.imgurl) {
            //     $("#imageResult").attr("src", data.imgurl);
            //     $("#generatedImage").show();
            // } else {
            //     console.error('API response does not contain imageUrl field.');
            // }
        }

        function errorCallback(error) {
            console.log("fail");
            console.error('Error:', error);
        }

        // const inputText = $("#inputText").val();
        // $("#loader").show();
        // generateText(inputText);
    });


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
    </script>

</body>

</html>