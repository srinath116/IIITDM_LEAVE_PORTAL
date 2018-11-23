<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include('declare.php');
$id = $_POST['id'];

$fromdate=$_POST['from'];
$todate=$_POST['to'];


// echo $to;
 require_once('connect.php');

     $conn = mysql_connect($servername, $username, $password);
     mysql_select_db('leave');
    $result = mysql_query("UPDATE data set status='1' where id='".$id."'",$conn);
 $result1 = mysql_query("SELECT * FROM data where id='".$id."'",$conn);

$row = mysql_fetch_array($result1);
$smail = $row['email'];
$pmail = $row['pmail'];

if(empty($fromdate) && empty($todate)){

    $result = mysql_query("UPDATE data set status='1' where id='".$id."'",$conn);
}
elseif(!empty($fromdate) && !empty($todate)) {
    $result = mysql_query("UPDATE data set status='1' , out1= '".$fromdate."' , in1 = '".$todate."' where id='".$id."'",$conn);
}




 $result1 = mysql_query("SELECT * FROM data where id='".$id."'",$conn);

$row = mysql_fetch_array($result1);
$smail = $row['email'];
$pmail = $row['pmail'];
$in1 = $row['in1'];
$out1 = $row['out1'];

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
<<<<<<< HEAD
    $mail->setFrom('ced15i033@iiitdm.ac.in', 'srinath kokkalla');
=======
    $mail->setFrom('54321hemanth@gmail.com', 'Hemanth Kumar');
>>>>>>> 30d72f0da8f957972eac919de968c972b91cbef8
    $mail->addAddress($smail);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content

    $body = '<p>Dear Student, Your application with id '.$id.' for student leave has been approved from : '.$out1.' to '.$in1.'.</p>';
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Re. Permission';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);
$mail->send();
     //Recipients
<<<<<<< HEAD
    $mail->setFrom('ced15i033@iiitdm.ac.in', 'srinath kokkalla');
=======
    $mail->setFrom('54321hemanth@gmail.com', 'Hemanth Kumar');
>>>>>>> 30d72f0da8f957972eac919de968c972b91cbef8
    $mail->addAddress($pmail);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
<<<<<<< HEAD
=======

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content

    $body = '<p>Dear Parent, Your son/daughter is leaving college from : '.$out1.' to '.$in1.'.</p>';
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Re. Leave';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);
$mail->send();


>>>>>>> 30d72f0da8f957972eac919de968c972b91cbef8

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content

    $body = '<p>Dear Parent, Your son/daughter is leaving college from : '.$fromdate.' to '.$todate.'.</p>';
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Re. Leave';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);
$mail->send();
    
    
    

if($mail->send())
    {
        header("Location: 1w.php");

    }


} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
