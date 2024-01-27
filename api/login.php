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

if ($action == "signup") {
    // Validate input
    $email = (string) $data['email'];
    $name  = (string) $data['name'];
    $password = $data['password'];

    if (empty($name) || empty($email) || empty($password)) {
        $message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {
        // Input is valid, proceed with signup

        $where = array("email" => $email); // Customize the WHERE clause as needed
        $userData = $SubDB->execute("tblcustmaster", $where,"","");

        // Check if the user already exists
        if (sizeof($userData)>0) {
            $message = "User with this email already exists.";
            $status = 0;
            $success = 0;
        } else {
            // User doesn't exist, proceed with signup
            $userData = array(
                "name" => $name,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT) // Hash the password
            );
            $where = array(); // Use appropriate where conditions

            $message = $SubDB->performCRUD("tblcustmaster", "i", $userData, $where);

            $credit_id = $SubDB->generateUniqueID();
            $inst = array(
                "_id" => $credit_id,
                "userid" => $email,
                "credit" => 15,
                "type" => "credit",
            );

            $rk = $SubDB->performCRUD("tblcredit", "i", $inst, $where);

            $response['rrk'] = $rk;
            // $IIS->setusername($name);
            // $IIS->setuseremail($email);
            $_SESSION['useremail'] = $email;
            $_SESSION['sername'] = $name;

            // Set a session variable
            $_SESSION['login'] = 1;

            // Get the session variable
            if(isset($_SESSION['login'])) {
                $login = $_SESSION['login'];
                $response['rrr'] = "Welcome back, $login!";
            } else {
                $response['rrr'] = "Session variable 'login' not set.";
            }

            $status = 1;
            $success = 1;
            $response['HHHH'] =  $IIS->getusername();
        }
    }
}
else if ($action == "login") {
    // Validate input
    $user_userid  = (string) $data['userid'];
    $user_password = $data['password'];

    if (empty($user_userid) || empty($user_password)) {
        $message = "All fields are required.";
    } else {
        // Input is valid, proceed with login
        $where = array("email" => $user_userid); // Customize the WHERE clause as needed
        $userData = $SubDB->execute("tblcustmaster", $where,"","");
        // $response['userData'] =$userData;
        // $response['userData2'] =var_dump($userData);
        
        // Check if the user already exists
        if (sizeof($userData)>0) {            
            $id_db =$userData[0]['id'];
            $name =$userData[0]['name'];
            $email = (string)$userData[0]['email'];
            $password =$userData[0]['password'];
            // Verify the submitted password against the hashed password

            $response['RK_HH'] = $email;
            if (password_verify($user_password, $password)) {
                // Password is correct

                $where = array("userid" => $user_userid); // Customize the WHERE clause as needed
                $imgsel = $SubDB->execute("tblgenerated", $where,"","");

                // $IIS->setusername($name);
                // $IIS->setuseremail($email);
                // Set a session variable
                $_SESSION['login'] = 1;
                $_SESSION['generated_image'] = sizeof($imgsel);
                $_SESSION['useremail'] = $email;
                $_SESSION['sername'] = $name;
                $_SESSION['login_msg'] = 1;

                $message = 'Password is correct.';
                $status = 1;
                $success = 1;
            } else {
                $message = 'Password is incorrect.';
            }
        } else {
            $message = "User not found.";
            $response['HHHH'] =  $IIS->getusername();
        }
    }
}

$response['message'] = $message;
$response['status'] = $status;
$response['success'] = $success;

echo json_encode($response);

?>