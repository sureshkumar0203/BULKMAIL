<?php
define('APP_PATH',$_SERVER['DOCUMENT_ROOT'] .'/'.'Application/');
define('PHP_MAILER_PATH', APP_PATH.'PHPMailer/');

//echo APP_PATH."---".PHP_MAILER_PATH;exit;

function sendAuthMailSkillDevelop($jsData){
    include_once(PHP_MAILER_PATH."PHPMailerAutoload.php");
            
    $data           = json_decode($jsData);
    $mail           = new PHPMailer;

    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'apps.abc.gov.in';
    $mail->Port = 25;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = '';
    $mail->Password = '';


    $mail->From = '';
    $mail->FromName = 'Skill Development Program';
    $mail->addAddress($data->to, $data->name);            
    $mail->isHTML(true);

    $mail->Subject = $data->sub;
    $mail->Body = $data ->message;
    //print_r($mail);exit;
    if(!$mail->send()) {
        $res['msg'] = "Mailer Error: " . $mail->ErrorInfo;
    } 
    else{
        $res['msg'] = "Success";
    }
    $jsRes = json_encode($res);
	//print_r($jsRes);exit;
	return "Success";
    //return $jsRes;
}

$strUserFrom = '';
$strsubject = "Invitation to Join OSDA-FITT IITD Orientation Program Test Run";

$strUserMessage = "Dear <strong>Participant</strong>,</br></br>";
$strUserMessage .= "<div> <br></div>";


$strUserMessage .= "Thank you for registering for the OSDA-FITT IITD Orientation Program. We are excited to inform you that we will be conducting a test run of the orientation program to ensure everything operates smoothly during the main event.</br></br>";
$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";

$strUserMessage .= "We kindly request your participation in this test run, which will help us provide a seamless experience for everyone. Please find the details to join the test run session below:</br></br>";

$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";

$strUserMessage .= "<strong>Link:</strong> <a href='https://events.teams.microsoft.com/event/b7d346de-7a7f-4236-ac6b-45ed74534f22@c043f805-00ce-4f56-8770-bc3468f13ada'>Microsoft Teams Event</a></br>";

$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";


$strUserMessage .= "<strong>Date:</strong> 10th September 2024</br>";
$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";
$strUserMessage .= "<strong>Time:</strong> 5:30 p.m. to 6:00 p.m.</br></br>";

$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";

$strUserMessage .= "Your participation and feedback will be invaluable in fine-tuning the program. Should you encounter any issues or have questions during the session, please do not hesitate to reach out to us at <a href='mailto:coe.osda.iitdelhi@gmail.com'>coe.osda.iitdelhi@gmail.com</a>.</br></br>";

$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";


$strUserMessage .= "We look forward to your involvement.</br></br>";

$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";

$strUserMessage .= "<div>Thanks and regards,</br></div>";
$strUserMessage .= "<div><strong>Skill Development Team</strong></br></div>";
$strUserMessage .= "<div><strong>OSDA</strong></br></div>";

//$emailArray = array('','');
//print_r($emailArray);exit;

include_once("mailList.php");
//print_r($emailArray);exit;
//echo "here";exit;

for($i=0; $i<count($emailArray); $i++){
    $userdata['from'] = $strUserFrom;
    $userdata['to'] = $emailArray[$i];
    $userdata['name'] = 'Odisha Skill Development Authority';
    $userdata['sub'] = $strsubject;
    $userdata['message'] = $strUserMessage;
	
	
    $jsUserData = json_encode($userdata);
	//print_r($userdata);exit;

    //$mailUserRes = sendAuthMailSkillDevelop($jsUserData);
}

echo "mail send to all participants successfully";exit;
?>
