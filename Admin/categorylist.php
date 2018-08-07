<?php
  include_once "common/header.php";
  include_once "../classes/Category.php";
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
        $cat = new Category();
        if (isset($_GET['delCatId'])) {
          $id = $_GET['delCatId'];
          $delCat = $cat->delCatById($id);
        }

      ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-10 offset-1 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 style="text-align: center; margin-bottom: 15px;">Category List</h3>
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
                                if (isset($delCat)) {
                                  echo $delCat;
                                }
                              ?>
                              
                            </th>
                          </tr>
                          <tr>
                            <th>SI</th>
                            <th class="sortStyle">Category List</th>
                            <th class="sortStyle" style="text-align: center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php

                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                              $i = 0;
                              foreach ($getCat as $data) {
                                $i++;

                          ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['catName'] ?></td>
                            <td style="text-align: center;">
                              <a class="btn btn-primary btn-xs" href="catedit.php?catId=<?php echo $data['catId'] ?>">Edit</a>
                              <a onclick="return confirm('Are you sure to Delete ..?')" class="btn btn-danger btn-xs"  href="?delCatId=<?php echo $data['catId'] ?>"><i class="fa fa-trash"></i></a>
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
