<?php
function heading($title)
{
	$heading = "<div class='d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4'>
				<h2 class='h3 mb-0 pt-3 me-2'>$title</h2>
				<div class='pt-3'>
					<a class='btn btn-outline-accent btn-sm' href='shop-grid-ls.html'>More Books<i class='ci-arrow-right ms-1 me-n1'></i></a>
				</div>
			</div>";
	return $heading;
}

$xhtml = '';
if (isset($this->specialBooks)) {
	$xhtml .= "<section class='container pt-3'>";
	$xhtml .= heading("Special Books");
	$xhtml .= "<div class='row pt-2 mx-n2'>";
	foreach ($this->specialBooks as $item) {
		$name 			= $item['name'];
		$bookID			= $item['id'];
		$catID			= $value['category_id'];
		$price = Helper::cmsSaleOff($item);
		$category = $item['category_name'];
		$picture = Helper::getImage('book', $item['picture']);
		$link	= URL::createLink("shop", "book", "detail", array('book_id' => $bookID));
		$linkCategory = "";
		$xhtml .= "<div class='col-lg-3 col-md-4 col-sm-6 px-2 mb-4'>
					<div class='card product-card'>
						<div class='product-card-actions d-flex align-items-center'>
							<button class='btn-wishlist btn-sm' type='button' data-bs-toggle='tooltip' data-bs-placement='left' title='Add to wishlist'>
								<i class='ci-heart'></i>
							</button>
						</div>
						<a class='card-img-top d-block overflow-hidden' href='$link'>$picture</a>
						<div class='card-body py-2'>
							<a class='product-meta d-block fs-xs pb-1' href='$linkCategory'>$category</a>
							<h3 class='product-title fs-sm'>
								<a href='$link'>$name</a>
							</h3>
							<div class='d-flex justify-content-between'>
								<div class='product-price'>
									$price
								</div>
								<div class='star-rating'>
									<i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i>
								</div>
							</div>
						</div>
						<div class='card-body card-body-hidden'>
							<button class='btn btn-primary btn-sm d-block w-100 mb-2' type='button'>
								<i class='ci-cart fs-sm me-1'></i>Add to Cart
							</button>

						</div>
					</div>
					<hr class='d-sm-none' />
				</div>";
	}
	$xhtml .= "</div>";
	$xhtml .= "</section";
	echo $xhtml;
}

$xhtmlNewBooks = '';
if (isset($this->newBooks)) {
	$xhtmlNewBooks .= "<section class='container pt-3'>";
	$xhtmlNewBooks .= heading("New Books");
	$xhtmlNewBooks .= "<div class='row pt-2 mx-n2'>";
	foreach ($this->newBooks as $item) {
		$name 			= $item['name'];
		$bookID			= $item['id'];
		$catID			= $value['category_id'];
		$price = Helper::cmsSaleOff($item);
		$category = $item['category_name'];
		$picture = Helper::getImage('book', $item['picture']);
		$link	= URL::createLink("shop", "book", "detail", array('book_id' => $bookID));
		$linkCategory = "";
		$xhtmlNewBooks .= "<div class='col-lg-3 col-md-4 col-sm-6 px-2 mb-4'>
					<div class='card product-card'>
						<div class='product-card-actions d-flex align-items-center'>
							<button class='btn-wishlist btn-sm' type='button' data-bs-toggle='tooltip' data-bs-placement='left' title='Add to wishlist'>
								<i class='ci-heart'></i>
							</button>
						</div>
						<a class='card-img-top d-block overflow-hidden' href='$link'>$picture</a>
						<div class='card-body py-2'>
							<a class='product-meta d-block fs-xs pb-1' href='$linkCategory'>$category</a>
							<h3 class='product-title fs-sm'>
								<a href='$link'>$name</a>
							</h3>
							<div class='d-flex justify-content-between'>
								<div class='product-price'>
									$price
								</div>
								<div class='star-rating'>
									<i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i>
								</div>
							</div>
						</div>
						<div class='card-body card-body-hidden'>
							<button class='btn btn-primary btn-sm d-block w-100 mb-2' type='button'>
								<i class='ci-cart fs-sm me-1'></i>Add to Cart
							</button>

						</div>
					</div>
					<hr class='d-sm-none' />
				</div>";
	}
	$xhtmlNewBooks .= "</div>";
	$xhtmlNewBooks .= "</section";
	echo $xhtmlNewBooks;
}
