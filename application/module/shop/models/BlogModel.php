<?php
class BlogModel extends Model
{

    private $_columns = array('id', 'name', 'content', 'picture', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering');
    private $_userInfo;

    public function __construct()
    {
        parent::__construct();

        $this->setTable(TBL_BLOG);
        $userObj             = Session::get('user');
        $this->_userInfo     = $userObj['info'];
    }

    public function listItem($arrParam = null, $option = null)
    {
        if ($option['task'] == 'blogs') {
            $query[]    = "SELECT *";
            $query[]    = "FROM `$this->table`";
            $query[]    = "WHERE `status`  = 1";
            $query[]    = "ORDER BY `id` DESC";
            $query        = implode(" ", $query);
            $result        = $this->fetchAll($query);
            return $result;
        }

        // PAGINATION
        // $pagination = $arrParam['pagination'];
        // $pagination['currentPage']     = $this->getPage();
        // $totalItemsPerPage    = $pagination['totalItemsPerPage'];
        // if ($totalItemsPerPage > 0) {
        //     $position    = ($pagination['currentPage'] - 1) * $totalItemsPerPage;
        //     $query[]    = "LIMIT $position, $totalItemsPerPage";
        // }
    }

    public function infoItem($arrParam, $option = null)
    {
        $query    = "SELECT * FROM `" . TBL_BLOG . "` WHERE `id` = '" . $arrParam['blog_id'] . "'";
        $result    = $this->fetchRow($query);
        return $result;
    }

    public function relate($arrParam)
    {
        $query = 'SELECT * FROM ' . TBL_BLOG . ' WHERE status = 1 AND id <> ' . $arrParam['blog_id'] . ' ORDER BY ID DESC LIMIT 0,5;';
        $result    = $this->fetchAll($query);
        return $result;
    }
}
