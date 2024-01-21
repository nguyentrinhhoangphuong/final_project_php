<?php
class OrderModel extends Model
{

    private $_columns = array('code', 'fullname', 'email', 'phone', 'address', 'order_time', 'status', 'total_price');
    private $_columnsOrderDetails = array('product_id', 'order_id', 'quantity', 'price', 'total', 'product_name', 'product_image');
    private $_userInfo;

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_ORDER);
        $userObj             = Session::get('user');
        $this->_userInfo     = $userObj['info'];
    }

    public function saveOrder($arrParam, $option = null)
    {
        $order = array_intersect_key($arrParam, array_flip($this->_columns));
        // $lastId = $this->insert($order);

        $orderDetailsTable = $this->setTable(TBL_ORDER_DETAIL);

        echo '<pre style="color:red">';
        print_r($orderDetailsTable);
        echo '</pre>';
        $queryOrderDetails = '';
    }
}
