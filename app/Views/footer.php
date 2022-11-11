      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <br><footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <div class="text-center">
<img  src="<?php echo base_url('doc/line_ossc.jpg');?>" alt="line_ossc"width="200" height="200"></div>
              <span STYLE="font-size:15.0pt">กลุ่มงานเภสัชสาธารณสุขและศูนย์บริการผลิตภัฑ์สุขภาพเบ็ดเสร็จ สำนักงานสาธารณสุขจังหวัดอุตรดิตถ์
              <br>โทร. 055-411439 ต่อ 109 หรือ 095-3138086
              <br>Line : ossc-utt Email : utt.ossc@gmail.com

              </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ท่านยืนยันจะออกจากระบบใช่หรือไม่?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo isset($_SESSION['id_card'])?$_SESSION['id_card']:""; ?> ยืนยันจะออกจากระบบใช่หรือไม่?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <a class="btn btn-primary" href="<?php echo base_url('LoginUser/logout'); ?>">ยืนยัน</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>/plugins/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>/plugins/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>/plugins/js/sb-admin-2.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <style>
        body{ 
            font-family: Kanit;
        }
    </style>
  <!-- Page level plugins 
  <script src="<?php //echo base_url(); ?>/plugins/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php //echo base_url(); ?>/plugins/vendor/datatables/dataTables.bootstrap4.min.js"></script>-->

  <!-- Page level custom scripts 
  <!--<script src="<?php //echo base_url(); ?>/plugins/js/demo/datatables-demo.js"></script>
  <script src="<?php //echo base_url(); ?>/plugins/js/city.js"></script>-->
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>

<!-- PROFILE OVERLAY NA MODAL -->
<div id="overlay" onclick="off()">
  <div id="text">Profile ;?></div>
</div>
<script>
function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}

//used in pos sa number only na textfields
function isNumberKey(evt)
      {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
      }  
//end of used in pos sa number only na textfields
</script>

</body>

</html>