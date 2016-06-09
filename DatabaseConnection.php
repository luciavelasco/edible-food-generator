<?php

class DatabaseConnection {
    
    public function getDbConn()
    {

        $host = '192.168.20.56';
        $username = 'root';
        $password = '';
        $dbname = 'food_generator';

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $sql = 'SELECT ? FROM food;';
//        $query = $db->prepare($sql);
//        $query->
            return $db;
        } catch (PDOException $e) {
            echo "Database connection failed. Please try again later. \n";
            exit();
        }
    }
}