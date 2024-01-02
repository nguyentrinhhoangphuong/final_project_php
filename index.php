<?php
require_once 'define.php';
error_reporting(E_ALL ^ E_WARNING);
// Tạo một hàm autoload
function my_autoloader($class)
{
	include LIBRARY_PATH . "$class.php";
}
// Đăng ký hàm autoload
spl_autoload_register('my_autoloader');
Session::init();
$bootstrap = new Bootstrap;
$bootstrap->init();
