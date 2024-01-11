<!DOCTYPE html>
<html lang="en">
<!-- header -->
<?php include_once 'html/header.php'; ?>

<!-- Body-->

<body class="handheld-toolbar-enabled">

  <!-- Sign in / sign up modal-->
  <?php include_once  'html/signIn_signUp_Modal.php'; ?>

  <main class="page-wrapper">
    <!-- Navbar Books Store-->
    <?php include_once  'html/navbar/index.php'; ?>

    <!-- Hero slider-->
    <?php
    if ($this->_slider) {
      include_once BLOCK_PATH . "shop/heroSlider.php";
    }
    ?>

    <!-- Products grid (Trending products)-->
    <?php require_once MODULE_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php'; ?>

  </main>

  <!-- Footer-->
  <?php include_once 'html/footer.php'; ?>

</body>

</html>