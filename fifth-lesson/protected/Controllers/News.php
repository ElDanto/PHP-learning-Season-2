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
        $lastNews = Article::getLastNews(3);

        if (empty($lastNews)) {
            throw new \App\Exceptions\NewsNotFoundException('News not founded');
        }

        $this->view->news = $lastNews;
        $this->view->display(__DIR__ . '/../../templates/news.php');

    }

    protected function actionOne()
    {
        
        $article = Article::findById($_GET['id']);

        if (empty($article)) {
            throw new \App\Exceptions\ArticleNotFoundException('Article not founded');
        }

        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }
}