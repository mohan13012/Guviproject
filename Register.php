<?php
isset($_POST['submit']){
  echo  $name=$_POST['name'];
  echo  $email=$_POST['email'];
  echo  $password=$_POST['password'];
  echo  $confirm_password=$_POST['confirm_password'];
}

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "register_page";


$conn = new mysqli($localhost:3306, $root, $root, $register_page);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $password);



$stmt->execute();


$stmt->close();
$conn->close();

?>
