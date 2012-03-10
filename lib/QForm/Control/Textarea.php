<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Textarea extends CompositeControl
{
    /**
     * Turns off wrapping
     */
    const WrapOff = "off";
    
    /**
     * Wrap is enabled and textarea text is send as seen.
     */
    const WrapPhysical = "physical";
    
    /**
     * Wrap is enabled and textarea text is send in long line.
     */
    const WrapVirtual = "virtual";
    
    
    public function __construct($name, $default = '', array $attributes = array())
    {
        parent::__construct('textarea');
        $this->setName($name);
        $this->appendText($default);
        $this->setAttributes($attributes);
    }
    
    /**
     * Sets textarea row count
     *
     * @param int $rows Number of rows
     * 
     * @return Textara Self
     */
    public function setRowCount($rows)
    {
        $this->setAttribute('rows', $rows);
        
        return $this;
    }
    
    /**
     * Returns row count
     * 
     * If row count have not been specified, and exception will be throws, row count variable will be casted to int.
     * 
     * @return int Row count
     */
    public function getRowCount()
    {
        return (int)$this->getAttribute('rows');
    }
    
    /**
     * Sets textarea column count
     *
     * @param int $cols Number of column
     * 
     * @return Textara Self
     */
    public function setColumnCount($cols)
    {
        $this->setAttribute('cols', $cols);
        
        return $this;
    }
    
    /**
     * Returns column count
     * 
     * If column count have not been specified, and exception will be throws, column count variable will be casted to int.
     * 
     * @return int Row count
     */
    public function getColumnsCount()
    {
        return (int)$this->getAttribute('cols');
    }
    
    /**
     * Sets wrap mode
     * 
     * @param string $mode Wrap mode
     * 
     * @return Textarea Self
     */
    public function setWrapMode($mode)
    {
        $this->setAttribute('wrap', $mode);
        
        return $this;
    }
    
    /**
     * Returns wrap mode
     *
     * @return string
     */
    public function getWrapMode()
    {
        return $this->getAttribute('wrap');
    }
}
?>
