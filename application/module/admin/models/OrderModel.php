<?php
class OrderModel extends Model
{
	private $_columns = array('id', 'name', 'picture', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering');
	private $_userInfo;

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_ORDER);
		$userObj 			= Session::get('user');
		$this->_userInfo 	= $userObj['info'];
	}

	public function countItem($arrParam, $option = null)
	{
		$query[]	= "SELECT COUNT(`id`) AS `total`";
		$query[]	= "FROM `$this->table`";
		$query[]	= "WHERE `id` > 0";

		// FILTER : KEYWORD
		if (!empty($arrParam['filter_search'])) {
			$keyword	= '"%' . $arrParam['filter_search'] . '%"';
			$query[]	= "AND `name` LIKE $keyword";
		}

		$query		= implode(" ", $query);
		$result		= $this->fetchRow($query);
		return $result['total'];
	}

	public function listItem($arrParam, $option = null)
	{
		if ($option == null) {
			$query[]	= "SELECT `id`, `code`, `fullname`, `email`, `phone`, `address`, `order_time`, `status`, `total_price`";
			$query[]	= "FROM `$this->table`";
			$query[]	= "WHERE `id` > 0";

			// FILTER : KEYWORD
			if (!empty($arrParam['filter_search'])) {
				$keyword	= '"%' . $arrParam['filter_search'] . '%"';
				$query[]	= "AND `name` LIKE $keyword";
			}

			// PAGINATION
			$pagination			= $arrParam['pagination'];
			$totalItemsPerPage	= $pagination['totalItemsPerPage'];
			if ($totalItemsPerPage > 0) {
				$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
				$query[]	= "LIMIT $position, $totalItemsPerPage";
			}

			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}
	}

	public function changeDeliveryStatus($arrParam)
	{
		$id = $arrParam['id'];
		$deliverystatus = $arrParam['deliverystatus'];
		$query = 'UPDATE `' . TBL_ORDER . '` SET status = ' . $deliverystatus . ' WHERE id = ' . $id;
		$result = $this->query($query);
		return $result;
	}

	public function infoOrderDetai($arrParam)
	{
		$code = $arrParam['code'];
		$query[] = "SELECT o.id, o.code, o.email, o.fullName, o.phone, o.address, o.order_time, o.total_price, od.name, od.price, od.quantity, od.picture ";
		$query[] = "FROM `order` AS o ";
		$query[] = "JOIN order_detail AS od ON o.id = od.order_id ";
		$query[] = "WHERE o.code = '$code'";
		$query		= implode(" ", $query);
		$result		= $this->fetchAll($query);
		return $result;
	}
}
