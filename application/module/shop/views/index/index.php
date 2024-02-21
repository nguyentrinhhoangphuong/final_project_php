<?php
function heading($title, $id)
{
	$linkCategory = URL::createLink('shop', 'category', 'index', null, 'category-details-' . $id . '.html');
	if ($id == 'all') {
		$linkCategory = URL::createLink('shop', 'category', 'index', null, 'category.html');
	}
	$heading = "<div class='d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4'>
				<h2 class='h3 mb-0 pt-3 me-2'>$title</h2>
				<div class='pt-3'>
					<a class='btn btn-outline-accent btn-sm' href='$linkCategory'>Tất cả quyển sách<i class='ci-arrow-right ms-1 me-n1'></i></a>
				</div>
			</div>";
	return $heading;
}

$xhtmlListCategory = '';
if (isset($this->listCategory)) {
	$xhtmlListCategory .= '<div class="pt-4 bg-secondary">';
	$xhtmlListCategory .= '<section class="container py-lg-5 py-4">';
	$xhtmlListCategory .= '<h2>Danh mục sách</h2>';
	$xhtmlListCategory .= '<div class="tns-carousel pb-lg-5 pb-4">';
	$xhtmlListCategory .= '<div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;nav&quot;: true, &quot;gutter&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:3},&quot;576&quot;:{&quot;items&quot;:4},&quot;992&quot;:{&quot;items&quot;:8}}}">';
	foreach ($this->listCategory as $item) {
		$nameCategory = $item['name'];
		$link = URL::createLink("shop", "category", 'index', null, "category-details-" . $item['id'] . ".html");
		$image = Helper::createImage("category", "", $item['picture'], array('class' => 'rounded-start', 'width' => '175px'));
		$xhtmlListCategory .= '<article>
								<a href="' . $link . '">' . $image . '</a>
								<h3 class="h6 blog-entry-title"><a href="' . $link . '">' . $nameCategory . '</a></h3>
							</article>';
	}
	$xhtmlListCategory .= "</div>";
	$xhtmlListCategory .= "</div>";
	$xhtmlListCategory .= '</section>';
	$xhtmlListCategory .= "</div>";
	echo $xhtmlListCategory;
}


