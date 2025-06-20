<?php require_once ("../pages/template/header.php") ?>
       <?php $services = getAllservices(); ?>
        <div class="content">
            <div class="block_catalog">
                <div class="catalog_content">
                    <h2 class="title text-center">Наши услуги</h2>
                    <p class="catalog_subtitle text-center">Мы помогаем найти лучшие предложения от десятков туристических компаний по всему миру.</p>
                    <div class="catalog_cards">
                            <?php foreach($services as $service):?>
                        <div class="catalog_card">
                            <img src="<?php echo $service['image_url'] ?>" alt="">
                            <h3><?php echo $service['name'] ?></h3>
                            <p><?php echo $service['description'] ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
<?php require_once ("../pages/template/footer.php") ?>