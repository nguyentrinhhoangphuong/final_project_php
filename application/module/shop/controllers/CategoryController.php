<?php
class CategoryController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('shop/main/');
		$this->_templateObj->setFileTemplate('index_sidebar.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	// ACTION: LIST CATGORIES
	public function indexAction()
	{
		$this->_view->_title = 'Category List';
		$this->setModel("shop", "book");

		$totalItems = $this->_model->countItem();
		$configPagination = array('totalItemsPerPage' => 6, 'pageRange' => 5);
		$this->setPagination($configPagination);
		$this->_view->pagination = new Pagination($totalItems, $this->_pagination);
		$this->_view->listBookByCategory = $this->_model->listItem($this->_arrParam, array('task' => 'books-in-cat'));
		$this->_view->render('category/index');
	}
}
