<?php 
ini_set('display_errors', '1');ini_set('display_startup_errors', '1');error_reporting(E_ALL);
require __DIR__ . '/../protected/autoload.php';
use App\View;
use App\Models\Product;
use App\Models\Article;


$uri = $_SERVER['REQUEST_URI'];
$parts = explode( '/', $uri );

$controllerClass = '\App\Controllers\\' . $parts[3];

$controller = new $controllerClass;
$actionName = !empty( $parts[4] ) ? $parts[4] : 'Default';
$controller->action( $actionName );

session_start();
var_dump($_SESSION);
// $newsContrller = new \App\Controllers\News();
// $newsContrller->action( 'Default' );


// $view = new View;

// $path = __DIR__ . '/../templates'; 

// $articles = Article::getLastNews(3);
// $view->articles = $articles;

// var_dump( count( $view ) ); //Example interface Countable

//Example interface Iterator
// foreach ($view as $key => $value) {
//     var_dump($key, ' => ', $value);
// }

// $path .= '/news.php';


// $view->display(__DIR__ . '/../templates/header.html');

// $view->display($path);

// $view->display(__DIR__ . '/../templates/footer.html');