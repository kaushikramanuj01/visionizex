<?php
set_time_limit(0);

header('Content-Type: application/json');
require_once '../config/init.php';
$content="no content";
$message="";
$choice="";
$msg="";
$imgurl="";
$imghtml="";
$limit="";
$image_name="";
$user_id="";
// exit();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $input_f = file_get_contents('php://input');
    $input = json_decode($input_f, true);

    $userprompt =$input['text'];
    $user_id =$input['user_id'];
    // $user_id =$IIS->getuseremail();
    // $user_id = "kaushik@gmail.com";

    // $response['user_id'] =$user_id;
    $log_id = $SubDB->generateUniqueID();
    $log = array(
        "_id" => $log_id,
        "main_input" => $input_f,
        "user_id" => $user_id
    );
    $log_where = array();
    $SubDB->performCRUD("tblgenapilog", "i", $log, $log_where);


    if (isset($input['text']) && !empty($input['text']) && isset($input['user_id'])) {
        // Your text generation logic here
        $generatedText = 'Generated Text: ' . $input['text'];
        // $userprompt =$input['text'];
        // $user_id =$input['user_id'];

        $where = array("email" => $user_id); // Customize the WHERE clause as needed
        $userData = $SubDB->execute("tblcustmaster", $where,"","");

        if(sizeof($userData) > 0){
            // $where = array("userid" => $user_id); // Customize the WHERE clause as needed
            // $userData = $SubDB->execute("tblgenerated", $where,"","");
            $current_credit = $SubDB->countcredit();
            // if(sizeof($userData)<5){
            if($current_credit>=5){

                // $OPENAI_API_KEY = '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'; //OpenAI API key
                $OPENAI_API_KEY = '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'; //OpenAI API key
                $url = 'https://api.openai.com/v1/chat/completions';
                // $url = 'https://api.openai.com/v1/embeddings';
                // "model" => "text-embedding-ada-002",
                $data = array(
                    "model" => "gpt-3.5-turbo",
                    "messages" => array(
                        array(
                            "role" => "system",
                            "content" => "this text are prompt for text to image model base AI tool , convert this normal prompt into AI tool compatible prompt , don't ask for anything just create best creative possible prompt with given prompt ."
                        ),
                        array(
                            "role" => "user",
                            "content" => $userprompt
                        ),
                    ),
                    "temperature" => 1,
                    "max_tokens" => 1000,
                    "top_p" => 1,
                    "frequency_penalty" => 0,
                    "presence_penalty" => 0
                );
        
                $headers = array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $OPENAI_API_KEY
                );
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $result = curl_exec($ch);
                curl_close($ch);

                $response['result_rk'] = $result;
                
                $message2="";
                if ($result === false) {
                    $msg = 'Prompt cURL Error: ' . curl_error($ch);
                    $message = "Server Error.";
                } else {
                    // print_r($result);
                    $data = json_decode($result, true);
                    // Check if 'choices' key exists in the response
                    if (isset($data['choices'])) {
                        $choice = $data['choices'][0]; // Access the first choice
                        $choice_data = $choice['message'];
                        $content = $choice_data['content'];

                        $_id = $SubDB->generateUniqueID();
                        $response['_id']  = $_id;
                        $inst = array(
                            "_id" => $_id,
                            "userid" => $user_id,
                            "user_prompt" => $userprompt,
                            "ai_prompt" => $content,
                            "text_response" => $result
                        );
                        $response['inst'] = $inst;
                        $where = array();
                        $message_1 = $SubDB->performCRUD("tblgenerated", "i", $inst, $where);

                        $response['message_1'] = $message_1;
                        // echo json_encode(['generatedText' => $content]);
                        
                        if($content !== ""){
                            $data = [
                                "model"=> "dall-e-2",
                                'prompt' => $content,
                                'n' => 1,
                                'size' => '1024x1024',
                            ];
                            
                            $json_data = json_encode($data);
                            $ch = curl_init('https://api.openai.com/v1/images/generations');
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                                'Content-Type: application/json',
                                'Authorization: Bearer ' . $OPENAI_API_KEY,
                            ]);                    
                            $imgresult = curl_exec($ch);
                            curl_close($ch);

                            $response['imgresult_rk'] = $imgresult;
                            
                            if ($imgresult === false) {
                                $msg = 'image cURL error: ' . curl_error($ch);
                                $message = "Server Error - Generate";
                            } else {
                                $imgdata = json_decode($imgresult, true);
                                $response['rrr'] = $imgdata;
                                $msg = "img api success..";
                                if (isset($imgdata['data'][0]['url'])) {
                                    $imgurl = $imgdata['data'][0]['url']; // Access url of img
                                    $imghtml = "<img id='imageResult' src=".$imgurl." alt='Generated Image'>";

                                    // ! FINAL HERE HERE 
                                    $update = array(
                                        "image_response" => $imgresult,
                                        "image_url" => $imgurl,
                                        "completed" => 1
                                    );
                                    $where = array("_id"=>$_id); // Use appropriate where conditions
                                    $message_2 = $SubDB->performCRUD("tblgenerated", "u", $update, $where);
                                    // ! FINAL HERE HERE

                                    if($imgurl !==""){
   
                                        $credit_id = $SubDB->generateUniqueID();
                                        $inst = array(
                                            "_id" => $credit_id,
                                            "userid" => $user_id,
                                            "credit" => 5,
                                            "type" => "debit",
                                        );
                                        $rk = $SubDB->performCRUD("tblcredit", "i", $inst, $where);
                                        $remaining_credit = $SubDB->countcredit();
                                        $response['credit'] = $remaining_credit;
                                        
                                        $where_f = array("userid" => $user_id);
                                        $userData_f = $SubDB->execute("tblgenerated", $where_f,"","");

                                        $response['i_count'] =  sizeof($userData_f);

                                        $logdata = 'Image saved successfully!'; 
                                        $message = 'Your image has been generated successfully!'; 

                                        $response['logdata'] = $logdata;
                                    }else{
                                        $logdata = 'Failed to download image. Please check the URL.'; 
                                        $message = 'Failed to download image. Please try again.'; 
                                        $response['logdata'] = $logdata;
                                    }
                                        
                                    $response['message_2'] = $message_2;
                                }
                                else {
                                    $message = "Image not generated - Server Error";
                                }
                            }
                        }else{
                            $message = "Server Error - Generate";
                        }
                    } else {
                        $message = "Server Error. No Choices found.";
                    }
                }
            }else{
                $limit=0;
                $message = "Your Free limit is over. Please purchase premium to Continue";
            }
        }else{
            $message = "User Not Found.";
        }
    } else {
        $message = "Please insert your prompt.";
    }
} else {
    $message = "Invalid Request";
}

$log = array(
    "msg" => $msg,
    "user_id" => $user_id
);
$log_where = array("_id"=>$log_id);
$log_message = $SubDB->performCRUD("tblgenapilog", "u", $log, $log_where);


$response['limit']=$limit;
$response['generatedText']=$content;
$response['msg']=$msg;
$response['message']=$message;
$response['imgurl']=$imgurl;
$response['imghtml']=$imghtml;
$response['image_name']=$image_name;
echo json_encode($response);
// echo json_encode(['msg' => $msg]);
?>