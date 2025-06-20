<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ($_SERVER['DOCUMENT_ROOT'] . '/function.php');

$service = null;
$error = '';
$success = '';

if (isset($_GET['id'])) {
    $service_id = (int)$_GET['id'];
    $service = getServiceById($service_id);

    if (!$service) {
        echo 'Услуга не найдена!';
        exit;
    }
} else {
    echo 'ID не передан!';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_id = (int)$_POST['service_id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $image_url = trim($_POST['image_url']);

    if (empty($name) || empty($description)) {
        $error = 'Все поля обязательны для заполнения';
    } else {
        try {
            updateService($service_id, $name, $description, $image_url);
            header('Location: /pages/admin/admin-catalog.php?success=updated');
            exit;
        } catch (Exception $e) {
            $error = 'Ошибка при обновлении записи';
        }
    }

    $service = getServiceById($service_id);
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
    <title>Редактирование услуги</title>
</head>
<body>
    <div class="wrapper">
        <header class="header_admin">
            <p>GoTourist</p>
            <h1>Редактирование услуги</h1>
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 p-3 sidebar-admin">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link nav-link-active" href="/pages/admin/admin-catalog.php">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/admin-articles.php">Статьи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/admin-reviews.php">Отзывы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/admin-discount.php">Акции</a>
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
                            <h3>Редактирование услуги</h3>
                        </div>
                        <div class="card-body">
                            <?php if ($error): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                            <?php endif; ?>

                            <?php if ($service): ?>
                                <form method="POST">
                                    <input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Название услуги</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="<?php echo htmlspecialchars($service['name']); ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Описание</label>
                                        <textarea class="form-control" id="description" name="description"
                                                  rows="4" required><?php echo htmlspecialchars($service['description']); ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image_url" class="form-label">Путь к изображению</label>
                                        <input type="text" class="form-control" id="image_url" name="image_url"
                                               value="<?php echo htmlspecialchars($service['image_url']); ?>">
                                    </div>

                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                        <a href="/pages/admin/admin-catalog.php" class="btn btn-secondary">Отмена</a>
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