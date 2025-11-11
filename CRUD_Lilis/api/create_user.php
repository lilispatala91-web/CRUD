<?php
header('Content-Type: application/json');
require '../db.php';

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'] ?? '';
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if ($username && $email && $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql)) {
        echo json_encode(["message" => "User berhasil ditambahkan"]);
    } else {
        echo json_encode(["message" => "Gagal menambahkan user"]);
    }
} else {
    echo json_encode(["message" => "Data tidak lengkap"]);
}
?>
