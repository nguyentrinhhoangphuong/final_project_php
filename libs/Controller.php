<?php
class Controller
{

	// View Object
	protected $_view;

	// Model Object
	protected $_model;

	// Validate Object
	protected $_validate;

	// Template object
	protected $_templateObj;

	// Params (GET - POST)
	protected $_arrParam;

	// Pagination
	protected $_pagination	= array(
		'totalItemsPerPage'	=> 10,
		'pageRange'			=> 2,
	);

	public function __construct($arrParams)
	{
		$this->setModel($arrParams['module'], $arrParams['controller']);
		$this->setValidate($arrParams['module'], $arrParams['controller']);
		$this->setTemplate($this);
		$this->setView($arrParams['module']);

		$this->_pagination['currentPage']	= (isset($arrParams['filter_page'])) ? $arrParams['filter_page'] : 1;
		$arrParams['pagination'] = $this->_pagination;
		$this->setParams($arrParams);

		$this->_view->arrParam = $arrParams;
	}
	// SET VALIDATE
	public function setValidate($moduleName, $modelName)
	{
		$modelName = ucfirst($modelName) . 'Validate';
		$path = MODULE_PATH . $moduleName . DS . 'validates' .  DS . $modelName . '.php';
		if (file_exists($path)) {
			require_once $path;
			$this->_validate = new $modelName();
		}
	}

	// SET MODEL
	public function setModel($moduleName, $modelName)
	{
		$modelName = ucfirst($modelName) . 'Model';
		$path = MODULE_PATH . $moduleName . DS . 'models' .  DS . $modelName . '.php';
		if (file_exists($path)) {
			require_once $path;
			$this->_model	= new $modelName();
		}
	}

	// GET MODEL
	public function getModel()
	{
		return $this->_model;
	}

	// SET VIEW
	public function setView($moduleName)
	{
		$this->_view = new View($moduleName);
	}

	// GET VIEW
	public function getView()
	{
		return $this->_view;
	}

	// SET TEMPLATE
	public function setTemplate()
	{
		$this->_templateObj = new Template($this);
	}

	// GET TEMPLATE
	public function getTemplate()
	{
		return $this->_templateObj;
	}

	// GET PARAMS
	public function setParams($arrParam)
	{
		$this->_arrParam = $arrParam;
	}

	// SET PARAMS
	public function getParams($arrParam)
	{
		$this->_arrParam = $arrParam;
	}

	// SET PAGINATION
	public function setPagination($config)
	{
		$this->_pagination['totalItemsPerPage'] = $config['totalItemsPerPage'];
		$this->_pagination['pageRange']			= $config['pageRange'];
		$this->_arrParam['pagination']			= $this->_pagination;
		$this->_view->arrParam					= $this->_arrParam;
	}
}
