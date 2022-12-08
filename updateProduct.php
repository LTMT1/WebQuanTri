<?php 

    require "connect.php";
    
    // update date san pham 
    $error ="";
    $errors ="";
        
    $id = $_GET['id_product'];
    $sql = "SELECT  * FROM Product_Type ";
    $query_product_type = mysqli_query($conn,$sql);

    $sql_up = "SELECT  * FROM Product WHERE id_product = $id ";
    $query_product = mysqli_query($conn,$sql_up);
    $row_up = mysqli_fetch_assoc($query_product);
    $linkimage = $row_up['image'];

     
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $statusMsg = "";
        $id_update = test_input($_POST['id_product']);
        $product_name = test_input($_POST['product_name']);
        $processing_time = test_input($_POST['processing_time']);
        $price = test_input($_POST['price']);
        $description = test_input($_POST['description']);
        $fileName = $_FILES["uploadfile"]["name"];
         $tempname = $_FILES["uploadfile"]["tmp_name"];
        $targetFilePath = "./image/".$fileName;
        $id_product_type = test_input($_POST['id_product_type']);
       
          $linkimage="http://chucdong.com//Deliciousrice/WebQuanTri/image/$fileName";
          if($product_name == "" && $processing_time =="" && $price == "" && $description == "" && $fileName == "" ){
                $error = "Vui lòng nhập dữ liệu ";
            }else {
                 echo "Error updating record:ssssssssssssssssssssssss ".$id_update;
                 $sql2 = "UPDATE Product SET id_product_type = '$id_product_type', product_name = '$product_name' , image = '$linkimage' , processing_time = '$processing_time' , price = '$price',
                description = '$description' where id_product = '$id_update' ";  
                if (mysqli_query($conn, $sql2)) {
                  echo "Record updated successfully";
                } else {
                  echo "Error updating record: " . mysqli_error($conn);
                }
                     if (move_uploaded_file($tempname,  $targetFilePath)) {
                      echo $errors="  Image uploaded successfully!";
                  } else {
                      echo $errors = "upload không thành công ";
                  }
            
            }
    }
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>index</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-white elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <i style="margin-left: 20px;" class="fas fa-user-circle fa-fw"></i>
      <span style="margin-left: 10px;" class="brand-text font-weight-light">Quản lý bán hàng</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avt.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Trần Thế Ngọc</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="listProduct.php" class="nav-link active">
              <i class="nav-icon fas fa-list-alt"></i>            
              Quản lý sản phẩm
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="bill.php" class="nav-link active">
              <i class="nav-icon fas fa-record-vinyl"></i>
              <p>
                Hóa đơn      
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="quanLyNhanVien.php" class="nav-link active">
              <i class="nav-icon fas fa-record-vinyl"></i>
              <p>
                Quản lý nhân viên 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="people.php" class="nav-link active">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Quản lý người dùng
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="thongke.php" class="nav-link active">
              <i class="nav-icon fas fa-coins"></i>
              <p>
                Thống kê
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
          <a href="./Login.php"  onclick="return confirm('Bạn Muốn Đăng Xuất?')" class="nav-link active">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Đăng xuất
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 3072.19px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trang chủ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Language Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">




          
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sửa sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" action="" enctype="multipart/form-data" >
              <div class="card-body">
                <div class="form-group">
                    <div>
                         <input type="hidden"  name="id_product" value="<?php echo $row_up['id_product'] ?>">
                    </div>
                  <label for="">Combo</label>
                  <select class="custom-select form-control-border" name="id_product_type">
                      <?php 
                      while($row_product_type = mysqli_fetch_assoc($query_product_type)){?>
                           <option value="<?php echo $row_product_type['id_product_type'];  ?>"><?php echo $row_product_type['product_type_name'];  ?></option>
                     <?php } ?>
                   
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên sản phẩm</label>
                  <input type="text" class="form-control" name="product_name" value="<?php echo $row_up['product_name']; ?>" >
                   <span class="focus-input100" style="color:red"><?php echo $error; ?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Image</label> <br>
                  <input type="file" name="uploadfile" placeholder="" value="<?php echo $row_up['image']; ?>"> <br>
                   <span class="focus-input100" style="color:red"><?php echo $error; ?></span>
                   <span class="focus-input100" style="color:red"><?php echo $errors; ?></span>
                </div>
                <div>
                  <img src="<?php echo $row['image'] ?>" alt="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Thời gian chế biến</label>
                  <input type="text" class="form-control" name="processing_time" value="<?php echo $row_up['processing_time']; ?>" >
                   <span class="focus-input100" style="color:red"><?php echo $error; ?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Giá</label>
                  <input type="text" class="form-control" name="price" value="<?php echo $row_up['price']; ?>">
                   <span class="focus-input100" style="color:red"><?php echo $error; ?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Mô tả chi tiết</label>
                  <input type="text" class="form-control" name="description" value="<?php echo $row_up['description']; ?>">
                   <span class="focus-input100" style="color:red"><?php echo $error; ?></span>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>




        </div>

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>web quản trị  &copy; 2022-2023 <a href="https://adminlte.io">reice.com</a>.</strong>
    thank you.
    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
