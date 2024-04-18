<?php
 header("Location: contact.html");
 exit();
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$conn = new mysqli('localhost','root','','hotel');
if($conn->connect_error)
{
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into contact(name,email,feedback)values(?,?,?)");
    $stmt->bind_param("sss",$name,$email,$feedback);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}