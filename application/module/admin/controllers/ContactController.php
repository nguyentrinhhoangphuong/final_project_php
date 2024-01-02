<?php
class ContactController extends AdminController
{
    public function indexAction()
    {
        $this->_view->_title = 'Contact Manager :: List';
        $totalItems = $this->_model->countItem($this->_arrParam, null);

        $configPagination = array('totalItemsPerPage' => 5, 'pageRange' => 3);
        $this->setPagination($configPagination);
        $this->_view->pagination    = new Pagination($totalItems, $this->_pagination);
        $this->_view->Items         = $this->_model->listItem($this->_arrParam, null);
        $this->_view->render('contact/index');
    }
}
