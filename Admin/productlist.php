<?php
  include_once "common/header.php";
  include_once "../classes/Product.php";
  include_once "../classes/Format.php";
  Session::checkSession();
?>

<?php
  $pd = new Product();
  $fm = new Format();
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

      <?php

        if (isset($_GET['delProductId'])) {
          $id = $_GET['delProductId'];
          $delProduct = $pd->delProductById($id);
        }

      ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data table</h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                          <tr>
                            <th colspan="9">

                              <?php
                                if (isset($_GET['mes']) AND $_GET['mes'] != NULL) {
                                  echo $_GET['mes'];
                                }
                              ?>

                              <?php
                                if (isset($delProduct)) {
                                  echo $delProduct;
                                }
                              ?>
                              
                            </th>
                          </tr>
                      <tr style="text-align: center;">
                        <th>SI</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                          <?php

                            $getProduct = $pd->getAllProduct();
                            if ($getProduct) {
                              $i = 0;
                              foreach ($getProduct as $data) {
                                $i++;

                          ?>

                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['productName']; ?></td>
                        <td><img src="<?php echo $data['image']; ?>"></td>
                        <td><?php echo $data['catName']; ?></td>
                        <td><?php echo $data['brandName']; ?></td>
                        <td><?php echo $fm->textShorten($data['body'], 30); ?></td>
                        <td>$<?php echo $data['price']; ?></td>
                        <td>
                          <?php
                            if ($data['type'] == 0){
                              echo "Featured";
                            }else{
                              echo "General";
                            }
                          ?>
                        </td>
                        <td style="text-align: center;">
                          <a class="btn btn-primary btn-xs" href="productedit.php?productId=<?php echo $data['productId'] ?>">Edit</a>
                          <a onclick="return confirm('Are you sure to Delete ..?')" class="btn btn-danger btn-xs"  href="?delProductId=<?php echo $data['productId'] ?>"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                          <?php

                            }}else{

                          ?>
                          <tr><td colspan="4"><h4>Data Not Found</h4></td></tr>
                        </tbody>
                        <?php

                          }

                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <?php
          include_once "common/footer.php";
        ?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

<?php
  include_once "common/jScript.php";
?>
<script src="js/data-table.js"></script>