<?php
namespace Core;
use PDO;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;
        if($db == null)
        {
            $host="localhost";
            $uname="root";
            $pass="";
            $db="mvc";
    
            try{
                $db= new PDO("mysql:host=$host;dbname=$db;charset=utf8",$uname,$pass);
                return $db;
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
}



?>