$xhtml = '';
if (isset($this->specialBooks)) {
	$xhtml .= "<section class='container pt-3'>";
	$xhtml .= heading("Sách Đặc Biệt", "all");
	$xhtml .= "<div class='row pt-2 mx-n2'>";
	foreach ($this->specialBooks as $item) {
		$name 			= $item['name'];
		$bookID			= $item['id'];
		$catID			= $item['category_id'];
		$price = Helper::cmsSaleOff($item);
		$pay = Helper::cmsPay($item);
		$category = $item['category_name'];
		$picture = Helper::getImage('book', $item['picture']);
		$link = URL::createLink('shop', 'book', 'detail', null, "book-details-" . $bookID . ".html");
		$linkCategory = URL::createLink('shop', 'category', 'index', null, 'category-details-' . $catID . '.html');
		$infoBook = ['bookId' => $bookID, 'bookName' => $name, 'picture' => $item['picture'], 'quantity' => 1, 'price' => $pay];
		$linkAddToCart = URL::createLink('shop', 'cart', 'addToCart');
		$xhtml .= "<div class='col-lg-3 col-md-4 col-sm-6 px-2 mb-4'>
					<div class='card product-card'>
						<a class='card-img-top d-block overflow-hidden' href='$link'>$picture</a>
						<div class='card-body py-2'>
							<a class='product-meta d-block fs-xs pb-1' href='$linkCategory'>$category</a>
							<h3 class='product-title fs-sm'>
								<a href='$link'>$name</a>
							</h3>
							<div class='d-flex justify-content-between'>$price</div>
						</div>
						<div class='card-body card-body-hidden'>
							<button class='btn btn-primary btn-sm d-block w-100 mb-2 addToCartButton' type='button' 
									data-link-cart='" . $linkAddToCart . "'	
									data-info-book='" . htmlspecialchars(json_encode($infoBook)) . " '>
								<i class='ci-cart fs-sm me-1'></i>
								<span class='text-white'>Thêm Vào Giỏ Hàng</span>
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


$xhtmlBookByCategory = '';
// Khởi tạo mảng để lưu trữ các nhóm sách
$groupedBooks = array();
if (isset($this->bookByCategory)) {
	foreach ($this->bookByCategory as $book) {
		$categoryId = $book['category_id'];
		// Nếu chưa có nhóm cho category_id này, tạo mới
		if (!isset($groupedBooks[$categoryId])) {
			$groupedBooks[$categoryId] = array();
		}
		// Thêm sách vào nhóm tương ứng
		$groupedBooks[$categoryId][] = $book;
	}

	// Hiển thị kết quả trong HTML
	foreach ($groupedBooks as $books) {
		// Lấy tên category từ mảng sách đầu tiên trong nhóm
		$categoryName = $books[0]['category_name'];
		$categoryId = $books[0]['category_id'];
		$xhtmlBookByCategory .= '<section class="container pt-3">';
		$xhtmlBookByCategory .= heading($categoryName, $categoryId);
		$xhtmlBookByCategory .= '<div class="row pt-2 mx-n2">';
		$i = 1;
		foreach ($books as $book) {
			$name = $book['name'];
			$bookID = $book['id'];
			$price = Helper::cmsSaleOff($book);
			$payBookByCategory = Helper::cmsPay($book);
			$category = $book['category_name'];
			$picture = Helper::getImage('book', $book['picture']);
			$link = URL::createLink('shop', 'book', 'detail', null, "book-details-" . $bookID . ".html");
			$linkCategory = URL::createLink('shop', 'category', 'index', null, 'category-details-' . $book['category_id'] . '.html');
			$infoBook = ['bookId' => $bookID, 'bookName' => $name, 'picture' => $book['picture'], 'quantity' => 1, 'price' => $payBookByCategory];
			$linkAddToCart = URL::createLink('shop', 'cart', 'addToCart');
			if ($i <= 8) {
				$xhtmlBookByCategory .= '<div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
											<div class="card product-card">
												<a class="card-img-top d-block overflow-hidden" href="' . $link . '">
													' . $picture . '
												</a>
												<div class="card-body py-2">
													<a class="product-meta d-block fs-xs pb-1" href="' . $linkCategory . '">' . $category . '</a>
													<h3 class="product-title fs-sm">
														<a style="" href="' . $link . '">' . $name . '</a>
													</h3>
													<div class="d-flex justify-content-between">' . $price . '</div>
												</div>
												<div class="card-body card-body-hidden">
												<button class="btn btn-primary btn-sm d-block w-100 mb-2 addToCartButton" type="button" 
														data-link-cart="' . $linkAddToCart . '"	
														data-info-book="' . htmlspecialchars(json_encode($infoBook)) . '
												">
													<i class="ci-cart fs-sm me-1"></i>
													<span class="text-white">Thêm Vào Giỏ Hàng</span>
												</button>
												</div>
											</div>
											<hr class="d-sm-none" />
										</div>';
				$i++;
			}
		}
		$xhtmlBookByCategory .= "</div>";
		$xhtmlBookByCategory .= "</section";
	}
	echo $xhtmlBookByCategory;
}
?>

<?php
$xhtmlBlog = '';
if (isset($this->blog)) {
	$xhtmlBlog .= '<section class="container">';
	$xhtmlBlog .= '<div class="pt-4 bg-secondary">';
	$xhtmlBlog .= '<div class="container">';
	$xhtmlBlog .= '<h2>Bài Viết</h2>';
	$xhtmlBlog .= '<div class="tns-carousel pb-lg-5 pb-4">';
	$xhtmlBlog .= '<div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;nav&quot;: true, &quot;gutter&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:3},&quot;576&quot;:{&quot;items&quot;:4},&quot;992&quot;:{&quot;items&quot;:3}}}">';
	foreach ($this->blog as $item) {
		$name = $item['name'];
		$created_by = $item['created_by'];
		$link = URL::createLink("shop", 'blog', 'detail', null, 'blog-details-' . $item['id'] . '.html');
		$image = Helper::createImage('blog', '', $item['picture'], array('class' => 'rounded-3', 'alt' => 'Blog image', 'width' => 390, 'height' => 240));
		$xhtmlBlog .= '<article>
		 							<a class="blog-entry-thumb mb-3" href="' . $link . '">
		 								' . $image . '
		 							</a>
		 							<div class="d-flex align-items-center fs-sm mb-2">
		 								<a class="blog-entry-meta-link" href="#">by ' . $created_by . '</a>
		 							</div>
		 							<h3 class="h6 blog-entry-title"><a href="' . $link . '">' . $name . '</a></h3>
		 						</article>';
	}
	$xhtmlBlog .= "</div>";
	$xhtmlBlog .= "</div>";
	$xhtmlBlog .= "</div>";
	$xhtmlBlog .= "</div>";
	$xhtmlBlog .= '</section>';
	echo $xhtmlBlog;
}
?>

<!-- Mail subscription-->
<div>
	<?php include_once  TEMPLATE_PATH . 'shop/main/html/mail.php'; ?>
</div>