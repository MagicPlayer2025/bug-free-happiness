<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "gotourist";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];


    $stmt = $conn->prepare("INSERT INTO form (name, phone) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $phone);

    if ($stmt->execute()) {
        echo "Данные успешно сохранены.";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?> 