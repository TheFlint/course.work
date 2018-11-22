<?php
/**
 * Created by PhpStorm.
 * User: Flint
 * Date: 25.10.2018
 * Time: 12:01
 */

namespace Flint\Application\Functional;
use PDO;
use PDOException;

class Database
{

    // specify your own database credentials
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $charset;
    public $conn;

    function __construct()
    {
        $config = parse_ini_file('../config.ini');
        $this->host = $config['host'];
        $this->db_name = $config['dbname'];
        $this->charset = $config['charset'];
        $this->username = $config['username'];
        $this->password = $config['password'];

        // get the database connection
    }
    public function getConnection()
    {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names ".$this->charset);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}