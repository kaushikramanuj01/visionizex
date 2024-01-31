<?php
require_once 'config/init.php';

$currentDateTime = date('Y-m-d H:i:s');

$log = array(
    "date" =>$currentDateTime ,
    "hit" => "yes",
    "data" => "yes"
);
$log_where = array();
$SubDB->performCRUD("tblscriptlog", "i", $log, $log_where);

$where = array("local_img" => "");
$imagedata = $SubDB->execute("tblgenerated", $where,"","");

if(sizeof($imagedata) > 0){
    foreach($imagedata as $rows){

        echo "RK HERE";
        $imgurl = $rows['image_url'];
        $_id = $rows['_id'];
        
        if($imgurl !== ""){
            $imageData = file_get_contents($imgurl);

            if ($imageData !== false) {
                $image_name = uniqid() . '.jpg';
                $filename = 'images/' . $image_name;

                // Open a file handle for writing
                $file = fopen($filename, 'w');

                // Write the image data in chunks
                fwrite($file, $imageData);                                    
                // Close the file handle
                fclose($file);
        
                $message = 'Image generated successfully !'; 

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
    "data" => "yes"
);
$log_where = array();
$SubDB->performCRUD("tblscriptlog", "i", $log, $log_where);

echo "success";
?>