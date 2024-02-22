<?php
$xhtml = '';
if (count($this->bookSales)) {
    foreach ($this->bookSales as $item) {
        $name = $item['name'];
        $bookID = $item['id'];
        $catID = $item['category_id'];
        $category_name = $item['category_name'];
        $picture = Helper::createImage("book", '', $item['picture']);
        $price = Helper::cmsSaleOff($item);
        $link    = URL::createShopLink("shop", "book", "detail", array('book_id' => $bookID));
        $linkCategory = URL::createShopLink('shop', 'category', 'index', array('category_id' => $catID));
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
    }
    echo $xhtml;
}
