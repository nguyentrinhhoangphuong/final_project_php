<?php
$paginationHTML = $this->paging->getPaginationHtml(URL::createLink(
    'shop',
    'blog',
    'index',
    ['' => ''],
    'blog.html'
));
$title = $this->_title;
$xhtmlAllBlogs = '';
if (isset($this->_blogs)) {
    foreach ($this->_blogs as $item) {
        $image = Helper::createImage("blog", "", $item['picture'], array("alt" => "Post", 'class' => "card-img-top"));
        $name = $item['name'];
        $content = Helper::shortenString($item['content']);
        $link = URL::createLink("shop", 'blog', 'detail', null, 'blog-details-' . $item['id'] . '.html');
        $xhtmlAllBlogs .= '<article class="masonry-grid-item">
                                <a class="blog-entry-thumb" style="height: 15rem;" href="' . $link . '">' . $image . '</a>
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
        <?php echo $paginationHTML ?>
    </div>
</div>