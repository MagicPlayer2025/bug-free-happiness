<?php
require_once __DIR__ . '/function.php';

$new_username = 'admin'; 
$new_password = '123'; 

$hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

$conn = connect();

try {
   
    $sql_update_admin = "UPDATE admin_users SET username = ?, password_hash = ? WHERE username = ?";
    $stmt_update_admin = $conn->prepare($sql_update_admin);
    $stmt_update_admin->execute([$new_username, $hashed_new_password, 'admin']);

    if ($stmt_update_admin->rowCount() > 0) {
        echo "Логин и пароль администратора успешно обновлены.\n";
    } else {
        echo "Не удалось найти администратора с логином 'admin' или данные не изменились. Возможно, логин уже был изменен ранее.\n";
    }

} catch (PDOException $e) {
    die("Ошибка при работе с базой данных: " . $e->getMessage());
}

$conn = null; 
?> 