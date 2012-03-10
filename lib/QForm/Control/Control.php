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
     */
    public function __construct($tagName)
    {
        $this->tagName = $tagName;
    }
    
    /**
     * @see QForm\Control\ControlInterface::render
     */
    public function render($indent = 0)
    {   
        return $this->appendIndent("<{$this->tagName} ".$this->renderAttributes()." />\n", $indent); 
    }
    
    /**
     * Renders attributes
     *
     * @param array $attributes Array of attributes
     * 
     * @return string
     */
    protected function renderAttributes()
    {
        $array = array();
        
        foreach($this->attributes as $name => $value)
        {
            $array[] = $name.'="'.addslashes($value).'"';
        }
        
        return implode(' ', $array);
    }
    
    /**
     * Appends indent to string
     *
     * @param string $string String to indent
     * @param int $indent Level of indent
     * 
     * @return string
     */
    protected function appendIndent($string, $indent)
    {
        return str_repeat('    ', $indent).$string;
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
     * @see QForm\Control\ControlInterface::setAttributes
     */
    public function setAttributes(array $attributes)
    {
        foreach($attributes as $name => $value)
        {
            $this->attributes[$name] = (string)$value;
        }
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
    
    /**
     * @see QForm\Control\ControlInterface::setName
     */
    public function setName($name)
    {
        $this->setAttribute('name', $name);
        
        return $this;
    }
    
    /**
     * @see QForm\Control\ControlInterface::getName
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }
    
    /**
     * @see QForm\Control\ControlInterface::__toString
     */
    public function __toString()
    {
        return $this->render();
    }
    
    /**
     * @see QForm\Control\ControlInterface::setDisabled
     */
    public function setDisabled($disabled = true)
    {
        if($disabled)
        {
            $this->setAttribute('disabled', 'disabled');
        }
        else
        {
            $this->removeAttribute('disabled');
        }
        
        return $this;
    }
    
    /**
     * @see QForm\Control\ControlInterface::isDisabled
     */
    public function isDisabled()
    {
        return ($this->hasAttribute('disabled') && $this->getAttribute('disabled') == 'disabled');
    }
    
    /**
     * @see QForm\Control\ControlInterface::setReadOnly
     */
    public function setReadOnly($readonly = true)
    {
        if($readonly)
        {
            $this->setAttribute('readonly', 'readonly');
        }
        else
        {
            $this->removeAttribute('readonly');
        }
        
        return $this;
    }
    
    /**
     * @see QForm\Control\ControlInterface::isReadOnly
     */
    public function isReadOnly()
    {
        return ($this->hasAttribute('disabled') && $this->getAttribute('disabled') == 'disabled');
    }
}
?>
