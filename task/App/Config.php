<?php
namespace App;

class Config
{
    const DB_HOST = 'localhost';
    const DB_NAME = 'mvc';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const SHOW_ERRORS = true;
    
    public static function logincheck()
    {
        if(isset($_SESSION['uname']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>