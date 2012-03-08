<?php

/*
 * This file is part of Qiwi framework
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;
use QForm\Control;

class Submit extends Control
{
    public function __construct($name, $value = '')
    {
        parent::__construct('input', $value);        
        $this->setAttribute('type',  'submit');
    }
    
    /**
     * Sets button message
     *
     * @param string $text Button text
     * 
     * @return Submit Self
     */
    public function setText($text)
    {
        $this->setAttribute('value', $text);
        
        return $this;
    }
    
    public function getText()
    {
        return $this->getAttribute('value');
    }
}
?>
