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

//Define ROOTS
define("INC_ROOT", dirname(__DIR__));
define("CONFIG_ROOT", INC_ROOT . "/app/config");
define("ROUTES_ROOT", INC_ROOT . "/app/routes");
define("VIEWS_ROOT", INC_ROOT . "/app/views");

//Database Info
define("DB_SERVER", "server");
define("DB_SCHEMA", "schema");
define("DB_USER", "user");
define("DB_PASS", "password");


require INC_ROOT . "/vendor/autoload.php";

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




