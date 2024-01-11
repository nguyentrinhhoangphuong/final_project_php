<?php
class ContactController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('shop/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function aboutAction()
    {
        $this->_view->_title = 'Liên hệ';
        $this->_view->render('contact/index');
    }
}
