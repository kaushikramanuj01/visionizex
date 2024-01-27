<?php
require_once 'config/init.php';

header('Content-Type: application/json');
$json_data = file_get_contents("php://input");
$data = json_decode($json_data, true);
$type = isset($data['type']) ? $data['type'] : '';

$value = 0;
// $type = $_POST['type'];
if($type == "login"){
    if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
        $value = 1;
     }
}else if($type == "login"){

}

 echo json_encode($value);


?>