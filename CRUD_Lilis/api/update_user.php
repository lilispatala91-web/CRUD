<?php
header('Content-Type: application/json');
require '../db.php';

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'] ?? 0;
$username = $data['username'] ?? '';
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if ($id) {
    $set = [];
    if ($username) $set[] = "username='$username'";
    if ($email) $set[] = "email='$email'";
    if ($password) $set[] = "password='" . password_hash($password, PASSWORD_DEFAULT) . "'";
    $setClause = implode(", ", $set);

    $sql = "UPDATE users SET $setClause WHERE id=$id";
    if ($conn->query($sql)) {
        echo json_encode(["message" => "User berhasil diupdate"]);
    } else {
        echo json_encode(["message" => "Gagal update user"]);
    }
} else {
    echo json_encode(["message" => "ID user diperlukan"]);
}
?>
