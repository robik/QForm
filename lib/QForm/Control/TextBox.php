<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;


class TextBox extends Control
{
    public function __construct($value = null)
    {
        parent::__construct('input');
                
        $this->setAttribute('type',  'text');
        
        if($value !== null)
        {
            $this->setAttribute('value', $value);
        }
    }
    
    /**
     * Sets text box max length
     *
     * @param int $maxLength Length
     * 
     * @return TextBox Self
     */
    public function setMaxLength($maxLength)
    {
        $this->setAttribute('maxlength', $maxLength);
        
        return $this;
    }
    
    /**
     * Returns textbox max length
     *
     * @return int length
     */
    public function getMaxLength()
    {
        return (int)$this->getAttribute('maxlength');
    }
    
    /**
     * Sets text box size, in letters
     *
     * @param int $size Size
     * 
     * @return TextBox Self
     */
    public function setSize($size)
    {
        $this->setAttribute('size', $size);
        
        return $this;
    }
    
    /**
     * Returns textbox size
     *
     * @return int length
     */
    public function getSize()
    {
        return (int)$this->getAttribute('size');
    }
}
?>
