<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/function.php') ?>
<?php $menu = getAllMenu() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
     <link rel="stylesheet" href="../assets/css/template.css">
    <link rel="stylesheet" href="../assets/css/about.css">  
    <link rel="stylesheet" href="../assets/css/articles.css">
    <link rel="stylesheet" href="../assets/css/catalog.css">   
    <link rel="stylesheet" href="../assets/css/index.css"> 
    <link rel="stylesheet" href="../assets/css/reviews.css"> 
    <link rel="stylesheet" href="../assets/css/article.css"> 
    <link rel="stylesheet" href="../assets/css/discount.css">
    <link rel="stylesheet" href="../assets/css/contact.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Teko:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">

        <header class="header">
            <div class="header_logo">
                <a href="../index.php"><img src="../assets/img/logo.png" alt=""></a>
            </div>
            <div class="header_links">
                <ul class="header_menu">
                     <?php foreach($menu as $elem): ?>
                    <li><a href="<?php echo $elem['url'] ?>"><?php echo $elem['name'] ?></a></li>
                    <?php endforeach;?>
                    
                    
                   
                </ul>
            </div>
            <div class="icon_links">
                <a href=""><img src="../assets/img/icon_vk.png" alt=""></a>
                <a href=""><img src="../assets/img/icon_insta.png" alt=""></a>
                <a href=""><img src="../assets/img/icon_face.png" alt=""></a>
            </div>
        </header>

