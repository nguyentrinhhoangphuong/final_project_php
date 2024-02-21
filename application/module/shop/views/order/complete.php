<?php
$linkAllBooks = URL::createLink('shop', 'category', 'index', null, 'category.html');
$linkViewCheckOrder = URL::createLink('shop', 'order', 'viewCheckOrder', null, 'check-order.html');

$code = $this->code;
?>
<div class="container pb-5 mb-sm-4">
    <div class="pt-5">
        <div class="card py-3 mt-sm-3">
            <div class="card-body text-center">
                <h2 class="h4 pb-3">Cảm ơn bạn đã đặt hàng của bạn!</h2>
                <p class="fs-sm mb-2">Đơn hàng của bạn đã được đặt và sẽ được xử lý trong thời gian sớm nhất.</p>
                <p class="fs-sm mb-2">Hãy chắc chắn rằng bạn ghi lại số đơn đặt hàng của mình, đó là <span class='fw-medium'><?php echo $code; ?></span></p>
                <p class="fs-sm">Bạn sẽ sớm nhận được email xác nhận đơn đặt hàng của bạn. <u>Bây giờ bạn có thể:</u></p>
                <a class="btn btn-secondary mt-3 me-3" href="<?php echo $linkAllBooks; ?>">Tiếp tục mua sắm</a>
                <a class="btn btn-primary mt-3" href="<?php echo $linkViewCheckOrder ?>">
                    <i class="ci-location"></i>&nbsp;Kiểm tra đơn hàng
                </a>
            </div>
        </div>
    </div>
</div>