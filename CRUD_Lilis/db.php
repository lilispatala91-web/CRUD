<?php
$host = "localhost";
$user = "root";
$pass = "lilispatala";
$dbname = "crud_api";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Koneksi gagal: " . $conn->connect_error]));
}
?>
