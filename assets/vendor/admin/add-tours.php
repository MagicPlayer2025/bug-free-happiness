<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/function.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = getDB();
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
        $stmt = $db->prepare("INSERT INTO tours (title, image_url, description, departure_city, arrival_city, nights, flight_type, hotel_stars, food_type, has_transfer, has_insurance, price, img_operator, partner_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $image_url, $description, $departure_city, $arrival_city, $nights, $flight_type, $hotel_stars, $food_type, $has_transfer, $has_insurance, $price, $img_operator, $partner_url]);
        $_SESSION['admin_message'] = 'Тур успешно добавлен!';
        header('Location: /pages/admin/admin-tours.php');
        exit;
    } catch (PDOException $e) {
        $_SESSION['admin_error'] = 'Ошибка при добавлении тура: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить тур</title>
    <link rel="stylesheet" href="/assets/css/template.css">
    <link rel="stylesheet" href="/assets/css/admin-template.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Добавить тур</h1>
    <?php if (isset($_SESSION['admin_error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($_SESSION['admin_error']); ?></div>
        <?php unset($_SESSION['admin_error']); ?>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">URL изображения</label>
            <input type="text" name="image_url" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Город отправления</label>
            <input type="text" name="departure_city" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Город прибытия</label>
            <input type="text" name="arrival_city" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ночей</label>
            <input type="number" name="nights" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Тип перелёта</label>
            <select name="flight_type" class="form-control" required>
                <option value="Прямой">Прямой</option>
                <option value="С пересадкой">С пересадкой</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Звёзды отеля</label>
            <input type="number" name="hotel_stars" class="form-control" min="1" max="5" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Тип питания</label>
            <select name="food_type" class="form-control" required>
                <option value="Завтрак">Завтрак</option>
                <option value="Завтрак+Ужин">Завтрак+Ужин</option>
                <option value="Завтрак+Обед">Завтрак+Обед</option>
                <option value="Всё включено">Всё включено</option>
                <option value="Без питания">Без питания</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Трансфер</label>
            <select name="has_transfer" class="form-control" required>
                <option value="Да">Да</option>
                <option value="Нет">Нет</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Страховка</label>
            <select name="has_insurance" class="form-control" required>
                <option value="Да">Да</option>
                <option value="Нет">Нет</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Цена</label>
            <input type="number" name="price" class="form-control" min="0" step="0.01" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Картинка оператора</label>
            <select name="img_operator" class="form-control" required>
                <option value="../assets/img/1001.png">1001 Тур</option>
                <option value="../assets/img/travelata.png">Travelata</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ссылка на партнёра</label>
            <input type="text" name="partner_url" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
        <a href="/pages/admin/admin-tours.php" class="btn btn-secondary">Назад</a>
    </form>
</div>
</body>
</html>
