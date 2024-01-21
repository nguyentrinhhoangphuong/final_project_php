<?php
// LINK
$linkCart =  URL::createLink('shop', 'cart', 'cart');
$linkSaveInfoOrder =  URL::createLink('shop', 'order', 'saveInfoOrder');
$linkReviewOrder =  URL::createLink('shop', 'order', 'review');

// Var
$fullName = Session::get('info-order')['fullName'];
$email = Session::get('info-order')['email'];
$phone = Session::get('info-order')['phone'];
$address = Session::get('info-order')['address'];


$title = $this->_title;
$total = number_format($this->total);
$xhtmlOrder = '';
if (count($this->orderSummary) > 0) {
    foreach ($this->orderSummary as $item) {
        $linkBook = URL::createLink('shop', 'book', 'detail', array('book_id' => $item['bookId']));
        $image = Helper::createImage('book', '', $item['picture'], array('width' => 64, 'alt' => 'Product'));
        $name = $item['name'];
        $quantity = $item['quantity'];
        $price = number_format($item['price']);
        $xhtmlOrder .= '<div class="d-flex align-items-center pb-2 border-bottom">
                        <a class="d-block flex-shrink-0" href="' . $linkBook . '">
                            ' . $image . '
                        </a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="' . $linkBook . '">' . $name . '</a></h6>
                            <div class="widget-product-meta"><span class="text-accent me-2">' . $price . '.<small> đ</small></span><span class="text-muted">x ' . $quantity . '</span></div>
                        </div>
                    </div>';
    }
}
?>
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo $title; ?></li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0"><?php echo $title; ?></h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <section class="col-lg-8">
            <!-- Steps-->
            <div class="steps steps-light pt-2 pb-3 mb-5">
                <a class="step-item active" href="<?php echo $linkCart; ?>">
                    <div class="step-progress"><span class="step-count">1</span></div>
                    <div class="step-label"><i class="ci-cart"></i>Cart</div>
                </a>
                <a class="step-item active current" href="checkout-details.html">
                    <div class="step-progress"><span class="step-count">2</span></div>
                    <div class="step-label"><i class="ci-user-circle"></i>Details</div>
                </a>
                <a class="step-item" href="#">
                    <div class="step-progress"><span class="step-count">3</span></div>
                    <div class="step-label"><i class="ci-check-circle"></i>Review</div>
                </a>
            </div>
            <!-- Shipping address-->
            <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Địa chỉ giao hàng</h2>
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="checkout-fn">Tên người nhận</label>
                        <input class="form-control" name="fullname" type="text" id="checkout-fn" value="<?php echo $fullName ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label" for="checkout-email">Email</label>
                        <input class="form-control" type="email" name="email" id="checkout-email" value="<?php echo $email ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label" for="checkout-phone">Số điện thoại</label>
                        <input class="form-control" type="text" name="phone" id="checkout-phone" value="<?php echo $phone ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="checkout-address-1">Địa chỉ</label>
                        <input class="form-control" type="text" name="address" id="checkout-address" value="<?php echo $address ?>">
                    </div>
                </div>
            </div>
            <!-- Navigation (desktop)-->
            <div class="d-none d-lg-flex pt-4 mt-3">
                <div class="w-50 pe-3">
                    <a class="btn btn-secondary d-block w-100" href="<?php echo $linkCart ?>">
                        <i class="ci-arrow-left mt-sm-0 me-1"></i>
                        <span class="d-none d-sm-inline">Quay lại giỏ hàng</span>
                    </a>
                </div>
                <div class="w-50 ps-2">
                    <a class="btn btn-primary d-block w-100 processShipping" data-link-process-shipping="<?php echo $linkSaveInfoOrder; ?>" data-link-review-order="<?php echo $linkReviewOrder; ?>">
                        <span class="d-none d-sm-inline">Tiến hành vận chuyển</span>
                        <i class="ci-arrow-right mt-sm-0 ms-1"></i>
                    </a>
                </div>
            </div>
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                <div class="py-2 px-xl-2">
                    <div class="widget mb-3">
                        <h2 class="widget-title text-center">Tóm tắt đơn hàng</h2>
                        <?php echo $xhtmlOrder; ?>
                    </div>
                    <ul class="list-unstyled fs-sm">
                        <li class="d-flex justify-content-between align-items-center">
                            <span class="me-2">Tổng tiền:</span>
                            <span class="text-end"><?php echo $total; ?><small> đ</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
    <!-- Navigation (mobile)-->
    <div class="row d-lg-none">
        <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="shop-cart.html"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Quay lại giỏ hàng</span><span class="d-inline d-sm-none">Quay lại giỏ hàng</span></a></div>
                <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span class="d-none d-sm-inline">Tiến hành vận chuyển</span><span class="d-inline d-sm-none">Tiếp tục</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
            </div>
        </div>
    </div>
</div>