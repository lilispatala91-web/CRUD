<?php
header('Content-Type: application/json');
require '../db.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? 0;

if ($id) {
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql)) {
        echo json_encode(["message" => "User berhasil dihapus"]);
    } else {
        echo json_encode(["message" => "Gagal menghapus user"]);
    }
} else {
    echo json_encode(["message" => "ID user diperlukan"]);
}
?>
