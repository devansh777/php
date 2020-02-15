<?php
namespace Core;
use PDO;
use App\Config;
abstract class Model
{
    protected static function getDB()
    {
        static $db = null;
        if($db == null)
        {
            /* $host="localhost";
            $uname="root";
            $pass="";
            $db="mvc"; */
            try{
                /* $db= new PDO("mysql:host=$host;dbname=$db;charset=utf8",$uname,$pass);
                 */
                $dsn = 'mysql:host='.Config::DB_HOST .';dbname='.Config::DB_NAME.';charset=utf8';
                $db = new PDO($dsn,Config::DB_USER, Config::DB_PASSWORD);

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $db;
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }else{
            return $db;
        }
    }
}
?>