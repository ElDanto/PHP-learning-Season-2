<?php

namespace App;

use App\View;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();

    }

    public function access($action)
    {
       return true;
    }

    public function action($name)
    {   
        if ($this->access($name)) {
            $methodName = 'action' . $name;
            $this->$methodName();
        } else {
            die('Access denied!');
        }
        
    }
}