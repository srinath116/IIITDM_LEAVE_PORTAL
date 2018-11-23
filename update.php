<?php
require_once '1w.php';
require_once('connect.php');

$term = mysql_escape_string($term); // Attack Prevention
$pending_id = $_POST['id'];
$status = $_POST['status'];

$con = mysqli_connect($servername, $username, $password,$dbname);
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }


    $stmt = $con->prepare(
        "INSERT INTO user_requests (status, date_responded) VALUES (?, NOW())"
    );
    if ( false===$stmt ) {
     // Check Errors for prepare
        die('User Request update prepare() failed: ' . htmlspecialchars($con->error));
    }
    $stmt->bind_param('s', $status);
    // comment added by php-dev : should be false === $stmt->bind_param ...

    if ( false===$stmt ) {
    // Check errors for binding parameters
        die('User Request update bind_param() failed: ' . htmlspecialchars($stmt->error));
    }
    $stmt->execute();
    // comment added by php-dev : should be false === $stmt->execute ...
    if ( false===$stmt ) {
        die('User Status update execute() failed: ' . htmlspecialchars($stmt->error));
    }
?>
