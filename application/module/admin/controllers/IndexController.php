<?php
class IndexController extends Controller
{
	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
	}

	public function loginAction()
	{
		$userInfo	= Session::get('user');
		if ($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()) {
			URL::redirect('admin', 'index', 'index');
		}

		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('login.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_view->_title 		= 'Login';

		if ($this->_arrParam['form']['token'] > 0) {
			// $validate	= new Validate($this->_arrParam['form']);

			// $validate->addRule('username', 'existRecord', array('database' => $this->_model, 'query' => $query));
			// $validate->run();

			$this->_validate->validate($this->_arrParam['form'], $this->_model);


			if ($this->_validate->isValid() == true) {
				$infoUser		= $this->_model->infoItem($this->_arrParam);
				$arraySession	= array(
					'login'		=> true,
					'info'		=> $infoUser,
					'time'		=> time(),
					'group_acp'	=> $infoUser['group_acp']
				);
				Session::set('user', $arraySession);
				URL::redirect('admin', 'index', 'index');
			} else {
				$this->_view->errors	= $this->_validate->showErrorsLogin();
			}
		}

		$this->_view->render('index/login');
	}

	public function indexAction()
	{
		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_view->_title 		= 'Index';

		$this->_view->render('index/index');
	}

	public function profileAction()
	{
		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_view->_title 		= 'Profile';
		$userObj	= Session::get('user');

		$this->_view->arrParam['form']	= $userObj['info'];
		$this->_view->render('index/profile');
	}

	public function logoutAction()
	{
		Session::delete('user');
		URL::redirect('admin', 'index', 'login');
	}
}
