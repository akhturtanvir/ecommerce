<?php
  include_once "common/header.php";
  include_once "../classes/Category.php";
  Session::checkSession();
?>

<?php
  if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
    echo "<script>window.location = 'categorylist.php'</script>";
  }else{
    $catId  = $_GET['catId'];
  }
?>


<?php

  $cat = new Category();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $catName = $_POST['catName'];
    $updateCat = $cat->catUpdate($catName, $catId);
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
                      <h3 class="" style="text-align: center; margin-bottom: 15px;">Update Category</h3>
                      <form class="forms-sample" action="" method="POST">

                          <?php
                            if (isset($addCat)) {
                              echo $addCat;
                            }
                          ?>
                          
                          <?php
                            if (isset($updateCat)) {
                              echo $updateCat;
                            }
                          ?>

                          <?php

                            $getCat = $cat->getCatById($catId);
                            if ($getCat) {
                              foreach ($getCat as $data) {

                          ?>
                          
                        <div class="form-group">
                          <input type="text" class="form-control" id="catName" name="catName" value="<?php echo $data['catName']; ?>">
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