<?php require_once ("../pages/template/header.php") ?>
        
<div class="content">

    
        <h1 class="article_title">Почитайте статьи</h1>
    
            <div class="articles">

            <?php 
            $articles = getAllarticles();
            ?>

                <?php foreach($articles as $article): ?>
                <div class="article_card">
                    <div class="article_top">
                        <img src="<?php echo $article['img']  ?>" alt="">
                    </div>
                    <div class="article_base">
                        <h5><?php echo $article['name']  ?></h5>
                        <p><?php echo mb_substr($article['description'], 0, 150) . '...'; ?></p>
                        <a class="article_btn" href="article.php?id=<?php echo $article['ID']; ?>">Читать далее</a>
                    </div>
                    <div class="article_category">
                        <?php echo $article['category']  ?>
                    </div>
                </div>
                    <?php endforeach; ?>

            </div>
        </div>

<?php require_once ("../pages/template/footer.php") ?>