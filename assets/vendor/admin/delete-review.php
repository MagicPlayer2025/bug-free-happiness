<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review_id'])) {
    $review_id = (int)$_POST['review_id'];
    
    try {
        deleteReview($review_id);
        header('Location: /pages/admin/admin-reviews.php?success=deleted');
        exit;
    } catch (Exception $e) {
        header('Location: /pages/admin/admin-reviews.php?error=delete_failed');
        exit;
    }
} else {
    header('Location: /pages/admin/admin-reviews.php');
    exit;
}
?> 