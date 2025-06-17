<?php
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
     