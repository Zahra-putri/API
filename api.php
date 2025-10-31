<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Konfigurasi koneksi database
$host = "localhost";
$user = "root";
$pass = ""; // kosongkan jika default XAMPP
$db   = "db_rest"; // nama database Tuan

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die(json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]));
}

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
