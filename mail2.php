<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include('declare.php');
$id=$_POST['id'];
$reason =$_POST['reason'];
// echo $to;
 require_once('connect.php');

     $conn = mysql_connect($servername, $username, $password);
     mysql_select_db('leave');



    $result = mysql_query("UPDATE data set status='2' where id='".$id."'",$conn);
    $result1=mysql_query("SELECT  * from DATA WHERE id='".$id"'",$conn);
    $row=mysql_fetch_row($result1);
    $email=$row["email"];




     if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
require_once('connect.php');


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $mailhost ;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "ced15i033@iiitdm.ac.in";                 // SMTP username
    $mail->Password = "Sreenath@15";                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('ced15i033@iiitdm.ac.in', 'srinath kokkalla');
    $mail->addAddress($smail);   
       // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content

    $body = '<p>Dear Student, Your application with id '.$id.' for student leave has been rejected for the reason : '.$reason.'.</p>';
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Re. Permission';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);


    if($mail->send())
    {
        header("Location: 1w.php");

    }

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
