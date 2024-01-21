<?php
foreach ($this->result as $item) {
    $name = $item['fullName'];
    $email = $item['email'];
    $phone = $item['phone'];
    $address = $item['address'];
    $total_price = $item['total_price'];
    $code = $item['code'];
}



$lblCode         = Helper::cmsLinkSort('Code', 'code', $columnPost, $orderPost);
$lblFullname         = Helper::cmsLinkSort('Fullname', 'fullname', $columnPost, $orderPost);
$lblEmail         = Helper::cmsLinkSort('Email', 'email', $columnPost, $orderPost);
$lblPhone         = Helper::cmsLinkSort('Phone', 'phone', $columnPost, $orderPost);
$lblAddress         = Helper::cmsLinkSort('Address', 'address', $columnPost, $orderPost);
$lblOrderTime         = Helper::cmsLinkSort('Order time', 'order_time', $columnPost, $orderPost);
$lblDeliveryStatus         = Helper::cmsLinkSort('Delivery Status', 'status', $columnPost, $orderPost);
$lblTotalPrice         = Helper::cmsLinkSort('Total price', 'total_price', $columnPost, $orderPost);
$lblID            = Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);

$xhtml = '';

foreach ($this->result as $item) {
    $nameBook = $item['name'];
    $quantity = $item['quantity'];
    $xhtml .= '<tr>
                <td class="center">' . $nameBook . '</td>
                <td class="center">' . $quantity . '</td>
            </tr>';
}

?>

<div id="element-box" style="font-size: large;">
    <!-- Thông tin người dùng -->
    <div class="user-info">
        <h2>Thông tin người dùng</h2>
        <p>Name: <?php echo $name ?></p>
        <p>Email: <?php echo $email ?></p>
        <p>Phone: <?php echo $phone ?></p>
        <p>Address: <?php echo $address ?></p>
    </div>
    <!-- Tổng giá trị đơn hàng -->
    <div class="total-price">
        <h3>Total Price: <?php echo number_format($total_price) ?> đ</h3>
        <h3>Code: <?php echo $code ?></h3>
    </div>
    <!-- Chi tiết đơn hàng -->
    <div class="order-details">
        <h2>Chi tiết đơn hàng</h2>
        <table class="adminlist" id="modules-mgr" <!-- HEADER TABLE -->
            <thead>
                <tr>
                    <th width="10%">Name</th>
                    <th width="10%">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($this->result)) {
                    echo $xhtml;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>