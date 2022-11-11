<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

<head>
    <title>Homeadmin Page</title>
</head>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <div class="container-fluid ">
                        <div class="card">
            <div class="card-header">
                <h3 class="text-success">รายงานเข้ารับบริการขออนุญาตเกี่ยวกับผลิตภัณฑ์สุขภาพ  สำนักงานสาธารณสุขจังหวัดอุตรดิตถ์</h3>                
                <h5 class="text-danger"><?php echo $chk_government[0]['government_title']; ?></h5>
                <?php if(isset($_SESSION['id_card'])&& $_SESSION['license_code']== "00040"){ ?>     

<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  แก้ไขเวลาเปิดปิด
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">แก้ไขเวลาเปิดปิด</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url('pharmacy/editgovernment'); ?>">
          กรอกข้อความที่ต้องการแก้ไข : <input type="text" name="government_title" size="50" value="<?php  echo $chk_government[0]['government_title']  ?>"></div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
            <button type="submit" name ="submit" class="btn btn-primary">บันทึก</button>
          </div>
        </form>
    </div>
  </div>
</div>

                  <?php } ?>        
            </div>
            <div class="card-body">
                <div class="row mt-3">                    
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-header" style="background: linear-gradient(to right, rgb(5, 117, 230), rgb(2, 27, 121));">
                                <h5 class="text-white"><center>จำนวนผู้ลงทะเบียนทั้งหมด</center></h5><br>
                            </div>
                            <div class="card-body" style="background: linear-gradient(to right, rgb(5, 117, 230), rgb(2, 27, 121));" >                                
                                <h4 class="text-white"><center><?php echo $getCount[0]['cnt']; ?></center></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4">

                        <div class="card">
                            <div class="card-header" style="background-image: linear-gradient(90deg, rgba(0, 209, 3, 1) 0%, rgba(0, 179, 3, 1) 100%);">
                                <h5 class="text-white"><center>จำนวนผู้ที่ยังไม่ได้ตอบรับ</center></h5><br>
                            </div>
                            <div class="card-body" style="background-image: linear-gradient(90deg, rgba(0, 209, 3, 1) 0%, rgba(0, 179, 3, 1) 100%);">                               
                                <h4 class="text-white"><center><?php echo $getCountstatus02[0]['cnt']; ?></center></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4">
                    
                        <div class="card">
                            <div class="card-header" style="background: linear-gradient(to right, rgb(188, 78, 156), rgb(248, 7, 89));" >
                                <h5 class="text-white"><center>จำนวนผู้ที่ตอบรับแล้ว</center></h5><br>
                            </div>
                            <div class="card-body" style="background: linear-gradient(to right, rgb(188, 78, 156), rgb(248, 7, 89));">                                
                                <h4 class="text-white"><center><?php echo $getCountstatus01[0]['cnt']; ?></center></h4>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->

                
            </div>
            
        </div>
        <br>
        <div class="card">
    
            <div class="card-header text-uppercase">จำนวนผู้ใช้บริการทั้งหมด</div>
            <div class="card-body" style="position: relative;">

            <form name ="form" method="post">
            &nbsp; ปี : <input type="text" name="b_year" value="<?php echo $b_year; ?>" />
            &nbsp;<input type="submit" class="btn btn-success" value="ค้นหา">
            </form>
        
        <div  id="chart">
        <?php
            $chart_name = array();
            $chart_value = array();
            foreach($chart as $row){
                array_push($chart_name,$row['content']);
                array_push($chart_value,$row['cnt']);
            } ?>
            </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
<script>
    
var options = {
  chart: {
    type: 'bar',
  },
  series: [{
    name: 'จำนวน',
    data: <?php echo json_encode($chart_value); ?>,
  }],
  plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val + " คน";
            
          },
          
          offsetY: -30,
          style: {
            fontSize: '15px',
            colors: ["#304758"]
          }
        },
  xaxis: {
    categories: <?php echo json_encode($chart_name); ?>,
  },
  fill: {
    colors: ['#F44336', '#E91E63', '#9C27B0', '#9C27B0']
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>
</html>