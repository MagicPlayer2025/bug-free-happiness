<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-catalog.php');
    exit;
}

$name = validate($_POST['name'] ?? '');
$description = validate($_POST['description'] ?? '');
$img = validate($_POST['img'] ?? '');

if (empty($name)) {
    $_SESSION['admin_error'] = 'Название обязательно';
} elseif (empty($img)) {
    $_SESSION['admin_error'] = 'Путь к изображению обязателен';
} else {
    $sql = "INSERT INTO services (name, description, image_url) VALUES (?, ?, ?)";
    if (make($sql, [$name, $description, $img])) {
        $_SESSION['admin_message'] = 'Товар добавлен';
    } else {
        $_SESSION['admin_error'] = 'Ошибка добавления';
    }
}

header('Location: /pages/admin/admin-catalog.php');
exit;