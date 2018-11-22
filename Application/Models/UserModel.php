<?php
/**
 * Created by PhpStorm.
 * User: Flint
 * Date: 12.11.2018
 * Time: 20:13
 */

namespace Flint\Application\Models;
use Flint\Application\Controllers\UserController;
use PDO;


class UserModel
{
    // database connection and table name
    private $conn;
    private $table_name = "users";

    public $id;
    public $fio;
    public $passport;
    public $email;
    public $phone;
    public $pass;
    public $login;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //compare user information in base with information that was sent
    function compare()
    {

        $query = "SELECT *           
            FROM 
                " . $this->table_name . "
            WHERE 
                passport=:passport OR email=:email OR phone=:phone";

        $stmt = $this->conn->prepare($query);

        $this->passport = htmlspecialchars(strip_tags($this->passport));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));

        $stmt->bindParam(":passport", $this->passport);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);

        // execute query
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC) > 0) {
            return true;
        }

        return false;
    }

    function login()
    {
        $query = "SELECT *           
            FROM 
                " . $this->table_name . "
            WHERE 
                (passport=:login OR email=:login OR phone=:login) AND pass=:pass";

        $stmt = $this->conn->prepare($query);

        $this->login = htmlspecialchars(strip_tags($this->login));
        $this->pass = md5(htmlspecialchars(strip_tags($this->pass)));

        $stmt->bindParam(":login", $this->login);
        $stmt->bindParam(":pass", $this->pass);

        // execute query
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC) > 0) {
            UserController::$result = $stmt->fetch(PDO::FETCH_ASSOC);
            return true;
        }

        return false;
    }

    function register()
    {
       $query = "INSERT INTO 
              " . $this->table_name . " 
            SET
                fio=:fio, passport=:passport, email=:email, phone=:phone, pass=:pass";

        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->fio = htmlspecialchars(strip_tags($this->fio));
        $this->passport = htmlspecialchars(strip_tags($this->passport));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->pass = md5(htmlspecialchars(strip_tags($this->pass)));

        // bind values
        $stmt->bindParam(":fio", $this->fio);
        $stmt->bindParam(":passport", $this->passport);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":pass", $this->pass);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

}