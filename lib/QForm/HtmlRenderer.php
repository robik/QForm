<?php

/*
 * This file is part of QForm
 * 
 * @author Robert Pasiński <szadows@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace QForm;

class HtmlRenderer implements RendererInterface
{
    /**
     * Indent level
     *
     * @var int Indent
     */
    protected $indent = 0;
    
    /**
     * Renders Control and it's childs
     *
     * @param ControlInterface $control Control to render
     * 
     * @return string 
     */
    public function render(ControlInterface $control)
    {               
        $return = $this->renderControl($control);
        
        if($control instanceof CompositeControlInterface)
        {
            $this->indent++;
            foreach($control as $child)
            {
                $return .= $this->render($child);
            }            
            $this->indent--;
            $return .= $this->appendIndent("</{$control->getTagName()}>\n");
        }
        
        return $return;
    }
    
    /**
     * Renders control to HTML string
     *
     * @param ControlInterface $control Control to render
     * 
     * @return string 
     */
    protected function renderControl(ControlInterface $control)
    {
        $attributes; $tag;
        
        $attributes = $this->attributesToString($control->getAttributes());
        $tag        = $this->appendIndent("<{$control->getTagName()} $attributes");
        
        if($control instanceof CompositeControlInterface)
        {
            $tag .= ">\n";
        }
        else
        {
            $tag .= " />\n";
        }
        
        return $tag;
    }
    
    /**
     * Converts array of attributes to HTML string
     *
     * @param array $attributes Control attributes
     * 
     * @return string 
     */
    protected function attributesToString($attributes)
    {
        $array = array();
        
        foreach($attributes as $name => $value)
        {
            $array[] = $name.'="'.addslashes($value).'"';
        }
        
        return implode(' ', $array);
    }
    
    /**
     * Appends indent to string
     *
     * @param string $string String to add indent
     * 
     * @return string
     */
    protected function appendIndent($string)
    {
        return str_repeat('    ', $this->indent).$string;
    }
}
?>
