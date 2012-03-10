<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Checkbox extends Control
{
    public function __construct($name, $value, $checked = false, array $attributes = array())
    {
        parent::__construct('input');
        $this->setAttribute('type',  'checkbox');
        $this->setName($name);
        $this->setAttribute('value',  $value);
        
        if($checked != false)
        {
            $this->setAttribute('checked',  'checked');
        }        
        
        $this->setAttributes($attributes);
    }
    
    /**
     * Sets checkbox checked or not.
     *
     * @param bool $checked Check checkbox?
     * 
     * @return Checkbox Self
     */
    public function setChecked($checked)
    {
        if($checked)
        {
            $this->setAttribute('checked', 'checked');
        }
        else
        {
            $this->removeAttribute('checked');
        }
        
        return $this;
    }
    
    /**
     * Checks if checkbox is checked
     *
     * @return bool True if is checked, false otherwise
     */
    public function isChecked()
    {
        return ($this->hasAttribute('checked') && $this->getAttribute('checked') == 'checked');
    }
}
?>
