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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>




<body>

<?php


    require_once('connect.php');

     $conn = mysql_connect($servername, $username, $password);
     mysql_select_db('leave');
     $gender="M";
     $status="0";
    $result = mysql_query("SELECT * FROM data  where  gender= '".$gender."' and status='".$status."'" ,$conn);


     if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}



        if(mysql_num_rows($result) == 0) {

            echo "No pending approvals";
            exit;
        }

        else {
            $arr=array();
           $i=0;
           $count = mysql_num_rows($result);
             while($i<$count){
              $row=mysql_fetch_array($result);
              $arr[]=$row;
           $i++;
        }

            }






    ?>


<div class="container-fluid" style="padding: 0">

<div class="col-lg-12" style="padding: 0; margin-bottom: 50px">


    <img src="HWlogo1.png" style="background: #264F8F; width: 100%; height: 200px;" >



</div>
<div class="container-fluid">
  <h2 style="text-align:  center;"> Student Leave Approval</h2>
<table class="table table-hover" >
    <tr>
      <th  style="padding-left:  4em; background-color: #3498db;">id</th>
      <th style="padding-left:  4em; background-color: #3498db;"> name </th>
      <th style="padding-left:  6.5em;  background-color: #3498db;">reason </th>
      <th style="padding-left:  4em;  background-color: #3498db;">outgoing date </th>
      <th style="padding-left:  4em;  background-color: #3498db;"> incoming date </th>

      <th style="padding-left:  4em;  background-color: #3498db;"> Action </th>

    </tr>













<?php
      foreach ($arr as $row) {


       ?>
        <tr>
          <td style="padding-left:  4em;">
            <?php echo  $row["roll"] ; ?>
          </td>
          <td style="padding-left:  4em;">
            <a ><?php echo $row["name"]  ;  ?>
          </td>
          <td style="padding-left:  6.5em;">
           <?php echo   $row["reason"]; ?>
          </a></td >
           <td style="padding-left:  4em;">
            <?php echo  $row["out1"]; ?>
          </td>
           <td style="padding-left:  4em;">
            <?php echo  $row["in1"]; ?>
          </td>
           <td style="padding-left:  4em;">
            <button class="btn btn-primary" id="<?php echo($row["id"]) ?>" onclick="approve(this.id)"> accept</button> <button class="btn btn-danger" id="<?php echo($row["id2"]) ?>" onclick="approve(this.id2)"> reject</button>
          </td>


        </tr>

    <?php
      }
     ?>


    </table>

</div>
</div>
































 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <div class="w3-container">

    <div id="id01" class="w3-modal">
      <div class="w3-modal-content">

        <header class="w3-container w3-teal">
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <h2>Approve leave</h2>
        </header>

        <div class="w3-container">
          <form method="post" action="mail.php" autocomplete="off">
            <input type="hidden" name="id" id="userid">
             <div class="form-group">
              <label for="from"> from</label>
               <input type="date" name="from" >
             </div>
             <div class="form-group">
              <label for="to"> to</label>
               <input type="date" name="to">
             </div>
             <button class="btn btn-primary" type="submit" name="btn-approve">approve</button>
            </form>
        </div>


      </div>
    </div>
<script type="text/javascript">
  function approve(id) {
document.getElementById('id01').style.display='block'
document.getElementById("userid").value=id;

  }
</script>

</body>

</html>
