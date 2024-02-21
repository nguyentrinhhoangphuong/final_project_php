<?php
$displayMode = Helper::showListGrid();
$model = new Model();

$query = "SELECT
            c.name, c.id ,COUNT(b.category_id) as book_count
        FROM
            category AS c
        LEFT JOIN book AS b ON c.id = b.category_id
        GROUP BY
            c.id";
$result = $model->fetchAll($query);

$totalCount = 0;
foreach ($result as $item) {
    $totalCount += $item['book_count'];
}
$newItem = array(
    'name' => 'View all',
    'id' => 'all',
    'book_count' => $totalCount
);
array_unshift($result, $newItem);

$xhtmlBookCategory = "";
foreach ($result as $item) {
    $router = 'category-details-' . $item['id']  . '.html';
    if ($item['id'] == 'all') {
        $router = 'category.html';
    }
    $linkCategory = URL::createLink('shop', 'category', 'index', array(
        'category_id' => $item['id'],
        'display_mode' => $displayMode,
    ), $router);

    if ($_GET['category_id'] == $item['id']) {
        $active = "active";
    } else {
        $active = "";
    }

    $xhtmlBookCategory .= "<li class='widget-list-item widget-filter-item $active'>
                            <a class='widget-list-link d-flex justify-content-between align-items-center' href='$linkCategory'>
                                <span class='widget-filter-item-text'>" . $item['name'] . "</span>
                                <span class='fs-xs text-muted ms-3'>" . $item['book_count'] . "</span>
                            </a>
                        </li>";
}

$xhtmlSpecialBook = "";
$querySpecialBook = "SELECT b.id, b.name, b.picture ";
$querySpecialBook .= "FROM " . TBL_BOOK . " AS b ";
$querySpecialBook .= "WHERE b.status = 1 AND b.special = 1 ";
$querySpecialBook .= "ORDER BY b.ordering ASC ";
$querySpecialBook .= "LIMIT 0, 5";
$resultSpecialBook = $model->fetchAll($querySpecialBook);
foreach ($resultSpecialBook as $item) {
    $title = $item['name'];
    $bookID = $item['id'];
    $picture = Helper::createImage('book', '', $item['picture'], array('class' => 'rounded-start'));
    $link = URL::createLink("shop", "book", "detail", array('book_id' => $bookID), 'book-details-' . $bookID . '.html');
    $xhtmlSpecialBook .= "<a href='$link' style='color: #4b566b'>
                            <div class='card' style='max-width: 540px;'>
                                <div class='row g-0'>
                                    <div class='col-sm-4'>$picture</div>
                                    <div class='col-sm-8'>
                                        <div class='card-body'><span>$title</span></div>
                                    </div>
                                </div>
                            </div>
                        </a>";
}

?>
<aside class="col-lg-4">
    <!-- Sidebar-->
    <div class="offcanvas offcanvas-collapse offcanvas-end bg-white w-100 rounded-3 shadow-lg ms-lg-auto py-1" id="shop-sidebar" style="max-width: 22rem;">
        <div class="offcanvas-header align-items-center shadow-sm">
            <h2 class="h5 mb-0">Filters</h2>
            <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">
            <!-- Categories-->
            <div class="widget widget-categories mb-4 pb-4 border-bottom">
                <h3 class="widget-title">Book Categories</h3>
                <div class="accordion mt-n1" id="shop-categories">
                    <ul class="widget-list widget-filter-list pt-1" style="height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                        <?php echo $xhtmlBookCategory; ?>
                    </ul>
                </div>
            </div>
            <!-- Special -->
            <div class="widget widget-categories mb-4 pb-4 border-bottom">
                <h3 class="widget-title">Special Books</h3>
                <div class="accordion mt-n1" id="shop-categories">
                    <ul class="widget-list widget-filter-list pt-1" style="height: 30rem;" data-simplebar data-simplebar-auto-hide="false">
                        <?php echo $xhtmlSpecialBook; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>