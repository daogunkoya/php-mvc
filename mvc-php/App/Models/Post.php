<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Post extends \Core\Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        //$host = 'localhost';
        //$dbname = 'mvc';
        //$username = 'root';
        //$password = 'secret';
    
        try {
            //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();

            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
            $stmt = $db->prepare("INSERT INTO posts (title, content) 
            VALUES (:title, :content)");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function insertPost()
    {
        
        try {
            //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();

            $stmt = $db->prepare("INSERT INTO posts(title,content) VALUES(:title,:content)");
            

            $stmt->bindValue(':title', $_POST['title'],PDO::PARAM_STR);
            $stmt->bindValue(':content', $_POST['content'],PDO::PARAM_STR);
           

            return $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
