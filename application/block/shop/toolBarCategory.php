<?php

$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

$linkList = URL::createShopLink(
    'shop',
    'category',
    'index',
    array(
        // 'category_id' => $_GET['category_id'],
        'page' => $_GET['page'],
        'search_term' => $_GET['search_term'],
        'sorting_order' => $sortingOrder,
        'display_mode' => 'list'
    ),
    'category-details-' . $category_id . '.html'
);

$linkGrid = URL::createShopLink(
    'shop',
    'category',
    'index',
    array(
        // 'category_id' => $_GET['category_id'],
        'page' => $_GET['page'],
        'search_term' => $_GET['search_term'],
        'sorting_order' => $sortingOrder,
        'display_mode' => 'grid'
    ),
    'category-details-' . $category_id . '.html'
);


$model = new Model();
$query = "SELECT id FROM " . TBL_CATEGORY . " WHERE id = " . $category_id;
$checkId = $model->checkId($query);
$totalRecords = 0;
if ($checkId) {
    $query = "SELECT COUNT(*) AS totalRecords ";
    $query .= "FROM " . TBL_BOOK . " as b ";
    $query .= "JOIN " . TBL_CATEGORY . " as c ON b.category_id = c.id ";
    $query .= "WHERE b.category_id = " . $category_id;
    $result = $model->query($query);
    $totalRecords = $model->fetchRow($query)['totalRecords'];
} else {
    $query = "SELECT COUNT(*) AS totalRecords FROM " . TBL_BOOK;
    $result = $model->query($query);
    $totalRecords = $model->fetchRow($query)['totalRecords'];
}
$displayMode = Helper::showListGrid();
$sortingOrder = isset($_GET['sorting_order']) ? $_GET['sorting_order'] : 'default';
?>
<div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
    <div class="d-flex flex-wrap">
        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
            <label class="text-light fs-sm opacity-75 text-nowrap me-2 d-none d-sm-block" for="sorting">Sort by:</label>
            <div id="base-url" data-url="<?php echo URL::createShopLink('shop', 'category', 'index', array(
                                                // 'category_id' => $_GET['category_id'],
                                                'search_term' => $_GET['search_term'],
                                                'display_mode' => $_GET['display_mode'],
                                                'sorting_order' => $sortingOrder,
                                                'page' => $_GET['page']
                                            ), 'category-details-' . $category_id . '.html'); ?>"></div>
            <!-- Your select element -->
            <select class="form-select" id="sorting" onchange="changeSorting()">
                <option value="default" <?php echo ($sortingOrder == 'default') ? 'selected' : ''; ?>>Default</option>
                <option value="low_high" <?php echo ($sortingOrder == 'low_high') ? 'selected' : ''; ?>>Low - High Price</option>
                <option value="high_low" <?php echo ($sortingOrder == 'high_low') ? 'selected' : ''; ?>>High - Low Price</option>
            </select>

            <span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">of <?php echo $totalRecords ?> products</span>
        </div>
    </div>


    <div class="d-none d-sm-flex pb-3">
        <a class="btn btn-icon nav-link-style <?php echo ($displayMode == 'grid') ? 'bg-light text-dark disabled opacity-100 me-2 ' : 'nav-link-light'; ?>" href="<?php echo $linkGrid; ?>">
            <i class="ci-view-grid"></i>
        </a>

        <a class="btn btn-icon nav-link-style <?php echo ($displayMode == 'list') ? 'bg-light text-dark disabled opacity-100 me-2' : 'nav-link-light'; ?>" href="<?php echo $linkList; ?>"><i class="ci-view-list"></i></a>
    </div>

</div>