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
    public function __construct($name, array $attributes = array())
    {
        parent::__construct($name, $attributes);
        $this->setName($name);
        $this->setAttribute('type',  'password');
    }
}
?>
