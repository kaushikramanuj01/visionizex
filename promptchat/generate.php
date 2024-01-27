
<?php
require_once "config/init.php";

if($login !== "successful"){
    header('location:login.php');
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="theme/main.css">
</head>

<body>

<?php
    include "nav.php";
?>
    
<main>

<div class="prompt-box" id="examplePromptBox">
    <h2>Example Prompt</h2>
    <textarea class="prompt-input" rows="6" placeholder="Enter your example prompt"></textarea>
</div>

<div class="prompt-box" id="aiPromptBox">
    <h2>AI Prompt Generator</h2>
    <textarea class="prompt-input" rows="6" placeholder="Enter a prompt for AI"></textarea>
    <button class="prompt-button">Generate Prompt</button>
</div>
</main>

    <script src="js/main.js"></script>

</body>
</html>
