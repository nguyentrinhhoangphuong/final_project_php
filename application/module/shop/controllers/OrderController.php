<?php

class OrderController extends Controller
{
    private $total = 0;
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('shop/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
        $this->total = 0;
        foreach (Session::get('cart') as $item) {
            $this->total += $item['price'] * $item['quantity'];
        }
    }

    // ACTION: LIST CART
    public function indexAction()
    {
        $this->_view->_title = 'Thanh toán';
        $this->_view->orderSummary = Session::get('cart');
        $this->_view->total = $this->total;
        $this->_view->render('order/index');
    }

    public function saveInfoOrderAction()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $total_price = Session::get('total_price');
            Session::set('info-order', array('fullName' => $fullName, 'email' => $email, 'phone' => $phone, 'address' => $address, 'total_price' => $total_price));
        } else {
            echo "Yêu cầu không hợp lệ";
        }
    }

    public function reviewAction()
    {
        $this->_view->_title = 'Thanh toán';
        $this->_view->orderSummary = Session::get('cart');
        $this->_view->total = $this->total;
        $this->_view->render('order/review');
    }

    public function completeAction()
    {
        $infoOrder = Session::get('info-order');
        $infoCart = Session::get('cart');
        $email = '';
        if (isset($infoOrder) && isset($infoCart)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $code = Helper::generateRandomString();
            $fullName = $infoOrder['fullName'];
            $email = $infoOrder['email'];
            $phone = $infoOrder['phone'];
            $address = $infoOrder['address'];
            $total_price = $infoOrder['total_price'];
            $order_time = date("Y-m-d H:i:s");
            $status = 1;
            $data = array(
                'code'        => $code,
                'fullname'    => $fullName,
                'email'       => $email,
                'phone'       => $phone,
                'address'     => $address,
                'order_time'  => $order_time,
                'status'      => $status,
                'total_price' => $total_price
            );
            $this->_model->saveOrder($data, $infoCart);
            $mail = new MailSender();

            // Gửi email cho admin
            $emailContent = "<h2>Bạn có đơn hàng mới:</h2>";
            $emailContent .= "<table border='1'>";
            $emailContent .= "<tr><td>Mã đơn hàng:</td><td>" . $code . "</td></tr>";
            $emailContent .= "<tr><td>Tên khách hàng:</td><td>" . $fullName . "</td></tr>";
            $emailContent .= "<tr><td>Email:</td><td>" . $email . "</td></tr>";
            $emailContent .= "<tr><td>Số điện thoại:</td><td>" . $phone . "</td></tr>";
            $emailContent .= "<tr><td>Địa chỉ:</td><td>" . $address . "</td></tr>";
            $emailContent .= "<tr><td>Thời gian đặt hàng:</td><td>" . $order_time . "</td></tr>";
            $emailContent .= "<tr><td>Tổng giá trị đơn hàng:</td><td>" . $total_price . "</td></tr>";
            $emailContent .= "</table>";
            $mailParams = array(
                'title' => 'Đơn hàng mới',
                'message' => $emailContent
            );
            $mail->sendMail($mailParams, array('task' => 'send-mail-to-admin'));



            // Gửi email cho user
            $usermail = new MailSender();
            $emailContentUser = "<h2>Cảm ơn bạn đã đặt hàng!</h2>";
            $emailContentUser .= "<p>Đơn hàng của bạn có mã: " . $code . "</p>";
            $emailContentUser .= "<table border='1'>";
            $emailContentUser .= "<tr><th>Sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Thành tiền</th></tr>";
            foreach (Session::get('cart') as $item) {
                $name = $item['name'];
                $price = $item['price'];
                $quantity = $item['quantity'];
                $itemTotal = $price * $quantity;

                // Add a new row for each item
                $emailContentUser .= "<tr>";
                $emailContentUser .= "<td>" . $name . "</td>";
                $emailContentUser .= "<td>" . $price . "</td>";
                $emailContentUser .= "<td>" . $quantity . "</td>";
                $emailContentUser .= "<td>" . number_format($itemTotal) . " đ</td>";
                $emailContentUser .= "</tr>";
            }
            $emailContentUser .= "</table>";
            // Add the total price information
            $emailContentUser .= "<p>Tổng giá trị đơn hàng: " . number_format($total_price) . " đ</p>";
            $emailContentUser .= "<p>Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi. Chúng tôi rất trân trọng sự ủng hộ của bạn!</p>";
            // Gửi email cho người dùng
            $userMailParams = array(
                'title' => 'Xác nhận đơn hàng',
                'message' => $emailContentUser
            );
            $usermail->sendMail($userMailParams, array('task' => 'send-mail-to-user', 'email' => $email));
        }
        unset($_SESSION['cart']);
        $this->_view->code = $code;
        $this->_view->render('order/complete');
    }

    public function viewCheckOrderAction()
    {
        $this->_view->render('order/formCheck');
    }

    public function checkOrderAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = isset($_POST['code']) ? $_POST['code'] : '';
            $this->_view->result = $this->_model->checkOrder($code);
            $this->_view->code = $code;
            $this->_view->render('order/check');
        }
    }
}
