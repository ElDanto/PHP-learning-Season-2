<?php

namespace App\Controllers;

use App\Controller;

class Errors 
   extends Controller
{
   public function action404()
   {
      $this->view->display(__DIR__ . '/../../templates/error404.php');
   }

   public function actionDbConnection()
   {

      $this->view->display(__DIR__ . '/../../templates/errorDbConnection.php');
   }
}