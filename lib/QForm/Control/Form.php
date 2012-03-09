<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Form extends CompositeControl
{
    const MethodPost = "post";
    const MethodGet = "get";
    
    /**
     * Form target URI
     *
     * @var string
     */
    protected $target;
    
    /**
     * Form send method
     *
     * @var string
     */
    protected $method;
    
    
    /**
     * Creates new form
     * 
     * @param string $target    Form target, as URI
     */    
    public function __construct($target)
    {
        parent::__construct('form');
        $this->setTarget($target);
    }
    
    /**
     * Returns form action URI
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->getAttribute('action');
    }
    
    /**
     * Sets new form action
     *
     * @param string $target New form action, as URI
     * 
     * @return Form Self
     */
    public function setTarget($target)
    {
        $this->setAttribute('action', $target);
        
        return $this;
    }
    
    /**
     * Sets form method
     *
     * @param string $method 
     * 
     * @return Form Self
     */
    public function setMethod($method)
    {
        $this->method = $method;
        
        return $this;
    }
    
    /**
     * Returns form send method
     *
     * @return string "post" or "get"
     */
    public function getMethod()
    {
        return $this->method;
    }
}
?>
