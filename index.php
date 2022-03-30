<?php
ini_set('display_errors',1); // 1 показывать ошибки
error_reporting(E_ALL);
session_start();
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');
require __DIR__ . '/vendor/autoload.php';
if (!function_exists('curl_reset')) {
    function curl_reset(&$ch) {
        curl_close($ch);
        $ch = curl_init();
    }
}
$router = new Router();
$router->run();
