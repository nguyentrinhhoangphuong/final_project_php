<?php
$homeLink = URL::createLink("shop", "index", "index");
$allBookLink = URL::createLink("shop", "category", "index", array('page' => 1));
$faqLink = URL::createLink("shop", "faq", "index");
$aboutLink = URL::createLink("shop", "about", "about");
$contactLink = URL::createLink("shop", "contact", "about");



$currentController = isset($_GET['controller']) ? $_GET['controller'] : 'index';

$allBooks = URL::createLink("shop", 'category', "index");
$model = new Model();
$query = "SELECT * FROM " . TBL_CATEGORY;
$results = $model->fetchAll($query);
$xhtmlDropdown = "";
foreach ($results as $item) {
    $link = URL::createParams('shop', 'category', 'index', array('category_id' => $item['id']));
    $name = $item['name'];
    $xhtmlDropdown .= "<li>
                <a class='dropdown-item' href='" . $link . "'>
                    <div class='d-flex'>
                        <div class='ms-2'><span class='d-block text-heading'>" . $name . "</span></div>
                    </div>
                </a>
            </li>";
}


$bloglink = URL::createLink("shop", 'blog', 'index');

?>
<div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Search-->
            <div class="input-group d-lg-none my-3">
                <i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                <input class="form-control rounded-start" type="text" placeholder="Search for products" />
            </div>
            <!-- Primary menu-->
            <ul class="navbar-nav">
                <li class="nav-item <?php echo $currentController === 'index' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo $homeLink ?>">Trang chủ</a>
                </li>
                <li class="nav-item dropdown <?php echo $currentController === 'category' ? 'active' : ''; ?> <?php echo $currentController === 'book' ? 'active' : ''; ?>">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Sách</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="<?php echo $allBooks ?>">
                                <div class="d-flex">
                                    <div class="ms-2"><span class="d-block text-heading">Tất cả sách</span></div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <?php echo $xhtmlDropdown; ?>
                    </ul>
                </li>
                <li class="nav-item <?php echo $currentController === 'faq' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo $faqLink ?>">Câu hỏi thường gặp</a>
                </li>
                <li class="nav-item <?php echo $currentController === 'about' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo $aboutLink ?>">Thông tin về chúng tôi</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Kiểm tra đơn hàng</a>
                </li>
                <li class="nav-item <?php echo $currentController === 'blog' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo $bloglink ?>">Blog</a>
                </li>
                <li class="nav-item <?php echo $currentController === 'contact' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo $contactLink ?>">Liên hệ</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Cảm nhận khách hàng</a>
                </li>
            </ul>
        </div>
    </div>
</div>