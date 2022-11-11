<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="th">

<head >
    <style type="text/css">
    #overlay {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 2;
        cursor: pointer;
    }

    #text {
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 50px;
        color: white;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
    }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบนัดหมายสำหรับขออนุญาตเกี่ยวกับผลิตภัณฑ์สุขภาพ สำนักงานสาธารณสุขจังหวัดอุตรดิตถ์</title>
    <link rel="icon" href="http://www.cupsongkhla.com/social/data/attachment/forum/201511/06/102511yhcquqpp6h0xu01a.png">

  <!-- Custom fonts for this template-->
    <?php echo link_tag('plugins/vendor/fontawesome-free/css/all.min.css'); ?>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <?php echo link_tag('plugins/css/sb-admin-2.min.css'); ?>

    <!-- Custom styles for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css" />
    <?php //echo link_tag('plugins/vendor/datatables/dataTables.bootstrap4.min.css'); ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion  " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('mainusers'); ?>">
                <div class="sidebar-brand-icon">
                <img src="https://www.cuprtp.com/web/wp-content/uploads/2017/12/logo_moph.png" alt="ssj"width="50" height="50">
                </div>
                
            </a>
            <?php if(isset($_SESSION['id_card'])&& $_SESSION['license_code']== "00"){ ?>
            <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Users/'); ?>">
          <i class="fas fa-fw fa-archive"></i>
          <span>จัดการข้อมูลผู้ใช้งาน</span></a>
      </li>
      <?php } ?>
            <!-- Divider -->
            <?php if(isset($_SESSION['id_card'])&& $_SESSION['license_code']== "00040"){ ?>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pharmacy/index'); ?>">
                    <i class="fas fa-fw fa-home"></i>

                    
                    <span>หน้าหลัก</span></a>
            </li>
        
            <!-- Divider -->
      <hr class="sidebar-divider">

            <!-- Heading -->
      <div class="sidebar-heading">
      
        <h6 class ="text-white">เมนู</h6>
      </div>


      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('time/'); ?>">
          <i class="fas fa-fw fa-archive"></i>
          <span>จัดการช่วงเวลานัดหมาย</span></a>
      </li>

      

      <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="fas fa-fw fa-archive"></i>
          <span>จัดการข้อมูลตัวเลือก<br>การนัดหมาย</span></a>
          <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="tables" style="">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item">

        <a class="nav-link" href="<?php echo base_url('main/'); ?>">
          <i class="fas fa-plus"></i>
          <span>เรื่องขอรับบริการ</span></a>

          <a class="nav-link" href="<?php echo base_url('secon/'); ?>">
          <i class="fas fa-plus"></i>
          <span>ประเภทผลิตภัณฑ์สุขภาพ</span></a>
            
            </div>
            
      </li>

      

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('sub/'); ?>">
          <i class="fas fa-fw fa-archive"></i>
          <span>จัดการข้อมูลเอกสาร</span></a>
      </li>


      <!--
      <li class="nav-item">
        <a class="nav-link" href="<?php //echo base_url('pharmacy/d_menu/'); ?>">
          <i class="fas fa-fw fa-archive"></i>
          <span>เมนูยืนยันรับเรื่อง</span></a>
      </li> -->

      <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#tables-add" aria-expanded="false" aria-controls="tables">
          <i class="fas fa-fw fa-archive"></i>
          <span>จัดการข้อมูลการนัดหมาย</span></a>
          <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="tables-add" style="">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item">

        <a class="nav-link" href="<?php echo base_url('pharmacy/dashboardshowall'); ?>">
          <i class="fas fa-plus"></i>
          <span>การนัดหมายทั้งหมด</span></a>

          <a class="nav-link" href="<?php echo base_url('pharmacy/dashboard/1'); ?>">
          <i class="fas fa-plus"></i>
          <span>การนัดหมายตามช่วงวัน</span></a>

        <a class="nav-link" href="<?php echo base_url('pharmacy/check_statusid/2'); ?>">
          <i class="fas fa-plus"></i>
          <span>การนัดหมายที่รอการตอบรับ</span></a>

        <a class="nav-link" href="<?php echo base_url('pharmacy/check_statusid/3'); ?>">
          <i class="fas fa-plus"></i>
          <span>การนัดหมายที่ปฏิเสธ</span></a>
            </li>
              </ul>
            
            </div>
            
      </li>



      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('pharmacy/dashboardtoken/'); ?>">
          <i class="fas fa-fw fa-archive"></i>
          <span>แก้ไขโทเค็นไลน์</span></a>
      </li>
      <?php } ?>
            <!-- Divider -->
            


<?php if($_SESSION['license_code'] == ""){ ?>
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('register/'); ?>">
    <i class="fas fa-fw fa-home"></i>
<span class="text-warning" STYLE="font-size:13.0pt">ลงทะเบียนเข้าใช้บริการ</span></a>
</li>
<?php } ?>

<?php if($_SESSION['license_code'] == "01"){ ?>
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('register/personal_information?editid='.$_SESSION['id_card']); ?> ">
    <i class="fas fa-fw fa-home"></i>
        <span STYLE="font-size:14.0pt">ข้อมูลส่วนตัว</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('pharmacy/pharmacyAddEdit/'); ?>">
    <i class="fas fa-fw fa-home"></i>
        <span STYLE="font-size:14.0pt">บันทึกการนัดหมาย</span></a>
</li>
<?php } ?>
              
<hr class="sidebar-divider">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow ">
                &nbsp&nbsp<span>ระบบนัดหมายสำหรับขออนุญาตเกี่ยวกับผลิตภัณฑ์สุขภาพ สำนักงานสาธารณสุขจังหวัดอุตรดิตถ์</span>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <?php if(isset($_SESSION['h_code'])&&$_SESSION['h_code']=='00040') {
                    //echo $_SESSION['username'];
                    
                    ?>

                    <?php } ?>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <?php if(isset($_SESSION['id_card'])){ ?>
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['pname'],$_SESSION['fname']," ",$_SESSION['lname'],"<br>",$_SESSION['id_card'];?></span>
                            </a>
                                <?php }else{ ?>


                            <a class="nav-link dropdown-toggle" href="<?php echo base_url('LoginUser/'); ?>" id="userDropdown" role="button">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small" STYLE="font-size:15.0pt">ลงชื่อเข้าใช้งาน</span>
                            </a><?php }?>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!--<button class="dropdown-item" onclick="on()">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </button>
                                <a class="dropdown-item" href="settings.php?action=edit">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>-->
                                <a class="dropdown-item" href="<?php echo base_url('LoginUser/logout'); ?>"
                                    data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    ออกจากระบบ
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->