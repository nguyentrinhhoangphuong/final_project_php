<?php
class BlogValidate extends Validate
{
    public function __construct()
    {
        parent::__construct([]);
    }

    public function validate($params)
    {
        $this->setSource($params);
        $this->addRule('name', 'string', array('min' => 3, 'max' => 255))
            ->addRule('content', 'text')
            ->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
            ->addRule('status', 'status', array('deny' => array('default')))
            ->addRule('picture', 'file', array('min' => 100, 'max' => 6000000, 'extension' => array('jpg', 'png')), false);
        $this->run();
    }
}
