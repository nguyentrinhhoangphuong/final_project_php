 <?php
    $userObj        = Session::get('user');
    $signinModalHtml = '';
    if ($userObj['login'] == true) {
        $username = Session::get("user")['info']['username'];
        $group_acp = Session::get('user')['info']['group_acp'];
        $logout = URL::createLink('shop', 'index', 'logout');
        $adminPanel = URL::createLink('admin', 'index', 'index');

        $signinModalHtml .= '<div class="btn-group dropdown">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle">Hi ' . $username . '</button>
                        <div class="dropdown-menu" style="margin-top: 2.8rem;">';
        // Kiểm tra nếu $group_acp bằng 1
        if ($group_acp == 1) {
            $signinModalHtml .= '<a href="' . $adminPanel . '" class="dropdown-item" target="_blank">Admin panel</a>';
            $signinModalHtml .= '<div class="dropdown-divider"></div>';
        }

        $signinModalHtml .= '<a href="' . $logout . '" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </div>';
    } else {
        $signinModalHtml .= ' <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
                        <div class="navbar-tool-icon-box">
                            <i class="navbar-tool-icon ci-user"></i>
                        </div>
                        <div class="navbar-tool-text ms-n3">
                            <small>Xin chào, Đăng nhập</small>Tài khoản
                        </div>
                    </a>';
    }
    // CART
    $numberOfBooks = 0;
    $total = 0;
    foreach (Session::get('cart') as $item) {
        $numberOfBooks += $item['quantity'];
        $total += $item['price'] * $item['quantity'];
    }

    $xhtmlCart = '';
    foreach (Session::get('cart') as $item) {
        $bookId = $item['bookId'];
        $name = $item['name'];
        $picture = Helper::createImage("book", "", $item['picture'], array('width' => 64, 'alt' => 'Product'));
        $quantity = $item['quantity'];
        $pay = number_format($item['price']);
        if ($numberOfBooks > 0) {
            $xhtmlCart .= '<div class="widget-cart-item pb-2 border-bottom">
                    <button class="btn-close text-danger" type="button" aria-label="Remove">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center">
                        <a class="d-block flex-shrink-0" href="">
                            ' . $picture . '
                        </a>
                        <div class="ps-2">
                            <h6 class="widget-product-title">
                                <a href="">' . $name . '</a>
                            </h6>
                            <div class="widget-product-meta">
                                <span class="text-accent me-2">' . $pay . ' đ</span><span class="text-muted">for ' . $quantity . '</span>
                            </div>
                        </div>
                    </div>
                </div>';
        } else {
            $xhtmlCart .= '<div class="widget-cart-item pb-2 border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="ps-2">
                            <h6 class="widget-product-title">Chưa có sách trong giỏ hàng</h6>
                        </div>
                    </div>
                </div>';
        }
    }

    $linkCart = URL::createLink('shop', 'cart', 'cart');

    ?>
 <div class="navbar navbar-expand-lg navbar-light">
     <div class="container">
         <a class="navbar-brand d-none d-sm-block me-3 flex-shrink-0" href="">
             Book Store
         </a>
         <!-- Search-->
         <div id="search-book-url" data-url="<?php echo URL::createLink('shop', 'category', 'index', array()); ?>"></div>
         <div class="input-group d-none d-lg-flex flex-nowrap mx-4">
             <i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
             <input class="form-control rounded-start w-100" id="searchBook" type="text" placeholder="Tìm sách" value="<?php echo $_GET['search_term'] ?? "" ?>" />
         </div>
         <!-- Toolbar-->
         <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                 <span class="navbar-toggler-icon"></span></button>
             <a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Toggle menu</span>
                 <div class="navbar-tool-icon-box">
                     <i class="navbar-tool-icon ci-menu"></i>
                 </div>
             </a>
             <?php echo $signinModalHtml ?>
             <div class="navbar-tool dropdown ms-3">
                 <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="<?php echo $linkCart; ?>">
                     <span class="navbar-tool-label" id="numberOfBooks"><?php echo $numberOfBooks ?></span>
                     <i class="navbar-tool-icon ci-cart"></i>
                 </a>
                 <a class="navbar-tool-text" id="total" href="<?php echo $linkCart; ?>">
                     <small>Giỏ hàng</small><?php echo number_format($total) ?> đ
                 </a>
                 <!-- Cart dropdown-->
                 <!-- <div class="dropdown-menu dropdown-menu-end" id="cartDropdown">
                     <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem">
                         <div style="height: 15rem" data-simplebar data-simplebar-auto-hide="false">
                             <?php echo $xhtmlCart ?>
                         </div>
                         <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                             <div class="fs-sm me-2 py-2">
                                 <span class="text-muted">Subtotal:</span><span class="text-accent fs-base ms-1">$1,247.<small>00</small></span>
                             </div>
                             <a class="btn btn-outline-secondary btn-sm" href="shop-cart.html">Expand cart<i class="ci-arrow-right ms-1 me-n1"></i></a>
                         </div>
                         <a class="btn btn-primary btn-sm d-block w-100" href="checkout-details.html"><i class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
                     </div>
                 </div> -->
             </div>
         </div>
     </div>
 </div>
 <!-- Success toast -->
 <div class="navbar navbar-expand-lg navbar-light">
     <div class="container">
         <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 10; right: 0;">
             <div class="toast-header bg-success text-white">
                 <i class="ci-check-circle me-2"></i>
                 <span class="fw-medium me-auto">Đã thêm vào giỏ hàng</span>
                 <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
             </div>
         </div>
     </div>
 </div>