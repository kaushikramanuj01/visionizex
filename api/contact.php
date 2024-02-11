<?php
require_once '../config/init.php';

header('Content-Type: application/json');
$json_data = file_get_contents("php://input");
$data = json_decode($json_data, true);

// Now $data is an associative array containing your JSON data
// Access values like $data['action'], $data['name'], etc.
$status = 0;
$message = "Invalid action.";
$success = 0;

$action = isset($data['action']) ? $data['action'] : '';
$response = array();

$login = isset($_SESSION['login']) ? ($_SESSION['login']) : "";
$useremail = isset($_SESSION['useremail']) ? ($_SESSION['useremail']) : "";

if ($action == "insertcontact") {
    // Validate input
    $name  = (string) $SubDB->sanitize($data['name']);
    $inserted_email = (string) $data['email'];
    $user_msg = $SubDB->sanitize($data['user_msg']);

    if (empty($name) || empty($inserted_email) || empty($user_msg)) {
        $message = "All fields are required.";
    } elseif (!filter_var($inserted_email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {
        // Input is valid, proceed with signup
        $where = array("useremail" => $useremail); // Customize the WHERE clause as needed
        $userData = $SubDB->execute("tblcontact", $where,"","");

        // Check if the user already exists
        if (sizeof($userData)>5) {
            $message = "You can't fill form more than 5 times.";
            $status = 0;
            $success = 0;
        } else {
            // User doesn't exist, proceed with signup
            $contact_id = $SubDB->generateUniqueID();
            $userData = array(
                "_id" => $contact_id,
                "useremail" => $useremail,
                "name" => $name,
                "inserted_email" => $inserted_email,
                "user_msg" => $user_msg
            );
            $where = array(); // Use appropriate where conditions
            $SubDB->performCRUD("tblcontact", "i", $userData, $where);

            $message = "Your request is accepted.";

            // $email_result = $sendemail->sendemail("kaushikramanuj01@gmail.com","Contact form test","This is first contact test."); // receiver mail, subject, body,
            
            //! send email for Contacted notification start
            $where = array("isactive" => 1); // Customize the WHERE clause as needed
            $email_info = $SubDB->execute("tblemailconfig", $where,"","");
            if(sizeof($email_info) > 0){
                $body = "Thank You for Connect to VisionizeX";
                $email_result = $sendemail->sendemail($useremail,"Connect to VisionizeX",$body); // receiver mail, subject, body,
                // echo $email_result;
                $response['email_result'] = $email_result;
            }
            //! send email for Contacted notification start

            // $message = $email_result;
            $status = 1;
            $success = 1;
        }
    }
}

$response['message'] = $message;
$response['status'] = $status;
$response['success'] = $success;

echo json_encode($response);

?>