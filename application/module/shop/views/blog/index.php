<?php
$title = $this->_title;
$xhtmlAllBlogs = '';
if (isset($this->_blogs)) {
    foreach ($this->_blogs as $item) {
        $image = Helper::createImage("blog", "", $item['picture'], array("width" => 600, "height" => 350, "alt" => "Post", 'class' => "card-img-top"));
        $name = $item['name'];
        $content = Helper::shortenString($item['content']);
        $link = URL::createLink("shop", 'blog', 'detail', array('blog_id' => $item['id']));
        $xhtmlAllBlogs .= '<article class="masonry-grid-item">
                                <a class="blog-entry-thumb" href="' . $link . '">' . $image . '</a>
                                <div class="card-body mt-2">
                                    <h2 class="h6 blog-entry-title"><a href="' . $link . '">' . $name . '</a></h2>
                                    <p class="fs-sm">' . $content . '</p>
                                </div>
                        </article>';
    }
}
?>

<!-- Page Title (Light)-->
<div class="bg-secondary py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Blog</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Tất cả bài viết</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0"><?php echo $title; ?></h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="pt-5 mt-md-2">
        <!-- Entries grid-->
        <div class="masonry-grid" data-columns="3">
            <!-- Entry-->
            <?php echo $xhtmlAllBlogs; ?>
        </div>
        <hr class="mb-4">
        <!-- Pagination-->
        <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
            </ul>
            <ul class="pagination">
                <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
            </ul>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
            </ul>
        </nav>
    </div>
</div>