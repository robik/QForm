<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Reset extends Control
{
    public function __construct($name = null, $value = null)
    {
        parent::__construct('input', $text);
        $this->setAttribute('type',  'hidden');
        
        if($name !== null)
        {
            $this->setAttribute('name',  $name);
        }
        
        if($value !== null)
        {
            $this->setAttribute('value',  $value);
        }
    }
}
?>
