<?php
class IndexController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('shop/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function noticeAction()
	{
		$this->_view->render('index/notice');
	}

	public function indexAction()
	{
		$this->_view->specialBooks	= $this->_model->listItem($this->_arrParam, array('task' => 'books-special'));
		$this->_view->blog   		= $this->_model->listItem($this->_arrParam, array('task' => 'blog'));
		$this->_view->bookByCategory = $this->_model->listItem($this->_arrParam, array('task' => 'book-by-category'));
		$this->_view->listCategory = $this->_model->listItem($this->_arrParam, array('task' => 'list-category'));
		$this->_view->_slider = true;
		$this->_view->_mail = true;
		$this->_view->render('index/index');
	}

	public function registerAction()
	{
		$userInfo	= Session::get('user');
		if ($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()) {
			URL::redirect('shop', 'index', 'index');
		}

		if ($this->_arrParam['form']['token'] > 0) {
			// URL::checkRefreshPage($this->_arrParam['form']['token'], 'shop', 'user', 'register');
			URL::checkRefreshPage($this->_arrParam['form']['token'], 'shop', 'index', 'register');

			$queryUserName	= "SELECT `id` FROM `" . TBL_USER . "` WHERE `username` = '" . $this->_arrParam['form']['username'] . "'";
			$queryEmail		= "SELECT `id` FROM `" . TBL_USER . "` WHERE `email` = '" . $this->_arrParam['form']['email'] . "'";

			$validate = new Validate($this->_arrParam['form']);
			$validate->addRule('username', 'string-notExistRecord', array('database' => $this->_model, 'query' => $queryUserName, 'min' => 3, 'max' => 25))
				->addRule('email', 'email-notExistRecord', array('database' => $this->_model, 'query' => $queryEmail));

			$validate->run();

			$this->_arrParam['form'] = $validate->getResult();
			if ($validate->isValid() == false) {
				$this->_view->errors = $validate->showErrorsPublic();
			} else {

				$id	= $this->_model->saveItem($this->_arrParam, array('task' => 'user-register'));
				// URL::redirect('shop', 'index', 'notice', array('type' => 'register-success'));
				URL::redirect('shop', 'index', 'index');
			}
		}
	}

	public function logoutAction()
	{
		Session::delete('user');
		URL::redirect('shop', 'index', 'index');
	}

	public function loginAction()
	{
		$userInfo	= Session::get('user');
		if ($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()) {
			URL::redirect('shop', 'index', 'index');
		}

		$this->_view->_title 		= 'Login';

		if ($this->_arrParam['form']['token'] > 0) {
			$validate	= new Validate($this->_arrParam['form']);
			$email		= $this->_arrParam['form']['email'];
			$password	= md5($this->_arrParam['form']['password']);
			$query		= "SELECT `id` FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
			$validate->addRule('email', 'existRecord', array('database' => $this->_model, 'query' => $query));
			$validate->run();

			if ($validate->isValid() == true) {
				$infoUser		= $this->_model->infoItem($this->_arrParam);
				$arraySession	= array(
					'login'		=> true,
					'info'		=> $infoUser,
					'time'		=> time(),
					'group_acp'	=> $infoUser['group_acp']
				);
				Session::set('user', $arraySession);
				// URL::redirect('shop', 'user', 'index', null, 'my-account.html');
				URL::redirect('shop', 'index', 'index');
			} else {
				$this->_view->errors	= $validate->showErrorsPublic();
			}
		}
	}
}
