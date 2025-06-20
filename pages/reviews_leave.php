<?php
require_once 'config.php';

$message = '';
$error = '';
$name = '';
$text = '';
$rating = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $text = htmlspecialchars(trim($_POST['text'] ?? ''));
    $rating = (int)($_POST['rating'] ?? 0);
    
    if (empty($name)) {
        $error = "Пожалуйста, введите ваше имя";
    } elseif (empty($text)) {
        $error = "Пожалуйста, напишите отзыв";
    } elseif ($rating < 1 || $rating > 5) {
        $error = "Пожалуйста, выберите оценку от 1 до 5 звезд";
    } else {
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO reviews (name, text, rating) VALUES (?, ?, ?)");
            $stmt->execute([$name, $text, $rating]);
            
            $message = "Спасибо! Ваш отзыв успешно отправлен.";
            $name = $text = '';
            $rating = 0;
        } catch (PDOException $e) {
            $error = "Ошибка при сохранении отзыва. Пожалуйста, попробуйте позже.";
        }
    }
}
?>

<?php require_once ("../pages/template/header.php") ?>
<div class="reviews_leave_content">
    <div class="reviews_leave_form">
        <h2>Оставить отзыв</h2>
        
        <?php if ($message): ?>
            <div class="reviews_leave_message reviews_leave_success"><?= $message ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="reviews_leave_message reviews_leave_error"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="reviews_leave_form_group">
                <label for="name" class="reviews_leave_label">Ваше имя *</label>
                <input type="text" id="name" name="name" class="reviews_leave_input_text" 
                       value="<?= htmlspecialchars($name) ?>" required>
            </div>
            
            <div class="reviews_leave_form_group">
                <label class="reviews_leave_label">Ваша оценка *</label>
                <div class="reviews_leave_rating_container">
                    <?php for ($i = 5; $i >= 1; $i--): ?>
                        <input type="radio" id="star<?= $i ?>" name="rating" value="<?= $i ?>"
                            <?= $rating == $i ? 'checked' : '' ?>>
                        <label for="star<?= $i ?>" class="reviews_leave_rating_star">★</label>
                    <?php endfor; ?>
                </div>
            </div>
            
            <div class="reviews_leave_form_group">
                <label for="text" class="reviews_leave_label">Текст отзыва *</label>
                <textarea id="text" name="text" class="reviews_leave_textarea" required><?= htmlspecialchars($text) ?></textarea>
            </div>
            
            <button type="submit" class="reviews_leave_submit_btn">Отправить отзыв</button>
        </form>
    </div>
</div>
<?php require_once ("template/footer.php") ?>
