<?php

$OPENAI_API_KEY = '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'; // Replace with your OpenAI API key
$url = 'https://api.openai.com/v1/chat/completions';

$data = array(
    "model" => "gpt-3.5-turbo",
    "messages" => array(
        array(
            "role" => "system",
            "content" => "this text are prompt for text to image model base AI tool , convert this normal prompt into AI tool compatible prompt"
        ),
        array(
            "role" => "user",
            "content" => "image of dining table with different type of food and detailed image and creative image with best lighting and angle of photo"
        ),
        
    ),
    "temperature" => 1,
    "max_tokens" => 1000,
    "top_p" => 1,
    "frequency_penalty" => 0,
    "presence_penalty" => 0
);

$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $OPENAI_API_KEY
);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

if ($result === false) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Display the API response
    echo $result;
}

curl_close($ch);

?>
