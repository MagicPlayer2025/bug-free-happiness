<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-articles.php');
    exit;
}

$name = validate($_POST['name'] ?? '');
$category = validate($_POST['category'] ?? '');
$description = validate($_POST['description'] ?? '');
$img = validate($_POST['img'] ?? '');

if (empty($name)) {
    $_SESSION['admin_error'] = 'Название обязательно';
} elseif (empty($img)) {
    $_SESSION['admin_error'] = 'Путь к изображению обязателен';
} else {
    $sql = "INSERT INTO articles (name, category, description, img) VALUES (?, ?, ?, ?)";
    if (make($sql, [$name, $category, $description, $img])) {
        $_SESSION['admin_message'] = 'Статья добавлена';
    } else {
        $_SESSION['admin_error'] = 'Ошибка добавления';
    }
}

header('Location: /pages/admin/admin-articles.php');
exit;