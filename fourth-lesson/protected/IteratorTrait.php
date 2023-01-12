<?php

namespace App;

trait IteratorTrait 
{

    public function current()
    {
        return current( $this->data );
    }

    public function key()
    {
       return key( $this->data );
    }

    public function next() : void
    {
        next($this->data);
    }

    public function rewind() : void
    {
        reset($this->data);
    }

    public function valid() : bool
    {
        return null !== key($this->data);
    }
}