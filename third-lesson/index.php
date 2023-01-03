<?php 
ini_set('display_errors', '1');ini_set('display_startup_errors', '1');error_reporting(E_ALL);
require __DIR__ . '/protected/autoload.php';
use App\View;
use App\Models\Product;
use App\Models\Article;

$view = new View;

$path = __DIR__ . '/templates'; 
if ( empty( $_GET ) ) {
    $articles = Article::getLastNews(3);
    $view->articles = $articles;
    $view->articles = $articles;
    var_dump( count( $view ) );

    $path .= '/news.php';
} 
if ( isset( $_GET['article_id'] ) && !empty( $_GET['article_id'] ) ) {
    $article = Article::findById($_GET['article_id']);
    $view->article = $article;

    $path .= '/article.php';    
} 


$view->display(__DIR__ . '/templates/header.html');

$view->display($path);

$view->display(__DIR__ . '/templates/footer.html');