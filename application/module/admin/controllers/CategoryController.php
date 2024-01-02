<?php
class CategoryController extends AdminController
{
	protected $paramForm;

	// ACTION: LIST GROUP
	public function indexAction()
	{
		$this->_view->_title 		= 'Category Manager :: List';
		$totalItems					= $this->_model->countItem($this->_arrParam, null);

		$configPagination = array('totalItemsPerPage'	=> 5, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->Items 		= $this->_model->listItem($this->_arrParam, null);
		$this->_view->render('category/index');
	}

	// ACTION: ADD & EDIT CATEGORY
	public function formAction()
	{
		$this->paramForm = $this->_view->arrParam['form'];
		$this->_view->_title = 'Category Manager :: Add';
		if (!empty($_FILES)) $this->_arrParam['form']['picture']  = $_FILES['picture'];

		if (isset($this->_arrParam['id'])) {
			$this->_view->_title = 'Category Manager :: Edit';
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
			if (empty($this->_arrParam['form'])) URL::redirect('admin', 'category', 'index');
		}

		if ($this->_arrParam['form']['token'] > 0) {
			$this->_validate->validate($this->_arrParam['form']);
			$this->_arrParam['form'] = $this->_validate->getResult();

			if ($this->_validate->isValid() == false) {
				$this->_view->errors = $this->_validate->showErrors();
			} else {
				$task	= (isset($this->_arrParam['form']['id'])) ? 'edit' : 'add';
				$id	= $this->_model->saveItem($this->_arrParam, array('task' => $task));
				if ($this->_arrParam['type'] == 'save-close') 	URL::redirect('admin', 'category', 'index');
				if ($this->_arrParam['type'] == 'save-new') 	URL::redirect('admin', 'category', 'form');
				if ($this->_arrParam['type'] == 'save') 		URL::redirect('admin', 'category', 'form', array('id' => $id));
			}
		}

		$this->_view->arrParam = $this->_arrParam;
		$this->_view->render('category/form');
	}
}
