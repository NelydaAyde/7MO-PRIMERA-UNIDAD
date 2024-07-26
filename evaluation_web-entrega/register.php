<?php
include 'dbconfig.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO usuarios (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    header('Location: login.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
