<?php
$linKCheck = URL::createLink('shop', 'order', 'checkOrder');
?>
<div class="container py-5 mb-2 mb-md-3">
    <h3 class="text-center">Kiểm tra đơn hàng</h3>
    <div class="widget pb-2 mb-4">
        <h3 class="widget-title text-light pb-1">Kiểm tra đơn hàng</h3>
        <form action="<?php echo $linKCheck; ?>" method="post">
            <div class="input-group flex-nowrap">
                <input class="form-control rounded-start" type="text" name="code" placeholder="Điền mã code của bạn" required>
                <button class="btn btn-primary" type="submit">Kiểm tra</button>
            </div>
        </form>
    </div>
</div>