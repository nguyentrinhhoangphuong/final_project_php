<?php
$xhtml = '';
// Pagination
$displayMode = Helper::showListGrid();
$paginationHTML = $this->paging->getPaginationHtml(URL::createLink('shop', 'category', 'index', array(
    'category_id' =>  $_GET['category_id'],
    'sorting_order' => $_GET['sorting_order'],
    'search_term' => $_GET['search_term'],
    'display_mode' => $displayMode
)));

if (count($this->listBookByCategory)) {
    foreach ($this->listBookByCategory as $item) {
        $name = $item['name'];
        $bookID = $item['id'];
        $catID = $item['category_id'];
        $category_name = $item['category_name'];
        $picture = Helper::createImage("book", '', $item['picture']);
        $price = Helper::cmsSaleOff($item);
        $link    = URL::createLink("shop", "book", "detail", array('book_id' => $bookID));
        $linkCategory = URL::createLink('shop', 'category', 'index', array('category_id' => $catID));
        if ($displayMode == 'grid') {
            $xhtml .= "<div class='col-md-4 col-sm-6 px-2 mb-4'>
            <div class='card product-card'>
                <button class='btn-wishlist btn-sm' type='button' data-bs-toggle='tooltip' data-bs-placement='left' title='Add to wishlist'><i class='ci-heart'></i></button>
                <a class='card-img-top d-block overflow-hidden' href='$link'>
                    $picture
                </a>
                <div class='card-body py-2'><a class='product-meta d-block fs-xs pb-1' href='$linkCategory'>$category_name</a>
                    <h3 class='product-title fs-sm'><a href='$link'>$name</a></h3>
                    <div class='d-flex justify-content-between'>
                        $price
                        <div class='star-rating'><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-filled active'></i><i class='star-rating-icon ci-star-half active'></i>
                        </div>
                    </div>
                </div>
            </div>
            <hr class='d-sm-none'>
        </div>";
        } elseif ($displayMode == 'list') {
            $xhtml .= '<div class="card product-card product-list">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist">
                            <i class="ci-heart"></i>
                        </button>
                        <div class="d-sm-flex align-items-center pt-4">
                            <a class="product-list-thumb" href="' . $link . '">
                                ' . $picture . '
                            </a>
                            <div class="card-body py-2">
                                <a class="product-meta d-block fs-xs pb-1" href="' . $linkCategory . '">' . $category_name . '</a>
                                <h3 class="product-title fs-base">
                                    <a href="' . $link . '">' . $name . '</a>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price"><span class="text-accent">
                                        ' . $price . '
                                    </div>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i><i class="star-rating-icon ci-star"></i>
                                </div>
                                </div>
                                <button class="btn btn-primary btn-sm mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                            </div>
                        </div>
                    </div>';
        }
    }
    echo $xhtml;
    echo $paginationHTML;
} else {
    echo $xhtml .= "<div class='text-center'>Hiện tại chưa có sách về thể loại này</div>";
}
