<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Password extends TextBox
{
    public function __construct($value = null, array $attributes = array())
    {
        parent::__construct($value, $attributes);
        $this->setAttribute('type',  'password');
    }
}
?>
