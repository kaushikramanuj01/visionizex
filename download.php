<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the image URL from the POST data
    $imgpath = $_POST['imgpath'];

    // Get the image content
    $imageContent = file_get_contents($imgpath);

    // Set the headers for a download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="downloaded_image.png"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . strlen($imageContent));

    // Output the image content
    echo $imageContent;
    exit;
}
?>
