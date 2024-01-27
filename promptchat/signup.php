<?php

require_once "init.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="theme/main.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            /* display: flex; */
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 331px;
            text-align: center;
            height: 83vh;
        }

        .login-header {
            background: linear-gradient(to right, #3E514D, #DECBD7);
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
            color: #555;
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 6px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
            display: block;
            margin-bottom: 10px;
            box-sizing: border-box;
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
            background: linear-gradient(to right, #3E514D, #DECBD7);
        }

        .login-button:hover {
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
            color: #3E514D;
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
    </style>
</head>

<body>

    <?php
    include "nav.php";
    ?>

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
                    <button type="button" class="login-button" onclick="validateForm()">Sign Up</button>
                </form>
                <div class="additional-links">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                    <!-- <p><a href="#">Forgot Password?</a></p> -->
                </div>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>

    <script>


        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Simple validation for demonstration purposes
            if (!name || !email) {
                alert('Please enter your name and email.');
            } else if (!password || password.length < 6) {
                alert('Password must be at least 6 characters.');
            } else {
                // Implement your server-side validation and registration logic here
                alert('Registration successful!');
            }
        }
    </script>

</body>

</html>
