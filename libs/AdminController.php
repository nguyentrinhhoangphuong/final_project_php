<?php
class AdminController extends Controller
{
	public $_controllerName;

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_controllerName = $this->_arrParam['controller'];
	}


	// ACTION: AJAX STATUS (*)
	public function ajaxStatusAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-status'));
		echo json_encode($result);
	}

	// ACTION: STATUS (*)
	public function statusAction()
	{
		$this->_model->changeStatus($this->_arrParam, array('task' => 'change-status'));
		URL::redirect('admin', $this->_controllerName, 'index');
	}

	// ACTION: TRASH (*)
	public function trashAction()
	{
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect('admin', $this->_controllerName, 'index');
	}

	// ACTION: ORDERING (*)
	public function orderingAction()
	{
		$this->_model->ordering($this->_arrParam);
		URL::redirect('admin', $this->_controllerName, 'index');
	}

	public function redirectAfterSave($params, $options = [])
	{
		if ($params['type'] == 'save-close')   URL::redirect($params['module'], $params['controller'], 'index');
		if ($params['type'] == 'save-new')     URL::redirect($params['module'], $params['controller'], 'form');
		if ($params['type'] == 'save')         URL::redirect($params['module'], $params['controller'], 'form', $options);
	}
}
