<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<head>
    <title>HomeSecon Page</title>
</head>
<body>

<div class="container-fluid ">
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
            <h1>จัดการประเภทผลิตภัณฑ์สุขภาพ</h1>
            <small class="form-text text-muted">(หน้าเพิ่ม ลบ และแก้ไขข้อมูลประเภทผลิตภัณฑ์สุขภาพหรือประเภทงานอื่น ๆ ทั้งหมด เช่น ยา ยาเสพติต วัตถุออกฤิทธิ์  เครื่องสำอาง วัคซีน เป็นต้น)</small>
            <hr>
                <div class="d-flex justify-content-end">

            <button type="button" class="btn btn-success  btn-user btn-block" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php //echo $row['main_id']; ?>">
                                                        เพิ่มประเภทผลิตภัณฑ์สุขภาพ</button>
                                                        <div class="modal fade" id="staticBackdrop<?php //echo $row['main_id']; ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                            เพิ่มประเภทผลิตภัณฑ์สุขภาพ
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="<?php echo base_url($action); ?>">
                                                            <div class="form-group">ระบุเรื่องขอรับบริการ:
                                            <select class="form-control form-control-user"name="main_id">
                                                
                                            <option value="">--โปรดเลือก--</option>
                                                <?php 
                                                $main_id = isset($chk_edit['main_id'])?$chk_edit['main_id']:""; 
                                                foreach($getmain as $rs1){ 
    
                                                    $select1 = ($rs1['main_id'] == $main_id)?" selected ":"";
                                                echo '<option value="'.$rs1['main_id'].'" '.$select1.'>'.$rs1['content'].'</option>';
                                                  } ?>
                                            </select>
                                                </div>
                                        <div class="form-group">ประเภทผลิตภัณฑ์สุขภาพ:
                                            <small class="form-text text-muted">(ตัวอย่างการเพิ่ม เช่น ยา ยาเสพติต วัตถุออกฤิทธิ์  เครื่องสำอาง วัคซีน เป็นต้น)</small>
                                            <input class="form-control form-control-user" type="text" required="required" name="content2"
                            value="<?php echo isset($row['content2'])?$row['content2']:''; ?>" />
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
                </div>
                <br>
                
                <table class="table table-hover"  id="secon-list0">
                    <thead>
                        <tr>
                        <th width="10%">รหัสประเภทผลิตภัณฑ์สุขภาพ</th>
                            <th width="10%">เรื่องขอรับบริการ</th>
                            
                            <th width="10%">สถานะการแสดงตัวเลือก</th>
                            <th width="40%">ประเภทผลิตภัณฑ์สุขภาพ</th>
                            <th width="10%">แสดง/ไม่แสดง</th>
                            <th width="8%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($secondary_title as $row): ?>
                        <tr>
                            <td text-align: center ><?php echo $row['secondary_id']; ?></td>
                            <td text-align: center ><?php echo $row['content']; ?></td>
                            
                            <td><?php echo $row['status_name']; ?></td>
                            <td><?php echo $row['content2']; ?></td>
                            <td>
                            <center>
                            <?php if($row['title_stid'] == '0'){ ?>
                                <a onclick="confirmation(event)" class="btn btn-success btn-sm" href="<?php echo base_url('Secon/approve/'.$row['secondary_id']); ?> ">แสดง</a>
                            
                            <?php }else{ ?>
                                <a onclick="confirmation(event)" class="btn btn-danger btn-sm" href="<?php echo base_url('Secon/disapproved/'.$row['secondary_id']); ?> ">ไม่แสดง</a>
                                <?php } ?>
                            </center>    
                        </td>
                            <td>

                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $row['secondary_id']; ?>">
                                                        แก้ไขข้อมูล</button>
                                                        <div class="modal fade" id="staticBackdrop<?php echo $row['secondary_id']; ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                            แก้ไขข้อมูลประเภทผลิตภัณฑ์สุขภาพ
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="post"
                                                                action="<?php echo base_url('Secon/edit'); ?>">
                                                                <input type="hidden" name="secondary_id"
                                                                    value="<?php echo $row['secondary_id'];  ?>">
                                                                    <div class="form-group">ระบุเรื่องขอรับบริการ:
                                            <select class="form-control form-control-user"name="main_id">
                                                
                                            <option value="">--โปรดเลือก--</option>
                                                <?php 
                                                $main_id = isset($row['main_id'])?$row['main_id']:""; 
                                                foreach($getmain as $rs1){ 
    
                                                    $select1 = ($rs1['main_id'] == $main_id)?"selected":"";
                                                
                                                echo '<option value="'.$rs1['main_id'].'" '.$select1.'>'.$rs1['content'].'</option>';
                                                  } ?>
                                            </select>
                                                </div>
                                                <div class="form-group">ประเภทผลิตภัณฑ์สุขภาพ:
                                            <small class="form-text text-muted">(ตัวอย่างการเพิ่ม เช่น ยา ยาเสพติต วัตถุออกฤิทธิ์  เครื่องสำอาง วัคซีน เป็นต้น)</small>
                                            <input class="form-control form-control-user" type="text" required="required" name="content2"
                            value="<?php echo isset($row['content2'])?$row['content2']:''; ?>" />
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
            $('#secon-list0').dataTable( {
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
</div>
</div>
</div>
</div>
</body>
    </html>

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
    