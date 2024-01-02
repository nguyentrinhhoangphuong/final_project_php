<?php
class FaqValidate extends Validate
{
    public function __construct()
    {
        parent::__construct([]);
    }

    public function validate($params)
    {
        $this->setSource($params);
        $this->addRule('name', 'string', array('min' => 3, 'max' => 255))
            ->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
            ->addRule('status', 'status', array('deny' => array('default')));
        $this->run();
    }
}