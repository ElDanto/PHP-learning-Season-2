<?php

namespace App;

class View
    implements \Countable
{
    protected $data = [];
    
    // public function assign( string $key, array $data )
    // {
    //     if ( !empty( $key ) && !empty( $data ) ) {
    //         $this->data[$key] = $data;
    //     }
    // }

    use MagicTrait; //Instead method assing

    /**
     * display
     *
     * @param  mixed $template
     * @return void
     */
    public function display( string $template )
    {
        if ( !empty( $this->data ) ) {
            $data = $this->data;
            include $template;
        }
    }
    
    /**
     * render
     *
     * @param  mixed $template
     * @return void
     */
    public function render( string $template )
    {
        if ( !empty( $this->data ) ) {
            ob_start();

            $data = $this->data;
            include $template;
            $content = ob_get_contents();
            ob_end_clean();

            return $content; 
        }
    }

    public function count()
    {
        return 42;
    }
}