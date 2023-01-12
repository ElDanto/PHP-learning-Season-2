<?php

namespace App;

trait MagicTrait
{
    protected $data = [];
    
    public function __set( string $key, array $data )
    {
        if ( !empty( $data ) ) {
            $this->data[$key] = $data;
        }
    }

    public function __get( string $key )
    {
        return $this->data[$key];
    }

    public function __isset( string $key )
    {
        return isset( $this->data[$key] );
    }
}