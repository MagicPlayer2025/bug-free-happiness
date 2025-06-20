<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');
session_start();
if (!isset($_POST['tour_id'])) {
    $_SESSION['admin_error'] = 'ID тура не указан.';
    header('Location: /pages/admin/admin-tours.php');
    exit;
}
$id = (int)$_POST['tour_id'];
try {
    $db = getDB();
    $stmt = $db->prepare('DELETE FROM tours WHERE id = ?');
    $stmt->execute([$id]);
    $_SESSION['admin_message'] = 'Тур успешно удалён!';
} catch (PDOException $e) {
    $_SESSION['admin_error'] = 'Ошибка при удалении тура: ' . $e->getMessage();
}
header('Location: /pages/admin/admin-tours.php');
exit;
