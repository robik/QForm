<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Submit extends Button
{
    public function __construct($name, $text = null, array $attributes = array())
    {
        parent::__construct('input', $text);
        $this->setAttribute('type',  'submit');
        $this->setName($name);        
        $this->setAttributes($attributes);
    }
    
}
?>
