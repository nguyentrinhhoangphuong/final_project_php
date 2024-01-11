<?php
class FaqModel extends Model
{

    private $_columns = array('id', 'name', 'picture', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering');
    private $_userInfo;

    public function __construct()
    {
        parent::__construct();

        $this->setTable(TBL_FAQ_ITEM);
        $userObj             = Session::get('user');
        $this->_userInfo     = $userObj['info'];
    }

    public function listItem($arrParam = null, $option = null)
    {
        $query[]    = "SELECT a.question, a.answer, b.name as faq_category_name, b.id as faq_category_id";
        $query[]    = "FROM " . TBL_FAQ_ITEM . " as a";
        $query[]    = "JOIN " . TBL_FAQ_CATEGORY . " as b ON a.faq_category_id = b.id";
        $query[]    = "WHERE a.`status`  = 1";

        $query        = implode(" ", $query);
        $result        = $this->fetchAll($query);
        return $result;
    }
}
