<?php
if (isset($this->_blogInfo)) {
    $name_blogInfo = $this->_blogInfo['name'];
    $content = $this->_blogInfo['content'];
    $image_blogInfo = Helper::createImage("blog", '', $this->_blogInfo['picture'], array('width' => 285, 'height' => 190));
}

$xhtmlBlogRelate = '';
if (isset($this->_blogRelate)) {;
    foreach ($this->_blogRelate as $item) {
        $name = $item['name'];
        $created_by = $item['created_by'];
        $image = Helper::createImage("blog", '', $item['picture'], array('width' => 390, 'height' => 228, "alt" => "Post"));
        $link = URL::createLink("shop", 'blog', 'detail', null, 'blog-details-' . $item['id'] . '.html');
        $xhtmlBlogRelate .= '<article>
                                <a class="blog-entry-thumb mb-3" href="' . $link . '">
                                    ' . $image . '
                                </a>
                                <div class="d-flex align-items-center fs-sm mb-2">
                                    <a class="blog-entry-meta-link" href="#">by ' . $created_by . '</a>
                                </div>
                                <h3 class="h6 blog-entry-title"><a href="' . $link . '">' . $name . '</a></h3>
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
                    <li class="breadcrumb-item"><a class="text-nowrap" href="#"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Blog</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo $name_blogInfo; ?></li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0"><?php echo $name_blogInfo; ?></h1>
        </div>
    </div>
</div>
<div class="container pb-5">
    <div class="row justify-content-center pt-5 mt-md-2">
        <div class="col-lg-9">
            <p><?php echo $content ?></p>
        </div>
        <div class="col-lg-3">
            <?php echo $image_blogInfo ?>
        </div>
        <div class="d-flex flex-wrap justify-content-between pt-2 pb-4 mb-1">
            <div class="mt-3"><span class="d-inline-block align-middle text-muted fs-sm me-3 mt-1 mb-2">Share post:</span><a class="btn-social bs-facebook me-2 mb-2" href="#"><i class="ci-facebook"></i></a><a class="btn-social bs-twitter me-2 mb-2" href="#"><i class="ci-twitter"></i></a><a class="btn-social bs-pinterest me-2 mb-2" href="#"><i class="ci-pinterest"></i></a></div>
        </div>
    </div>
</div>



<!-- Related posts-->
<div class="bg-secondary py-5">
    <div class="container py-3">
        <h2 class="h4 text-center pb-4">Bạn có thể thích</h2>
        <div class="tns-carousel">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 20},&quot;900&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 30}}}">
                <!-- article-->
                <?php echo $xhtmlBlogRelate ?>
            </div>
        </div>
    </div>
</div>