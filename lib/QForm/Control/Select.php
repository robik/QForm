<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Select extends CompositeControl
{
    public function __construct($name = null)
    {
        parent::__construct('select');
        
        if($name !== null)
        {
            $this->setName($name);
        }
    }
    
    /**
     * Adds new option
     *
     * @param string $value Value of the option
     * @param string $text Visible text
     * 
     * @return Select Self
     */
    public function addOption($value, $text)
    {
        $this->addChild(new Option($value, $text));
        
        return $this;
    }
    
    
    /// add options array
}
?>
