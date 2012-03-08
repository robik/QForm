<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class CompositeControl extends Control implements CompositeControlInterface
{
    /**
     * Contains array of childs
     *
     * @var array
     */
    protected $childs = array();
    
    
    /**
     * @see QForm\Control\CompositeControlInterface::addChild
     */
    public function addChild(ControlInterface $child)
    {
        $this->childs[] = $child;
        
        return $this;
    }
    
    /**
     * @see QForm\Control\CompositeControlInterface::removeChild
     */
    public function removeChild($name)
    {
        foreach($this->childs as $i => $child)
        {
            if($child->getName() == $name)
            {
                unset($this->childs[$i]);
            }
        }
        
        return $this;
    }
    
    /**
     * @see QForm\Control\CompositeControlInterface::hasChild
     */
    public function hasChild($name)
    {
        foreach($this->childs as $i => $child)
        {
            if($child->getName() == $name)
            {
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * @see QForm\Control\CompositeControlInterface::addChilds
     */
    public function addChilds(array $array)
    {
        foreach($array as $element)
        {
            if($element instanceof ControlInterface == false)
            {
                throw new \InvalidArgumentException('Array elements specified'
                        .' to Control::addChilds must be instance of ControlInterface');
            }
            
            $this->addChild($element);
        }
        
        return $this;
    }
    
    /**
     * Returns child with specified name
     * 
     * If more that one controls with same name, first will be returned.
     *
     * @param string $name Name of the child
     * 
     * @return ControlInterface
     */
    public function getChildByName($name)
    {
        if($this->hasChild($name) == false)
        {
            throw new \RuntimeException("No child with name '$name'");
        }
        
        foreach($this->childs as $i => $child)
        {
            if($child->getName() == $name)
            {
                return $child;
            }
        }
    }
    
    /**
     * @see QForm\Control\CompositeControlInterface::getChilds
     */
    public function getChilds()
    {
        return $this->childs;
    }
    
    /**
     * Used to loop through control childs
     *
     * @return \RecursiveArrayIterator 
     */
    public function getIterator()
    {
        return new \RecursiveArrayIterator($this->childs);
    }
}
?>
