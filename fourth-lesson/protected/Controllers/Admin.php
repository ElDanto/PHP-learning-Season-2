<?php

namespace App\Controllers;

use App\Controller;
use App\View;

use App\Models\Article;
use App\Models\Author;

use App\Controllers\Auth;

class Admin 
    extends Controller
{
    public function access($action)
    {
        return Auth::checkAdmin();
    }

    protected function actionDefault()
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/admin.php');

    }

    protected function actionEdit()
    {
        $this->view->authors = Author::findAll();
        $this->view->article = Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../templates/adminEdit.php');
    }

    protected function actionAdd()
    {
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../templates/adminAdd.php');
    }

    public function actionStatus()
    {
        if ( isset( $_GET['status'] ) || empty( $_GET['status'] ) ) {
            $status = [];
            switch ( $_GET['status'] ) {
                case 'success':
                    $status['statusColor'] = 'green';
                    $status['statusMessage'] = 'Action completed successfully';
                    break;
                case 'error':
                    $status['statusColor'] = 'red';
                    $status['statusMessage'] = 'Sorry, Action hasn\'t been completed. Please try again.';
                    break;

            }
            $this->view->status = $status;
            $this->view->display( __DIR__ . '/../../templates/adminStatus.php' );
        }
        $this->actionDefault();
        
    }
}