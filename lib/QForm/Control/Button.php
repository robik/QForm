<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Button extends Control
{
    public function __construct($text = null, array $attributes = array())
    {
        parent::__construct('input');
        $this->setAttribute('type',  'button');
        
        if($text !== null )
        {
            $this->setAttribute('value',  $text);
        }
        
        $this->setAttributes($attributes);
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
    
    /**
     * Returns button text
     *
     * @return string Button text
     */
    public function getText()
    {
        return $this->getAttribute('value');
    }
}

?>
