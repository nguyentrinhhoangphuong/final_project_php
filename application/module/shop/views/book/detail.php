<?php
// BOOK INFO
$bookInfo	= $this->bookInfo;
$categoryName = $bookInfo['category_name'];
$linkCategory = URL::createLink('shop', 'category', 'index', array('category_id' => $bookInfo['category_id']));
$name = $bookInfo['name'];
$picture 		= Helper::createImage('book', '', $bookInfo['picture'], ['width' => 90]);
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
		$bookRelatePrice = "<span class='text-accent'>" . number_format($item['price']) . "</span>";
	}
	$bookRelateId = $item['id'];
	$bookRelateName = $item['name'];
	$bookRelatePicture = Helper::createImage("book", '', $item['picture']);
	$bookRelateCategoryName = $item['category_name'];
	$bookRelateCategoryId = $item['category_id'];
	$bookRelateLink = URL::createLink("shop", "book", "detail", array('book_id' => $bookRelateId));
	$xhtmlBookRelate .= "<div>
							<div class='card product-card card-static'>
								<button class='btn-wishlist btn-sm' type='button' data-bs-toggle='tooltip' data-bs-placement='left' title='Add to wishlist'>
									<i class='ci-heart'></i>
								</button>
								<a class='card-img-top d-block overflow-hidden' href='$bookRelateLink'>
									$bookRelatePicture
								</a>
								<div class='card-body py-2'>
									<a class='product-meta d-block fs-xs pb-1' href='#'>$bookRelateCategoryName</a>
									<h3 class='product-title fs-sm'>
										<a href='$bookRelateLink'>$bookRelateName</a>
									</h3>
									<div class='d-flex justify-content-between'>
										<div class='product-price'>
											<span class='text-accent'>$bookRelatePrice</span>
										</div>
										<div class='star-rating'>
											<i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star'></i>
										</div>
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
			<div>
				<div class="star-rating">
					<i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
				</div>
				<span class="d-inline-block fs-sm text-white opacity-70 align-middle mt-1 ms-1">74 Reviews</span>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="bg-light shadow-lg rounded-3">
		<!-- Tabs-->
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab" role="tab">General <span class="d-none d-sm-inline">Info</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link py-4 px-sm-4" href="#reviews" data-bs-toggle="tab" role="tab">Reviews <span class="fs-sm opacity-60">(74)</span></a>
			</li>
		</ul>
		<div class="px-4 pt-lg-3 pb-3 mb-5">
			<div class="tab-content px-lg-3">
				<!-- General info tab-->
				<div class="tab-pane fade show active" id="general" role="tabpanel">
					<div class="row">
						<!-- Product gallery-->
						<div class="col-lg-7">
							<div class="product-gallery">
								<div class="product-gallery-preview order-sm-2" style="width: 80%;">
									<div class="product-gallery-preview-item active" id="first">
										<?php echo $picture ?>
									</div>
								</div>
							</div>
						</div>
						<!-- Product details-->
						<div class="col-lg-5 pt-4 pt-lg-0">
							<div class="product-details ms-auto pb-3">
								<div class="h3 fw-normal text-accent mb-3 me-1">
									<?php echo $price ?>
								</div>
								<div class="d-flex align-items-center pt-2 pb-4">
									<select class="form-select me-3 selectQuantity" style="width: 5rem" name="selectQuantity">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<button class="btn btn-primary btn-shadow d-block w-100 addToCartButton" type="button" data-link-cart="<?php echo $linkAddToCart ?>" data-info-book="<?php echo htmlspecialchars(json_encode($infoBook)) ?>">
										<i class="ci-cart fs-lg me-2"></i>Thêm vào giỏ hàng
									</button>
								</div>
								<div class="d-flex mb-4">
									<div class="w-100">
										<button class="btn btn-secondary d-block w-100" type="button">
											<i class="ci-heart fs-lg me-2"></i><span class="d-none d-sm-inline">Add to </span>Wishlist
										</button>
									</div>
								</div>
								<!-- Sharing-->
								<label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Reviews tab-->
				<div class="tab-pane fade" id="reviews" role="tabpanel">
					<div class="row py-4">
						<!-- Reviews list-->
						<div class="col-md-7">
							<div class="d-flex justify-content-end pb-4">
								<div class="d-flex flex-nowrap align-items-center">
									<label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sort by:</label>
									<select class="form-select form-select-sm" id="sort-reviews">
										<option>Newest</option>
										<option>Oldest</option>
										<option>Popular</option>
										<option>High rating</option>
										<option>Low rating</option>
									</select>
								</div>
							</div>
							<!-- Review-->
							<div class="product-review pb-4 mb-4 border-bottom">
								<div class="d-flex mb-3">
									<div class="d-flex align-items-center me-4 pe-2">
										<div>
											<h6 class="fs-sm mb-0">Daniel Adams</h6>
											<span class="fs-ms text-muted">May 8, 2019</span>
										</div>
									</div>
									<div>
										<div class="star-rating">
											<i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
										</div>
									</div>
								</div>
								<p class="fs-md mb-2">
									Sed ut perspiciatis unde omnis iste natus error sit
									voluptatem accusantium doloremque laudantium, totam rem
									aperiam, eaque ipsa quae ab illo inventore veritatis et
									quasi architecto beatae vitae dicta sunt explicabo. Nemo
									enim ipsam voluptatem.
								</p>
								<ul class="list-unstyled fs-ms pt-1">
									<li class="mb-1">
										<span class="fw-medium">Pros:&nbsp;</span>Consequuntur
										magni, voluptatem sequi
									</li>
									<li class="mb-1">
										<span class="fw-medium">Cons:&nbsp;</span>Architecto
										beatae, quis autem, voluptatem sequ
									</li>
								</ul>
							</div>
							<div class="text-center">
								<button class="btn btn-outline-accent" type="button">
									<i class="ci-reload me-2"></i>Load more reviews
								</button>
							</div>
						</div>
						<!-- Leave review form-->
						<div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
							<div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
								<h3 class="h4 pb-2">Write a review</h3>
								<form class="needs-validation" method="post" novalidate>
									<div class="mb-3">
										<label class="form-label" for="review-name">Your name<span class="text-danger">*</span></label>
										<input class="form-control" type="text" required id="review-name" />
										<div class="invalid-feedback">
											Please enter your name!
										</div>
										<small class="form-text text-muted">Will be displayed on the comment.</small>
									</div>
									<div class="mb-3">
										<label class="form-label" for="review-email">Your email<span class="text-danger">*</span></label>
										<input class="form-control" type="email" required id="review-email" />
										<div class="invalid-feedback">
											Please provide valid email address!
										</div>
										<small class="form-text text-muted">Authentication only - we won't spam you.</small>
									</div>
									<div class="mb-3">
										<label class="form-label" for="review-rating">Rating<span class="text-danger">*</span></label>
										<select class="form-select" required id="review-rating">
											<option value="">Choose rating</option>
											<option value="5">5 stars</option>
											<option value="4">4 stars</option>
											<option value="3">3 stars</option>
											<option value="2">2 stars</option>
											<option value="1">1 star</option>
										</select>
										<div class="invalid-feedback">
											Please choose rating!
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="review-text">Review<span class="text-danger">*</span></label>
										<textarea class="form-control" rows="6" required id="review-text"></textarea>
										<div class="invalid-feedback">
											Please write a review!
										</div>
										<small class="form-text text-muted">Your review must be at least 50 characters.</small>
									</div>
									<div class="mb-3">
										<label class="form-label" for="review-pros">Pros</label>
										<textarea class="form-control" rows="2" placeholder="Separated by commas" id="review-pros"></textarea>
									</div>
									<div class="mb-4">
										<label class="form-label" for="review-cons">Cons</label>
										<textarea class="form-control" rows="2" placeholder="Separated by commas" id="review-cons"></textarea>
									</div>
									<button class="btn btn-primary btn-shadow d-block w-100" type="submit">
										Submit a Review
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Product description-->
<div class="container pt-lg-3 pb-4 pb-sm-5">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<h2 class="h3 pb-2"><?php echo $name ?></h2>
			<p><?php echo $description ?></p>
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