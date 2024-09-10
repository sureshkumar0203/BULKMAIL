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
    $mail->Host = 'apps.abc.gg.in';
    $mail->Port = 25;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = '';
    $mail->Password = '';


    $mail->From = '';
    $mail->FromName = 'test';
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
$strsubject = "testing";

$strUserMessage = "Dear <strong>Participant</strong>,</br></br>";
$strUserMessage .= "<div> <br></div>";


$strUserMessage .= "Thank you</br></br>";
$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";

$strUserMessage .= "We kindly  :</br></br>";

$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";

$strUserMessage .= "<strong>Link:</strong> dfsf</br>";

$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";


$strUserMessage .= "<strong>Date:</strong> 10th September 2024</br>";
$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";
$strUserMessage .= "<strong>Time:</strong> 5:30 p.m. to 6:00 p.m.</br></br>";

$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";

$strUserMessage .= "Your participation.</br></br>";

$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";


$strUserMessage .= "We look forward</br></br>";

$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";

$strUserMessage .= "<div>Thanks and regards,</br></div>";
$strUserMessage .= "<div><strong>ASD</strong></br></div>";
$strUserMessage .= "<div><strong>FGH</strong></br></div>";

//$emailArray = array('','');
//print_r($emailArray);exit;

include_once("mailList.php");
//print_r($emailArray);exit;
//echo "here";exit;

for($i=0; $i<count($emailArray); $i++){
    $userdata['from'] = $strUserFrom;
    $userdata['to'] = $emailArray[$i];
    $userdata['name'] = 'HELLO';
    $userdata['sub'] = $strsubject;
    $userdata['message'] = $strUserMessage;
	
	
    $jsUserData = json_encode($userdata);
	//print_r($userdata);exit;

    //$mailUserRes = sendAuthMailSkillDevelop($jsUserData);
}

echo "mail send to all participants successfully";exit;
?>
