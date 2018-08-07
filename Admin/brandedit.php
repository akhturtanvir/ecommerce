<?php
  include_once "common/header.php";
  include_once "../classes/Brand.php";
  Session::checkSession();
?>

<?php
  if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
    echo "<script>window.location = 'categorylist.php'</script>";
  }else{
    $brandId  = $_GET['brandId'];
  }
?>


<?php

  $brand = new Brand();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $brandName = $_POST['brandName'];
    $updateBrand = $brand->BrandUpdate($brandName, $brandId);
  }
?>

<body class="sidebar-light">
  <div class="container-scroller">

    <?php
      include_once "common/navbar.php";
    ?>

    <div class="container-fluid page-body-wrapper">

      <?php
        include_once "common/theme.php";
      ?>

      <?php
        include_once "common/sidebar.php";
      ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 offset-md-3 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="" style="text-align: center; margin-bottom: 15px;">Update Brand</h3>
                      <form class="forms-sample" action="" method="POST">
                          
                          <?php
                            if (isset($updateBrand)) {
                              echo $updateBrand;
                            }
                          ?>

                          <?php

                            $getBrand = $brand->getBrandById($brandId);
                            if ($getBrand) {
                              foreach ($getBrand as $data) {

                          ?>
                          
                        <div class="form-group">
                          <input type="text" class="form-control" id="brandName" name="brandName" value="<?php echo $data['brandName']; ?>">
                        </div>
                        <button name="update" id="btn-save" class="btn btn-success mr-2">Update</button>
                      </form>

                      <?php }} ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
          include_once "common/footer.php";
        ?>

      </div>
    </div>
  </div>

  <?php
    include_once "common/jScript.php";
  ?>