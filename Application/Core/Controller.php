<?php
/**
 * Created by PhpStorm.
 * User: Flint
 * Date: 23.08.2018
 * Time: 16:33
 */

namespace Flint\Application\Core;

class Controller
{
    // home page url
    public $homeUrl = "http://localhost/api/";

    // set number of records per page
    public $records_per_page = 5;

    // page given in URL parameter, default page is one
    public function getPage()
    {
        return isset($_GET['page']) ? $_GET['page'] : 1;
    }

    // calculate for the query LIMIT clause
    public function getFromRecordNum()
    {
        return ($this->records_per_page * $this->getPage()) - $this->records_per_page;
    }


}
