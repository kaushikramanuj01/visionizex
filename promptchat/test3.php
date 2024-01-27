<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Prompt Tool</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 75%;
            margin: auto;
            overflow: hidden;
        }

        header {
            background: linear-gradient(to right, #7a00cc, #e100ff);
            color: white;
            text-align: center;
            padding: 1em 0;
            border-bottom: 2px solid #fff;
        }

        main {
            display: flex;
            justify-content: space-around;
            align-items: center;
            min-height: 70vh;
            padding: 2em 0;
        }

        .prompt-box {
            flex: 1;
            padding: 2em;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .prompt-box:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .prompt-box h2 {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 1em;
        }

        .prompt-input {
            width: 100%;
            padding: 0.5em;
            font-size: 1em;
            margin-bottom: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .prompt-input:focus {
            outline: none;
            border: 1px solid #7a00cc;
        }

        .prompt-button {
            background-color: #7a00cc;
            color: white;
            border: none;
            padding: 0.8em 1.2em;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .prompt-button:hover {
            background-color: #e100ff;
        }

        footer {
            background: linear-gradient(to right, #7a00cc, #e100ff);
            color: white;
            text-align: center;
            padding: 1em 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container">
        <header>
            <h1>AI Prompt Tool</h1>
            <p>Generate effective prompts for AI effortlessly!</p>
        </header>

        <main>
            <div class="prompt-box">
                <h2>Example Prompt</h2>
                <textarea class="prompt-input" rows="6" placeholder="Enter your example prompt"></textarea>
            </div>

            <div class="prompt-box">
                <h2>AI Prompt Generator</h2>
                <textarea class="prompt-input" rows="6" placeholder="Enter a prompt for AI"></textarea>
                <button class="prompt-button">Generate Prompt</button>
            </div>
        </main>
    </div>

    <footer>
        <p>&copy; 2023 AI Prompt Tool. All rights reserved.</p>
    </footer>

</body>

</html>
