<?php
session_start();
require 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: articles.php');
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT `ID`, `name`, `description`, `img`, `category` FROM `articles` WHERE ID = $id";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    echo "<p>Услуга не найдена.</p>";
    exit;
}

$service = $result->fetch_assoc();
?>

<?php require_once ("../pages/template/header.php") ?>

<div class="content">

<div class="article_1">
        <div class="article_osnova">
        <img height=900px width=100% src="<?php echo htmlspecialchars($service['img']); ?>" alt="<?php echo htmlspecialchars($service['name']); ?>">
        <div class="article_category_2">  <h2><?php echo $service['category']?></h2> 
    </div>
    </div>
    <div class="article_osnova_2">
        <h1><?php echo htmlspecialchars($service['name']); ?></h1>
        <div class="article_block">
        <p><?php echo $service['description']  ?></p>
    </div>
           
        <a href="order.php" style="margin-right: 0px;margin-bottom: 50px;"><button type="submit" name="login" class="btn-form">Смотреть туры</button></a>
    </div>
    </div>
</div>

</div>
<?php require_once ("../pages/template/footer.php") ?>
</body>
</html>

<?php
$conn->close();
?>