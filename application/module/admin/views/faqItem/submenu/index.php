<?php
$linkFaqCategory     = URL::createLink('admin', 'faq', 'index');
$linkFaqItem         = URL::createLink('admin', 'faqItem', 'index');
?>
<div id="submenu-box">
    <div class="m">
        <ul id="submenu">
            <li><a href="<?= $linkFaqCategory ?>">Faq Category</a></li>
            <li><a href="#" class="active">Faqs</a></li>
        </ul>
        <div class="clr"></div>
    </div>
</div>