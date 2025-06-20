<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['article_id'])) {
    $article_id = (int)$_POST['article_id'];
    
    try {
        deleteArticle($article_id);
        header('Location: /pages/admin/admin-articles.php?success=deleted');
        exit;
    } catch (Exception $e) {
        header('Location: /pages/admin/admin-articles.php?error=delete_failed');
        exit;
    }
} else {
    header('Location: /pages/admin/admin-articles.php');
    exit;
}
?> 