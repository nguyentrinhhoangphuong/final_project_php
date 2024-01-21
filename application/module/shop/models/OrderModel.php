<?php
class OrderModel extends Model
{

    private $_columns = array('code', 'fullname', 'email', 'phone', 'address', 'order_time', 'status', 'total_price');

    private $_userInfo;

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_ORDER);
        $userObj             = Session::get('user');
        $this->_userInfo     = $userObj['info'];
    }

    public function saveOrder($arrParam, $infoCart)
    {
        $order = array_intersect_key($arrParam, array_flip($this->_columns));
        $lastId = $this->insert($order);

        $this->setTable(TBL_ORDER_DETAIL);
        $arrInfoCart = [];
        foreach ($infoCart as $item) {
            $item['order_id'] = $lastId;
            $arrInfoCart[] = $item;
        }
        $this->insert($arrInfoCart, 'multi');
    }

    public function checkOrder($code)
    {
        $query = 'SELECT status FROM `order` WHERE code =  "' . $code . '"';
        $result = $this->fetchRow($query);
        $res = [];
        return $result['status'];
    }
}
