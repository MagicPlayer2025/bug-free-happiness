<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/config.php');
    //Подключение к бд
    function connect(){
        $driver = 'mysql';
        $host = 'localhost';
        $db_name = 'gotourist';
        $db_user = 'root';
        $db_password = '';
        $charset = 'utf8mb4';

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
            PDO::ATTR_EMULATE_PREPARES => false, 
        ];

        try{
            return new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_password);
        }catch(PDOException $e){
            die('Нет подключения к базе данных, Ошибка - ' . $e->getMessage());
        }
    }

     function getAllmenu() {
        return query("
            SELECT ID, name, url FROM menu
            
        ");
     }
     function validate($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}
function make($sql, $params = []) {
    $sth = connect();
    $sth = $sth->prepare($sql);
    return $sth->execute($params);
}
    function query($sql, $params = []){
        $sth = connect();
        $sth = $sth->prepare($sql);
        $sth->execute($params);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        if(!$result) return [];
        return $result;
    }

      function getAllarticles() {
        return query("
            SELECT ID, name, description, img, category FROM articles
            
        ");
     
    }
     function getAlldiscount() {
        return query("
            SELECT ID, name, date, description, img, discount FROM stocks
            
        ");
     }
    function getAllreviews(){
        return query(
            "
            SELECT * FROM reviews"
        );
    }
     function getAllservices(){
        return query(
            "
            SELECT * FROM services WHERE 1"
        );
    }

    function getAllTours() {
    return  query(
        "SELECT * FROM tours"
    );
     
}
    function deleteService($id) {
    return query("DELETE FROM services WHERE id = ?", [$id]);
}


function updateService($id, $name, $description, $image_url) {
    return query("UPDATE services SET name = ?, description = ?, image_url = ? WHERE id = ?", 
                 [$name, $description, $image_url, $id]);
}

function getServiceById($id) {
    $result = query("SELECT * FROM services WHERE id = ?", [$id]);
    return $result ? $result[0] : null;
}

function deleteArticle($id) {
    return query("DELETE FROM articles WHERE ID = ?", [$id]);
}

function updateArticle($id, $name, $description, $category, $img) {
    return query("UPDATE articles SET name = ?, description = ?, category = ?, img = ? WHERE ID = ?", 
                 [$name, $description, $category, $img, $id]);
}

function getArticleById($id) {
    $result = query("SELECT * FROM articles WHERE ID = ?", [$id]);
    return $result ? $result[0] : null;
}


function deleteReview($id) {
    return query("DELETE FROM reviews WHERE ID = ?", [$id]);
}

function updateReview($id, $name, $text, $rating) {
    return query("UPDATE reviews SET name = ?, text = ?, rating = ? WHERE ID = ?", 
                 [$name, $text, $rating, $id]);
}

function getReviewById($id) {
    $result = query("SELECT * FROM reviews WHERE ID = ?", [$id]);
    return $result ? $result[0] : null;
}

function deleteDiscount($id) {
    return query("DELETE FROM stocks WHERE ID = ?", [$id]);
}

function updateDiscount($id, $name, $description, $date, $discount) {
    return query("UPDATE stocks SET name = ?, description = ?, date = ?, discount = ? WHERE ID = ?", 
                 [$name, $description, $date, $discount, $id]);
}

function getDiscountById($id) {
    $result = query("SELECT * FROM stocks WHERE ID = ?", [$id]);
    return $result ? $result[0] : null;
}