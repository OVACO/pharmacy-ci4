<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<head>
    <title>HomeSub Page</title>
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
            <h1><span class="left"> จัดการผู้ใช้งานระบบทั้งหมด</span></h1>
      <span class="right"><button type="button" class="btn btn-primary btn-user" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $row['id']; ?>">
                                                        เพิ่มข้อมูลผู้ใช้งาน</button></span>
    </div>
    <br><br><small class="form-text text-muted">(หน้าเพิ่ม ลบ และแก้ไขข้อมูลผู้ใช้ระบบทั้งหมด)</small><hr>
                                                        
                                                        <div class="modal fade" id="staticBackdrop<?php echo $row['id']; ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                            เพิ่มข้อมูลผู้ใช้งาน
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                action="<?php echo base_url($action); ?>">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $row['id'];  ?>">




                                                                    <div class="form-group">ระบุสิทธ์การเข้าใช้งาน:
                                            <select class="form-control form-control-user"name="license_code">
                                                
                                            <option value="">--โปรดเลือก--</option>
                                                <?php 
                                                $license_code = isset($chk_edit['license_code'])?$chk_edit['license_code']:""; 
                                                foreach($getlicense_user as $rs1){ 
    
                                                    $select1 = ($rs1['license_code'] == $license_code)?" selected ":"";
                                                echo '<option value="'.$rs1['license_code'].'" '.$select1.'>'.$rs1['license_con'].'</option>';
                                                  } ?>
                                            </select>
                                                </div>
                                        <div class="form-group">เลขประจำตัวประชาชน:
                                        <input class="form-control form-control-user" type="text" required="required" name="id_card" pattern="\d{13}" title="ตัวเลข 13 ตัวเท่านั้น"
                                value="<?php echo isset($chk_edit['id_card'])?$chk_edit['id_card']:''; ?>" />
                                <small class="form-text text-muted">กรอกเลขประจำตัวประชาชน 13 หลัก เช่น (1540000xxxxxx)</small>
                                        </div>

                                        <div class="form-group">คำนำหน้าชื่อ:
                                        <input class="form-control form-control-user" type="text" required="required" name="pname"
                                value="<?php echo isset($chk_edit['pname'])?$chk_edit['pname']:''; ?>" />
                                        </div>

                                        <div class="form-group">ชื่อ:
                                        <input class="form-control form-control-user" type="text" required="required" name="fname"
                                value="<?php echo isset($chk_edit['fname'])?$chk_edit['fname']:''; ?>" />
                                        </div>
                                        
                                        <div class="form-group">นามสกุล:
                                            <input class="form-control form-control-user" type="text" required="required" name="lname"
                                value="<?php echo isset($chk_edit['lname'])?$chk_edit['lname']:''; ?>" />
                                        </div>

                                        <div class="form-group">เบอร์โทรศัพท์: 
                                        <input class="form-control form-control-user" type="tel" required="required" name="phonenumber" pattern="\d{10}" title="ตัวเลข 10 ตัวเท่านั้น"
                                value="<?php echo isset($chk_edit['phonenumber'])?$chk_edit['phonenumber']:''; ?>" />
                                <small class="form-text text-muted">กรอกเบอร์โทรศัพท์ 10 หลัก เช่น (099xxxxxxx)</small>
                                        </div>

                                                        </div>
                                                        <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="บันทึกข้อมูล" />
                    <input type="hidden" name="id" value="<?php echo isset($chk_edit['id'])?$chk_edit['id']:''; ?>" />
                    <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                        </form>
                                                </div>
                                                </div>
                                                </div>
                <table class="table table-hover" id="users-list0">
                    <thead>
                        <tr>
                <th width="15%">เลขประจำตัวประชาชน</th>
                <th width="15%">สิทธิ์การเข้าใช้งาน</th>
                <th width="10%">คำนำหน้าชื่อ</th>
                <th width="15%">ชื่อ</th>
                <th width="15%">นามสกุล</th>
                <th width="12%">เบอร์โทรศัพท์</th>
                <th width="10%"></th>
                <th width="18%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($register as $row): ?>
                        <tr>
                        <td class="align-middle"><?php echo $row['id_card']; ?></td>
                        <td class="align-middle"><?php echo $row['license_con']; ?></td>
                            <td class="align-middle"><?php echo $row['pname']; ?></td>
                            <td class="align-middle"><?php echo $row['fname']; ?></td>
                            <td class="align-middle"><?php echo $row['lname']; ?></td>
                            <td class="align-middle"><?php echo $row['phonenumber']; ?></td>
                            <td class="align-middle">
                                <?php if( $row['license_code'] != '00' ){ ?>
                                <?php if( $row['license_code'] != '00040' ){ ?>
                                    <?php if( $row['license_code'] != '01' ){ ?>
                                <a onclick="confirmation(event)" class="btn btn-success btn-sm" href="<?php echo base_url('Users/approve/'.$row['id']); ?> ">อนุมัติ</a>
                                <?php }else{ ?>
                                <a onclick="confirmation(event)" class="btn btn-danger btn-sm" href="<?php echo base_url('Users/disapproved/'.$row['id']); ?> ">ไม่อนุมัติ</a>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?></td>
                            <td class="align-middle">
                            
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $row['id']; ?>">
                                                        แก้ไขข้อมูล</button>
                                                        <div class="modal fade" id="staticBackdrop<?php echo $row['id']; ?>"
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
                                                                action="<?php echo base_url('Users/editdata'); ?>">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $row['id'];  ?>">

                                                <div class="form-group">ระบุสิทธ์การเข้าใช้งาน:
                                            <select class="form-control form-control-user"name="license_code">
                                                
                                            <option value="">--โปรดเลือก--</option>
                                                <?php 
                                                $license_code = isset($row['license_code'])?$row['license_code']:""; 
                                                foreach($getlicense_user as $rs1){ 
    
                                                    $select1 = ($rs1['license_code'] == $license_code)?" selected ":"";
                                                echo '<option value="'.$rs1['license_code'].'" '.$select1.'>'.$rs1['license_con'].'</option>';
                                                  } ?>
                                            </select>
                                                </div>
                                        <div class="form-group">เลขประจำตัวประชาชน:
                                        <input class="form-control form-control-user" type="text" required="required" name="id_card" pattern="\d{13}" title="ตัวเลข 13 ตัวเท่านั้น"
                                value="<?php echo isset($row['id_card'])?$row['id_card']:''; ?>" />
                                <small class="form-text text-muted">กรอกเลขประจำตัวประชาชน 13 หลัก เช่น (1540000xxxxxx)</small>
                                        </div>

                                        <div class="form-group">คำนำหน้าชื่อ:
                                        <input class="form-control form-control-user" type="text" required="required" name="pname"
                                value="<?php echo isset($row['pname'])?$row['pname']:''; ?>" />
                                        </div>

                                        <div class="form-group">ชื่อ:
                                        <input class="form-control form-control-user" type="text" required="required" name="fname"
                                value="<?php echo isset($row['fname'])?$row['fname']:''; ?>" />
                                        </div>
                                        
                                        <div class="form-group">นามสกุล:
                                            <input class="form-control form-control-user" type="text" required="required" name="lname"
                                value="<?php echo isset($row['lname'])?$row['lname']:''; ?>" />
                                        </div>

                                        <div class="form-group">เบอร์โทรศัพท์:
                                        <input class="form-control form-control-user" type="tel" required="required" name="phonenumber" pattern="\d{10}" title="ตัวเลข 10 ตัวเท่านั้น"
                                value="<?php echo isset($row['phonenumber'])?$row['phonenumber']:''; ?>" />
                                <small class="form-text text-muted">กรอกเบอร์โทรศัพท์ 10 หลัก เช่น (099xxxxxxx)</small>
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
            $('#users-list0').dataTable( {
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
        title: 'ยืนยันการเปลี่ยนสิทธ์การเข้าถึง',
        text: "คุณต้องการเปลี่ยนสิทธ์การเข้าถึงนี้ใช่หรือไม่!",
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

</script>
<?php if( $session->get('del') ){ ?>
    <script>
Swal.fire({
  icon: 'error',
  title: 'เกิดข้อผิดพลาด',
  text: 'ยังมีข้อมูลการนัดหมายอยู่ข้างในไม่สามารถลบได้',
})
    </script>
    <?php  } $session->remove('del'); ?>