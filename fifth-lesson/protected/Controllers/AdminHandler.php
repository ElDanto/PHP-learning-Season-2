<?php

namespace App\Controllers;

use App\Controller;
use App\View;

use App\Models\Article;

use App\Controllers\Auth;

class AdminHandler
    extends Controller
{
    public function access($action)
    {
        return Auth::checkAdmin();
    }

    protected function actionCreate()
    {
        $defaultPettens = [
            'title' => 'Something title',
            'content' => 'Something content',
            'author_id' => '1',
        ];

        $article = new Article();

        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if (empty($value)) {
                    $value = $defaultPettens[$key];
                }
                $article->$key = $value;
            }
        }

        if ($article->save()) {
            header('Location: http://learn-php2.local/fifth-lesson/public/Admin/Status/?status=success');
            exit;
        } else {
            header('Location: http://learn-php2.local/fifth-lesson/public/Admin/Status/?status=error');
            exit;
        }
    }

    protected function actionUpdate()
    {
        if(!isset($_GET['id']) || empty($_GET['id'])){
            header('Location: http://learn-php2.local/fifth-lesson/public/Admin/Status/?status=error');
            exit;
        }

        $article = Article::findById($_GET['id']);
        $article = $article[0];

        if(!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $article->$key = $value;
            }
        }

        if ($article->save()) {
            header('Location: http://learn-php2.local/fifth-lesson/public/Admin/Status/?status=success');
            exit;
        } else {
            header('Location: http://learn-php2.local/fifth-lesson/public/Admin/Status/?status=error');
            exit;
        }
    }

    protected function actionDelete()
    {
        if(!isset($_GET['id']) || empty($_GET['id'])){
            header('Location: http://learn-php2.local/fifth-lesson/public/Admin/Status/?status=error');
            exit;
        }

        $article = Article::findById($_GET['id']);
        $article = $article[0];

        if ( $article->delete()) {
            header('Location: http://learn-php2.local/fifth-lesson/public/Admin/Status/?status=success');
            exit;
        } else {
            header('Location: http://learn-php2.local/fifth-lesson/public/Admin/Status/?status=error');
            exit;
        }
    }

}