<?php
/**
 * Created by PhpStorm.
 * User: Flint
 * Date: 13.11.2018
 * Time: 18:35
 */

namespace Flint\Application\Controllers;


use Flint\Application\Functional\Database;
use Flint\Application\Models\ClaimModel;

class ClaimController
{

    /**
     *
     */
    public static function create()
    {

        // required headers
//        header("Access-Control-Allow-Origin", "*");
//        header("Access-Control-Allow-Methods", "GET, PUT, POST, DELETE");
        header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization");
//        header("Access-Control-Allow-Origin: http://localhost:8080");
//        header("Content-Type: multipart/form-data");
//        header("Content-Type: application/json; charset=UTF-8");
//        header("Access-Control-Allow-Methods: POST");
//        header("Access-Control-Max-Age: 3600");
//        header("Access-Control-Allow-Headers: Origin, Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // get posted data
        //  $data = json_decode(file_get_contents("php://input"));

        $claim = new ClaimModel();

        // set product property values
        $claim->fio = $_POST['fio'];
        $claim->registration = $_POST['place'];
        $claim->number = $_POST['phone'];
        $claim->email = $_POST['email'];
        $claim->numbers = $_POST['numbers'];
        $claim->lat = $_POST['lat'];
        $claim->lng = $_POST['lng'];
        $claim->created = date('Y-m-d H:i:s');
        $claim->data = $_FILES['file'];


        // create the product
        if ($claim->create()) {

            // set response code - 201 created
            http_response_code(201);

            // tell the user
            echo json_encode(array("message" => "Created"));
        } // if unable to create the product, tell the user
        else {

            // set response code - 503 service unavailable
            http_response_code(503);

            // tell the user
            echo json_encode(array("message" => "Unable to create product."));
        }
    } // tell the user data is incomplete

}