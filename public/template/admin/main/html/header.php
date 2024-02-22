<?php
$linkControlPanel	= URL::createShopLink('admin', 'index', 'index');
$linkMyProfile		= URL::createShopLink('admin', 'index', 'profile');
$linkUserManager	= URL::createShopLink('admin', 'user', 'index');
$linkAddUser		= URL::createShopLink('admin', 'user', 'form');
$linkGroupManager	= URL::createShopLink('admin', 'group', 'index');
$linkAddGroup		= URL::createShopLink('admin', 'group', 'form');
$linkCategoryManager = URL::createShopLink('admin', 'category', 'index');
$linkAddCategory	= URL::createShopLink('admin', 'category', 'form');
$linkBookManager	= URL::createShopLink('admin', 'book', 'index');
$linkAddBook		= URL::createShopLink('admin', 'book', 'form');
$linkLogout			= URL::createShopLink('admin', 'index', 'logout');
$linkViewSite		= URL::createShopLink('default', 'index', 'index');
?>
<div id="border-top" class="h_blue">
	<span class="title"><a href="#">Administration</a></span>
</div>

<!-- HEADER -->
<div id="header-box">
	<div id="module-status">
		<span class="viewsite"><a href="<?php echo $linkViewSite; ?>" target="_blank">View Site</a></span>
		<span class="no-unread-messages"><a href="<?php echo $linkLogout; ?>">Log out</a></span>
	</div>
	<div id="module-menu">
		<!-- MENU -->
		<ul id="menu">
			<li class="node"><a href="#">Site</a>
				<ul>
					<li><a class="icon-16-cpanel" href="<?php echo $linkControlPanel; ?>">Control Panel</a></li>
					<li class="separator"><span></span></li>
					<li><a class="icon-16-profile" href="<?php echo $linkMyProfile; ?>">My Profile</a></li>
				</ul>
			</li>
			<li class="separator"><span></span></li>

			<li class="node"><a href="#">Users</a>
				<ul>
					<li class="node">
						<a class="icon-16-user" href="<?php echo $linkUserManager; ?>">User Manager</a>
						<ul id="menu-com-users-users" class="menu-component">
							<li><a class="icon-16-newarticle" href="<?php echo $linkAddUser; ?>">Add New User</a></li>
						</ul>
					</li>
					<li class="node">
						<a class="icon-16-groups" href="<?php echo $linkGroupManager; ?>">Group Manager</a>
						<ul id="menu-com-users-groups" class="menu-component">
							<li><a class="icon-16-newarticle" href="<?php echo $linkAddGroup; ?>">Add New Group</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li class="node"><a href="#">Book Shopping</a>
				<ul>
					<li class="node">
						<a class="icon-16-category" href="<?php echo $linkCategoryManager; ?>">Category Manager</a>
						<ul id="menu-com-users-users" class="menu-component">
							<li><a class="icon-16-newarticle" href="<?php echo $linkAddCategory; ?>">Add New Category</a></li>
						</ul>
					</li>
					<li class="node">
						<a class="icon-16-article" href="<?php echo $linkBookManager; ?>">Book Manager</a>
						<ul id="menu-com-users-groups" class="menu-component">
							<li><a class="icon-16-newarticle" href="<?php echo $linkAddBook; ?>">Add New Book</a></li>
						</ul>
					</li>
				</ul>
			</li>

		</ul>
	</div>

	<div class="clr"></div>
</div>