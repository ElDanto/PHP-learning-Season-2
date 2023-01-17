<?php

namespace App;

trait MagicTrait
{
    protected $data = [];
    
    public function __set(string $key, $value)
    {
        
        $method = 'validate_' . $key;
        if (method_exists($this, $method)) {
            $this->$method($value);
        }
        if (!empty($value)) {
            $this->data[$key] = $value;
        }
    }

    public function __get(string $key)
    {
        return $this->data[$key];
    }

    public function __isset(string $key)
    {
        return isset($this->data[$key]);
    }
}