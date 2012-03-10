<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;


class Textbox extends Control
{
    public function __construct($name, array $attributes = array())
    {
        parent::__construct('input');
                
        $this->setAttribute('type',  'text');
        $this->setName($name);
        $this->setAttributes($attributes);
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
    
    /**
     * Sets new textbox palceholder
     *
     * @param string $text Placeholder
     * 
     * @return Textbox Self
     */
    public function setPlaceHolder($text)
    {
        $this->setAttribute('placeholder', $text);
        
        return $this;
    }
    
    /**
     * Returns placeholder message
     * 
     * @return string Placeholder
     */
    public function getPlaceHolder()
    {
        return $this->getAttribute('placeholder');
    }
}
?>
