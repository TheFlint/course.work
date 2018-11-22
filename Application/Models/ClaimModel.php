<?php
/**
 * Created by PhpStorm.
 * User: Flint
 * Date: 13.11.2018
 * Time: 18:42
 */

namespace Flint\Application\Models;


class ClaimModel
{
    // database connection and table name
    private $conn;
    private $table_name = "claim";

    public $id;
    public $userid;
    public $location;
    public $num;
    public $created;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function create()
    {
        $query = "INSERT INTO 
            ".$this->table_name."
            SET 
                
    }


}