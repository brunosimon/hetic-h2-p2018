<?php

/* CONFIG */
$to             = 'simon.bruno.77@gmail.com';                //Target
$gmail_username = 'simon.bruno.77@gmail.com';                //Your gmail login
$gmail_password = '';                //Your gmail password
$subject        = 'Newsletter';         //Mail subject
$newsletter     = 'newsletter.html'; //Path to newsletter template

/* SCRIPT */
require_once 'phpmailer/class.phpmailer.php';
$html = file_get_contents($newsletter);

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth   = true;
$mail->SMTPSecure = 'ssl';
$mail->Host       = 'smtp.gmail.com';
$mail->Port       = 465;
$mail->Username   = $gmail_username;
$mail->Password   = $gmail_password;
$mail->Subject    = $subject;
$mail->SetFrom($to);
$mail->MsgHTML($html);
$mail->AddAddress($to);

if(!$mail->Send())
{
    echo 'Error: ' . $mail->ErrorInfo;
}
else
{
    echo 'Sent !';
}