<!-- Page Title (Dark)-->
<div class="bg-dark py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Theo dõi đơn hàng</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Mã đơn hàng: <span class="h4 fw-normal text-light"><?php echo $this->code; ?></span></h1>
        </div>
    </div>
</div>

<?php
// Mảng trạng thái
$statusArray = array(1 => 'vừa Đặt hàng', 2 => 'xác nhận', 3 => 'giao hàng', 4 => 'Đã nhận', 5 => 'xác nhận');

// Trạng thái đơn hàng (giả sử là 2 - xác nhận)
$orderStatus = $this->result;

if (isset($orderStatus)) {
    // Tạo HTML cho thanh điều hướng trạng thái đơn hàng
    function createNavTab($statusArray, $currentStatus)
    {
        $navTabs = '<ul class="nav nav-tabs media-tabs nav-justified">';
        foreach ($statusArray as $key => $status) {
            $isActive = ($key == $currentStatus) ? 'active' : '';
            $navTabs .= '<li class="nav-item">';
            $navTabs .= '<div class="nav-link ' . $isActive . '">';
            $navTabs .= '<div class="d-flex align-items-center">';
            $navTabs .= '<div class="media-tab-media"><i class="ci-' . getStatusIcon($key) . '"></i></div>';
            $navTabs .= '<div class="ps-3">';
            $navTabs .= '<div class="media-tab-subtitle text-muted fs-xs mb-1">' . getStatusSubtitle($key) . '</div>';
            $navTabs .= '<h6 class="media-tab-title text-nowrap mb-0">' . ucwords($status) . '</h6>';
            $navTabs .= '</div></div></div></li>';
        }
        $navTabs .= '</ul>';
        return $navTabs;
    }

    // Hàm lấy biểu tượng tương ứng với trạng thái
    function getStatusIcon($status)
    {
        switch ($status) {
            case 1:
                return 'bag';
            case 2:
                return 'settings';
            case 3:
                return 'star';
            case 4:
                return 'package';
            case 5:
                return 'check-circle';
            default:
                return '';
        }
    }

    // Hàm lấy phụ đề tương ứng với trạng thái
    function getStatusSubtitle($status)
    {
        switch ($status) {
            case 1:
                return 'Bước đầu tiên';
            case 2:
                return 'Bước hai';
            case 3:
                return 'Bước ba';
            case 4:
                return 'Bước bốn';
            case 5:
                return 'Cuối cùng';
            default:
                return '';
        }
    }

    // Hiển thị thanh điều hướng trạng thái đơn hàng
    echo '<div class="container py-5 mb-2 mb-md-3">';
    echo '<div class="container">';
    echo '<div class="card border-0 shadow-lg">';
    echo '<div class="card-body pb-2">';
    echo createNavTab($statusArray, $orderStatus);
    echo '</div></div></div></div>';
} else {
    echo "<h3 class='text-center p-3'>Mã đơn hàng không tồn tại</h3>";
}
