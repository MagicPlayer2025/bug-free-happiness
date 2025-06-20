<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/function.php');

$review = null;
$error = '';
$success = '';

if (isset($_GET['id'])) {
    $review_id = (int)$_GET['id'];
    $review = getReviewById($review_id);
    
    if (!$review) {
        header('Location: /pages/admin/admin-reviews.php?error=not_found');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $review_id = (int)$_POST['review_id'];
    $name = trim($_POST['name']);
    $text = trim($_POST['text']);
    $rating = (int)$_POST['rating'];
    
    if (empty($name) || empty($text) || $rating < 1 || $rating > 5) {
        $error = 'Все поля обязательны для заполнения. Рейтинг должен быть от 1 до 5';
    } else {
        try {
            updateReview($review_id, $name, $text, $rating);
            header('Location: /pages/admin/admin-reviews.php?success=updated');
            exit;
        } catch (Exception $e) {
            $error = 'Ошибка при обновлении записи';
        }
    }

    $review = getReviewById($review_id);
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
    <title>Редактирование отзыва</title>
</head>
<body>
    <div class="wrapper">
        <header class="header_admin">
            <p>GoTourist</p>
            <h1>Редактирование отзыва</h1>
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
                            <a class="nav-link nav-link-active" href="/pages/admin/admin-reviews.php">Отзывы</a>
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
                            <h3>Редактирование отзыва</h3>
                        </div>
                        <div class="card-body">
                            <?php if ($error): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                            <?php endif; ?>
                            
                            <?php if ($review): ?>
                                <form method="POST">
                                    <input type="hidden" name="review_id" value="<?php echo $review['ID']; ?>">
                                    
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Имя автора</label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                               value="<?php echo htmlspecialchars($review['name']); ?>" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="text" class="form-label">Текст отзыва</label>
                                        <textarea class="form-control" id="text" name="text" 
                                                  rows="4" required><?php echo htmlspecialchars($review['text']); ?></textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="rating" class="form-label">Рейтинг (1-5)</label>
                                        <select class="form-control" id="rating" name="rating" required>
                                            <option value="1" <?php echo $review['rating'] == '1' ? 'selected' : ''; ?>>1</option>
                                            <option value="2" <?php echo $review['rating'] == '2' ? 'selected' : ''; ?>>2</option>
                                            <option value="3" <?php echo $review['rating'] == '3' ? 'selected' : ''; ?>>3</option>
                                            <option value="4" <?php echo $review['rating'] == '4' ? 'selected' : ''; ?>>4</option>
                                            <option value="5" <?php echo $review['rating'] == '5' ? 'selected' : ''; ?>>5</option>
                                        </select>
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                        <a href="/pages/admin/admin-reviews.php" class="btn btn-secondary">Отмена</a>
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