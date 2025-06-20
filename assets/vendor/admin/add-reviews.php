<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /pages/admin/admin-reviews.php');
    exit;
}

$name = validate($_POST['name'] ?? '');
$comment = validate($_POST['comment'] ?? '');
$rating = validate($_POST['rating'] ?? '');

if (empty($name)) {
    $_SESSION['admin_error'] = 'Название обязательно';
} elseif (empty($comment)) {
    $_SESSION['admin_error'] = 'Комментарий обязателен';
} elseif (!is_numeric($rating) || $rating < 1 || $rating > 5) {
    $_SESSION['admin_error'] = 'Рейтинг должен быть числом от 1 до 5';
} else {
    $sql = "INSERT INTO reviews (name, text, rating, date) VALUES (?, ?, ?, NOW())";
    if (make($sql, [$name, $comment, $rating])) {
        $_SESSION['admin_message'] = 'Отзыв успешно добавлен';
    } else {
        error_log("Database error in add-review.php");
        $_SESSION['admin_error'] = 'Ошибка при добавлении отзыва';
    }
}

header('Location: /pages/admin/admin-reviews.php');
exit;
?>