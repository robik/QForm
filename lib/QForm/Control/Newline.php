<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Newline extends Control
{
    /**
     * Number of newlines
     */
    protected $count;
    
    public function __construct($count = 1)
    {
        parent::__construct('br');
    }
    
    /**
     * Sets newline count
     *
     * @param int $num Number of newlines
     * 
     * @return NewLine Self
     */
    public function setCount($num)
    {
        $this->count = (int)$num;
        
        return $this;
    }
    
    /**
     * Returns newline count
     *
     * @return int 
     */
    public function getCount()
    {
        return $this->text;
    }
    
    public function render($indent = 0)
    {
        $text = parent::render($indent);
        return $this->appendIndent(str_repeat($text, $this->count), $indent);
    }
}
?>
