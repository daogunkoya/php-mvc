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

    public $db;
    /**
     * Get all the posts as an associative array
     *
     * @return array
     */

     public static function gets($id){
            if(isset($id) && is_numeric($id)){
                $db = self::getDB();
                $stmt = $db->prepare("SELECT * from posts where id = :id");
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                 $stmt->execute();
                 return $stmt->fetch();
            }
     }

    
    public static function getAll()
    {
       
        try {
            //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();

            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
           
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function insert($data)
    {
        
        try {
            
           if(is_array($data)){
                $db = static::getDB();

                $stmt = $db->prepare("INSERT INTO posts(title,content) VALUES(:title,:content)");
                
                $stmt->bindValue(':title', $data['title'],PDO::PARAM_STR);
                $stmt->bindValue(':content', $data['content'],PDO::PARAM_STR);
            
                return $stmt->execute();
           } 
            
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function update ($id, $data){
        if(isset($id) && isset($data)){
            try{
                
                $db = self::getDB();
                $stmt = $db->prepare("UPDATE 
                    posts SET title = :title,content = :content where id = :id");
                $stmt->bindValue(':id',$id,PDO::PARAM_INT);
                $stmt->bindValue(':title',$data['title'],PDO::PARAM_STR);
                $stmt->bindValue(':content',$data['content'],PDO::PARAM_STR);

                $stmt->execute();
                return $stmt->rowCount();
            }
            catch(PDOException $e){echo $e->getMessage();}
        }
    }

    public static function delete($id){
        if(isset($id) && is_numeric($id)){
           $db = self::getDB();
            try{
                $stmt = $db->prepare('DELETE FROM posts where id = :id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->rowCount();
            }
            catch(PDOException $e){return $e->getMessage();}
        }
    }
}
