<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Reset extends Button
{
    public function __construct($text = null, array $attributes = array())
    {
        parent::__construct('input', $text);
        $this->setAttribute('type',  'reset');
        
        $this->setAttributes($attributes);
    }
}
?>
