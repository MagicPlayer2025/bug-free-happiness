<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');
session_start();
$db = getDB();

if (!isset($_GET['id'])) {
    $_SESSION['admin_error'] = 'ID тура не указан.';
    header('Location: /pages/admin/admin-tours.php');
    exit;
}
$id = (int)$_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $image_url = $_POST['image_url'] ?? '';
    $description = $_POST['description'] ?? '';
    $departure_city = $_POST['departure_city'] ?? '';
    $arrival_city = $_POST['arrival_city'] ?? '';
    $nights = (int)($_POST['nights'] ?? 0);
    $flight_type = $_POST['flight_type'] ?? '';
    $hotel_stars = (int)($_POST['hotel_stars'] ?? 0);
    $food_type = $_POST['food_type'] ?? '';
    $has_transfer = $_POST['has_transfer'] ?? '';
    $has_insurance = $_POST['has_insurance'] ?? '';
    $price = (float)($_POST['price'] ?? 0);
    $img_operator = $_POST['img_operator'] ?? '';
    $partner_url = $_POST['partner_url'] ?? '';

    try {
        $stmt = $db->prepare("UPDATE tours SET title=?, image_url=?, description=?, departure_city=?, arrival_city=?, nights=?, flight_type=?, hotel_stars=?, food_type=?, has_transfer=?, has_insurance=?, price=?, img_operator=?, partner_url=? WHERE id=?");
        $stmt->execute([$title, $image_url, $description, $departure_city, $arrival_city, $nights, $flight_type, $hotel_stars, $food_type, $has_transfer, $has_insurance, $price, $img_operator, $partner_url, $id]);
        $_SESSION['admin_message'] = 'Тур успешно обновлён!';
        header('Location: /pages/admin/admin-tours.php');
        exit;
    } catch (PDOException $e) {
        $_SESSION['admin_error'] = 'Ошибка при обновлении тура: ' . $e->getMessage();
    }
}

// Получаем данные тура для формы
$stmt = $db->prepare('SELECT * FROM tours WHERE id = ?');
$stmt->execute([$id]);
$tour = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$tour) {
    $_SESSION['admin_error'] = 'Тур не найден.';
    header('Location: /pages/admin/admin-tours.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать тур</title>
    <link rel="stylesheet" href="/assets/css/template.css">
    <link rel="stylesheet" href="/assets/css/admin-template.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Редактировать тур</h1>
    <?php if (isset($_SESSION['admin_error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($_SESSION['admin_error']); ?></div>
        <?php unset($_SESSION['admin_error']); ?>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input type="text" name="title" class="form-control" required value="<?php echo htmlspecialchars($tour['title']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">URL изображения</label>
            <input type="text" name="image_url" class="form-control" required value="<?php echo htmlspecialchars($tour['image_url']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea name="description" class="form-control" required><?php echo htmlspecialchars($tour['description']); ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Город отправления</label>
            <input type="text" name="departure_city" class="form-control" required value="<?php echo htmlspecialchars($tour['departure_city']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Город прибытия</label>
            <input type="text" name="arrival_city" class="form-control" required value="<?php echo htmlspecialchars($tour['arrival_city']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Ночей</label>
            <input type="number" name="nights" class="form-control" min="1" required value="<?php echo htmlspecialchars($tour['nights']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Тип перелёта</label>
            <select name="flight_type" class="form-control" required>
                <option value="Прямой" <?php if($tour['flight_type']==='Прямой') echo 'selected'; ?>>Прямой</option>
                <option value="С пересадкой" <?php if($tour['flight_type']==='С пересадкой') echo 'selected'; ?>>С пересадкой</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Звёзды отеля</label>
            <input type="number" name="hotel_stars" class="form-control" min="1" max="5" required value="<?php echo htmlspecialchars($tour['hotel_stars']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Тип питания</label>
            <select name="food_type" class="form-control" required>
                <option value="Завтрак" <?php if($tour['food_type']==='Завтрак') echo 'selected'; ?>>Завтрак</option>
                <option value="Завтрак+Ужин" <?php if($tour['food_type']==='Завтрак+Ужин') echo 'selected'; ?>>Завтрак+Ужин</option>
                <option value="Завтрак+Обед" <?php if($tour['food_type']==='Завтрак+Обед') echo 'selected'; ?>>Завтрак+Обед</option>
                <option value="Всё включено" <?php if($tour['food_type']==='Всё включено') echo 'selected'; ?>>Всё включено</option>
                <option value="Без питания" <?php if($tour['food_type']==='Без питания') echo 'selected'; ?>>Без питания</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Трансфер</label>
            <select name="has_transfer" class="form-control" required>
                <option value="Да" <?php if($tour['has_transfer']==='Да') echo 'selected'; ?>>Да</option>
                <option value="Нет" <?php if($tour['has_transfer']==='Нет') echo 'selected'; ?>>Нет</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Страховка</label>
            <select name="has_insurance" class="form-control" required>
                <option value="Да" <?php if($tour['has_insurance']==='Да') echo 'selected'; ?>>Да</option>
                <option value="Нет" <?php if($tour['has_insurance']==='Нет') echo 'selected'; ?>>Нет</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Цена</label>
            <input type="number" name="price" class="form-control" min="0" step="0.01" required value="<?php echo htmlspecialchars($tour['price']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Картинка оператора</label>
            <select name="img_operator" class="form-control" required>
                <option value="../assets/img/1001.png" <?php if($tour['img_operator']==='../assets/img/1001.png') echo 'selected'; ?>>1001 Тур</option>
                <option value="../assets/img/travelata.png" <?php if($tour['img_operator']==='../assets/img/travelata.png') echo 'selected'; ?>>Travelata</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ссылка на партнёра</label>
            <input type="text" name="partner_url" class="form-control" required value="<?php echo htmlspecialchars($tour['partner_url']); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="/pages/admin/admin-tours.php" class="btn btn-secondary">Назад</a>
    </form>
</div>
</body>
</html>