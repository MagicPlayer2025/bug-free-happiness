<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/function.php');

$article = null;
$error = '';
$success = '';

if (isset($_GET['id'])) {
    $article_id = (int)$_GET['id'];
    $article = getArticleById($article_id);
    
    if (!$article) {
        header('Location: /pages/admin/admin-articles.php?error=not_found');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article_id = (int)$_POST['article_id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $img = trim($_POST['img']);
    
    if (empty($name) || empty($description) || empty($category)) {
        $error = 'Все поля обязательны для заполнения';
    } else {
        try {
            updateArticle($article_id, $name, $description, $category, $img);
            header('Location: /pages/admin/admin-articles.php?success=updated');
            exit;
        } catch (Exception $e) {
            $error = 'Ошибка при обновлении записи';
        }
    }
    
    $article = getArticleById($article_id);
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
    <title>Редактирование статьи</title>
</head>
<body>
    <div class="wrapper">
        <header class="header_admin">
            <p>GoTourist</p>
            <h1>Редактирование статьи</h1>
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 p-3 sidebar-admin">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/admin-catalog.php">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-active" href="/pages/admin/admin-articles.php">Статьи</a>
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
                            <h3>Редактирование статьи</h3>
                        </div>
                        <div class="card-body">
                            <?php if ($error): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                            <?php endif; ?>
                            
                            <?php if ($article): ?>
                                <form method="POST">
                                    <input type="hidden" name="article_id" value="<?php echo $article['ID']; ?>">
                                    
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Название статьи</label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="<?php echo htmlspecialchars($article['name']); ?>" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Описание</label>
                                        <textarea class="form-control" id="description" name="description" 
                                                  rows="4" required><?php echo htmlspecialchars($article['description']); ?></textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Категория</label>
                                        <input type="text" class="form-control" id="category" name="category" 
                                               value="<?php echo htmlspecialchars($article['category']); ?>" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="img" class="form-label">Путь к изображению</label>
                                        <input type="text" class="form-control" id="img" name="img" 
                                               value="<?php echo htmlspecialchars($article['img']); ?>">
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                        <a href="/pages/admin/admin-articles.php" class="btn btn-secondary">Отмена</a>
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