<?php
session_start();

require_once('settings.php');
require_once('google-login-api.php');



?>
<!DOCTYPE html>
<html>
<head>
    <title>Leave Permission</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="951495932281-r4l49a7oub0ug5ponljas5jkh5kab3ln.apps.googleusercontent.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://github.com/Eonasdan/bootstrap-datetimepicker/blob/master/src/js/bootstrap-datetimepicker.js"></script>

    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <script src="https://use.fontawesome.com/b3f6a18a0c.js"></script>
    <script src="clockface.js"></script>
    <link rel="stylesheet" href="clockface.css">


<script src="https://apis.google.com/js/platform.js" async defer></script>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />





    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <script>
        $(document).ready(function() {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })

    </script>






    <script type="text/javascript">
        function validate() {
            var error = "";
            var name = document.getElementById("name");
            if (name.value == /^[A-Za-z]+$/) {
                error = " You Have To Write valid Name. ";
                document.getElementById("error_para").innerHTML = error;
                return false;
            }




            var roll = document.getElementById("roll");
            if (roll.value == "") {
                error = " You Have To Write valid Roll. ";
                document.getElementById("error_para").innerHTML = error;
                return false;
            }





            var phone = document.getElementById("number");
            if (phone.value == "" || phone.value == /^\d{10}$/) {
                error = " You Have To Write valid Number ";
                document.getElementById("error_para").innerHTML = error;
                return false;
            }
            var room = document.getElementById("roomno");
            if (room.value == ""  ) {
                error = " You Have To Write valid Room Number ";
                document.getElementById("error_para").innerHTML = error;
                return false;
            }
            var pname = document.getElementById("pname");
            if (pname.value == /^[A-Za-z]+$/) {
                error = " You Have To Write valid Parent Name ";
                document.getElementById("error_para").innerHTML = error;
                return false;
            }
            var pphone = document.getElementById("pphone");
            if (pphone.value == "" || pphone.value == /^\d{10}$/) {
                error = " You Have To Write valid Number ";
                document.getElementById("error_para").innerHTML = error;
                return false;
            }






        }

    </script>









    <style>
        body,html {
            height: 100%;
            width: 100%;
        }

    </style>

    <?php


    ?>
</head>

<body class="bg">







<a href="<?= 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>" style="padding-top: %">Institute Login</a>




<!--

<img src="HWlogo1.png" style="background: #264F8F; width: 100%; height: 150px; border: solid white 2px;" >

-->
    <div class="container" style="padding-top : 1%;">
        <div class="col-md-8 order-md-1">
            <h3 class="mb-3" style="text-decoration: underline; text-align:center">Student Leave Form : </h3>
            <hr class="mb-4">

            <form class="needs-validation" onsubmit="return validate();" action="" method="post" autocomplete="off">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name of the student</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Name is required.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="roll">ROLL NO</label>
                        <input type="text" class="form-control" name="roll" id="roll" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Roll No. is required.
                        </div>
                    </div>
                         <div class="col-md-2 mb-3">
                        <label for="gender">Gender</label>
                        <select class="custom-select d-block w-100" name="gen" id="gender" required>
                            <option value="">Choose...</option>
                            <option>M</option>
                            <option>F</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Gender.
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="number">Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+91</span>
                            </div>
                            <input type="text" class="form-control" name="phone" id="number" placeholder="" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your Moile Numer is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="hostel">Hostel</label>
                        <select class="custom-select d-block w-100" name="hos" id="hostel" required>
                            <option value="">Choose...</option>
                            <option>Ashwatha</option>
                            <option>Ashoka</option>
                            <option>Jasmine</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="roomno">ROOM NO</label>
                        <input type="text" class="form-control" name="room" id="roomno" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Room No. is required.
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="pname">Parent Name</label>
                        <input type="text" class="form-control" name="parent" id="pname" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid Name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pphone">Parent Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+91</span>
                            </div>
                            <input type="text" class="form-control" name="pphone" id="pphone" placeholder="" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your Moile Numer is required.
                            </div>
                        </div>
                    </div>

                </div>





                <div class="mb-3">
                    <label for="address">Address for communication:</label>
                    <input style="height: 50px" type="text" class="form-control" name="add" id="address" placeholder="" required>
                    <div class="invalid-feedback">
                        Please enter your address.
                    </div>
                </div>
                <div class="row">


                    <div class="col-md-6 mb-3">
                        <label for="odate">OUTGOING </label>
                        <input id="input" width="312" class="form-control" id="idate" name="out" placeholder="HH:MM MM/DD/YYYY" value="" required />
                        <script>
                            $('#input').datetimepicker({ footer: true, modal: true });
    </script>
                        <div class="invalid-feedback">
                            required.
                        </div>
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="idate">INCOMING </label>
                        <input id="input2" width="312" class="form-control" id="idate" name="in" placeholder="HH:MM MM/DD/YYYY" value="" required />
                        <script>
                            $('#input2').datetimepicker({ footer: true, modal: true });
    </script>
                        <div class="invalid-feedback">
                            required.
                        </div>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="address">Reason for leave</label>
                    <input style="height: 50px" type="text" class="form-control" name="reason" id="reason" placeholder="" required>
                    <div class="invalid-feedback">
                        Please enter your reason.
                    </div>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked required>
                    <label class="form-check-label" for="exampleCheck1">My parent is fully aware of my travel plan and assures you that I will abide by the hostel rules. In the event of violation, I lose my eligibility to stay in hostel.</label>
                </div>




                <hr class="mb-4">

                <button class="btn btn-primary disabled "  style="width : 30%;  ">Submit</button>
                <p  style="color: red">Please Login with Institute mail to submit </p>
            </form>
            <p id="error_para" style="color: red"></p>
        </div>

    </div>










    <div class="container" style="padding-top : 5%">
        <div class="row">
            <div class="col">
                <p style="margin-left: 25%">Copyright © 2018 Bharat Institute of Higher Education and Research | All Rights Reserved
                </p>
            </div>
            <div class="col">
                <p style="margin-left: 30%">
                    Phone : <span style="color: #2D40A2">+91-8643-224244 </span> | Fax : <span style="color: #2D40A2">+91-8643-224246</span>| email : mail@biher.ac.in
                </p>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
<?php ob_end_flush(); ?>
