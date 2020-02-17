<?php

namespace App\Models;
use PDO;
class Post extends \Core\Model
{
    public static function getall($table)
    {
        try{
            $db= static::getDB();
            $stmt=$db->query("SELECT * FROM $table");
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public static function insertdata($data,$table)
    {   
        $db= static::getDB();
        $fields=implode(",",array_keys($data));
        $values=implode("','",$data);
        echo "INSERT INTO $table ($fields) VALUES('".$values."')";
        
        $stmt=$db->exec("INSERT INTO $table ($fields) VALUES('".$values."')");
        return $db->lastInsertId();
    }
    public static function deletedata($id,$table,$compare)
    {
        $db= static::getDB();
        $stmt=$db->exec("DELETE FROM $table where $compare=$id");
        return $stmt;
    }
    public static function getusrdata($id,$table,$compare)
    {
        
        try{
            $db= static::getDB();
            $stmt=$db->query("SELECT * FROM $table WHERE $compare=".$id);
            
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public static function updatedata($data,$id,$table,$compare)
    {
        try
        {
            $db= static::getDB();
            $temp="";
            foreach ($data as $key => $value) {
                $temp.=$key."='".$value."',";
            }
            $updatedata=substr($temp,0,strlen($temp)-1);
            echo"UPDATE $table SET $updatedata where $compare=$id";
          $stmt=$db->exec("UPDATE $table SET $updatedata where $compare=$id");

            return $stmt;
        }
        catch(PDOException $e)
        {
           echo $e->getMessage();
        }
    }
    public static function products($id)
    {
        try{
            $db= static::getDB();
            $stmt=$db->query("select p.*,c.status cstatus,c.CategoryName from products p,category c,products_categories pc where pc.category_Id=$id AND pc.product_id=p.productId and c.categoryId=$id");
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