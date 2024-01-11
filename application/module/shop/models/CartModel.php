<?php
class CartModel extends Model
{

    private $_columns = array('id', 'name', 'description', 'price', 'sale_off', 'picture', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering', 'category_id');
    private $_userInfo;
    public $page;

    public function __construct()
    {
        parent::__construct();

        $this->setTable(TBL_BOOK);
        $userObj             = Session::get('user');
        $this->_userInfo     = $userObj['info'];
        $this->page = 1;
    }

    public function listItem($arrParam, $option = null)
    {
        if ($option['task'] == 'books-in-cat') {
            $catID        = $arrParam['category_id'];
            $query[]    = "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`, `b`.`price`, `b`.`sale_off`, `c`.`name` AS `category_name`";
            $query[]    = "FROM " . TBL_BOOK . " as b ";
            $query[]    = "JOIN " . TBL_CATEGORY . " as c on c.id = b.category_id";
            if ($catID != "" && is_numeric($catID)) {
                $isExist = $this->checkId("SELECT id FROM " . TBL_CATEGORY . " WHERE id = " . $catID);
                if ($isExist) {
                    $query[]    = "WHERE b.`status`  = 1 AND b.`category_id` = '$catID'";
                } else {
                    $query[]    = "WHERE b.`status`  = 1";
                }
            } else {
                $query[]    = "WHERE b.`status`  = 1";
            }
            $query[]    = "ORDER BY b.`ordering` ASC";
        }

        if ($option['task'] == 'books-relate') {
            $bookID        = $arrParam['book_id'];
            // $catID		= $arrParam['category_id'];
            $category_id = $option['category_id'];
            $query[]    = "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`, `b`.`price`, `b`.`sale_off`, `c`.`name` AS `category_name`";
            $query[]    = "FROM `" . TBL_BOOK . "` AS `b`, `" . TBL_CATEGORY . "` AS `c`";
            $query[]    = "WHERE `b`.`status`  = 1  AND `c`.`id` = `b`.`category_id` AND `b`.`id` <> '$bookID' AND `c`.`id`  = '$category_id'";
            $query[]    = "ORDER BY `b`.`ordering` ASC";

            $query        = implode(" ", $query);
            $result        = $this->fetchAll($query);
            return $result;
        }

        if ($option['task'] == 'books-sales') {
            $query[]    = "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`, `b`.`price`, `b`.`sale_off`, `c`.`name` AS `category_name`";
            $query[]    = "FROM `" . TBL_BOOK . "` AS `b`, `" . TBL_CATEGORY . "` AS `c`";
            $query[]    = "WHERE `b`.`status`  = 1  AND `c`.`id` = `b`.`category_id` AND `b`.`sale_off` > 0";
            $query[]    = "ORDER BY `b`.`ordering` ASC";

            $query        = implode(" ", $query);
            $result        = $this->fetchAll($query);
            return $result;
        }

        // PAGINATION
        $pagination = $arrParam['pagination'];
        $pagination['currentPage']     = $this->getPage();
        $totalItemsPerPage    = $pagination['totalItemsPerPage'];
        if ($totalItemsPerPage > 0) {
            $position    = ($pagination['currentPage'] - 1) * $totalItemsPerPage;
            $query[]    = "LIMIT $position, $totalItemsPerPage";
        }

        $query        = implode(" ", $query);
        $result        = $this->fetchAll($query);
        return $result;
    }

    private function getPage()
    {
        if (isset($_GET['page'])) {
            $this->page = preg_replace('#[^0-9]#', '', $_GET['page']);
            $this->page = ($this->page == 0) ? 1 : $this->page; // Đảm bảo giá trị không là 0
            $this->page = max(1, $this->page); // Đảm bảo giá trị là số nguyên dương
        }
        return $this->page;
    }

    public function infoItem($arrParam, $option = null)
    {
        if ($option['task'] == 'get-cat-name') {
            $query    = "SELECT `name` FROM `" . TBL_CATEGORY . "` WHERE `id` = '" . $arrParam['category_id'] . "'";
            $result    = $this->fetchRow($query);
            return $result['name'];
        }

        if ($option['task'] == 'book-info') {
            $query    = "SELECT `b`.`id`, `b`.`name`, `c`.`name` AS `category_name`, `b`.`price`, `b`.`sale_off`, `b`.`picture`, `b`.`description`, `b`.`category_id` FROM `" . TBL_BOOK . "` AS `b`, `" . TBL_CATEGORY . "` AS `c` WHERE `b`.`id` = '" . $arrParam['book_id'] . "' AND `c`.`id` = `b`.`category_id`";
            $result    = $this->fetchRow($query);
            return $result;
        }
    }

    public function countItem()
    {
        $query[] = "SELECT COUNT(`id`) AS `total`";
        $query[] = "FROM " . TBL_BOOK;
        $query[] = "WHERE `id` > 0";
        $query        = implode(" ", $query);
        $result        = $this->fetchRow($query);
        return $result['total'];
    }
}
