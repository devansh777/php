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
       // echo "INSERT INTO $table ($fields) VALUES('".$values."')";
        $stmt=$db->exec("INSERT INTO $table ($fields) VALUES('".$values."')");
        return $db->lastInsertId();
    }
    public static function getusrdata($field,$id,$table,$compare)
    {
        
        try{
            $db= static::getDB();
          //  echo "SELECT $field FROM $table WHERE $compare=$id";
            $stmt=$db->query("SELECT $field FROM $table WHERE $compare=".$id);
            
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
    public static function chksloat($date,$sloat)
    {
        try{
            $db= static::getDB();
            $stmt=$db->query("SELECT count(*) row FROM service WHERE date='".$date."' AND timeslot='".$sloat."'");
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public static function chkvehical($vehiclenumber,$license)
    {
        try
        {
            $db= static::getDB();
            $stmt=$db->query("SELECT userid  FROM service WHERE vehiclenumber='".$vehiclenumber."' OR userlicense='".$license."'");
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public static function loginchk($uname,$pass)
    {
        try
        {
            $db= static::getDB();
            echo "SELECT * FROM users WHERE email='".$uname."' AND password='".$pass."'";
            $stmt=$db->query("SELECT * FROM users WHERE email='".$uname."' AND password='".$pass."'");
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