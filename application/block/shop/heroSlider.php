<?php
$model = new Model();
$query = "SELECT `title`, `description`, `image`, `link`FROM " . TBL_SLIDER . " WHERE `status` = 1 ORDER BY `ordering`";
$result = $model->fetchAll($query);
$xhmtl = '<section class="tns-carousel tns-controls-lg mb-4 mb-lg-5">
<div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">';
foreach ($result as $item) {
    $title = ucfirst($item['title']);
    $description = substr($item['description'], 0, 100) . "...";
    $image = UPLOAD_URL . "slider" . DS . $item['image'];
    $link = $item['link'];
    $xhmtl .= " <div class='px-lg-5' style='background-image: url(" . $image . "); background-size: cover; background-position: center; background-repeat: no-repeat;'>
                    <div class='d-lg-flex justify-content-between align-items-center ps-lg-4'>
                        <div class='position-relative mx-auto py-5 px-4 mb-lg-5 order-lg-1' style='max-width: 42rem; z-index: 10;'>
                            <div class='pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap'>
                                <h2 class='text-light display-5 from-bottom delay-1'>" . $title . "</h2>
                                <p class='fs-lg text-light pb-3 from-bottom delay-2'>" . $description  . "</p>
                                <div class='d-table scale-up delay-4 mx-auto mx-lg-0'>
                                    <a class='btn btn-primary' href='" . $link . "'>Tìm Hiểu Thêm<i class='ci-arrow-right ms-2 me-n1'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
}
$xhmtl .= '</div></section>';

echo $xhmtl;
