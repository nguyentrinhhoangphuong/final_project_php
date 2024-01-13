<?php
class BlogController extends Controller
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
		$this->_view->_title = 'Tất cả bài viết';
		$totalItems = $this->_model->countItem();
		$blogsPerPage = 6; // Số sách trên mỗi trang
		$this->_view->paging = new Paging($totalItems, $blogsPerPage);
		$this->_arrParam['paging'] = $this->_view->paging;
		$this->_view->_blogs = $this->_model->listItem($this->_arrParam, array('task' => 'blogs'));
		$this->_view->render('blog/index');
	}

	// ACTION: DETAIL BLOG
	public function detailAction()
	{
		$this->_view->_blogInfo 	= $this->_model->infoItem($this->_arrParam);
		$this->_view->_blogRelate 	= $this->_model->relate($this->_arrParam);
		$this->_view->render('blog/detail');
	}
}
