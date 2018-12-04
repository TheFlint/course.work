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
//        header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization");

//        header("Access-Control-Allow-Origin: http://localhost:8080");
//        header("Content-Type: multipart/form-data");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Origin, Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    $claim = new ClaimModel();

    // set product property values
    $claim->fio= $data->fio;
    $claim->registration = $data->place;
    $claim->number = $data->phone;
    $claim->email = $data->email;
    $claim->numbers = $data->numbers;
    $claim->created = date('Y-m-d H:i:s');
    $claim->data = $data->upFiles;

    // create the product
    if ($claim->create()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Product was created."));
    } // if unable to create the product, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create product."));
    }
} // tell the user data is incomplete

}