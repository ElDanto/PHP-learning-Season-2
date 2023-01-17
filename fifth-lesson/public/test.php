<?php
ini_set('display_errors', '1');ini_set('display_startup_errors', '1');error_reporting(E_ALL);
require __DIR__ . '/../protected/autoload.php';
use App\View;
use App\Models\Product;
use App\Models\Article;

// $news = Article::findAll();
// var_dump($news);
$article = new Article();
$arg = [
    'title' => 'Какая красивая картинка',
    'content' => 'Вот это нас?тоящий контент',
];
$logger = \App\Logger::instance();
try{
    $article->fill($arg);
} catch (\Exception $e) {
    $logger->logError($e);
}
// var_dump($article);

// $uri = $_SERVER['REQUEST_URI'];
// $parts = explode('/', $uri);

// $controllerClass = '\App\Controllers\\' . $parts[3];

// $controller = new $controllerClass;
// $actionName = !empty($parts[4]) ? $parts[4] : 'Default';
// $controller->action($actionName);

// session_start();
// var_dump($_SESSION);