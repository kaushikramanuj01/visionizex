<?php
require_once 'config/init.php';

// header('Content-Type: application/json');
// $json_data = file_get_contents("php://input");
// $data = json_decode($json_data, true);
// $type = isset($data['type']) ? $data['type'] : '';


echo $SubDB->generateUniqueID();
// exit();
function countcredit() {
    global $SubDB; 
    $useremail = isset($_SESSION['useremail']) ? ($_SESSION['useremail']) : "";
    $total = 0;
    if($useremail !== ""){

        $where = array("userid" => $useremail,
                        "type" => "credit"); 
        $selcredit = $SubDB->execute("tblcredit", $where,"","");
       
        $credit = 0;
        foreach($selcredit as $value){
            $credit = $credit + $value['credit'];
        }
                
        $where = array("userid" => $useremail,
                        "type" => "debit");
        $seldebit = $SubDB->execute("tblcredit", $where,"","");

        $debit = 0;
        foreach($seldebit as $value){
            $debit = $debit + $value['credit'];
        }

        $total = $credit - $debit;
    }
    return $total;
}

echo "credit is : " . countcredit() . "\n";
$value = 0;

print_r($_SESSION);

// $type = $_POST['type'];
// if($type == "login"){
//     if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
//         $value = 1;
//      }
// }else if($type == "login"){

// }

//  echo json_encode($value);


?>