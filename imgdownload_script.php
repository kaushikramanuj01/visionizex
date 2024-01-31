<?php
require_once 'config/init.php';
// Set unlimited execution time
set_time_limit(0);

$currentDateTime = date('Y-m-d H:i:s');
$message = "";
echo "Start";

$inst_data = "yes";
$log_id = $SubDB->generateUniqueID();
$log = array(
    "_id" =>$log_id ,
    "date" =>$currentDateTime ,
    "hit" => "1",
    "data" => $inst_data
);
$log_where = array();
$SubDB->performCRUD("tblscriptlog", "i", $log, $log_where);

$where = array("local_img" => "");
$imagedata = $SubDB->execute("tblgenerated", $where,"","");

$inst_data .= "   size of data : " . sizeof($imagedata);

$log = array(
    "hit" => "2",
    "data" => $inst_data
);

$where_l = array("_id" => $log_id); // Use appropriate where conditions
$msg = $SubDB->performCRUD("tblscriptlog","u", $log, $where_l);

if(sizeof($imagedata) > 0){
    foreach($imagedata as $rows){

        echo "RK HERE \n";
        $imgurl = $rows['image_url'];
        $_id = $rows['_id'];
        
        // echo "imgurl : " . $imgurl."\n";

        if($imgurl !== ""){
            $imageData = file_get_contents($imgurl);

        // echo "imageData : " . $imageData."\n";

        if ($imageData !== false) {
            $image_name = uniqid() . '.jpg';
            $filename = 'images/' . $image_name;
            
            // Check if the directory exists, if not, create it
            if (!file_exists('images')) {
                if (!mkdir('images', 0755, true)) {
                    $message = 'Error: Unable to create directory';
                    // Handle error appropriately, log, display, etc.
                    // You may choose to exit the script here if directory creation fails
                }
            }

            // Check if the directory is writable
            if (!is_writable('images')) {
                $message .= 'Error: Directory is not writable';
                // Handle error appropriately, log, display, etc.
                // You may choose to exit the script here if directory is not writable

            }

            // Check if file can be opened for writing
            $file = fopen($filename, 'w');
            if (!$file) {
                $message .= 'Error: Unable to open file for writing';
                // Handle error appropriately, log, display, etc.
                // You may choose to exit the script here if file opening fails
            } else {
                // Write the image data in chunks
                if (fwrite($file, $imageData) === false) {
                    $message .= 'Error: Unable to write image data to file';
                    // Handle error appropriately, log, display, etc.
                    // You may choose to exit the script here if writing fails
                } else {
                    // Close the file handle
                    fclose($file);
                    $message .= 'Image generated successfully !'; 
                }
            }

                // $image_name = uniqid() . '.jpg';
                // $filename = 'images/' . $image_name;

                // // Open a file handle for writing
                // $file = fopen($filename, 'w');
                // echo "image_name : " . $image_name."\n";
                // echo "filename : " . $filename."\n";
                
                // // Write the image data in chunks
                // fwrite($file, $imageData);                                    
                // // Close the file handle
                // fclose($file);
        
                // $message = 'Image generated successfully !'; 

                echo $message;
                $update = array(
                    "local_img" => $image_name,
                );
                $where = array("_id"=>$_id); // Use appropriate where conditions
                $message_2 = $SubDB->performCRUD("tblgenerated", "u", $update, $where);

            }
        }
    }
}

$log = array(
    "date" =>$currentDateTime ,
    "hit" => "yes",
    "data" => $message
);
$log_where = array();
$SubDB->performCRUD("tblscriptlog", "i", $log, $log_where);

echo "success";
?>