<?php
require_once '../config/init.php';

header('Content-Type: application/json');
$json_data = file_get_contents("php://input");
$data = json_decode($json_data, true);

// Now $data is an associative array containing your JSON data
// Access values like $data['action'], $data['name'], etc.
$status = 0;
$success = 0;
$message = "Invalid Action.";

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
        $message = "Invalid Email Format.";
    } else {
        // Input is valid, proceed with signup
        $where = array("useremail" => $useremail); // Customize the WHERE clause as needed
        $userData = $SubDB->execute("tblcontact", $where,"","");

        // Check if the user already exists
        if (sizeof($userData)>5) {
            $message = "You can't fill form more than 5 times.";
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

            // $email_result = $sendemail->sendemail("kaushikramanuj01@gmail.com","Contact form test","This is first contact test."); // receiver mail, subject, body,
            //! send email for Contacted notification start
            $where = array("isactive" => 1); // Customize the WHERE clause as needed
            $email_info = $SubDB->execute("tblemailconfig", $where,"","");
            if(sizeof($email_info) > 0){
                // Replace the #name# tag with the dynamically name
                $body = str_replace("#name#",$name, $template[4]);
                $subject = "Thank You for Connect - VisionizeX";
                // $body = "Thank You for Connect to VisionizeX";
                $email__id = $SubDB->generateUniqueID();
                $inst = array(
                    "_id" => $email__id,
                    "receiver_email" => $useremail,
                    "subject" => $subject,
                    "body" => $body,
                );
                $where = array(); // Use appropriate where conditions
                $SubDB->performCRUD("tblemaillog", "i", $inst, $where);
                $email_result = $sendemail->sendemail($useremail,$subject,$body); // receiver mail, subject, body,
                // echo $email_result;
                $response['email_result'] = $email_result;
            }

            // get current date and time
            $datetime = date('m/d/Y h:i:s A');
            // Replace the tags with the dynamically data
            $body = str_replace("#name#",$name, $template[5]);
            $body = str_replace("#login_email#",$useremail, $body);
            $body = str_replace("#filled_email#",$inserted_email, $body);
            $body = str_replace("#message#",$user_msg, $body);
            $body = str_replace("#datetime#",$datetime, $body);
            
            $subject = "Urgent-Customer Query-VisionizeX";
            
            $email__id = $SubDB->generateUniqueID();
            $inst = array(
                "_id" => $email__id,
                "receiver_email" => "kaushikramanuj12@gmail.com",
                "subject" => $subject,
                "body" => $body,
            );
            $where = array(); // Use appropriate where conditions
            $SubDB->performCRUD("tblemaillog", "i", $inst, $where);

            $email_result = $sendemail->sendemail("kaushikramanuj12@gmail.com",$subject,$body); // receiver mail, subject, body,

            // $response['email_result'] = $email_result;
            //! send email for Contacted notification start

            // $message = $email_result;
            $message = "Thank you for connecting. Our representative will shortly get in touch with you.";
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