<?php

namespace App\Models;
use PDO;
class Post extends \Core\Model
{
    public static function getall()
    {
        /* $host="localhost";
        $uname="root";
        $pass="";
        $db="mvc";
         */
        try{
            // $db= new PDO("mysql:host=$host;dbname=$db;charset=utf8",$uname,$pass);
            $db= static::getDB();
            $stmt=$db->query("SELECT id,title,content FROM posts ORDER BY createdat");
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

?>