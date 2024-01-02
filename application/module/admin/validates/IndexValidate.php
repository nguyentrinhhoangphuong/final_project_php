<?php
class IndexValidate extends Validate
{
    public function __construct()
    {
        parent::__construct([]);
    }

    public function validate($params, $model = null, $query = null)
    {
        $this->setSource($params);
        $username    = $params['username'];
        $password    = md5($params['password']);
        $query       = "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";

        $this->addRule('username', 'existRecord', array('database' => $model, 'query' => $query));
        $this->run();
    }
}
