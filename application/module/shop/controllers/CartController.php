<?php
class CartController extends Controller
{

    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('shop/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    // ACTION: LIST CART
    public function indexAction()
    {
        $this->_view->_title = 'Cart';
        $this->_view->render('cart/index');
    }

    public function addToWistList()
    {
    }

    public function addToCartAction()
    {
        // Thay đổi này để nhận dữ liệu từ phía client
        $infoBookJson = file_get_contents("php://input");
        if ($infoBookJson) {
            $infoBook = json_decode($infoBookJson, true);
            if ($infoBook && isset($infoBook['infoBook'])) {
                $book = json_decode($infoBook['infoBook'], true);
                $bookId = $book['bookId'];
                $bookName = $book['bookName'];
                $bookPicture = $book['picture'];
                $bookQuantity = $book['quantity'];
                $price = $book['price'];
                // Kiểm tra nếu giỏ hàng chưa tồn tại, tạo một giỏ hàng trống
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                }
                // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
                if (isset($_SESSION['cart'][$bookId])) {
                    $_SESSION['cart'][$bookId]['quantity'] += $bookQuantity;
                } else {
                    $_SESSION['cart'][$bookId] = array(
                        'bookId' => $bookId,
                        'name' => $bookName,
                        'picture' => $bookPicture,
                        'price' => $price,
                        'quantity' => $bookQuantity,
                        'total' => $price * $bookQuantity,
                    );
                }
                $numberOfBooks = 0;
                $total = 0;
                foreach (Session::get('cart') as $item) {
                    $numberOfBooks += $item['quantity'];
                    $total += $item['price'] * $item['quantity'];
                    Session::set('total_price', $total);
                }
                //TODO: AJAX
                $responseData = [
                    'books' => $_SESSION['cart'],
                    'numberOfBooks' => $numberOfBooks,
                    'total' => number_format($total),
                ];
                echo json_encode($responseData);
                exit;
            }
        } else {
            echo "Dữ liệu JSON không tồn tại";
            exit;
        }
    }

    public function cartAction()
    {
        $this->_view->books = Session::get('cart');
        $this->_view->total = 0;
        foreach (Session::get('cart') as $item) {
            $this->_view->total += $item['price'] * $item['quantity'];
        }
        $this->_view->render('cart/cart');
    }

    public function updateCartAction()
    {
        $quantityBookJson = file_get_contents("php://input");
        if (isset($quantityBookJson)) {
            $quantityBook = json_decode($quantityBookJson, true);
            foreach ($quantityBook['updates'] as $item) {
                $bookId = $item['bookId'];
                $quantity = $item['quantity'];
                if (isset($_SESSION['cart'][$bookId])) {
                    $_SESSION['cart'][$bookId]['quantity'] = $quantity;
                }
            }

            $total = 0;
            foreach (Session::get('cart') as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            //TODO: AJAX
            $responseData = [
                'total' => number_format($total),
            ];
            echo json_encode($responseData);
            exit;
        }
    }

    public function deleteItemAction()
    {
        $deleteItemJson = file_get_contents("php://input");
        if (isset($deleteItemJson)) {
            $cart = Session::get('cart');
            $deleteItem = json_decode($deleteItemJson, true);
            unset($cart[$deleteItem['id']]);
            $_SESSION['cart'] = $cart;
            exit;
        }
    }
}
