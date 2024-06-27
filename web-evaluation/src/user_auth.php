<?php
include '../config.php';

// Función para registrar un nuevo usuario
function registerUser($conn, $username, $email, $password) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Función para autenticar un usuario
function loginUser($conn, $username, $password) {
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashedPassword);
        $stmt->fetch();
        if (password_verify($password, $hashedPassword)) {
            return $id;
        }
    }
    return false;
}
?>
