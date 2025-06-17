<?php
session_start();
require 'pages/db.php';

$sql = "SELECT `ID`, `name`, `description`, `img`, `category`, `сaption_1`, `description_1`, `сaption_2`, `description_2`, `сaption_3`, `description_3` FROM `articles` LIMIT 2";
$sql2 = "SELECT * FROM `reviews` WHERE 1 LIMIT 3";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
?>
<?php require_once ("pages/template/header.php") ?>
        <div class="content">

            <div class="banner">
                <div class="banner_content">
                <div class="banner_title">
                    <h1 class="title">Куда отправимся на этот раз?</h1>
                    <p>Сравните предложения от более 100 туристических агентств <br>
                    и выберите тур мечты.</p>
                    <a class="btn_action" href="">Забронировать</a>
                </div>
                </div>
            </div>

            <div class="block_about block">
                <div class="about_content">       
                    
                    <div class="about_description">
                     <img src="assets/img/about.jpg" alt="">
                     <div class="title_about">
                          <h2>О нас</h2>
                     <p>
                        Мы — удобный онлайн-сервис по подбору туров от проверенных туроператоров. Помогаем путешественникам экономить время и деньги: подбираем выгодные предложения, находим лучшие варианты отдыха и организуем поездку так, чтобы всё прошло гладко и без лишних хлопот. С нами ваше путешествие станет ещё комфортнее!
                     </p>
                     </div>
                    </div>
                    <div class="about_words">
                        <div class="about_word">
                         <i class="fas fa-globe-americas fa-2x" style="color: #4e9af1;"></i>
                         <h5>Широкий выбор направлений</h3>
                        </div>
                        <div class="about_word">
                             <i class="fas fa-tag fa-2x" style="color: #ff6b6b;"></i>
                             <h5>Выгодные цены и акции</h3>
                        </div>
                        <div class="about_word">
                             <i class="fas fa-headset fa-2x" style="color: #6bcb77;"></i>
                             <h5>Круглосуточная поддержка</h3>
                        </div>
                       
                    
                </div>
            </div>
         </div>

        
            <div class="block_articles block">
            <h2 class="text-center">Полезные статьи</h2>
            <div class="articles_content">
                <?php while($row = $result->fetch_assoc()): ?>
                <div class="article"> 
                    <p class="article_tag">Полезно для новичков*</p>
                    <img src="<?php echo htmlspecialchars($row['img']); ?>" alt="">
                    <div class="title_articles">
                        <h6><?php echo htmlspecialchars($row['name']); ?></h6>
                        <p><?php echo $row['description']  ?></p>
                        <a class="read_articles" href="pages/article.php?id=<?php echo $row['ID']; ?>">ЧИТАТЬ СТАТЬЮ</a>
                    </div>
                                    
                </div>
                <?php endwhile; ?>
                </div>
                <div class="btn_articles">
                    <a class="read_all_articles" href="pages/articles.php">Читать все статьи</a>
                </div>
            </div>
           
            </div>

            <div class="block_discount">
            
            <h2 class="text-center">Горячие предложения</h2>
            <div class="discount_content">
                <div class="discount">
                    <img src="assets/img/beach_dicount.png" alt="">
                    <div class="discount_description">
                      
                        <p class="discount_title">Таиланд, Гоа, Шри-Ланка и др.</p>
                    </div>
                     <p class="discount_percent">-20%</p>
                </div>
                 <div class="discount">
                    <img src="assets/img/beach_discount.jpg" alt="">
                    <div class="discount_description">
                        <p class="discount_title">Пляжный отдых</p>
                    </div>
                     <p class="discount_percent">-30%</p>
                </div>
                 <div class="discount">
                    <img src="assets/img/discount_turi.jpg" alt="">
                    <div class="discount_description">
                          <p class="discount_title">До конца месяца на туры 2024!</p>
                    </div>
                    <p class="discount_percent">-20%</p>
                </div>
                 <div class="discount">
                    <img src="assets/img/itali_discount.jpg" alt="">
                    <div class="discount_description">
                            <p class="discount_title">Италия, Франция, Испания и др.</p>
                    </div>
                    <p class="discount_percent">-15%</p>
                </div>
            </div>
            </div>

            <div class="block_uslugi">
            <h2 class="text-center">Наши услуги</h2>
            <div class="uslugi_content">
                <div class="usluga">
                    <img src="../assets/img/fire_usluga.png" alt="">
                    <div class="usluga_info">
                        <h6 class="usluga_title">
                            Горящие туры
                        </h6>
                        <p class="usluga_descp">Самые выгодные предложения на ближайшие даты от проверенных агентств.</p>
                    </div>
                </div>
                <div class="usluga">
                    <img src="../assets/img/usluga_excur.png" alt="">
                    <div class="usluga_info">
                        <h6 class="usluga_title">
                            Экскурсионные туры
                        </h6>
                        <p class="usluga_descp">Погрузитесь в атмосферу Европы, Азии и СНГ с организованными маршрутами.</p>
                    </div>
                </div>
                <div class="usluga">
                    <img src="../assets/img/beach_usluga.png" alt="">
                    <div class="usluga_info">
                        <h6 class="usluga_title">
                            Пляжный отдых
                        </h6>
                        <p class="usluga_descp">Популярные направления у моря: Турция, Египет, Греция и другие.</p>
                    </div>
                </div>
                <div class="usluga">
                    <img src="../assets/img/russian_usluga.png" alt="">
                    <div class="usluga_info">
                        <h6 class="usluga_title">
                            Туры по России
                        </h6>
                        <p class="usluga_descp">Байкал, Алтай, Кавказ и другие жемчужины внутреннего туризма.</p>
                    </div>
                </div>
            </div>
            </div>
            <div class="form-block">
