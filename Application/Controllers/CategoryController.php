<?php
/**
 * Created by PhpStorm.
 * User: Flint
 * Date: 27.10.2018
 * Time: 16:41
 */

namespace Flint\Application\Controllers;


use Flint\Application\Core\Controller;
use Flint\Application\Functional\Database;
use PDO;

class CategoryController extends Controller
{
    public static function read()
    {
        // required header
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        // instantiate database and category object
        $database = new Database();
        $db = $database->getConnection();

        // initialize object
        $category = new Category($db);

        // query categorys
        $stmt = $category->read();
        $num = $stmt->rowCount();

        // check if more than 0 record found
        if ($num > 0) {

            // products array
            $categories_arr = array();
            $categories_arr["records"] = array();

            // retrieve our table contents
            // fetch() is faster than fetchAll()
            // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // extract row
                // this will make $row['name'] to
                // just $name only
                extract($row);

                $category_item = array(
                    "id" => $id,
                    "name" => $name,
                    "description" => html_entity_decode($description)
                );

                array_push($categories_arr["records"], $category_item);
            }

            // set response code - 200 OK
            http_response_code(200);

            // show categories data in json format
            echo json_encode($categories_arr);
        } else {

            // set response code - 404 Not found
            http_response_code(404);

            // tell the user no categories found
            echo json_encode(
                array("message" => "No categories found.")
            );
        }
    }
}