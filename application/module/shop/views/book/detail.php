<?php
// BOOK INFO
$bookInfo	= $this->bookInfo;
$categoryName = $bookInfo['category_name'];
$linkCategory = URL::createLink('shop', 'category', 'index', array('category_id' => $bookInfo['category_id']));
$name = $bookInfo['name'];
$picture 		= Helper::createImage('book', '', $bookInfo['picture'], ['width' => 350]);
$picturePath	= UPLOAD_PATH . 'book' . DS . '98x150-' . $bookInfo['picture'];
$pictureFull	= '';
if (file_exists($picturePath) == true) {
	$pictureFull	= UPLOAD_URL . 'book' . DS . $bookInfo['picture'];
}
$description	= substr($bookInfo['description'], 0, 400);
$price = Helper::cmsSaleOff($bookInfo);
$payBookByCategory = Helper::cmsPay($bookInfo);
$infoBook = ['bookId' => $bookInfo['id'], 'bookName' => $name, 'picture' => $bookInfo['picture'], 'quantity' => 1, 'price' => $payBookByCategory];
$linkAddToCart = URL::createLink('shop', 'cart', 'addToCart');


// BOOK RELATE
$bookRelate	= $this->bookRelate;
$xhtmlBookRelate = '';
foreach ($bookRelate as $item) {
	$bookRelatePrice = 0;
	if ($item['sale_off'] > 0) {
		$bookRelatePriceSaleOff = (100 - $item['sale_off']) * $item['price'] / 100;
		$bookRelatePrice = "<span class='text-accent'>" . number_format($bookRelatePriceSaleOff) . "<small>đ</small></span>        ";
		$bookRelatePrice .= "<del class='text-muted fs-lg me-3'>" . number_format($item['price']) . "<small>đ</small></small></del>";
	} else {
		$bookRelatePrice = "<span class='text-accent'>" . number_format($item['price']) . "<small>đ</small></span>";
	}
	$bookRelateId = $item['id'];
	$bookRelateName = $item['name'];
	$bookRelatePicture = Helper::createImage("book", '', $item['picture']);
	$bookRelateCategoryName = $item['category_name'];
	$bookRelateCategoryId = $item['category_id'];
	$bookRelateLink = URL::createLink("shop", "book", "detail", array('book_id' => $bookRelateId));
	$xhtmlBookRelate .= "<div>
							<div class='card product-card card-static'>
								<a class='card-img-top d-block overflow-hidden' href='$bookRelateLink'>
									$bookRelatePicture
								</a>
								<div class='card-body py-2'>
									<a class='product-meta d-block fs-xs pb-1' href='#'>$bookRelateCategoryName</a>
									<h3 class='product-title fs-sm'>
										<a href='$bookRelateLink'>$bookRelateName</a>
									</h3>
									<div class='d-flex justify-content-between'>
										$bookRelatePrice
									</div>
								</div>
							</div>
						</div>";
}


?>


<!-- Custom page title-->
<div class="page-title-overlap bg-dark pt-4">
	<div class="container d-lg-flex justify-content-between py-2 py-lg-3">
		<div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
					<li class="breadcrumb-item">
						<a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a>
					</li>
					<li class="breadcrumb-item text-nowrap">
						<a href="<?php echo $linkCategory ?>"><?php echo $categoryName ?></a>
					</li>
					<li class="breadcrumb-item text-nowrap active" aria-current="page">
						<?php echo $name; ?>
					</li>
				</ol>
			</nav>
		</div>
		<div class="order-lg-1 pe-lg-4 text-center text-lg-start">
			<h1 class="h3 text-light mb-2"><?php echo $name; ?></h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="bg-light shadow-lg rounded-3">
		<div class="px-4 pt-lg-3 pb-3 mb-5">
			<div class="row" style="display: flex; justify-content: center;">
				<!-- Product gallery-->
				<div class="col-lg-5 text-center">
					<?php echo $picture ?>
				</div>
				<!-- Product details-->
				<div class="col-lg-5 pt-4 pt-lg-0">
					<div class="product-details ms-auto pb-3">
						<div class="h3 fw-normal text-accent mb-3 me-1">
							Giá: <?php echo $price ?>
						</div>
						<div class="d-flex align-items-center pt-2 pb-4">
							<select class="form-select me-3 selectQuantity" style="width: 5rem" name="selectQuantity">
								<?php for ($i = 1; $i <= 5; $i++) : ?>
									<option value="<?php echo $i ?>"><?php echo $i ?></option>
								<?php endfor; ?>
							</select>
							<button class="btn btn-primary btn-shadow d-block w-100 addToCartButton" type="button" data-link-cart="<?php echo $linkAddToCart ?>" data-info-book="<?php echo htmlspecialchars(json_encode($infoBook)) ?>">
								<i class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hàng
							</button>
						</div>
						<!-- Sharing-->
						<label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
						<h4 class="pb-2 pt-4">Tóm tắt nội dung</h4>
						<div class="d-flex mb-4 ">
							<p><?php echo $description ?></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<hr class="mb-5" />
<!-- Product carousel (You may also like)-->
<div class="container pt-lg-2 pb-5 mb-md-3">
	<h2 class="h3 text-center pb-4">Bạn có thể thích</h2>
	<div class="tns-carousel tns-controls-static tns-controls-outside">
		<div class="tns-carousel-inner" data-carousel-options='{"items": 2, "controls": true, "nav": false, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":3, "gutter": 20}, "1100":{"items":4, "gutter": 30}}}'>
			<!-- Product-->
			<?php echo $xhtmlBookRelate; ?>
		</div>
	</div>
</div>