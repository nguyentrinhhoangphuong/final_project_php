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
		$this->_arrParam['category_id'] = $_GET['category_id'];

		$totalItems = $this->_model->countItem($this->_arrParam); // Số lượng sách tổng cộng
		$booksPerPage = 9; // Số sách trên mỗi trang
		$this->_view->paging = new Paging($totalItems, $booksPerPage);
		$this->_arrParam['paging'] = $this->_view->paging;

		$this->_view->listBookByCategory = $this->_model->listItem($this->_arrParam, array('task' => 'books-in-cat'));
		$this->_view->render('category/index');
	}
}
