<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate</title>
    <link rel="stylesheet" href="styles.css">
    <script src="main.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-top: 0;
        }

        form {
            text-align: left;
            padding: 20px;
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        #generatedText {
            margin-top: 30px;
            font-size: 18px;
            display: none;
        }

        #generatedImage img {
            height: 300px;
        }

        .apiresult {
            margin-left: 20px;
        }

        #generatedImage {
            display: none;
        }

        /* Add these styles for the loader */
        .loader {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #007bff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            animation: spin 2s linear infinite;
            /* Add animation property */
        }

        /* Define the spin animation */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Image Generator</h1>

        <form id="textGeneratorForm">
            <label for="inputText">Enter Text:</label>
            <textarea id="inputText" rows="4" cols="50" required></textarea>
            <button type="button" id="generateButton">Generate</button>
        </form>

        <div class="apiresult">

            <div id="loader" class="loader"></div>

            <div id="generatedImage">
                <img id="imageResult" src="" alt="Generated Image">
            </div>

            <div id="generatedText"></div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // JavaScript code using jQuery
        $(document).ready(function() {
            $("#generateButton").on("click", function() {
                const inputText = $("#inputText").val();
                $("#loader").show();
                generateText(inputText);
            });

            function generateText(input) {
                const url = "api/generate";
                const method = "POST";
                const headerdata = {
                    "Content-Type": "application/json"
                };
                const paramsdata = JSON.stringify({
                    text: input
                });

                currentXhr = $.ajax({
                    type: method,
                    url: url + '.php',
                    headers: headerdata,
                    data: paramsdata,
                    dataType: "json", // Ensure JSON response is expected
                    error: errorCallback,
                    success: successCallback,
                    complete: function() {
                        // Hide the loader after the API call is complete
                        $("#loader").hide();
                    }
                });
            }

            function errorCallback(error) {
                console.error('Error:', error);
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
                $("#imageResult").attr("src", data.imgurl);
                $("#generatedImage").show();
                } else {
                    console.error('API response does not contain imageUrl field.');
                }
            }
        });
    </script>

</body>
</html>