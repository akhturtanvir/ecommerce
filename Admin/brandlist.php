<?php
  include_once "common/header.php";
  include_once "../classes/Brand.php";
  Session::checkSession();
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
        $brand = new Brand();
        if (isset($_GET['delBrandId'])) {
          $id = $_GET['delBrandId'];
          $delBrand = $brand->delBrandById($id);
        }

      ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-10 offset-1 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 style="text-align: center; margin-bottom: 15px;">Brand List</h3>
                  <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                      <table id="sortable-table-2" class="table table-striped">
                        <thead>
                          <tr>
                            <th colspan="3">

                              <?php
                                if (isset($_GET['mes']) AND $_GET['mes'] != NULL) {
                                  echo $_GET['mes'];
                                }
                              ?>

                              <?php
                                if (isset($delBrand)) {
                                  echo $delBrand;
                                }
                              ?>
                              
                            </th>
                          </tr>
                          <tr>
                            <th>SI</th>
                            <th class="sortStyle">Brand List</th>
                            <th class="sortStyle" style="text-align: center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php

                            $getBrand = $brand->getAllBrand();
                            if ($getBrand) {
                              $i = 0;
                              foreach ($getBrand as $data) {
                                $i++;

                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['brandName'] ?></td>
                            <td style="text-align: center;">
                              <a class="btn btn-primary btn-xs" href="brandedit.php?brandId=<?php echo $data['brandId'] ?>">Edit</a>
                              <a onclick="return confirm('Are you sure to Delete ..?')" class="btn btn-danger btn-xs"  href="?delBrandId=<?php echo $data['brandId'] ?>"><i class="fa fa-trash"></i></a>
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
                      </table>
                    </div>
                  </div>
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
