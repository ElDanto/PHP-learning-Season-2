<?php

namespace App\Controllers;

use App\Controller;
use App\View;

use App\Models\Article;

class News 
    extends Controller
{
    protected function actionDefault()
    {
        $this->view->news = Article::getLastNews(3);
        $this->view->display(__DIR__ . '/../../templates/news.php');

    }

    protected function actionOne()
    {
        $this->view->article = Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }
}