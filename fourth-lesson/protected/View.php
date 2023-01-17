<?php

namespace App;

class View
    implements \Countable, \Iterator
{

    use MagicTrait; //Instead method assing
    use IteratorTrait; 

    /**
     * display
     *
     * @param  mixed $template
     * @return void
     */
    public function display(string $template)
    {
        if (!empty($this->data)) {
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
    public function render(string $template)
    {
        if (!empty($this->data)) {
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
        
        return count($this->data);
    }
}