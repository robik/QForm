<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

interface CompositeControlInterface extends ControlInterface, \IteratorAggregate
{
    /**
     * Adds child to current control
     * 
     * Child must implement ControlInterface. Added childs will be rendered in add order.
     * 
     * @param ControlInterface $child Child to add
     * 
     * @return ControlInterface Self
     */
    public function addChild(ControlInterface $child);
    
    /**
     * Adds array of controls
     * 
     * @param array $childs Array of childs
     * 
     * @return ControlInterface Self
     */
    public function addChilds(array $childs);
    
    /**
     * Removes child
     * 
     * If more than one controls exists with the same name, all will be removed.
     * 
     * @param string $name Removes child by name
     * 
     * @return ControlInterface Self
     */
    public function removeChild($name);
    
    /**
     * Checks if child exists
     * 
     * @param string $name Name of control to check existence
     * 
     * @return bool True if exists, false otherwise
     */
    public function hasChild($name);
    
    /**
     * Returns array of childs
     * 
     * @return array
     */
    public function getChilds();
    
    /**
     * This function appends text to current tag.
     *
     * @param string $text Text to add
     */
    public function appendText($text);
}
?>
