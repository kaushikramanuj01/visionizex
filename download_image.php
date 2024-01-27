<?php
set_time_limit(30); // Set the maximum execution time to 60 seconds

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the image URL from the POST data
    $imageUrl = $_POST['imageUrl'];

    // Get the image data
    // $imageData = file_get_contents($imageUrl);
    error_log('Start downloading image');
    $imageData = file_get_contents($imageUrl);
    error_log('Image downloaded');

    // if ($imageData !== false) {
    //     // Generate a unique filename for the saved image
    //     $filename = 'images/' . uniqid() . '.jpg';
    //     // Save the image on the server
    //     file_put_contents($filename, $imageData);
    //     // Respond with a success message
    //     http_response_code(200);
    //     echo 'Image saved successfully!';
    // } 
    if ($imageData !== false) {
        $filename = 'images/' . uniqid() . '.jpg';
    
        // Open a file handle for writing
        $file = fopen($filename, 'w');
    
        // Write the image data in chunks
        fwrite($file, $imageData);
    
        // Close the file handle
        fclose($file);
    
        http_response_code(200);
        echo 'Image saved successfully!';
    }else {
        // Respond with an error message
        http_response_code(400);
        echo 'Failed to download image. Please check the URL.';
    }
} else {
    // Respond with an error for non-POST requests
    http_response_code(405);
    echo 'Method Not Allowed';
}
?>
