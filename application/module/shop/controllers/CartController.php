<?php
class CartController extends Controller
{

    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('shop/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    // ACTION: LIST CATGORIES
    public function indexAction()
    {
        $this->_view->_title = 'Cart';
        $this->_view->render('cart/index');
    }
}
