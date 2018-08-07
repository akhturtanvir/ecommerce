<?php
  include_once "common/header.php";
  include_once "../classes/Product.php";
  include_once "../classes/Category.php";
  include_once "../classes/Brand.php";
  Session::checkSession();
?>


<?php

  $pd = new Product();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $addProduct = $pd->insertProduct($_POST, $_FILES);
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
            <div class="col-md-8 offset-md-2 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="" style="text-align: center; margin-bottom: 15px;">Add Product</h3>
                      <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">

                          <?php
                            if (isset($addProduct)) {
                              echo $addProduct;
                            }
                          ?>
                          
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control" id="productdName" name="productName" placeholder="Enter your product name">
                        </div>
                      <div class="form-group">
                        <label>Category</label><br>
                        <select class="js-example-basic-single w-50" name="catId">
                          <option value="">-- Select Category --</option>
                          <?php
                            $cat = new Category();
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                              $i = 0;
                              foreach ($getCat as $data) {
                                $i++;
                          ?>
                          <option value="<?php echo $data['catId']; ?>"><?php echo $data['catName']; ?></option>

                          <?php
                            }}
                          ?>

                        </select>
                      </div>
                      <div class="form-group">
                        <label>Brand</label><br>
                        <select class="js-example-basic-single w-50" name="brandId">
                          <option value="">-- Select Brand --</option>        

                          <?php
                            $brand = new Brand();
                            $getBrand = $brand->getAllBrand();
                            if ($getBrand) {
                              $i = 0;
                              foreach ($getBrand as $data) {
                                $i++;

                          ?>
                          <option value="<?php echo $data['brandId']; ?>"><?php echo $data['brandName'] ?></option>

                          <?php
                            }}
                          ?>
                        </select>
                      </div>
                        <div class="form-group">​
                          <label>Description</label>
                          <textarea  rows="5" cols="47" name="body"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Price</label>
                          <input type="text" class="form-control" name="price" placeholder="Enter your product price">
                        </div>
                        <div class="form-group">
                          <label>Upload Image</label>
                          <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                          <label>Product Type</label><br>
                          <select class="js-example-basic-single w-50" name="type">
                            <option value="">-- Select Type --</option>
                            <option value="0">Fetured</option>
                            <option value="1">General</option>
                          </select>
                        </div>
                        <button name="save" id="btn-save" class="btn btn-success mr-2">Save</button>
                      </form>
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

  <script>
  tinymce.init({
    selector:'textarea'
  });
</script>