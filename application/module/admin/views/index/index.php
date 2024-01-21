<?php
$imageURL	= $this->_dirImg;
$arrMenu	= array(
	array('link' => URL::createLink('admin', 'book', 'add'), 'name' => 'Add new book', 'image' => 'icon-48-article-add'),
	array('link' => URL::createLink('admin', 'book', 'index'), 'name' => 'Book manager', 'image' => 'icon-48-article'),
	array('link' => URL::createLink('admin', 'category', 'index'), 'name' => 'Category manager', 'image' => 'icon-48-category'),
	array('link' => URL::createLink('admin', 'group', 'index'), 'name' => 'Group manager', 'image' => 'icon-48-group'),
	array('link' => URL::createLink('admin', 'user', 'index'), 'name' => 'User manager', 'image' => 'icon-48-user'),
	array('link' => URL::createLink('admin', 'contact', 'index'), 'name' => 'Contact manager', 'image' => 'icon-48-contacts'),
	array('link' => URL::createLink('admin', 'faq', 'index'), 'name' => 'FAQ manager', 'image' => 'icon-48-preview'),
	array('link' => URL::createLink('admin', 'slider', 'index'), 'name' => 'Slider manger', 'image' => 'icon-48-banner'),
	array('link' => URL::createLink('admin', 'blog', 'index'), 'name' => 'Blog manger', 'image' => 'icon-48-newsfeeds'),
	array('link' => URL::createLink('admin', 'order', 'index'), 'name' => 'Order Manager', 'image' => 'icon-48-newsfeeds'),
);
foreach ($arrMenu as $key => $value) {
	$image	= $imageURL . '/header/' . $value['image'] . '.png';
	$xhtml .= '<div class="icon-wrapper">
					<div class="icon">
						<a href="' . $value['link'] . '">
							<img src="' . $image . '" alt="' . $value['name'] . '">
							<span>' . $value['name'] . '</span>
						</a>
					</div>
				</div>';
}
?>
<div id="element-box">
	<div class="m">
		<div class="adminform">
			<div class="cpanel-left">
				<div class="cpanel">
					<?php echo $xhtml; ?>
				</div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
</div>