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
            $mail->FromName = 'Test';
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
			print_r($jsRes);exit;
			
            return $jsRes;
        }

$strUserFrom = 'test@gmail.com';

$strsubject = "Registration for Test";

$strUserMessage = "Dear <strong>Karthick</strong></br>";
$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";
$strUserMessage .= "Thank you for your interest shown in Testing</br></br>";

$strUserMessage .= "Your application for the program is successfully submitted with registration id</br></br>";


$strUserMessage .= "Once we review your application,</br></br>";

$strUserMessage .= "For any clarifications you can reach out to. </br>";
$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";

$strUserMessage .= "All the Best! </br>";

//$strUserMessage .= "<div> <br>";
//$strUserMessage .= "</div>";
$strUserMessage .= "<div><br><br>Regards <br>Test <br>OTAT</div>";

$userdata['from'] = $strUserFrom;
$userdata['to'] = 'test@gmail.com';
$userdata['name'] = 'test';
$userdata['sub'] = $strsubject;
$userdata['message'] = $strUserMessage;
$jsUserData = json_encode($userdata);
//print_r($userdata);exit;


$mailUserRes = sendAuthMailSkillDevelop($jsUserData);
?>
