<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['service_id'])) {
    $service_id = (int)$_POST['service_id'];
    
    try {
        deleteService($service_id);
        header('Location: /pages/admin/admin-catalog.php?success=deleted');
        exit;
    } catch (Exception $e) {
        header('Location: /pages/admin/admin-catalog.php?error=delete_failed');
        exit;
    }
} else {
    header('Location: /pages/admin/admin-catalog.php');
    exit;
}
?> 