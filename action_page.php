<?php
   session_start();

 $name=$_POST['name'];
 $rollno=$_POST['roll'];
// $email=$_POST['email'];
 $mobile=$_POST['phone'];
 $room=$_POST['room'];
 $parent=$_POST['parent'];
 $pphone=$_POST['pphone'];
$address=$_POST['add'];
 $out=$_POST['out'];
 $in=$_POST['in'];
$reason=$_POST['reason'];
// $totime=$_POST['totime'];
 $currentDate = date("j/n/Y");
require('fpdf.php');
$pdf = new FPDF();
$title = "STUDENT LEAVE FORM";
$pdf->SetTitle($title);


// $pdf->PrintChapter(1,'A RUNAWAY REEF','20k_c1.txt');
// $pdf->PrintChapter(2,'THE PROS AND CONS','20k_c2.txt');

$pdf->AddPage();
$pdf->SetTopMargin(0);
$pdf->Image('logo.png',2,5,40);

 $pdf->SetFont('helvetica','',16);

$pdf->SetLeftMargin(50);
 $pdf->Cell(0,20,'INDIAN INSTITUTE OF INFORMATION TECHNOLOGY,  ',0,0);
 $pdf->Ln(10);
 $pdf->SetLeftMargin(40);
  $pdf->Cell(0,20,'  DESIGN AND MANUFACTURING, KANCHEEPURAM',0,0);

$pdf->SetFont('helvetica','',12);
$pdf->SetLeftMargin(18);
 $pdf->Ln(10);
$pdf->Cell(0,35,'An Institute of National Importance Established by the Ministry of HRD, Government of India',0,0);

 $pdf->SetFont('helvetica','U',17);
$pdf->SetLeftMargin(80);
$pdf->Ln(25);
$pdf->Cell(0,20,'Leave  Permission Form',0,0);

$pdf->Rect(00,56,300,0);

$pdf->SetFont('helvetica','',12);
$pdf->SetLeftMargin(140);
$pdf->Ln(7);
$pdf->Cell(0,30,'Date: '.$currentDate,0,0);
$pdf->SetLeftMargin(30);
$pdf->Ln(4);

$pdf->Cell(0,50,'Name: '.$name,0,0);
 $pdf->Ln(10);
 $pdf->Cell(0,50,'Roll Number: '.$rollno,0,0);
 $pdf->Ln(10);
 $pdf->Cell(0,50,'Student mobile number: '.$mobile,0,0);
 $pdf->Ln(10);
 $pdf->Cell(0,50,'Room No: '.$room,0,0);
 $pdf->Ln(10);
 $pdf->Cell(0,50,' Parent Name: '.$parent,0,0);
 $pdf->Ln(10);
 $pdf->Cell(0,50,'Parent mobile number: '.$pphone,0,0);
 $pdf->Ln(10);
 $pdf->Cell(0,50,'Address for Communication :  '.$address,0,0);
 $pdf->Ln(10);
 $pdf->Cell(0,50,'OUTGOING :  '.$out,0,0);
 $pdf->Ln(10);
 $pdf->Cell(0,50,'INCOMING :  '.$in,0,0);
 $pdf->Ln(10);
  $pdf->Cell(0,50,'Reason :  '.$reason,0,0);
 $pdf->Ln(10);


$pdf->Ln(25);

$pdf->Rect(0,180,400,0);
$pdf->Ln(10);
$pdf->SetLeftMargin(80);
$pdf->Cell(0,10,"(to be submitted at Main Gate)",0,0);



$pdf->Ln(7);
$pdf->SetFont('helvetica','',12);

$pdf->SetLeftMargin(30);
$pdf->Cell(80,5,'Name of the student: '.$name,0,0);

$pdf->SetLeftMargin(100);
$pdf->Cell(80,5,'Roll No: '.$rollno,0,0);


$pdf->SetLeftMargin(30);
$pdf->Cell(80,5,'Phone Number: '.$mobile,0,0);

$pdf->SetLeftMargin(100);
$pdf->Cell(80,5,'ROOM NO: '.$room,0,0);

$pdf->SetLeftMargin(30);
$pdf->Cell(80,5,'Parent Name: '.$parent,0,0);

$pdf->SetLeftMargin(100);
$pdf->Cell(80,5,'Parent PH : '.$pphone,0,0);


$pdf->SetLeftMargin(30);
$pdf->Cell(80,5,'OUTGOING: '.$out,0,0);

$pdf->SetLeftMargin(100);
$pdf->Cell(80,5,'INCOMING: '.$in,0,0);

$pdf->SetLeftMargin(30);
$pdf->Cell(100,5,'Reason: '.$reason,0,0);






$pdf->SetLeftMargin(140);
$pdf->Ln(16);
$pdf->Cell(10,5,'Controlling officer ',0,0);

$filename="test.pdf";
$pdf->Output($name);
// $pdf->Output($filename,'F');












 ?>
<?php
$servername = "localhost";
$username = "root";
$password = "hemanth";
$dbname = "leave";

include('loggedin.php');


$g = $_SESSION['guser'];
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO data (name,roll,phone,room,parent,pphone,add1,out1,in1,reason,user_info)
VALUES ('$name', '$rollno', '$mobile','$room','$parent','$pphone','$address','$out','$in','$reason','$g')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>









<!DOCTYPE html>
<html>

<head>

    <title>hall request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://github.com/Eonasdan/bootstrap-datetimepicker/blob/master/src/js/bootstrap-datetimepicker.js"></script>

    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <script src="https://use.fontawesome.com/b3f6a18a0c.js"></script>
    <script src="clockface.js"></script>
    <link rel="stylesheet" href="clockface.css">

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
</head>

<body>
    <div class="container" style="margin:50px auto ">
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-info-sign inline"><strong style="padding-left: 10px;">Successfully submitted </strong></span>
        </div>
    </div>
</body>

</html>
