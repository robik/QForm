<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Label extends CompositeControl
{
    public function __construct($for, $text, array $attributes = array())
    {
        parent::__construct('label', $text);
        $this->inline = true;
        
        $this->setAttribute('for',  $for);
        $this->appendText($text);
        
        $this->setAttributes($attributes);
    }
}
?>
