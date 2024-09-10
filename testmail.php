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
            $mail->Host = 'apps.odishaone.gov.in';
            $mail->Port = 25;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = 'skillodisha@odishaone.gov.in';
            $mail->Password = 'zHGy2)32H<&?';


            $mail->From = 'skillodisha@odishaone.gov.in';
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
			print_r($jsRes);exit;
			
            return $jsRes;
        }

$strUserFrom = 'skillodisha@odishaone.gov.in';

$strsubject = "Registration for Test";

$strUserMessage = "Dear <strong>Karthick</strong></br>";
$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";
$strUserMessage .= "Thank you for your interest shown in Digital Skilling Program of OSDA.</br></br>";

$strUserMessage .= "Your application for the program is successfully submitted with registration id</br></br>";


$strUserMessage .= "Once we review your application, we will enrol your application for the said course subject to meeting the guidelines of program. </br></br>";

$strUserMessage .= "For any clarifications you can reach out to <strong> <a href='mailto:skilldev.osda@gmail.com '>skilldev.osda@gmail.com </a></strong> with your registration number. </br>";
$strUserMessage .= "<div> <br>";
$strUserMessage .= "</div>";

$strUserMessage .= "All the Best! </br>";

//$strUserMessage .= "<div> <br>";
//$strUserMessage .= "</div>";
$strUserMessage .= "<div><br><br>Regards <br>Skill Development Team <br>OSDA</div>";

$userdata['from'] = $strUserFrom;
$userdata['to'] = 'karthickmanoharan271186@gmail.com';
$userdata['name'] = 'Odisha Skill Development Authority';
$userdata['sub'] = $strsubject;
$userdata['message'] = $strUserMessage;
$jsUserData = json_encode($userdata);
//print_r($userdata);exit;


$mailUserRes = sendAuthMailSkillDevelop($jsUserData);
?>