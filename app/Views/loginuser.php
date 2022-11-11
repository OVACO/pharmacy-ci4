<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="th">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <title>Login Page</title>
  <link rel="icon" href="http://www.cupsongkhla.com/social/data/attachment/forum/201511/06/102511yhcquqpp6h0xu01a.png" alt="ITA">

  <!-- Custom fonts for this template--> 
  <?php echo link_tag('plugins/vendor/fontawesome-free/css/all.min.css'); ?>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <?php echo link_tag('plugins/css/sb-admin-2.min.css'); ?>
<style type="text/css">
  *{
    margin: 0;
    pading: 0;
  }
#vanta-canvas {
  width: 100%;
  height: 100%;
}
</style>
</head>

<body>
  <div id="vanta-canvas">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.clouds.min.js"></script>
<script>
VANTA.CLOUDS({
  el: "#vanta-canvas",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00
})
</script>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
                <div class="p-5">
                  <div class="text-center">
                  <div class="sidebar-brand-icon">
                <img src="https://www.cuprtp.com/web/wp-content/uploads/2017/12/logo_moph.png" alt="ITA"width="70" height="80">
              </div>
              <h1 class="h5 text-gray-900 mb-4">ลงชื่อเข้าใช้งาน<br>ระบบนัดหมายสำหรับขออนุญาตเกี่ยวกับผลิตภัณฑ์สุขภาพ <br>สำนักงานสาธารณสุขจังหวัดอุตรดิตถ์</h1>
                  </div>

                  <?php if(session()->getFlashdata('msg')): ?>
                    <div class ="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
                  <?php endif; ?>
                  <form class="user" role="form" method="post" action="<?php echo base_url('loginuser/check'); ?>" >

                  



                  <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="เลขประจำตัวประชาชน" name="id_card">
                  <label for="floatingInput">เลขประจำตัวประชาชน</label>
                  </div>
                  <div class="form-floating">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="phonenumber">
                  <label for="floatingPassword">เบอร์โทรศัพท์</label>
                  </div>


                    <p>ยังไม่ได้เป็นสมาชิก?<a href="<?php echo base_url('register/'); ?>">ลงทะเบียนเข้าใช้ระบบ</a></p>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">เข้าใช้งานระบบ</button>
                    <a class="btn btn-secondary btn-user btn-block" href="<?php echo base_url('register'); ?>">กลับ</a>
                    <div class="text-center my-auto">
                    <div class="text-center">
                    <img  src="<?php echo base_url('doc/line_ossc.jpg');?>" alt="line_ossc"width="200" height="200"></div>
                    <span STYLE="font-size:14.0pt">กลุ่มงานเภสัชสาธารณสุขและศูนย์บริการผลิตภัฑ์สุขภาพเบ็ดเสร็จ สำนักงานสาธารณสุขจังหวัดอุตรดิตถ์
              <br>โทร. 055-411439 ต่อ 109 หรือ 095-3138086
              <br>Line : ossc-utt Email : utt.ossc@gmail.com

              </span>



              </div>
                  <!-- <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div> -->
                </form>
                </div>
          </div>
        </div>

      </div>




    </div>

  </div>
  </div>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <style>
        body{ 
            font-family: Kanit;
        }
    </style>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>/plugins/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>/plugins/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>/plugins/js/sb-admin-2.min.js"></script>
  
</body>

</html>
<?php if( $session->get('test')=='0'){ ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'เกิดข้อผิดพลาด',
    text: 'ไม่สามารถลงทะเบียนได้ รหัสบัตรประชาชนซ้ำ',
    
})
</script>
<?php  }?>


<?php if( $session->get('test')=='1'){ ?>
<script>
Swal.fire({
    icon: 'warning',
    title: 'รอการยืนยันเข้าใช้งาน',
    text: 'หากได้ลงทะเบียนเกิน 24 ชั่วโมง โปรดติดต่อเจ้าหน้าที่!!',
})
</script>
<?php  }?>
<?php $session->remove('test'); ?>