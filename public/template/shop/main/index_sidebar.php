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

    <!-- Page Title-->
    <?php include_once BLOCK_PATH . "shop/pageTitleCategory.php" ?>

    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- Content  -->
        <section class="col-lg-8">
          <!-- Toolbar-->
          <?php include_once BLOCK_PATH . "shop/toolBarCategory.php" ?>
          <!-- Products grid-->
          <div class="row mx-n2">
            <!-- Product-->
            <?php require_once MODULE_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php'; ?>
          </div>
          <!-- <hr class="my-3"> -->
          <!-- Pagination-->
          <!-- <?php include_once BLOCK_PATH . "shop/paginationCategory.php" ?> -->
        </section>
        <!-- Sidebar-->
        <?php include_once BLOCK_PATH . "shop/sidebarCategory.php" ?>
      </div>
    </div>
  </main>

  <!-- Footer-->
  <?php include_once 'html/footer.php'; ?>

</body>

</html>