<?php
/**
 * Created by PhpStorm.
 * User: Flint
 * Date: 23.08.2018
 * Time: 16:29
 */

namespace Flint\Application\Core;

use Flint\Application\Controllers\Error404Controller;
use Flint\Application\Functional\ApplicationException;

class Route
{
    public static $controllerName = 'Home';
    public static $actionName = 'index';

    public static function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if (!empty($routes[1])) {
            self::$controllerName = ucfirst($routes[1]);
        }
        if (!empty($routes[2])) {
            $actionName = explode('?', $routes[2]);
            unset($actionName[1]);
            self::$actionName = lcfirst($actionName[0]);
        }

        $modelName = self::$controllerName . 'Model';
        $controllerName = self::$controllerName . 'Controller';

        $model = 'Flint\Application\Controllers\\' . $modelName;

        try {
            ApplicationException::connectController($controllerName);
            $controller = 'Flint\Application\Controllers\\' . $controllerName;
            $action = self::$actionName;
            try {
                ApplicationException::checkAction($controller, self::$actionName);
                $controller::$action();
            } catch (ApplicationException $exception) {
                Error404Controller::index();
            }

        } catch (ApplicationException $exception) {
            Error404Controller::index();
        }

    }

}