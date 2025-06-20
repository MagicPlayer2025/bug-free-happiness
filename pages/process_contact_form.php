<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "gotourist"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contacts (phone, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $phone, $message);

    if ($stmt->execute()) {
        header("Location: contact.php?status=success");
    } else {
        header("Location: contact.php?status=error&message=" . urlencode($stmt->error));
    }

    $stmt->close();
}

$conn->close();
?> 