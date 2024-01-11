<?php
class FaqController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('shop/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function indexAction()
    {
        $this->_view->_title = 'FAQ';
        $this->_view->faqs = $this->_model->listItem();
        $this->_view->render('faq/index');
    }
}
