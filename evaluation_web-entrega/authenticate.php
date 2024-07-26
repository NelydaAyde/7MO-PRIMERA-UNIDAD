<?php
session_start();
include 'dbconfig.php';

$name = $_POST['name'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE name = '$name' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['user'] = $name;
    header('Location: dashboard.php');
} else {
    echo "Invalid name or password.";
}
?>
