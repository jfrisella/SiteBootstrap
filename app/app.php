<?php
/**
*   App Bootstraping
*/

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;

ini_set('display_errors', 1);
error_reporting(E_ALL);

//Define Main Root
define("INC_ROOT", dirname(__DIR__));

//Define Globals
require_once INC_ROOT . "/app/config/globals.php";

//Database Info
require_once CONFIG_ROOT . "/db.php";

//Composer Autoloader
require_once INC_ROOT . "/vendor/autoload.php";

//Create Slim App
$app = new Slim([
    "debug" => true,
    "mode" => file_get_contents(INC_ROOT . "/app/mode.php"),
    "view" => new Twig(),
    "templates.path" => VIEWS_ROOT,
    
    "cookies.encrypt" => true,
    "cookies.secret_key" => "some_secret",
    "cookies.cipher" => MCRYPT_RIJNDAEL_256,
    "cookies.cipher_mode" => MCRYPT_MODE_CBC
]);




//Set Configuration
$app->configureMode($app->config("mode"), function() use ($app){
    $app->config = Config::load( CONFIG_ROOT . "/{$app->config("mode")}.php");
});

//Include Routes
include ROUTES_ROOT . "/routes.php";


//Twig Configuration
$view = $app->view();

$view->parserOptions = [
    "debug" => $app->config->get("view.debug")
];

$view->parserExtensions = [
    new TwigExtension
];


//Include Filters
require_once FILTERS_ROOT . "/filters.php";



