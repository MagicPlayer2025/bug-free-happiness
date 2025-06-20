<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['discount_id'])) {
    $discount_id = (int)$_POST['discount_id'];
    
    try {
        deleteDiscount($discount_id);
        header('Location: /pages/admin/admin-discount.php?success=deleted');
        exit;
    } catch (Exception $e) {
        header('Location: /pages/admin/admin-discount.php?error=delete_failed');
        exit;
    }
} else {
    header('Location: /pages/admin/admin-discount.php');
    exit;
}
?> 