
<?php
session_write_close();
ob_start();
// sleep(6); // Simulate some time-consuming process
require_once '../config/init.php';
// header('Content-Type: application/json');

$where = array(); // Customize the WHERE clause as needed
$selimg = $SubDB->execute("tblgenerated", $where,"","");
$logdata = "";

foreach($selimg as $value){

    $imageUrl = $value['image_url'];

    $logdata .= 'Start downloading image';
    // error_log('Start downloading image');
    $imageData = file_get_contents($imageUrl);

    $logdata .= "\n".'Image downloaded'; 
    // error_log('Image downloaded');

    if ($imageData !== false) {
        $filename = 'images/' . uniqid() . '.jpg';
    
        // Open a file handle for writing
        $file = fopen($filename, 'w');
    
        // Write the image data in chunks
        fwrite($file, $imageData);
    
        // Close the file handle
        fclose($file);
    
        $logdata .= "\n".'Image saved successfully!'; 

        // http_response_code(200);
        // echo 'Image saved successfully!';
    }else {

        $logdata .= "\n".'Failed to download image. Please check the URL.'; 

        // Respond with an error message
        // http_response_code(400);
        // echo 'Failed to download image. Please check the URL.';
    }
}


file_put_contents('output.txt', $logdata . date('Y-m-d H:i:s'));
// file_put_contents('output.txt', 'Process completed at ' . date('Y-m-d H:i:s'));
ob_end_flush();

?>
