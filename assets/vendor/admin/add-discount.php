<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-discount.php');
    exit;
}

$name = validate($_POST['name'] ?? '');
$description = validate($_POST['description'] ?? '');
$date = validate($_POST['date'] ?? '');
$discount = validate($_POST['discount'] ?? '');
$img = validate($_POST['img'] ?? '');

if (empty($name)) {
    $_SESSION['admin_error'] = 'Название обязательно';
} elseif (empty($img)) {
    $_SESSION['admin_error'] = 'Путь к изображению обязателен';
} else {
    $sql = "INSERT INTO stocks (name, description, date, discount, img) VALUES (?, ?, ?, ?, ?)";
    if (make($sql, [$name, $description, $date, $discount, $img])) {
        $_SESSION['admin_message'] = 'Акция добавлена';
    } else {
        $_SESSION['admin_error'] = 'Ошибка добавления';
    }
}

header('Location: /pages/admin/admin-discount.php');
exit;