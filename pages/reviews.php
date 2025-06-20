<?php require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $text = trim($_POST['text'] ?? '');
    $rating = intval($_POST['rating'] ?? 0);
    $date = date('d.m.y'); 

    if ($name && $text && $rating >=1 && $rating <=5) {
        $image = 'images/Group11.png';

        $stmt = $conn->prepare("INSERT INTO reviews (name, text, date, image, rating) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $text, $date, $image, $rating);
        if ($stmt->execute()) {
            header("Location: " . $_SERVER['PHP_SELF']); 
            exit;
        } else {
            echo "Ошибка при добавлении отзыва: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Пожалуйста, заполните все поля и выберите рейтинг.";
    }
}

$result = $conn->query("SELECT * FROM reviews ORDER BY id DESC LIMIT 10");
if (!$result) {
    die("Ошибка выполнения запроса: " . $conn->error);
}
?>       
<?php require_once ("../pages/template/header.php") ?>

<div class="content_reviews">
<div class="reviews_osnova">
<h1>Отзывы наших клиентов</h1>
<p>Нам доверяют десятки путешественников и семей</p>
<a href="reviews_leave.php">Оставить отзыв</a>
</div>
    <div class="feedback_02">
    
     <?php while($row = $result->fetch_assoc()): ?>
      <div class="feedback_2">
        <div class="feedback_real">
          <div class="feedback_real_2">
            <h1 class="avatar_review"><?php echo htmlspecialchars(mb_substr($row['name'], 0, 1, 'UTF-8')); ?></h1>
            <h1><?php echo htmlspecialchars($row['name']); ?></h1>
            <div class="review_rating">
            <?php
            for ($i=1; $i<=5; $i++) {
                if ($i <= intval($row['rating'])) {
                    echo "<img src='../assets/img/Star1.svg' />";
                } else {
                    echo "<img src='../assets/img/Star6.svg' />";
                }
            }
            ?></div>
          </div>
          <h2 class="review_text"><?php echo nl2br(htmlspecialchars($row['text'])); ?></h2>
        </div>
      </div>
     <?php endwhile; ?>

    </div> <!-- feedback_02 -->
</div>
<?php require_once ("../pages/template/footer.php") ?>
    
</body>
</html>