<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Option extends CompositeControl
{
    public function __construct($value, $text, array $attributes = array())
    {
        parent::__construct('option', $value);
        
        $this->setAttribute('value',  $value);
        $this->appendText($text);
        $this->inline = true;
        
        $this->setAttributes($attributes);
    }
}

?>
