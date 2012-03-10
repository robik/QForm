<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm;

class Builder
{
    /**
     * Contains form control
     *
     * @var Form
     */
    protected $form;
    
    /**
     * Array of registred controls
     *
     * @var array 
     */
    protected $controls = array(
        'textbox'   => 'QForm\\Control\\Textbox',
        'password'  => 'QForm\\Control\\Password',
        'textarea'     => 'QForm\\Control\\Textarea',
        
        'reset'     => 'QForm\\Control\\Reset',
        'submit'    => 'QForm\\Control\\Submit',
        'button'    => 'QForm\\Control\\Button',
        
        'select'    => 'QForm\\Control\\Select',
        'option'    => 'QForm\\Control\\Option',
        
        'hidden'    => 'QForm\\Control\\Hidden',
        
        'label'     => 'QForm\\Control\\Label',
        'text'     => 'QForm\\Control\\Text',
        'br'     => 'QForm\\Control\\Newline',
        'newline'     => 'QForm\\Control\\Newline',
        
        'other'     => 'QForm\\Control\\Control',
        'control'     => 'QForm\\Control\\Control',
        
        'checkbox'  => 'QForm\\Control\\Checkbox',
        'radio'  => 'QForm\\Control\\Checkbox'
    );
    
    
    /**
     * Creates new Builder instance
     *
     * @param string $target Form target
     */
    public function __construct($target)
    {
        $this->form = new Control\Form($target);
    }
    
    /**
     * Calls specified binding
     * 
     * @return Builder Self
     */
    public function __call($name, $arguments)
    {
        if(isset($this->controls[$name]))
        {
            $this->form->addChild($this->createControl($name, $arguments));
        }
        
        return $this;
    }
    
    /**
     * Returns rendered form
     *
     * @param int $indent Indent level
     */
    public function render($indent = 0)
    {
        return $this->form->render($indent);
    }
    
    /**
     * Returns Form instance
     *
     * @return Control\CompositeControlInterface Form instance
     */
    public function getForm()
    {
        return $this->form;
    }
    
    /**
     * Sets form object instance
     *
     * @param Control\CompositeControlInterface $form Form
     * 
     * @return Builder Self
     */
    public function setForm(Control\CompositeControlInterface $form)
    {
        $this->form = $form;
        
        return $this;
    }
    
    /**
     * Registers new control binding
     *
     * @param string $name Name of the class binding
     * @param string $class Class name, including namespace
     * 
     * @throws InvalidArgumentException
     * 
     * <code>
     * $builder->registerControl('reCaptcha', 'MyControls\ReCaptcha');
     * $builder->reCaptcha($param, $param2);
     * </code>
     * 
     * @return Builder 
     */
    public function registerControl($name, $class)
    {
        if( !class_exists($class))
        {
            throw new \InvalidArgumentException("Class '$class' does not exist.");
        }
        
        $this->controls[$name] = $class;
        
        return $this;
    }
    
    /**
     * Removes control with specified name binding
     *
     * @param string $name Name of the binding
     * 
     * @return Builder Self
     */
    public function unregisterControl($name)
    {
        unset($this->controls[$name]);
        
        return $this;
    }
    
    /**
     * Creates new control object
     *
     * @param array $arguments Array of argumens to pass
     * 
     * @return Object Instance
     */
    protected function createControl($name, $arguments)
    {
        $r = new \ReflectionClass($this->controls[$name]);
        return $r->newInstanceArgs($arguments);
    }
}

?>
