<?php
require_once '../config/init.php';

header('Content-Type: application/json');
$json_data = file_get_contents("php://input");
$data = json_decode($json_data, true);

// Now $data is an associative array containing your JSON data
// Access values like $data['action'], $data['name'], etc.
$status = 0;
$message = 0;
// $success = 0;

$action = isset($data['action']) ? $data['action'] : '';
$response = array();

if ($action == "gallery") {

    $pageno = (int) isset($data['pageno']) ? $data['pageno'] : '';
    $perpage = (int) isset($data['perpage']) ? $data['perpage'] : '';

    $skip = ($pageno - 1) * $perpage;
    $response['skip'] =$skip;

    $where = array(); // Customize the WHERE clause as needed
    $sort = "id DESC"; // Customize the sorting as needed
    $allimages = $SubDB->execute("tblgenerated", $where,$sort,$perpage,$skip);

    $data = "";
    foreach($allimages as $value){
        $image_path = $value['local_img'];
        $_id = $value['_id'];

        if($image_path!==""){
            $final_img_path = "images/".$image_path;
        }else{
            $final_img_path = $value['image_url'];
        }
        
        if($final_img_path !==""){

          $data .= '<div class="img_div"><a href="#"><img src="'. $final_img_path.'" alt="'.$_id .'" srcset="" class="gallery-image"></a></div>';

        }
    }

    $message = "Data found.";
    $status = 1;

    $loadmore = 1;
    if(sizeof($allimages) < $perpage){
        $loadmore = 0;
    }

    $response['loadmore'] = $loadmore;
    $response['data'] = $data;
    $response['nextpage'] = $pageno+1;


}else if ($action == "gallery2") {

    $pageno = (int) isset($data['pageno']) ? $data['pageno'] : '';
    $perpage = (int) isset($data['perpage']) ? $data['perpage'] : '';

    $skip = ($pageno - 1) * $perpage;
    $response['skip'] =$skip;

    $where = array(); // Customize the WHERE clause as needed
    $sort = "id DESC"; // Customize the sorting as needed
    $allimages = $SubDB->execute("tblgenerated", $where,$sort,$perpage,$skip);

    $response['allimages'] = $allimages;
    $data = "";
    $fullimgs = [];
    $rk = 0;
    foreach($allimages as $value){
        $image_path = $value['local_img'];
        $_id = $value['_id'];

        if($image_path!==""){
            $final_img_path = "images/".$image_path;
        }else{
            $final_img_path = $value['image_url'];
        }
        $fullimgs[$rk]['final_img_path'] = $final_img_path;
        $fullimgs[$rk]['image_path_local'] = $image_path;
        $rk++;
    }
    $response['fullimgs'] = $fullimgs;

    $message = "Data found.";
    $status = 1;

    $loadmore = 1;
    if(sizeof($allimages) < $perpage){
        $loadmore = 0;
    }

    $response['loadmore'] = $loadmore;
    // $response['data'] = $data;
    $response['nextpage'] = $pageno+1;


}else {
$message = "Invalid action.";
}

$response['message'] = $message;
$response['status'] = $status;
// $response['success'] = $success;

echo json_encode($response);
?>