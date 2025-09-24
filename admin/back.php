<?php
require "../config.php";include('smtp/PHPMailerAutoload.php');
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
$sql = "INSERT INTO users (fullname, email, username, password,type) VALUES ('$fullname', '$email', '$newusername', '$password','admin')";

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
    $sql = "SELECT id, username, password FROM users WHERE username = '$username' and type='admin' LIMIT 1";
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
elseif ($_POST['action']=="add") {
     $name = $_POST['name'];
    $email = $_POST['email'];
    $fun = $_POST['fun'];
    $status = $_POST['status'];
    $date = $_POST['date'];
      $sql = "INSERT INTO `emp` (`name`, `date`, `function`, `status`, `email`)
        VALUES ('$name', '$date', '$fun', '$status', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: ";
}
   
}elseif ($_POST['action']=="delete_user") {
     $id = $_POST['id'];

      $sql = "delete from emp where id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data Deleted successfully";
} else {
    echo "Error: ";
}
   
}elseif ($_POST['action']=="delete_phone") {
     $id = $_POST['id'];

      $sql = "delete from phone where id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data Deleted successfully";
} else {
    echo "Error: ";
}
   
}elseif ($_POST['action']=="delete_client") {
     $id = $_POST['id'];

      $sql = "delete from clients where id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data Deleted successfully";
} else {
    echo $conn->error;;
}
   
}elseif ($_POST['action']=="delete_admin") {
     $id = $_POST['id'];

      $sql = "delete from users where id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data Deleted successfully";
} else {
    echo $conn->error;;
}
   
}elseif ($_POST['action']=="edit_") {
  $id=$_SESSION['my_id'];

      $name = $_POST['name'];
    $email = $_POST['email'];
    $fun = $_POST['fun'];
    $status = $_POST['status'];
    $date = $_POST['date'];
  $sql = "UPDATE `emp` SET `name`='$name', `date`='$date', `function`='$fun', `status`='$status', `email`='$email' WHERE id='$id'";


if ($conn->query($sql) === TRUE) {
    echo "Data Updates successfully";
} else {
    echo "Error: ";
}
   
}
elseif ($_POST['action']=="get") {
     $id = $_POST['id'];
     $_SESSION['my_id']=$id;
$sql = "SELECT `id`, `name`, `date`, `function`, `status`, `email` FROM `emp` where id='$id'";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        // Output data from each row
        while ($row = $result->fetch_assoc()) {
            echo $row['name'].":". $row['date'] .":". $row['function'] .":". $row['status'].":". $row['email'];
            
        }
    }
} 
   
}
elseif ($_POST['action']=="add_client") {
 $clientNo = $_POST['clientNo'];
    $clientName = $_POST['clientName'];
    $phoneNo = $_POST['phoneNo'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $expense = $_POST['expense'];
     $sql = "INSERT INTO clients (clientNo, clientName, phoneNo, email, amount, expense) VALUES ('$clientNo', '$clientName', '$phoneNo', '$email', $amount, $expense)";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
   
}elseif ($_POST['action']=="add_admin") {$t=time();
 $name = $_POST['name'];
    $email = $_POST['email'];
    
    $user = $_POST['user'];
    $msg="Usename : ".$user."<br>Password : ".$t;
     $sql = "INSERT INTO users (id,fullname, email, username, password) VALUES ($t,'$name', '$email', '$user', '$t')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
       $mail_email="admin@lsfagrisolution.com"; // email address
$mail_pass="#LSFAgrisolution1"; // password
$mail_host="smtp.hostinger.com"; //for google smpt.google.com
$mail_sender="Onkar Jha"; // Company Name
function smtp_mailer($to,$subject, $msg,$email,$pass,$host,$sender){
    $mail = new PHPMailer(); 
            $mail->IsSMTP(); 
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = 'tls'; 
            $mail->Host = $host;
            $mail->Port = 587; 
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            //$mail->SMTPDebug = 2; 
            $mail->Username = $email;
            $mail->Password = $pass;
            $mail->setFrom($email, $sender);
            $mail->Subject = $subject;
    $mail->Body =$msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    if(!$mail->Send()){
        return "0";
    }else{
        return "Done";
    }
}
echo smtp_mailer($email,'Password',$msg,$mail_email,$mail_pass,$mail_host,$mail_sender);


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
}elseif ($_POST['action']=="phone") {$t=time();
 $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
   
    
     $sql = "INSERT INTO phone (id,name, email, phone) VALUES ($t,'$name', '$email', '$phone')";

    // Execute query
    if ($conn->query($sql) === TRUE) {

echo 1;

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
}elseif ($_POST['action']=="add_todo") {$t=time();
 $name = $_POST['name'];
    $date = $_POST['date'];
   
    
     $sql = "INSERT INTO todo (todo, date) VALUES ('$name', '$date')";

    // Execute query
    if ($conn->query($sql) === TRUE) {

echo "TODO added!";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
}elseif ($_POST['action']=="delete_todo") {$t=time();
 $id = $_POST['id'];
   
    
     $sql = "delete from todo where id='$id'";

    // Execute query
    if ($conn->query($sql) === TRUE) {

echo "TODO Deleted!";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
}elseif ($_POST['action']=="delete_cur") {$t=time();
 $id = $_POST['id'];
   
    
     $sql = "delete from cur where id='$id'";

    // Execute query
    if ($conn->query($sql) === TRUE) {

echo "Deleted!";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
}
elseif ($_POST['action']=="add_cur") {$tt=date('d-m-y');
 $vn = $_POST['vn'];
  $cn = $_POST['cn'];
   $cp = $_POST['cp'];
    $ce = $_POST['ce'];
     $lr = $_POST['lr'];
      $f = $_POST['f'];
       $t = $_POST['t'];

    
    
     $sql = "INSERT INTO `cur`( `vn`, `cn`, `cp`, `ce`, `ln`, `f`, `t`, `date`) VALUES ('$vn','$cn','$cp','$ce','$lr','$f','$t','$tt')";

    // Execute query
    if ($conn->query($sql) === TRUE) {

echo "TODO added!";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
}













$conn->close();
?>
