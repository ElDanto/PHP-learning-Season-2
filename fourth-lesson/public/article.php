<?php
ini_set('display_errors', '1');ini_set('display_startup_errors', '1');error_reporting(E_ALL);
require __DIR__ . '/../protected/autoload.php';
use App\View;
use App\Models\Article;

$view = new View;

if (isset($_GET['article_id']) && !empty($_GET['article_id'])) {
    $newsContrller = new \App\Controllers\News();
    $newsContrller->action('One');

} 


// $view->display(__DIR__ . '/../templates/header.html');

// $view->display(__DIR__ . '/../templates/article.php');

// $view->display(__DIR__ . '/../templates/footer.html');