<?php
class AboutController extends Controller
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
        $this->_view->_title = 'About';
        $this->_view->render('about/index');
    }
}
