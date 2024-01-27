<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Existing Page</title>
    <!-- Add your existing stylesheets and scripts here -->
</head>
<body>

    <!-- Your existing content goes here -->

    <h1>AI Website</h1>
    <label for="promptInput">Enter your prompt:</label>
    <input type="text" id="promptInput" placeholder="Type your prompt here">

    <br>

    <a href="#" id="generateLink" onclick="generateImage()">Generate</a>
    <a href="#" id="surpriseLink" onclick="surpriseMe()">Surprise Me</a>

    <div id="generatedImage">
        <!-- Display generated image here -->
    </div>

    <!-- Your existing scripts go here -->

    <script>
        function generateImage() {
            // Call your AI API with the user's input and display the generated image
            // For demonstration purposes, let's assume a function called callAIAPI(prompt) is used
            var prompt = document.getElementById('promptInput').value;
            var generatedImage = callAIAPI(prompt);

            // Display the generated image
            document.getElementById('generatedImage').innerHTML = `<img src="${generatedImage}" alt="Generated Image">`;
        }

        function surpriseMe() {
            // Call your AI API with a random prompt for surprise
            // For demonstration purposes, let's assume a function called callAIAPI is used
            var randomPrompt = getRandomPrompt();
            var generatedImage = callAIAPI(randomPrompt);

            // Display the generated image
            document.getElementById('generatedImage').innerHTML = `<img src="${generatedImage}" alt="Generated Image">`;
        }

        function getRandomPrompt() {
            // Implement logic to get a random prompt for the "Surprise Me" link
            // For simplicity, let's assume an array of predefined prompts
            var prompts = ["Nature", "Dreams", "Adventure", "Surreal"];
            var randomIndex = Math.floor(Math.random() * prompts.length);
            return prompts[randomIndex];
        }

        // Mock function for calling AI API
        function callAIAPI(prompt) {
            // Replace this with the actual API call to generate an image based on the prompt
            // Return the URL or data for the generated image
            console.log("Calling AI API with prompt:", prompt);
            // For demonstration, returning a placeholder image URL
            return "https://via.placeholder.com/300";
        }
    </script>
</body>
</html>
