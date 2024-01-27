<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 350px;
            text-align: center;
        }

        .login-header {
            background-color: #007bff;
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
            padding: 10px;
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
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
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

        @media (max-width: 400px) {
            .login-container {
                width: 90%;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-header">
            <h2>Login</h2>
        </div>
        <div class="login-form">
            <form id="loginForm" action="your-server-endpoint" method="post">
                <div class="form-group">
                    <label for="userid">User ID</label>
                    <input type="text" id="userid" name="userid" required>
                    <div class="validation-indicator" id="useridValidation">Please enter a valid User ID</div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <div class="validation-indicator" id="passwordValidation">Password must be at least 6 characters</div>
                </div>
                <button type="button" class="login-button" onclick="validateForm()">Login</button>
            </form>
            <div class="additional-links">
                <p>Don't have an account? <a href="#">Sign up</a></p>
                <p><a href="#">Forgot Password?</a></p>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var userid = document.getElementById('userid').value;
            var password = document.getElementById('password').value;

            // Simple validation for demonstration purposes
            if (!userid) {
                document.getElementById('useridValidation').style.display = 'block';
            } else {
                document.getElementById('useridValidation').style.display = 'none';
            }

            if (!password || password.length < 6) {
                document.getElementById('passwordValidation').style.display = 'block';
            } else {
                document.getElementById('passwordValidation').style.display = 'none';
            }

            // Implement your server-side validation and authentication logic here
        }
    </script>

</body>

</html>
