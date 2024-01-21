<?php
// LINK
$linkAllBooks = URL::createLink('shop', 'category', 'index');
$linkUpdateCart = URL::createLink('shop', 'cart', 'updateCart');
$linkDeleteItem = URL::createLink('shop', 'cart', 'deleteItem');
$linkCheckout = URL::createLink('shop', 'order', 'index');

// Initialize an empty array if $this->books is not set or is empty
$this->books = isset($this->books) ? $this->books : array();
// LIST BOOK
$total = number_format($this->total);
$xhtmlListBooks = '';
foreach ($this->books as $item) {
    $id = $item['bookId'];
    $name = $item['name'];
    $picture = Helper::createImage('book', '', $item['picture'], array('width' => 100, 'alt' => 'Product'));
    $price = number_format($item['price']);
    $quantity = $item['quantity'];
    $xhtmlListBooks .= '
                        <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
                            <div class="d-block d-sm-flex align-items-center text-center text-sm-start">
                                <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html">
                                   ' . $picture . '
                                </a>
                                <div class="pt-2">
                                    <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">' . $name . '</a></h3>
                                    <div class="fs-lg text-accent pt-2">' . $price . '<small> đ</small></div>
                                </div>
                            </div>
                            <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                                <label class="form-label" for="quantity4">Số lượng</label>
                                <input class="form-control quantity-input" type="number" id="' . $id . '" min="1" value="' . $quantity . '">
                                <button class="btn btn-link px-0 text-danger deleteItem" type="button" data-delete-item="' . $id . '" data-link-delete-item="' . $linkDeleteItem . '">
                                    <i class="ci-close-circle me-2"></i>
                                    <span class="fs-sm">Xóa</span>
                                </button>
                            </div>
                        </div>';
}

$xhtmlButtonUpdateBook = '';
if (!empty($this->books)) {
    $xhtmlButtonUpdateBook .= '<button class="btn btn-outline-accent d-block w-100 mt-4 updateCart" type="button" data-link-update-cart="' . $linkUpdateCart . '">
                                    <i class="ci-loading fs-base me-2"></i>
                                    Cập nhật giỏ hàng
                                </button>';
}
?>
<!-- Page Title-->
<?php if (!empty($this->books)) : ?>
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="<?php echo $linkAllBooks ?>">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Giỏ hàng</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Giỏ hàng của bạn</h1>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <!-- List of items-->
        <section class="col-lg-8">
            <?php if (!empty($this->books)) : ?>
                <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                    <h2 class="h6 text-light mb-0">Sách</h2>
                    <a class="btn btn-outline-primary btn-sm ps-2" href="<?php echo $linkAllBooks ?>">
                        <i class="ci-arrow-left me-2"></i>
                        Tiếp tục chọn sách
                    </a>
                </div>
            <?php endif; ?>
            <!-- Item-->
            <?php echo $xhtmlListBooks; ?>
            <?php echo $xhtmlButtonUpdateBook; ?>
        </section>

        <?php if (count($this->books) == 0) : ?>
            <section class="col-lg-12">
                <!-- Item-->
                <div class="container">
                    <div class="text-center">
                        <div class="p-3">Giỏ hàng trống</div>
                        <a class="btn btn-outline-primary btn-sm ps-2" href="<?php echo $linkAllBooks ?>">
                            <i class="ci-arrow-left me-2"></i>
                            Tiếp tục chọn sách
                        </a>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- Sidebar-->
        <?php if (!empty($this->books)) : ?>
            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="bg-white rounded-3 shadow-lg p-4">
                    <div class="py-2 px-xl-2">
                        <div class="text-center mb-4 pb-3 border-bottom">
                            <h2 class="h6 mb-3 pb-1">Tổng tiền</h2>
                            <h3 class="fw-normal"><?php echo $total; ?><small> đ</small></h3>
                        </div>

                        <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="<?php echo $linkCheckout; ?>">
                            <i class="ci-card fs-lg me-2"></i>
                            Tiến hành thanh toán
                        </a>
                    </div>
                </div>
            </aside>
        <?php endif; ?>
    </div>
</div>