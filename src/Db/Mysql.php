<?php
namespace App\Db;

use PDO;

class Mysql {
    private static $instance = null;
    private $pdo;

    private function __construct() {

        $dbConf = parse_ini_file(APP_ROOT."/".APP_ENV);
        $dbHost = $dbConf["db_host"];
        $dbName = $dbConf["db_name"];
        $dbUser = $dbConf["db_user"];
        $dbPassword = $dbConf["db_password"];
        $dbPort = $dbConf["db_port"];
    
        $this->pdo = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPdo() {
        return $this->pdo;
    }
}