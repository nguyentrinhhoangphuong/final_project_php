<?php
class FaqItemValidate extends Validate
{
    public function __construct()
    {
        parent::__construct([]);
    }

    public function validate($params)
    {
        $this->setSource($params);
        $this->addRule('question', 'string', array('min' => 3, 'max' => 255))
            ->addRule('answer', 'string', array('min' => 3, 'max' => 255))
            ->addRule('ordering', 'int', array('min' => 1, 'max' => 100))
            ->addRule('status', 'status', array('deny' => array('default')))
            ->addRule('faq_category_id', 'status', array('deny' => array('default')));
        $this->run();
    }
}
