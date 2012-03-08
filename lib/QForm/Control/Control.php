<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Control implements ControlInterface
{
    /**
     * HTML tag name
     *
     * @var string
     */
    protected $tagName;
            
    /**
     * Contains array of attributes
     *
     * @var array
     */
    protected $attributes = array();
    
    
    /**
     * Creates new Control
     *
     * @param string $tagName Tag name
     * @param bool $closeable Is tag closeable
     */
    public function __construct($tagName)
    {
        $this->tagName = $tagName;
    }

    
    /**
     * @see QForm\Control\ControlInterface::getTagName
     */
    public function getTagName()
    {
        return $this->tagName;
    }
    
    /**
     * @see QForm\Control\ControlInterface::getAttributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
    
    /**
     * @see QForm\Control\ControlInterface::getAttribute
     */
    public function getAttribute($name)
    {
        if($this->hasAttribute($name) == false)
        {
            throw new \RuntimeException("No attribute '$name'");
        }
        
        return $this->attributes[$name];
    }
    
    /**
     * @see QForm\Control\ControlInterface::setAttribute
     */
    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = (string)$value;
    }
    
    /**
     * @see QForm\Control\ControlInterface::hasAttribute
     */
    public function hasAttribute($name)
    {
        return isset($this->attributes[$name]);
    }
    
    /**
     * @see QForm\Control\ControlInterface::removeAttribute
     */
    public function removeAttribute($name)
    {
        unset($this->attributes[$name]);
    }
    
    /**
     * @see QForm\Control\ControlInterface::setId
     */
    public function setId($id)
    {
        $this->setAttribute('id', $id);
        
        return $this;
    }
        
    /**
     * @see QForm\Control\ControlInterface::getId
     */
    public function getId()
    {
        return $this->getAttribute('id');
    }
    
    /**
     * @see QForm\Control\ControlInterface::addClass
     */
    public function addClass($name)
    {
        $this->setAttribute('class', $this->getAttribute('class').' '.$name);
        
        return $this;
    }
    
    /**
     * @see QForm\Control\ControlInterface::hasClass
     */
    public function hasClass($name)
    {
        return (
                $this->hasAttribute('class')
                && stripos( $this->getAttribute('class'), $name )
               );
    }
    
    /**
     * @see QForm\Control\ControlInterface::removeClass
     */
    public function removeClass($name)
    {
        $names = explode(' ', $name);
        
        foreach($names as $class)
        {
            $this->setAttribute('class', str_replace(" $class ", '  ', $this->getAttribute('class')));
        }
    }
    
    /**
     * @see QForm\Control\ControlInterface::setTitle
     */
    public function setTitle($text)
    {
        $this->setAttribute('title', $text);
        
        return $this;
    }
    
    /**
     * @see QForm\Control\ControlInterface::getTitle
     */
    public function getTitle()
    {
        return $this->getAttribute('title');
    }
}
?>
