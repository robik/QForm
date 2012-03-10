<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Hidden extends Control
{
    public function __construct($name, $value = null, array $attributes = array())
    {
        parent::__construct('input', $text);
        $this->setAttribute('type',  'hidden');        
        $this->setName($name);
        
        if($value !== null)
        {
            $this->setAttribute('value',  $value);
        }
        
        $this->setAttributes($attributes);
    }
}
?>
