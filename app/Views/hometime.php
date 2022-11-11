<?php $session = session(); ?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<head>
    <title>หน้าจัดการช่วงเวลานัดหมาย</title>
    <style>

.first .right {
  float: right;
}      
.first .left {
  float: left;
}
</style>
</head>

<body>
<div class="container-fluid ">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
            <div class="first">
            <h1><span class="left"> จัดการช่วงเวลาการนัดหมายทั้งหมด</span></h1>
      <span class="right"><button type="button" class="btn btn-primary btn-user" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $row['time_id']; ?>">
                                                        เพิ่มช่วงเวลาการนัดหมาย</button></span>
    </div>
    <br><br><small class="form-text text-muted">(หน้าเพิ่ม และแก้ไขช่วงเวลาการนัดหมายทั้งหมด)</small>
                                                        
                                                        <div class="modal fade" id="staticBackdrop<?php echo $row['time_id']; ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                            เพิ่มช่วงเวลาการนัดหมาย
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="<?php echo base_url($action); ?>">
                                                                <input type="hidden" name="time_id" value="<?php echo $row['time_id'];  ?>">

                                        <div class="form-group">ช่วงเวลานัดหมาย:
                                            <small class="form-text text-muted">(ตัวอย่างการเพิ่ม เช่น 08.30 - 09.30 น. เป็นต้น)</small>
                                            <input class="form-control form-control-user" type="text" required="required" name="time_set"
                            value="<?php echo isset($row['time_set'])?$row['time_set']:''; ?>" />
                    </div>

                                                        </div>
                                                        <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="บันทึกข้อมูล" />
                    <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                        </form>
                                                </div>
                                                </div>
                                                </div>
                    <table class="table table-hover"  id="time-list0">
                    <thead>
                        <tr>
                            <th width="10%">ลำดับ</th>
                            <th width="10%">สถานะช่วงเวลา</th>
                            <th width="50%">ช่วงเวลานัดหมาย</th>
                            <th width="10%">แสดง/ไม่แสดง</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($time as $row): ?>
                        <tr>
                            <td text-align: center ><?php echo $row['time_id']; ?></td>
                            <td><?php echo $row['status_name']; ?></td>
                            <td><?php echo $row['time_set']; ?></td>
                            <td>
                            <center>
                                <?php if($row['tim_stid'] == '0'){ ?>
                            <a onclick="confirmation(event)" class="btn btn-success btn-sm" href="<?php echo base_url('Time/approve/'.$row['time_id']); ?> ">แสดง</a>
                            <?php }else{ ?>
                            <a onclick="confirmation(event)" class="btn btn-danger btn-sm" href="<?php echo base_url('Time/disapproved/'.$row['time_id']); ?> ">ไม่แสดง</a>
                            <?php } ?>
                            </center>    
                        </td>
                            <td>

                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $row['time_id']; ?>">
                                                        แก้ไขข้อมูล</button>
                                                        <div class="modal fade" id="staticBackdrop<?php echo $row['time_id']; ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                            แก้ไขข้อมูล
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="post"
                                                                action="<?php echo base_url('Time/edit'); ?>">
                                                                <input type="hidden" name="time_id"
                                                                    value="<?php echo $row['time_id'];  ?>">
                                                                    <div class="form-group">ช่วงเวลานัดหมาย:
                                            <small class="form-text text-muted">(ตัวอย่างการเพิ่ม เช่น 08.30 - 09.30 น. เป็นต้น)</small>
                                            <input class="form-control form-control-user" type="text" required="required" name="time_set"
                            value="<?php echo isset($row['time_set'])?$row['time_set']:''; ?>" />
                    </div>

                                                        </div>
                                                        <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="บันทึกข้อมูล" />
                    <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                        </form>
                                                </div>
                                                </div>
                                                </div>
                            </td>
                        
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js">
                </script>

<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
            $('#time-list0').dataTable( {
            "oLanguage": {
            "sLengthMenu": "แสดง _MENU_ แถว",
            "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
            "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ แถว",
            "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 แถว",
            "sInfoFiltered": "(จากแถวทั้งหมด _MAX_ แถว)",
            "sSearch": "ค้นหา :",
            "aaSorting" :[[0,'desc']],
            "oPaginate": {
            "sFirst":    "หน้าแรก",
            "sPrevious": "ก่อนหน้า",
            "sNext":     "ถัดไป",
            "sLast":     "หน้าสุดท้าย"
            },
        }
            } );
            } );
    </script>

    </body>
</html>
    </div>
</div>
<script>
function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute(
        'href'
    ); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
    console.log(urlToRedirect); // verify if this is the right URL
    //alert(urlToRedirect);
    Swal.fire({
        title: 'ยืนยันการแสดงข้อมูล',
        text: "คุณต้องการเปลี่ยนการแสดงข้อมูลนี้ใช่หรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = urlToRedirect;
        }
    });
}
</script>


<?php if( $session->get('test')=='0'){ ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'เกิดข้อผิดพลาด',
    text: 'ไม่สามารถบันทึกข้อมูลได้',
})
</script>
<?php  }?>


<?php if( $session->get('test')=='1'){ ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'success',
    text: 'บันทึกข้อมูลสำเร็จ',
})
</script>
<?php  }?>
<?php $session->remove('test'); ?>