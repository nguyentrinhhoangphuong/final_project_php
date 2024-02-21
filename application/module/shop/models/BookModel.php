<?php
class BookModel extends Model
{

	private $_columns = array('id', 'name', 'description', 'price', 'sale_off', 'picture', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering', 'category_id');
	private $_userInfo;

	public function __construct()
	{
		parent::__construct();

		$this->setTable(TBL_BOOK);
		$userObj 			= Session::get('user');
		$this->_userInfo 	= $userObj['info'];
	}

	public function listItem($arrParam, $option = null)
	{
		if ($option['task'] == 'books-in-cat') {
			$catID		= $arrParam['category_id'];
			$searchTerm = isset($arrParam['search_term']) ? $arrParam['search_term'] : '';

			$query[]	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`,`b`.`description`, `b`.`price`, `b`.`sale_off`, `c`.`name` AS `category_name`";
			$query[]	= "FROM " . TBL_BOOK . " as b ";
			$query[]	= "JOIN " . TBL_CATEGORY . " as c on c.id = b.category_id";
			if (!empty($searchTerm)) {
				$query[] = "WHERE b.`status` = 1 AND (b.`name` LIKE '%$searchTerm%' OR c.`name` LIKE '%$searchTerm%')";
			} else {
				if ($catID != "" && is_numeric($catID)) {
					$isExist = $this->checkId("SELECT id FROM " . TBL_CATEGORY . " WHERE id = " . $catID);
					if ($isExist) {
						$query[]	= "WHERE b.`status`  = 1 AND b.`category_id` = '$catID'";
					} else {
						$query[]	= "WHERE b.`status`  = 1";
					}
				} else {
					$query[]	= "WHERE b.`status`  = 1";
				}
			}

			$sortingOrder = isset($_GET['sorting_order']) ? $_GET['sorting_order'] : 'default';
			switch ($sortingOrder) {
				case 'low_high':
					$query[] = "ORDER BY b.price ASC";
					break;
				case 'high_low':
					$query[] = "ORDER BY b.price DESC";
					break;
				case 'default':
					$query[]	= "ORDER BY b.`ordering` ASC";
			}
		}

		if ($option['task'] == 'books-relate') {
			$bookID		= $arrParam['book_id'];
			// $catID		= $arrParam['category_id'];
			$category_id = $option['category_id'];
			$query[]	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`, `b`.`price`, `b`.`sale_off`, `c`.`name` AS `category_name`";
			$query[]	= "FROM `" . TBL_BOOK . "` AS `b`, `" . TBL_CATEGORY . "` AS `c`";
			$query[]	= "WHERE `b`.`status`  = 1  AND `c`.`id` = `b`.`category_id` AND `b`.`id` <> '$bookID' AND `c`.`id`  = '$category_id'";
			$query[]	= "ORDER BY `b`.`ordering` ASC";

			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}

		if ($option['task'] == 'books-sales') {
			$query[]	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`, `b`.`price`, `b`.`sale_off`, `c`.`name` AS `category_name`";
			$query[]	= "FROM `" . TBL_BOOK . "` AS `b`, `" . TBL_CATEGORY . "` AS `c`";
			$query[]	= "WHERE `b`.`status`  = 1  AND `c`.`id` = `b`.`category_id` AND `b`.`sale_off` > 0";
			$query[]	= "ORDER BY `b`.`ordering` ASC";

			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}

		// PAGINATION
		$pagination = $arrParam['paging'];
		$limit	= $pagination->getLimit();
		$totalItemsPerPage	= $pagination->getPageRow();
		if ($totalItemsPerPage > 0 & $limit >= 0) {
			$query[]	= "LIMIT $limit, $totalItemsPerPage";
		}

		$query		= implode(" ", $query);
		$result		= $this->fetchAll($query);
		return $result;
	}

	public function infoItem($arrParam, $option = null)
	{
		if ($option['task'] == 'get-cat-name') {
			$query	= "SELECT `name` FROM `" . TBL_CATEGORY . "` WHERE `id` = '" . $arrParam['category_id'] . "'";
			$result	= $this->fetchRow($query);
			return $result['name'];
		}

		if ($option['task'] == 'book-info') {
			$query	= "SELECT `b`.`id`, `b`.`name`, `c`.`name` AS `category_name`, `b`.`price`, `b`.`sale_off`, `b`.`picture`, `b`.`description`, `b`.`category_id` FROM `" . TBL_BOOK . "` AS `b`, `" . TBL_CATEGORY . "` AS `c` WHERE `b`.`id` = '" . $arrParam['book_id'] . "' AND `c`.`id` = `b`.`category_id`";
			$result	= $this->fetchRow($query);
			return $result;
		}
	}

	public function countItem($arrParam)
	{
		$category_id = $arrParam['category_id'];
		$searchTerm = isset($arrParam['search_term']) ? $arrParam['search_term'] : '';

		$query[] = "SELECT COUNT(b.id) AS total";
		$query[] = "FROM " . TBL_BOOK . " AS b";
		$query[] = "JOIN " . TBL_CATEGORY . " AS c ON b.category_id = c.id";

		if ($category_id == 'all') {
			$query[] = 'WHERE b.id > 0';
		} else if (isset($category_id) && is_numeric($category_id)) {
			$count = $this->count('SELECT COUNT(*) FROM ' . TBL_BOOK . ' WHERE category_id = ' . $category_id . ' ');
			if ($count > 0) {
				$query[] = 'WHERE b.category_id = ' . $category_id . '';
			}
		} else if (!empty($searchTerm)) {
			$query[] = "WHERE b.`name` LIKE '%$searchTerm%' OR c.`name` LIKE '%$searchTerm%'";
		} else {
			$query[] = 'WHERE b.id > 0';
		}

		$query		= implode(" ", $query);
		$result		= $this->fetchRow($query);

		return $result['total'];
	}
}
