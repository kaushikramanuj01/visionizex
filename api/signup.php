<?php
require_once '../config/init.php';

header('Content-Type: application/json');
$json_data = file_get_contents("php://input");
$data = json_decode($json_data, true);

// Now $data is an associative array containing your JSON data
// Access values like $data['action'], $data['name'], etc.
$status = 0;
$message = 0;
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

            $IIS->setusername($name);
            $IIS->setuseremail($email);

            
            $credit_id = $SubDB->generateUniqueID();
            $inst = array(
                "_id" => $credit_id,
                "userid" => $email,
                "credit" => 15,
                "type" => "credit",
            );

            $rk = $SubDB->performCRUD("tblcredit", "i", $inst, $where);

            $response['rrk'] = $rk;
            
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

} else {
    $message = "Invalid action.";
}

$response['message'] = $message;
$response['status'] = $status;
$response['success'] = $success;

echo json_encode($response);

// Helper function to get user by email
// function getUserByEmail($email)
// {
//     global $conn; // Assuming $conn is your database connection
//     $sql = "SELECT * FROM users WHERE email = '$email'";
//     $result = $conn->query($sql);
//     if ($result->num_rows > 0) {
//         return $result->fetch_assoc();
//     }
//     return null;
// }

// $action = isset($data['action']) ? $data['action'] : '';
// $action = $_POST['action'];
// if($action == "login"){
//     $name = isset($data['name']) ? $data['name'] : '';
//     $email = isset($data['email']) ? $data['email'] : '';
//     $password = isset($data['password']) ? $data['password'] : '';
//     // Example usage
//     $tableName = "your_table_name";
//     $operation = "i"; // 'i' for insert, 'u' for update, 'd' for delete, 'r' for read
//     $data = array("name" => $name, "email" => $email,"password" => $password);
//     // $where = array("id" => 1); // Use appropriate where conditions
//     $where = array(); // Use appropriate where conditions
//     // performCRUD function for database queres
//     $msg = performCRUD($tableName, $operation, $data, $where);
//     $response['msg'] =$msg;
// }
// echo json_encode($response);

// $sort = "created_at DESC"; // Customize the sorting as needed
        // $limit = "10"; // Customize the limit as needed
?>