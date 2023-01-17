<?php
namespace App;
class Config 
{
    public $data = [];

    // protected static $instance = null;

    public function __construct()
    {
        $this->data['db'] = include __DIR__ . '/configuration.php';
    }
    
    // public static function instance()
    // {
    //     if(null === self::$instance){
    //         self::$instance = new self();
    //     }
    //     return self::$instance;
    // }

}