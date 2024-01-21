<?php
class OrderController extends AdminController
{
    protected $paramForm;

    // ACTION: LIST GROUP
    public function indexAction()
    {
        $this->_view->_title         = 'Order Manager :: List';
        $totalItems                    = $this->_model->countItem($this->_arrParam, null);
        $configPagination = array('totalItemsPerPage'    => 5, 'pageRange' => 3);
        $this->setPagination($configPagination);
        $this->_view->pagination    = new Pagination($totalItems, $this->_pagination);
        $this->_view->Items         = $this->_model->listItem($this->_arrParam, null);
        $this->_view->render('order/index');
    }

    public function changeDeliveryStatusAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->_model->changeDeliveryStatus($this->_arrParam);
            if ($result == true) {
                $responseData = [
                    'msg' => "successfully",
                ];
                echo json_encode($responseData);
                exit;
            } else {
                echo "không thành công";
                exit;
            }
        } else {
            echo "Xảy ra lỗi REQUEST_METHOD";
            exit;
        }
    }

    public function infoOrderDetailAction()
    {
        $this->_view->_title         = 'CHI TIẾT ĐƠN HÀNG';
        $this->_view->result = $this->_model->infoOrderDetai($this->_arrParam);
        $this->_view->render('order/detail');
    }
}
