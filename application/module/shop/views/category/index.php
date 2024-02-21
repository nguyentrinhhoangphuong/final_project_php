<?php
$xhtml = '';
// Pagination
$displayMode = Helper::showListGrid();
$categoryId = $_GET['category_id'] == 'all' ? 0 : $_GET['category_id'];
$paginationHTML = $this->paging->getPaginationHtml(
    URL::createLink(
        'shop',
        'category',
        'index',
        array(
            'sorting_order' => $_GET['sorting_order'],
            'search_term' => $_GET['search_term'],
            'display_mode' => $displayMode
        ),
        'category-details-' . $categoryId . '.html'
    )
);

if (count($this->listBookByCategory)) {
    foreach ($this->listBookByCategory as $item) {
        $name = $item['name'];
        $bookID = $item['id'];
        $catID = $item['category_id'];
        $category_name = $item['category_name'];
        $description = Helper::shortenString($item['description']);
        $picture = Helper::createImage("book", '', $item['picture']);
        $price = Helper::cmsSaleOff($item);
        $link = URL::createLink("shop", "book", "detail", array('book_id' => $bookID), "book-details-" . $bookID . ".html");
        $linkAddToCart = URL::createLink("shop", "cart", 'addToCartAction', array('category_id' => $item['id']));
        $linkCategory = URL::createLink('shop', 'category', 'index', array('category_id' => $catID), 'category-details-' . $catID . '.html');
        if ($keyword = $_GET['search_term']) {
            $name = Helper::highLight($name, $keyword);
            $category_name = Helper::highLight($category_name, $keyword);
        }

        if ($displayMode == 'grid') {
            $xhtml .= "<div class='col-md-4 col-sm-6 px-2 mb-4'>
            <div class='card product-card'>
                <a class='card-img-top d-block overflow-hidden' href='$link'>
                    $picture
                </a>
                <div class='card-body py-2'><a class='product-meta d-block fs-xs pb-1' href='$linkCategory'>$category_name</a>
                    <h3 class='product-title fs-sm'><a href='$link'>$name</a></h3>
                    <div class='d-flex justify-content-between'>
                        $price
                    </div>
                </div>
            </div>
            <hr class='d-sm-none'>
        </div>";
        } elseif ($displayMode == 'list') {
            $xhtml .= '<div class="card product-card product-list">
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
                                </div>
                                <div class="pt-2 pb-2" style="width: 29rem;">' . $description . '</div>								
							</a>
                                
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
