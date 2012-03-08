<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

use QForm\Control;

class Password extends TextBox
{
    public function __construct($name, $value = '')
    {
        parent::__construct('input', $value);        
        $this->setAttribute('type',  'password');
    }
}
?>
