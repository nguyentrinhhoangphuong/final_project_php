<?php
function heading($title, $id)
{
	$linkCategory = URL::createLink('shop', 'category', 'index', array('category_id' => $id));
	$heading = "<div class='d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4'>
				<h2 class='h3 mb-0 pt-3 me-2'>$title</h2>
				<div class='pt-3'>
					<a class='btn btn-outline-accent btn-sm' href='$linkCategory'>More Books<i class='ci-arrow-right ms-1 me-n1'></i></a>
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
		$link = URL::createLink("shop", "category", 'index', array('category_id' => $item['id']));
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
		$category = $item['category_name'];
		$picture = Helper::getImage('book', $item['picture']);
		$link	= URL::createLink("shop", "book", "detail", array('book_id' => $bookID));
		$linkCategory = URL::createLink('shop', 'category', 'index', array('category_id' => $catID));
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
			$category = $book['category_name'];
			$picture = Helper::getImage('book', $book['picture']);
			$link	= URL::createLink("shop", "book", "detail", array('book_id' => $bookID));
			$linkCategory = URL::createLink('shop', 'category', 'index', array('category_id' => 3));
			if ($i <= 8) {
				$xhtmlBookByCategory .= '<div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
											<div class="card product-card">
												<div class="product-card-actions d-flex align-items-center">
													<button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist">
														<i class="ci-heart"></i>
													</button>
												</div>
												<a class="card-img-top d-block overflow-hidden" href="' . $link . '">
													' . $picture . '
												</a>
												<div class="card-body py-2">
													<a class="product-meta d-block fs-xs pb-1" href="' . $linkCategory . '">' . $category . '</a>
													<h3 class="product-title fs-sm">
														<a href="' . $link . '">' . $name . '</a>
													</h3>
													<div class="d-flex justify-content-between">
														<div class="product-price">
															' . $price . '
														</div>
														<div class="star-rating">
															<i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
														</div>
													</div>
												</div>
												<div class="card-body card-body-hidden">
													<button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button">
														<i class="ci-cart fs-sm me-1"></i>Add to Cart
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


$xhtmlBlog = '';
if (isset($this->blog)) {
	foreach ($this->blog as $item) {
		$name = $item['name'];
		$created_by = $item['created_by'];
		$image = Helper::createImage('blog', '', $item['picture'], array('class' => 'rounded-3', 'alt' => 'Blog image', 'width' => 390, 'height' => 240));
		$link = URL::createLink("shop", 'blog', 'detail', array('blog_id' => $item['id']));
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
}
?>
<!-- xhtmlBlog -->
<div class="pt-4 bg-secondary">
	<!-- Blog recent posts-->
	<section class="container py-lg-5 py-4">
		<div class="d-flex align-items-center justify-content-between mb-sm-4 mb-2 pb-2">
			<h2 class="h3 mb-0">Bài Viết</h2><a class="btn btn-outline-accent ms-3" href="<?php echo URL::createLink("shop", "blog", "index") ?>">Tất cả bài viết<i class="ci-arrow-right ms-2"></i></a>
		</div>
		<!-- Blog (carousel)-->
		<div class="tns-carousel pb-lg-5 pb-4">
			<div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;nav&quot;: true, &quot;gutter&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;992&quot;:{&quot;items&quot;:3}}}">
				<!-- Carousel item-->
				<?php echo $xhtmlBlog; ?>
			</div>
		</div>
	</section>
	<!-- Mail subscription-->
	<?php include_once  TEMPLATE_PATH . 'shop/main/html/mail.php'; ?>
</div>