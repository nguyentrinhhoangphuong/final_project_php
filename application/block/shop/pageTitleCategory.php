<?php
$model = new Model();
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;
$query = "SELECT * FROM " . TBL_CATEGORY . " WHERE ID = $category_id";
$category = $model->fetchRow($query);

?>

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Category</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo $category['name'] ?? "Tất cả" ?></li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0"><?php echo $category['name'] ? "Sách " .  ucwords($category['name']) : "Tất cả danh mục sách" ?></h1>
        </div>
    </div>
</div>