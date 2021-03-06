<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

interface ControlInterface
{    
    /**
     * Returns name of control HTML tag
     * 
     * @return string Tag name
     */
    public function getTagName();
    
    
        
    /**
     * Returns tag attributes
     * 
     * @return array
     */
    public function getAttributes();
    
    /**
     * Returns value of attribute with specified name
     * 
     * @return string Attribute value
     */
    public function getAttribute($name);
    
    /**
     * Sets attribute
     * 
     * @param string $name Attribute name
     * @param string $value Attribute value
     * 
     * @return ControlInterface Self
     */
    public function setAttribute($name, $value);
        
    /**
     * Sets multiple attributes
     * 
     * @param array $attributes Attributes to set
     * 
     * @return ControlInterface Self
     */
    public function setAttributes(array $attributes);
    
    /**
     * Checks if attribute with specified name exists
     * 
     * @param string $name Attribute name
     * 
     * @return bool True if it exists, false otherwise
     */
    public function hasAttribute($name);
    
    
    
    /**
     * Set controls ID
     *
     * @param string $id Id
     * 
     * @return ControlInterface Self
     */
    public function setId($id);
    
    /**
     * Get controls Id
     *
     * @return string Control Id
     */
    public function getId();
    
    
    
    /**
     * Adds control CSS class.
     * 
     * More class than one can be added by connecting them with space.
     *
     * @param string $id Class names
     * 
     * @return ControlInterface Self
     */
    public function addClass($name);
    
    /**
     * Checks if control uses specified class
     *
     * @param string $name Name of the class
     * 
     * @return bool True if exists, false otherwise
     */
    public function hasClass($name);
    
    /**
     * Removes specified CSS class
     *
     * @return string Control Id
     */
    public function removeClass($name);
    
    
    /**
     * Sets content of the message that will be displayed on control hover
     *
     * @param string $text Title message
     * 
     * @return ControlInterface Self
     */
    public function setTitle($text);
    
    /**
     * Returns title message
     * 
     * @return string Title text
     */
    public function getTitle();
    
    /**
     * Sets control name
     * 
     * @param string $name Control names
     * 
     * @return ControlInterface Self
     */
    public function setName($name);
    
    /**
     * Returns control name
     * 
     * @return string Name
     */
    public function getName();
    
    /**
     * Renders specified control
     * 
     * @return string Rendered control
     */
    public function render();
    
    /**
     * Renders specified control
     * 
     * @return string
     */
    public function __toString();
    
    /**
     * Makes control enabled or disabled
     * 
     * @param bool $disable To disable control - true, false otherwise
     * 
     * @return ControlInterface self
     */
    public function setDisabled($disable = true);
    
    /**
     * Checks if control is disabled
     * 
     * @return bool True if control is disabled, false otherwise
     */
    public function isDisabled();
    
    /**
     * Sets control readonly or writeable
     * 
     * @param bool $readonly True to make control readonly, false otherwise
     * 
     * @return ControlInterface self
     */
    public function setReadOnly($readonly = true);
    
    /**
     * Checks if control is readonly
     * 
     * @return bool Readonly
     */
    public function isReadOnly();
}
?>
