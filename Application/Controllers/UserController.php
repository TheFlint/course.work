<?php
/**
 * Created by PhpStorm.
 * User: Flint
 * Date: 12.11.2018
 * Time: 20:08
 */

namespace Flint\Application\Controllers;


use Flint\Application\Core\Controller;
use Flint\Application\Functional\Database;
use Flint\Application\Models\UserModel;

class UserController extends Controller
{
    static public $result;

    public static function login()
    {
        // required headers
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            header('HTTP/1.1 204 No Content');
            die;
        }


        $database = new Database();
        $db = $database->getConnection();

        $user = new UserModel($db);

        // get posted data
        $data = json_decode(file_get_contents("php://input"));
        // make sure data is not empty
        if (
            !empty($data->login) &&
            !empty($data->pass)
        ) {

            // set product property values
            $user->login = $data->login;
            $user->pass = $data->pass;

            if ($user->login()) {
                session_set_cookie_params(3600);
                session_start();
                $_SESSION['userid'] = self::$result['id'];
                // set response code - 200 ok
                http_response_code(200);

                // tell the user
                echo json_encode(array("message" => "Successfully logged."));
            } else {
                // set response code - 401 Unauthorized
                http_response_code(401);

                // tell the user
                echo json_encode(array("message" => "Wrong login or/and password."));
            }

        } // tell the user data is incomplete
        else {

            // set response code - 400 bad request
            http_response_code(400);

            // tell the user
            echo json_encode(array("message" => "Unable to login. Data is incomplete."));
        }


    }

    public static function register()
    {
        // required headers
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            header('HTTP/1.1 204 No Content');
            die;
        }

        $database = new Database();
        $db = $database->getConnection();

        $user = new UserModel($db);

        // get posted data
        //$data = json_decode(file_get_contents("php://input"));
        $data = json_decode(file_get_contents("php://input"));
        // make sure data is not empty
        if (
            !empty($data->fio) &&
            !empty($data->email) &&
            !empty($data->passport) &&
            !empty($data->phone) &&
            !empty($data->pass)
        ) {

            // set product property values
            $user->fio = $data->fio;
            $user->email = $data->email;
            $user->passport = $data->passport;
            $user->phone = $data->phone;
            $user->pass = $data->pass;

            //compare register information
            if (!$user->compare()) {

                if ($user->register()) {
                    // set response code - 200 ok
                    http_response_code(200);

                    // tell the user
                    echo json_encode(array("message" => "Successfully register."));

                } else {

                    // set response code - 500 Internal Server Error.
                    http_response_code(500);

                    // tell the user
                    echo json_encode(array("message" => "Internal Server Error."));
                }

            } // if user register information isn't correct
            else {

                // set response code - 401 Unauthorized
                http_response_code(401);

                // tell the user
                echo json_encode(array("message" => "User with this email/pass/phone number already exist."));

            }
        } // tell the user data is incomplete
        else {

            // set response code - 400 bad request
            http_response_code(400);

            // tell the user
            echo json_encode(array("message" => "Unable to register. Data is incomplete."));
        }


    }


}