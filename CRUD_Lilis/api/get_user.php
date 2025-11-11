<?php
header('Content-Type: application/json');
require '../db.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["message" => "User tidak ditemukan"]);
}
?>
