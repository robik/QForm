<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm;

class Validator
{
    /**
     * Contains defined filters
     *
     * @var array
     */
    protected $filters = array();
    
    /**
     * Contains errors
     *
     * @var array
     */
    protected $errors = array();
    
    /**
     * Contains validation rules
     *
     * @var array
     */
    protected $rules = array();
    
    /**
     * Array of messags
     *
     * @var array
     */
    protected $messages = array();
    
    
    public function __construct(array $rules = array(), array $messages = array())
    {
        $this->setRules($rules);
        $this->setMessages($messages);
        $this->filters = array(
            'length'    => array($this, 'filterLength'),
            'type'      => array($this, 'filterType'),
            'match'     => array($this, 'filterMatch'),
            'minLength' => array($this, 'filterMinLength'),
            'maxLength' => array($this, 'filterMaxLength'),
            'oneOf'     => array($this, 'filterOneOf'),
            'contains'  => array($this, 'filterContains'),
        );
    }
    
    
    /**
     * Validates specified array
     *
     * @param array $array Array to validate 
     * 
     * @return Validator Self
     */
    public function validate(array $array)
    {
        foreach($this->rules as $name => $rules)
        {
            if( !isset($array[$name]) && (!isset($rules['required']) || $rules['required'] == false) )
            {
                throw new RuntimeException("Key '$name' not set, but it's required");
            }
            
            $this->parseRules($array, $name, $rules);
        }
        
        return $this;
    }
    
    protected function parseRules($array, $name, $rules)
    {
        foreach($rules as $filtername => $rule)
        {
            if($this->hasFilter($filtername))
            {
                $filter = $this->filters[$filtername];
                $isValid = call_user_func_array($filter, array($array[$name], $rule));
                if(!$isValid)
                {
                    $this->addError($this->getMessage($name, $filtername));
                }
            }
            else
            {
                throw new \RuntimeException("Unknown filter: '$filtername'");
            }
        }
    }
    
    /**
     * Returns array with errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
    
    /**
     * Adds new error
     *
     * @param string $msg Error message
     */
    protected function addError($msg)
    {
        $this->errors[] = $msg;
    }
    
    /**
     * Checks if validation was success
     * 
     * @return bool True if it's correct, false otherwise.
     */
    public function isCorrect()
    {
        return count($this->errors) == 0;
    }
    
    
    /**
     * Sets validation rules array
     * 
     * Example array would look like:
     * <code>
     * $messages = array(
     *      'somePostField' => array(
     *          'type'  =>  'string'
     *      )
     * );
     * </code>
     *
     * @param array $rules Validation rules
     * 
     * @return Validator Slef
     */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
        
        return $this;
    }
    
    /**
     * Returns validation rules
     * 
     * @return array Rules
     */
    public function getRules()
    {
        return $this->rules;
    }
    
    /**
     * Sets new errors messages
     * 
     * Example array would look like:
     * <code>
     * $messages = array(
     *      'somePostField' => array(
     *          'type'  =>  'Invalid Type'
     *      )
     * );
     * </code>
     *
     * @param array $messages Array of messages
     * 
     * @return Validator Self
     */
    public function setMessages(array $messages = array())
    {
        $this->messages = $messages;
        
        return $this;
    }
    
    /**
     * Returns error messages
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }
        
    
    /**
     * Adds new filter
     *
     * @param string $name Name of the filter
     * @param mixed $filter Filter function
     * 
     * @return Validator Self 
     */
    public function addFilter($name, $filter)
    {
        if( !is_callable($filter))
        {
            throw new \InvalidArgumentException("Specified filter is not callable");
        }            
        
        $this->filters[$name] = $filter;
        
        return $this;
    }
    
    /**
     * Checks if specified filter has been added
     *
     * @param string $name Name of the filter
     * 
     * @return bool True if exists, false otherwise
     */
    public function hasFilter($name)
    {
        return isset($this->filters[$name]);
    }
    
    /**
     * Removes filter
     *
     * @param string $name Filter name
     * 
     * @return Validator Self
     */
    public function removeFilter($name)
    {
        unset($this->filters[$name]);
        
        return $this;
    }
    
    /**
     * Returns error message
     * 
     * @param string $name Variable name
     * @param string $filter Filter name
     * 
     * @return string 
     */
    public function getMessage($name, $filter)
    {
        if(!isset($this->messages[$name][$filter]))
        {
            throw new \RuntimeException("No error message for '$name\\$filter' ");
        }
        
        return $this->messages[$name][$filter];
    }
    
    protected function filterType($value, $param)
    {
        switch($param)
        {
            case 'ip':
                return (filter_var($value, FILTER_VALIDATE_IP) !== false);
                break;
            case 'url':
                return (filter_var($value, FILTER_VALIDATE_URL) !== false);
                break;
            
            case 'email':
                return (filter_var($value, FILTER_SANITIZE_EMAIL) !== false);
                break;
            
            case 'number':
                return (filter_var($value, FILTER_VALIDATE_INT) !== false);                
                break;
            
            default:
                return false;
        }
        return gettype($value) == $param;
    }
    
    protected function filterLength($value, $param)
    {
        return strlen($value) == $param;
    }
    
    protected function filterMatch($value, $param)
    {
        return preg_match($param, $value);
    }
    
    protected function filterMinLength($value, $param)
    {
        return strlen($value) >= $param;
    }
    protected function filterMaxLength($value, $param)
    {
        return strlen($value) <= $param;
    }
    
    protected function filterOnOf($value, $param)
    {
        return in_array($value, $param);
    }
    
    protected function filterContains($value, $param)
    {
        return strpos($value, $param) != -1;
    }
}

?>
