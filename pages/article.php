<?php
session_start();
require 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: articles.php');
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT `ID`, `name`, `description`, `img`, `category`, `сaption_1`, `description_1`, `сaption_2`, `description_2`, `сaption_3`, `description_3` FROM `articles` WHERE ID = $id";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    echo "<p>Услуга не найдена.</p>";
    exit;
}

$service = $result->fetch_assoc();
?>

<?php require_once ("../pages/template/header.php") ?>

<div class="article_1">
        <div class="article_osnova">
        <img height=900px width=100% src="<?php echo htmlspecialchars($service['img']); ?>" alt="<?php echo htmlspecialchars($service['name']); ?>">
        <div class="article_category_2">  <h2><?php echo $service['category']?></h2> 
    </div>
    </div>
    <div class="article_osnova_2">
        <h1><?php echo htmlspecialchars($service['name']); ?></h1>
        <div class="article_block">
        <h2><?php echo htmlspecialchars($service['сaption_1']); ?></h2>
        <p><?php echo htmlspecialchars($service['description_1']); ?></p>
    </div>
            <div class="article_block">
        <h2><?php echo htmlspecialchars($service['сaption_2']); ?></h2>
        <p><?php echo htmlspecialchars($service['description_2']); ?></p>
    </div>
            <div class="article_block">
        <h2><?php echo htmlspecialchars($service['сaption_3']); ?></h2>
        <p><?php echo htmlspecialchars($service['description_3']); ?></p>
    </div>
        <a href="aplication.php" style="margin-right: 0px;margin-bottom: 50px;"><button type="submit" name="login" class="submit-button">Смотреть туры</button></a>
    </div>
    </div>
</div>

<?php require_once ("../pages/template/footer.php") ?>
</body>
</html>

<?php
$conn->close();
?>