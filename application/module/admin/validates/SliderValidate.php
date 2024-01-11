<?php
class SliderValidate extends Validate
{
    public function __construct()
    {
        parent::__construct([]);
    }

    public function validate($parmas)
    {
        $this->setSource($parmas);
        $this->addRule('title', 'string', array('min' => 1, 'max' => 255))
            ->addRule('picture', 'file', array('min' => 100, 'max' => 5000000, 'extension' => array('jpg', 'png')), false)
            ->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
            ->addRule('status', 'status', array('deny' => array('default')));
        $this->run();
    }
}