<div class="form-container">
        <div class="form-header">
            Оставьте свои контакты — мы подберем тур из
            более чем 100 проверенных агентств.
        </div>
        <form action="pages/process_form.php" method="POST">
            <input type="text" name="name" placeholder="Имя" required>
            <input type="tel" name="phone" placeholder="Телефон" required>
            <button type="submit">Отправить</button>
        </form>
    </div></div>
            <div class="block_reviews">
            <h2>Посмотрите отзывы</h2>
            <div class="reviews_content">
                <?php while($row2 = $result2->fetch_assoc()): ?>
                <div class="review_elem">
                    <div class="review_elem_top">
                                    <h1 style="background-image:url(../assets/img/Ellipse1.svg);background-repeat:no-repeat;width:69px; height:69px;display:flex; justify-content:center; align-items:center;">
                                    <?php echo htmlspecialchars(mb_substr($row2['name'], 0, 1, 'UTF-8')); ?>
                        <h6><?php echo htmlspecialchars($row2['name']); ?></h6>
                        <div style='margin-left:auto;margin-right:auto;text-align:center;margin-top:20px;'>
                            <?php
                            for ($i=1; $i<=5; $i++) {
                             if ($i <= intval($row2['rating'])) {
                            echo "<img src='assets/img/Star1.svg' style='width:20px;height:auto;margin-right:3px;' />";
                          } else {
                        echo "<img src='assets/img/Star6.svg' style='width:20px;height:auto;margin-right:3px;' />";}}?></div>
                    </div>
                    <div class="review_elem_bottom">
                        <p class="review_elem_comment">
                            <?php echo nl2br(htmlspecialchars($row2['text'])); ?>
                        </p>
                    </div>
                </div>
                <?php endwhile; ?>
                
            </div>
            <a class="watch_all_reviews" href="pages/reviews.php">Смотреть все отзывы</a>
            </div>

            <div class="block_contact">
            <h2>Где нас найти?</h2>
            <div class="contact_index_content">
                <div class="contact_map" style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/44/izhevsk/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Ижевск</a><a href="https://yandex.ru/maps/44/izhevsk/house/ulitsa_kommunarov_367/YUoYdAZlSkEDQFtsfXR3dHRnYQ==/?indoorLevel=1&ll=53.215344%2C56.865845&utm_medium=mapframe&utm_source=maps&z=16.96" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Коммунаров, 367 — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?indoorLevel=1&ll=53.215344%2C56.865845&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgoxNTYwNTkyMzYwEmvQoNC-0YHRgdC40Y8sINCj0LTQvNGD0YDRgtGB0LrQsNGPINCg0LXRgdC_0YPQsdC70LjQutCwLCDQmNC20LXQstGB0LosINGD0LvQuNGG0LAg0JrQvtC80LzRg9C90LDRgNC-0LIsIDM2NyIKDYLcVEIVoHZjQg%2C%2C&z=16.96" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
                <div class="contact_info_index">
                    <ul>
                        <li>Адрес: Ижевск, Комунаров 367</li>
                        <li>Телефон: +7 (495) 123-45-67</li>
                        <li>Email: info@turput.ru</li>
                        <li>Наши соцсети:  
                <a href=""><i  class=" icon-contact fa-brands fa-vk"></i></a>
                <a href=""><i  class="icon-contact fa-brands fa-instagram"></i></a>
                <a href=""><i class="icon-contact fa-brands fa-facebook"></i></a>
           </li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
        
<?php require_once ("pages/template/footer.php") ?>