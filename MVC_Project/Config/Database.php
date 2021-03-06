<?php

namespace MVC_Project\Config;

use PDO;

class Database
{
    private static $bdd = null;

    private function __construct()
    {
    	# code...
    }

    public static function getBdd()
    {
        if(is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=mvc", 'root', '191020');
        }
        return self::$bdd;
    }
}
