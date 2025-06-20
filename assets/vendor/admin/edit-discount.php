<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/function.php');

$discount = null;
$error = '';
$success = '';


if (isset($_GET['id'])) {
    $discount_id = (int)$_GET['id'];
    $discount = getDiscountById($discount_id);
    
    if (!$discount) {
        header('Location: /pages/admin/admin-discount.php?error=not_found');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $discount_id = (int)$_POST['discount_id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $date = trim($_POST['date']);
    $discount_value = trim($_POST['discount']);
    
    if (empty($name) || empty($description) || empty($date) || empty($discount_value)) {
        $error = 'Все поля обязательны для заполнения';
    } else {
        try {
            updateDiscount($discount_id, $name, $description, $date, $discount_value);
            header('Location: /pages/admin/admin-discount.php?success=updated');
            exit;
        } catch (Exception $e) {
            $error = 'Ошибка при обновлении записи';
        }
    }

    $discount = getDiscountById($discount_id);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/template.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/admin-template.css"> 
    <title>Редактирование акции</title>
</head>
<body>
    <div class="wrapper">
        <header class="header_admin">
            <p>GoTourist</p>
            <h1>Редактирование акции</h1>
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 p-3 sidebar-admin">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/admin-catalog.php">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/admin-articles.php">Статьи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/admin-reviews.php">Отзывы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-active" href="/pages/admin/admin-discount.php">Акции</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Туры</a>
                        </li>
                        <li class="nav-item"> 
                            <a class="exit" href="/assets/vendor/admin/logout.php">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i> Выход
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-10 p-3">
                    <div class="card">
                        <div class="card-header">
                            <h3>Редактирование акции</h3>
                        </div>
                        <div class="card-body">
                            <?php if ($error): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                            <?php endif; ?>
                            
                            <?php if ($discount): ?>
                                <form method="POST">
                                    <input type="hidden" name="discount_id" value="<?php echo $discount['ID']; ?>">
                                    
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Название акции</label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="<?php echo htmlspecialchars($discount['name']); ?>" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Описание</label>
                                        <textarea class="form-control" id="description" name="description" 
                                                  rows="4" required><?php echo htmlspecialchars($discount['description']); ?></textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Дата</label>
                                        <input type="text" class="form-control" id="date" name="date" 
                                               value="<?php echo htmlspecialchars($discount['date']); ?>" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="discount" class="form-label">Скидка</label>
                                        <input type="text" class="form-control" id="discount" name="discount" 
                                               value="<?php echo htmlspecialchars($discount['discount']); ?>" required>
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                        <a href="/pages/admin/admin-discount.php" class="btn btn-secondary">Отмена</a>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 