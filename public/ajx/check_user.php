<?php 
$mail = "hola@hola.com";
$mail = filter_var( $mail, FILTER_SANITIZE_EMAIL );
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ci4_blog";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    return 'error';
    die("Connection Failed : " . $conn->connect_error);
}

$check =  mysqli_query($conn,"SELECT * FROM users WHERE mail = '".$mail."'");
$res = $check->num_rows;
if($res > 0) {
    $r = "error";
} else {
    $r = "ok";
}

?>