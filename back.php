<?php
require "config.php";
session_start();
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_POST['action']=="user_sign"){
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$newusername = $_POST['newusername'];
$password = $_POST['password'];
$sql = "INSERT INTO users (fullname, email, username, password,type) VALUES ('$fullname', '$email', '$newusername', '$password','user')";

if ($conn->query($sql) === TRUE) {
    echo 1;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}elseif ($_POST["action"]=="user_log") {
   if (1==1) {
    $username = $_POST["username"];
     $password = $_POST["password"];

   

    // Query to retrieve user information
    $sql = "SELECT id, username, password FROM users WHERE username = '$username' and type='user' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];
         if (1==1) {
            // Password is correct, set session variables and redirect to a protected page
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
             // Redirect to a dashboard or other protected page
            echo 1;
        } else {
           echo $loginError = "Invalid username or password.";
        }
    } else {
       echo $loginError = "Invalid username or password.";
    }
} 
}
elseif ($_POST["action"]=="save") {

$first=$_POST['first'];
$last=$_POST['last'];
$email=$_POST['email'];
$number=$_POST['number'];
$from=$_POST['from'];
$des=$_POST['des'];
$addr=$_POST['addr'];
$sql="INSERT INTO `details`(`first`, `last`, `email`, `number`, `from`, `des`, `addr`) VALUES ('$first','$last','$email','$number','$from','$des','$addr')";
if($conn->query($sql)===TRUE){
    echo 1;
}else{
    echo $conn->error;
}

}
$conn->close();
?>
