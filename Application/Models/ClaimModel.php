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
    public $fio;
    public $registration;
    public $number;
    public $email;
    public $numbers;
    public $created;
    public $data;

    function create()
    {
        $file = "ghop.txt";

        file_put_contents($file, "
            $this->fio 
            $this->registration 
            $this->number
            $this->email 
            $this->number 
            $this->created
            ."
        );
        $tmp = move_uploaded_file($this->data['tmp_name'], '/');
        $current = file_get_contents($file);
        var_dump($current);
        var_dump($this->data);
        return true;
    }
}