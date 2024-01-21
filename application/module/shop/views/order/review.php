<?php
// link
$linkAddress = URL::createLink('shop', 'order', 'index');
$linkEdit = URL::createLink('shop', 'cart', 'cart');
$linkCompleteOrder = URL::createLink('shop', 'order', 'complete');

//var
$title = $this->_title;
$toal = number_format($this->total);
$xhtmlOrder = '';
foreach ($this->orderSummary as $item) {
    $linkBook = URL::createLink('shop', 'book', 'detail', array('book_id' => $item['bookId']));
    $image = Helper::createImage('book', '', $item['picture'], array('width' => 100, 'alt' => 'Product'));
    $name = $item['name'];
    $quantity = $item['quantity'];
    $price = number_format($item['price']);
    $xhtmlOrder .= '<div class="d-sm-flex justify-content-between my-4 pb-3 border-bottom">
                    <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html">
                       ' . $image . '
                    </a>
                        <div class="pt-2">
                            <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">' . $name . '</a></h3>
                            <div class="fs-lg text-accent pt-2">' . $price . '<small> đ</small></div>
                        </div>
                    </div>
                    <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-end" style="max-width: 9rem;">
                        <p class="mb-0"><span class="text-muted fs-sm">Số lượng:</span><span>&nbsp;' . $quantity . '</span></p>
                    </div>
                </div>';
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
                <a class="step-item active" href="<?php echo $linkAddress; ?>">
                    <div class="step-progress"><span class="step-count">2</span></div>
                    <div class="step-label"><i class="ci-user-circle"></i>Details</div>
                </a>
                <a class="step-item active current" href="#">
                    <div class="step-progress"><span class="step-count">3</span></div>
                    <div class="step-label"><i class="ci-check-circle"></i>Review</div>
                </a>
            </div>
            <!-- Order details-->

            <div class="d-flex justify-content-between border-bottom align-items-center">
                <h6>Đơn hàng của bạn</h6>
                <a class="btn btn-link px-0" type="button" href="<?php echo $linkEdit; ?>"><i class="ci-edit me-2"></i><span class="fs-sm">Chỉnh sửa đơn hàng</span></a>

            </div>
            <!-- Item-->
            <?php echo $xhtmlOrder; ?>
            <!-- Client details-->
            <div class="bg-secondary rounded-3 px-4 pt-4 pb-2">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="h6">Vận chuyển tới:</h4>
                        <ul class="list-unstyled fs-sm">
                            <li><span class="text-muted">Khách hàng:&nbsp;</span><?php echo Session::get('info-order')['fullName'] ?></li>
                            <li><span class="text-muted">Địa chỉ:&nbsp;</span><?php echo Session::get('info-order')['address'] ?></li>
                            <li><span class="text-muted">Điện thoại:&nbsp;</span><?php echo Session::get('info-order')['phone'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Navigation (desktop)-->
            <div class="d-none d-lg-flex pt-4">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="<?php echo $linkAddress; ?>"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Địa chỉ giao hàng</span><span class="d-inline d-sm-none">Back</span></a></div>
                <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="<?php echo $linkCompleteOrder ?>"><span class="d-none d-sm-inline">Hoàn thành đặt hàng</span><span class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
            </div>
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                <div class="py-2 px-xl-2">
                    <h2 class="h6 text-center mb-4">Tổng tiền</h2>
                    <h3 class="fw-normal text-center my-4"><?php echo $toal; ?><small> đ</small></h3>
                </div>
            </div>
        </aside>
    </div>
    <!-- Navigation (mobile)-->
    <div class="row d-lg-none">
        <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="<?php echo $linkAddress; ?>"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Payment</span><span class="d-inline d-sm-none">Back</span></a></div>
                <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="<?php echo $linkCompleteOrder ?>"><span class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
            </div>
        </div>
    </div>
</div>