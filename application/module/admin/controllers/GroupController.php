<?php
class GroupController extends AdminController
{
	// ACTION: LIST GROUP
	public function indexAction()
	{
		$this->_view->_title 		= 'Group Manager :: List';
		$totalItems					= $this->_model->countItem($this->_arrParam, null);

		$configPagination = array('totalItemsPerPage'	=> 5, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->Items 		= $this->_model->listItem($this->_arrParam, null);
		$this->_view->render('group/index');
	}

	// ACTION: ADD & EDIT GROUP
	public function formAction()
	{
		$this->_view->_title = 'Group Manager :: Add';

		if (isset($this->_arrParam['id'])) {
			$this->_view->_title = 'Group Manager :: Edit';
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
			if (empty($this->_arrParam['form'])) URL::redirect('admin', 'group', 'index');
		}

		if ($this->_arrParam['form']['token'] > 0) {
			$this->_validate->validate();
			$this->_arrParam['form'] = $this->_validate->getResult();

			if ($this->_validate->isValid() == false) {
				$this->_view->errors = $this->_validate->showErrors();
			} else {
				$task = (isset($this->_arrParam['form']['id'])) ? 'edit' : 'add';
				$id	  = $this->_model->saveItem($this->_arrParam, array('task' => $task));
				$this->redirectAfterSave($this->_arrParam, array('id' => $id));
			}
		}

		$this->_view->arrParam = $this->_arrParam;
		$this->_view->render($this->_controllerName . '/form');
	}

	// ACTION: AJAX GROUP ACP (*)
	public function ajaxACPAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-group-acp'));
		echo json_encode($result);
	}
}
