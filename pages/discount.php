 <?php require_once ("template/header.php") ?>
 <?php $discounts = getAlldiscount(); ?>

 <div class="content">
    <div class="discount_title">
        <h1>Посмотрите акции</h1>
    </div>
    <div class="block_discount_2">

        <?php foreach($discounts as $discount): ?>
            <div class="discount_card">
             <div class="discount_top">
                 <img src="<?php echo $discount['img']  ?>" alt="">
             </div>
             <div class="discount_base">
                  <h5><?php echo $discount['name']  ?></h5>
                 <p><?php echo $discount['description']  ?></p>
                  <a class="discount_btn" href="article.php?id=<?php echo $discount['ID']; ?>">Попробовать</a>
             </div>
             <div class="discount_category">
                     <?php echo $discount['discount']  ?>
             </div>
         </div>
        <?php endforeach; ?>

    </div>
    
 </div>
 

<?php require_once ("template/footer.php") ?>