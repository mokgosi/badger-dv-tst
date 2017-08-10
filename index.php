<?php

require 'vendor/autoload.php';
use App\Routes\Router;

define("DS", DIRECTORY_SEPARATOR);
define("BASE_PATH", __DIR__.DS.'src');

$router = new Router();













































































// $root_url = $_SERVER["HTTP_HOST"] . "/badger/";

// define("ROOT_URL", $root_url);

// define("DS", DIRECTORY_SEPARATOR);

// define("BASE_PATH", __DIR__);

// require_once(BASE_PATH . DS . "vendors/framework/core" . DS . "Loader.php");

// $load = new Loader();

// $load->loadClass();

// $router = new Router();
















    // $url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

    // if ($url == '/')
    // {
    //     require_once __DIR__.'/Models/index_model.php';
    //     require_once __DIR__.'/Controllers/index_controller.php';
    //     require_once __DIR__.'/Views/index_view.php';

    //     $indexModel = New IndexModel();
    //     $indexController = New IndexController($indexModel);
    //     $indexView = New IndexView($indexController, $indexModel);

    //     print $indexView->index();

    // } else {

    //     $controller = $url[0]; 
    //     $action = isset($url[1])? $url[1] :'';
    //     $params = array_slice($url, 2); 
    //     $controllerPath = __DIR__.'/Application/Controllers/'.$controller.'Controller.php';

    //     if (file_exists($controllerPath)) {
    //         require_once __DIR__.'/Models/'.$controller.'Model.php';
    //         require_once __DIR__.'/Controllers/'.$controller.'Controller.php';
    //         require_once __DIR__.'/Views/'.$controller.'_view.php';

    //         $modelName      = ucfirst($controller).'Model';
    //         $controllerName = ucfirst($controller).'Controller';
    //         $viewName       = ucfirst($controller).'View';

    //         $controllerObj  = new $controllerName( new $modelName );
    //         $viewObj        = new $viewName( $controllerObj, new $modelName );

    //         // If there is a method - Second parameter
    //         if ($action != '') {
    //             // then we call the method via the view dynamic call of the view
    //             print $viewObj->$action($params);
    //         }

    //     } else {
    //         header('HTTP/1.1 404 Not Found');
    //         die('404 - The file - '.$controllerPath.' - not found');
    //         //require the 404 controller and initiate it display its view
    //     }
    // }