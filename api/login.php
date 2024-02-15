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

$login__id = $SubDB->generateUniqueID();
$inst = array(
    "_id" => $login__id,
    "main_json" => $json_data,
);
$where = array(); // Use appropriate where conditions
$SubDB->performCRUD("tblloginapilog", "i", $inst, $where);

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

        $where = array("email" => $email); // Customize the WHERE clause as needed
        $tempuserData = $SubDB->execute("tbltempcustmaster", $where,"","");

        // Check if the user already exists
        if (sizeof($userData)>0) {
            $message = "User with this email already exists.";
            $status = 0;
            $success = 0;
        }else if (sizeof($tempuserData)>0) {
            $message = "User with this email already exists.";
            $status = 0;
            $success = 0;
        } else {
            // User doesn't exist, proceed with signup
            // $credit_id = $SubDB->generateUniqueID();
            $generated_OTP = $SubDB->generateOTP();
            $userData = array(
                "otp" => $generated_OTP,
                "name" => $name,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT) // Hash the password
            );
            $where = array(); // Use appropriate where conditions

            $SubDB->performCRUD("tbltempcustmaster", "i", $userData, $where);

            //! send email for varification code start
            $where = array("isactive" => 1); // Customize the WHERE clause as needed
            $email_info = $SubDB->execute("tblemailconfig", $where,"","");
            if(sizeof($email_info) > 0){

                // Replace the #otp# tag with the dynamically generated OTP
                $body = str_replace("#otp#",$generated_OTP, $template[2]);
                $subject = "Email Verification";
                                
                $email__id = $SubDB->generateUniqueID();
                $inst = array(
                    "_id" => $email__id,
                    "receiver_email" => $email,
                    "subject" => $subject,
                    "body" => $body,
                );
                $where = array(); // Use appropriate where conditions
                $SubDB->performCRUD("tblemaillog", "i", $inst, $where);

                $email_result = $sendemail->sendemail($email,$subject,$body); // receiver mail, subject, body,
                // echo $email_result;
                
                $response['email_result'] = $email_result;
            }
            //! send email for varification code end

            $message = "Varification Code is Sent to your email.";
            $status = 1;
            $success = 1;
        }
    }
}
else if ($action == "compare-code") {
    // Validate input
    $temp_email = (string) $data['email'];
    $entered_otp = $data['entered_otp'];

    if (empty($temp_email) || empty($entered_otp)) {
        $message = "All fields are required.";
    } elseif (!filter_var($temp_email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {
        // Input is valid, proceed with signup
        $where = array("email" => $temp_email); // Customize the WHERE clause as needed
        $userData = $SubDB->execute("tbltempcustmaster", $where,"","");

        // print_r($userData);
        // Check if the user already exists
        if (sizeof($userData)==0) {
            $message = "Data not found. Server Busy.";
            $status = 0;
            $success = 0;
        } else {
            // Temp User exist, proceed with signup (compare)
            // get field value from tbltempcustmaster
            $db_otp = $userData[0]['otp'];
            // Compare OTPs and return result
            if ($db_otp === $entered_otp){
                //! User verified

                $db_otp = $userData[0]['otp'];
                $name = $userData[0]['name'];
                $db_email = $userData[0]['email'];
                $password = $userData[0]['password'];
                    
                $response['d_name'] = $name;
                $response['d_db_email'] = $db_email;
                $response['d_password'] = $password;
                $response['d_db_otp'] = $db_otp;

                $inst = array(
                    "name" => $name,
                    "email" => $db_email,
                    "password" => $password, // already Hashed the password
                    "otp" => $db_otp // save otp for record 
                );
                $where = array(); // Use appropriate where conditions
                $debug_msg = $SubDB->performCRUD("tblcustmaster", "i", $inst, $where);

                $response['debug_msg'] = $debug_msg;

                $credit_id = $SubDB->generateUniqueID();
                $inst = array(
                    "_id" => $credit_id,
                    "userid" => $db_email,
                    "credit" => 15,
                    "type" => "credit",
                );
                $SubDB->performCRUD("tblcredit", "i", $inst, $where);

                $_SESSION['useremail'] = $db_email;
                $_SESSION['sername'] = $name;
                $_SESSION['login'] = 1;
                $_SESSION['login_msg'] = 1;

                $where = array("email" => $db_email); // Customize the WHERE clause as needed
                $SubDB->performCRUD("tbltempcustmaster", "d",[], $where);

                //! send email for varification code start
                $where = array("isactive" => 1); // Customize the WHERE clause as needed
                $email_info = $SubDB->execute("tblemailconfig", $where,"","");
                if(sizeof($email_info) > 0){
                    // Replace the #name# tag with the dynamically name
                    $body = str_replace("#name#",$name, $template[3]);
                    $subject = "Thank You for Sign-Up - VisionizeX";
                    // $body = "Thank You for sign up in VisionizeX";
                    $email__id = $SubDB->generateUniqueID();
                    $inst = array(
                        "_id" => $email__id,
                        "receiver_email" => $db_email,
                        "subject" => $subject,
                        "body" => $body,
                    );
                    $where = array(); // Use appropriate where conditions
                    $SubDB->performCRUD("tblemaillog", "i", $inst, $where);
                    $email_result = $sendemail->sendemail($db_email,$subject,$body); // receiver mail, subject, body,
                    // echo $email_result;
                    $response['email_result'] = $email_result;
                }
                //! send email for varification code end

                $message = "Code Verified";
                $status = 1;
                $success = 1;
            }else{
                //! wrong code entered    
                $message = "Wrong Code Entered.";
            }

        }
    }
}
else if ($action == "forgot_pass") {
    // Validate input
    $email = (string) $data['userid'];
    $where = array(); // Use appropriate where conditions
    
    if (empty($email)) {
        $message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {
        // Input is valid, proceed with signup

        $where = array("email" => $email); // Customize the WHERE clause as needed
        $userData = $SubDB->execute("tblcustmaster", $where,"","");

        // Check if the user already exists
        if (sizeof($userData) == 0) {
            $message = "User does not exists.";
            $status = 0;
            $success = 0;
        } else {
            // User exist, proceed with forgot password
            $forgot_id = $SubDB->generateUniqueID();
            $generated_OTP = $SubDB->generateOTP();
            $userData = array(
                "_id" => $forgot_id,
                "otp" => $generated_OTP,
                "email" => $email,
            );
            $SubDB->performCRUD("tblforgotpass", "i", $userData, $where);

            //! send email for forget password code start
            $where = array("isactive" => 1); // Customize the WHERE clause as needed
            $email_info = $SubDB->execute("tblemailconfig", $where,"","");
            if(sizeof($email_info) > 0){
                // Replace the #otp# tag with the dynamically generated OTP
                $body = str_replace("#otp#",$generated_OTP, $template[1]);
                $subject = "Reset Password - VisionizeX";
                $email__id = $SubDB->generateUniqueID();
                $inst = array(
                    "_id" => $email__id,
                    "receiver_email" => $email,
                    "subject" => $subject,
                    "body" => $body,
                );
                $where = array(); // Use appropriate where conditions
                $SubDB->performCRUD("tblemaillog", "i", $inst, $where);
                $email_result = $sendemail->sendemail($email,$subject,$body); // receiver mail, subject, body,
                // echo $email_result;
                $response['email_result'] = $email_result;
            }
            //! send email for forget password code end

            $message = "Varification Code is Sent to your email.";
            $status = 1;
            $success = 1;
        }
    }
}
else if ($action == "forgot_code") {
    // Validate input
    $forgot_code = (int)$data['forgot_code'];
    $new_password = $data['new_password'];
    $re_password = $data['re_password'];
    $email = $data['temp_email'];

    $where = array(); // Use appropriate where conditions
    
    if (empty($email)) {
        $message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {
        // Input is valid, proceed with signup
        $where = array("email" => $email); // Customize the WHERE clause as needed
        $userData = $SubDB->execute("tblforgotpass", $where,"","");

        // Check if the user already exists
        if (sizeof($userData) == 0) {
            $message = "User does not exists.";
            $status = 0;
            $success = 0;
        } else {
            $db_code = (int)$userData[0]['otp'];

            if($db_code === $forgot_code){
                $forgot_id = $SubDB->generateUniqueID();
                $generated_OTP = $SubDB->generateOTP();
                $userData = array(
                    "password" => password_hash($new_password, PASSWORD_DEFAULT),
                );
                $where = array("email" => $email);
                $SubDB->performCRUD("tblcustmaster", "u", $userData, $where);

                $where = array("email" => $email);
                $SubDB->performCRUD("tblforgotpass", "d",[], $where);

                //! send email for Password change Alert start
                $where = array("isactive" => 1); // Customize the WHERE clause as needed
                $email_info = $SubDB->execute("tblemailconfig", $where,"","");
                if(sizeof($email_info) > 0){
                    $body = $template[0];
                    $subject = "Alert Password is Changed - VisionizeX";
                    // $body = "Your Password is Changed for VisionizeX";
                    $email__id = $SubDB->generateUniqueID();
                    $inst = array(
                        "_id" => $email__id,
                        "receiver_email" => $email,
                        "subject" => $subject,
                        "body" => $body,
                    );
                    $where = array(); // Use appropriate where conditions
                    $SubDB->performCRUD("tblemaillog", "i", $inst, $where);
                    $email_result = $sendemail->sendemail($email,$subject,$body); // receiver mail, subject, body,
                    // echo $email_result;
                    $response['email_result'] = $email_result;
                }
                //! send email for Password change Alert end

                $message = "Your Password is Changed Successfully.";
                $status = 1;
                $success = 1;
            }else{
                $message = "Entered Code is not Correct.";
            }
        }
    }
}
else if ($action == "signup_bk") {
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
            $SubDB->performCRUD("tblcredit", "i", $inst, $where);

            // $response['rrk'] = $rk;
            // $IIS->setusername($name);
            // $IIS->setuseremail($email);
            // Set a session variable
            $_SESSION['useremail'] = $email;
            $_SESSION['sername'] = $name;
            $_SESSION['login'] = 1;
            $_SESSION['login_msg'] = 1;

            // Get the session variable
            if(isset($_SESSION['login'])) {
                $login = $_SESSION['login'];
                $response['rrr'] = "Welcome back, $login!";
            } else {
                $response['rrr'] = "Session variable 'login' not set.";
            }

            $status = 1;
            $success = 1;
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
                // $where = array("userid" => $user_userid); // Customize the WHERE clause as needed
                // $imgsel = $SubDB->execute("tblgenerated", $where,"","");

                // $IIS->setusername($name);
                // $IIS->setuseremail($email);
                // Set a session variable
                $_SESSION['login'] = 1;
                // $_SESSION['generated_image'] = sizeof($imgsel);
                $_SESSION['useremail'] = $email;
                $_SESSION['sername'] = $name;
                $_SESSION['login_msg'] = 1;

                $message = 'Password is correct.';
                $status = 1;
                $success = 1;
            } else {
                $message = 'Password or Email is incorrect.';
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