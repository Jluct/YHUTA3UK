<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 11.02.2016
 * Time: 12:18
 */

class messager
{
    private $header = '';

    private $message;

    private $tpl = "
                        <div class=\"panel panel-%s alert alert-dismissible\" role=\"alert\">
                            <div class=\"panel-heading\"><h3>%s<small>%s</small></h3></div>
                            <div class=\"panel-body\">
                                <h4 style='color:black;'>%s</h4>
                            </div>

                    </div>";


    private $tpl_control = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='right:0px;color:black;'><span aria-hidden=\"true\">&times;</span></button>";

    private $tpl_class = ['default', 'success', 'info', 'warning', 'danger'];

    private $tpl_class_variable = 0;

    private $message_control = false;

    public function __construct($message)
    {
        if (!$message)
            return;
        $this->message = (string)$message;
    }

    function __toString()
    {
        // TODO: Implement __toString() method.

        if (!$this->message_control)
            $this->tpl_control = '';


        $data = sprintf($this->tpl, $this->tpl_class[$this->tpl_class_variable],
             $this->header, $this->tpl_control, $this->message);

        return $data;
    }

    /**
     * @param string $header
     * @return messager
     */
    public function setHeader($header)
    {
        $this->header = (string)$header;
        return $this;
    }

    /**
     * @param string $tpl
     * @return messager
     */
    public function setTpl($tpl)
    {
        $this->tpl = (string)$tpl;
        return $this;
    }

    /**
     * @param array $tpl_class
     */
    public function setTplClass($tpl_class)
    {
        $this->tpl_class = (array)$tpl_class;
        return $this;
    }

    /**
     * @param bool $message_control
     */
    public function setMessageControl($message_control)
    {
        $this->message_control = (bool)$message_control;
        return $this;
    }

    /**
     * @param int $tpl_class_variable
     * @return messager
     */
    public function setTplClassVariable($tpl_class_variable)
    {
        $this->tpl_class_variable = (int)$tpl_class_variable;
        return $this;
    }
}