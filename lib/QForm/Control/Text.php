<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm\Control;

class Text extends Control
{
    /**
     * Text to write
     *
     * @var string
     */
    protected $text;
    
    /**
     * Should text new lines be replaced with <br/> ?
     *
     * @var type 
     */
    protected $nl2br;
    
    public function __construct($text, $nl2br = true)
    {
        parent::__construct('');        
        $this->text = $text;
        $this->nl2br = $nl2br;
    }
    
    /**
     * Sets text
     *
     * @param string $text Text to write
     * 
     * @return Text Self
     */
    public function setText($text)
    {
        $this->text = $text;
        
        return $this;
    }
    
    /**
     * Returns text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }
    
    /**
     * Sets new lines to br option
     * 
     * If set, all new lines in text will be replaced to HTML <br/> tags.
     *
     * @param bool $replace Enable option?
     * 
     * @return Text Self
     */
    public function setNewLinesToBr($replace = true)
    {
        $this->nl2br = $replace;
        
        return $this;
    }
    
    /**
     * Returns true if option is enabled, false otherwise
     *
     * @return bool Is option enabled?
     */
    public function getNewLinesToBr()
    {
        return $this->nl2br;
    }
    
    public function render($indent = 0)
    {
        $text;
        if($this->nl2br)
        {
            $text = nl2br($this->text);
        }
        else
        {
            $text = $this->text;
        }
        
        return $this->appendIndent($text, $indent);
    }
}
?>
