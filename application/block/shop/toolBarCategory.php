<?php
$model = new Model();
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;
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

?>
<div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
    <div class="d-flex flex-wrap">
        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
            <label class="text-light fs-sm opacity-75 text-nowrap me-2 d-none d-sm-block" for="sorting">Sort by:</label>
            <select class="form-select" id="sorting">
                <option>Popularity</option>
                <option>Low - Hight Price</option>
                <option>High - Low Price</option>
                <option>Average Rating</option>
                <option>A - Z Order</option>
                <option>Z - A Order</option>
            </select><span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">of <?php echo $totalRecords ?> products</span>
        </div>
    </div>
    <div class="d-none d-sm-flex pb-3"><a class="btn btn-icon nav-link-style bg-light text-dark disabled opacity-100 me-2" href="#"><i class="ci-view-grid"></i></a><a class="btn btn-icon nav-link-style nav-link-light" href="shop-list-rs.html"><i class="ci-view-list"></i></a></div>
</div>