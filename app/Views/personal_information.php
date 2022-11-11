<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<head>
    <title>Register Page</title>
</head>

<body>
    <div class="container-fluid ">
    <div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"> ลงทะเบียนเข้าใช้งานระบบนัดหมายสำหรับขออนุญาตเกี่ยวกับผลิตภัณฑ์สุขภาพ<br>สำนักงานสาธารณสุขจังหวัดอุตรดิตถ์</h1>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="align-middle">ข้อมูลส่วนบุคคล:</th>
                                <th></th>
                                <th>
                                    <div id="div"></div>
                                    <script>
                                    function showClockRealTime() {
                                        var d = new Date();
                                        document.getElementById("div").innerHTML = "เวลาปัจจุบัน คือ " + d
                                            .getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                                    }
                                    setInterval("showClockRealTime()", 1000);
                                    </script>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <form name="form" method="post" action="<?php echo base_url($action); ?>">
                            <input class="form-control form-control-user" type="hidden" name="editid"
                                value="<?php echo isset($chk_edit['id'])?$chk_edit['id']:''; ?>" />
                                <tr>
                                    <td class="align-middle">
                                    <div class="form-group">รหัสบัตรประชาชน:
                                        <small class="form-text text-muted">กรอกเลขประจำตัวประชาชน 13 หลัก เช่น (1540000xxxxxx)</small>
                                        <input class="form-control form-control-user" type="text" required="required" name="id_card" pattern="\d{13}" title="ตัวเลข 13 ตัวเท่านั้น"
                                value="<?php echo isset($chk_edit['id_card'])?$chk_edit['id_card']:''; ?>" />
                                        </div>
                                        
                                    </td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle">
    
                                    <div class="form-group">เบอร์โทรศัพท์:
                                        <small class="form-text text-muted">กรอกเบอร์โทรศัพท์ 10 หลัก เช่น (099xxxxxxx)</small>
                                        <input class="form-control form-control-user" type="text" required="required" name="phonenumber" pattern="\d{10}" title="ตัวเลข 10 ตัวเท่านั้น"
                                value="<?php echo isset($chk_edit['phonenumber'])?$chk_edit['phonenumber']:''; ?>" />
                                        </div> 
                                                                   
                                    </td>

                                </tr>
                                <tr>
                                <td class="align-middle">
                                    <div class="form-group">คำนำหน้าชื่อ:
                                        <small class="form-text text-muted">กรอกคำนำหน้าชื่อ เช่น (พลเอก นางสาว นาย)</small>
                                        <input class="form-control form-control-user" type="text" required="required" name="pname"
                                value="<?php echo isset($chk_edit['pname'])?$chk_edit['pname']:''; ?>" />
                                        </div>
                                <td class="align-middle">
                                    <div class="form-group">ชื่อ:
                                        <small class="form-text text-muted">กรอกชื่อ เช่น (สมศักดิ์ กันภัย อูโน่)</small>
                                        <input class="form-control form-control-user" type="text" required="required" name="fname"
                                value="<?php echo isset($chk_edit['fname'])?$chk_edit['fname']:''; ?>" />
                                        </div>
                                    <td class="align-middle">
                                        <div class="form-group">นามสกุล:
                                        <small class="form-text text-muted">กรอกนามสกุล เช่น (ออมตอง บุญนำ อโศก)</small>
                                            <input class="form-control form-control-user" type="text" required="required" name="lname"
                                value="<?php echo isset($chk_edit['lname'])?$chk_edit['lname']:''; ?>" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <td class="align-middle">
                                    <div class="form-group">บ้านเลขที่:
                                        <input class="form-control form-control-user" type="text" required="required" name="house_num"
                                value="<?php echo isset($chk_edit['house_num'])?$chk_edit['house_num']:''; ?>" />
                                        </div>
                                <td class="align-middle">
                                    <div class="form-group">ตำบล:
                                        
                                        <input class="form-control form-control-user" type="text" required="required" name="district"
                                value="<?php echo isset($chk_edit['district'])?$chk_edit['district']:''; ?>" />
                                        </div>
                                    <td class="align-middle">
                                        <div class="form-group">อำเภอ:
                                        
                                            <input class="form-control form-control-user" type="text" required="required" name="amphure"
                                value="<?php echo isset($chk_edit['amphure'])?$chk_edit['amphure']:''; ?>" />
                                        </div>
                                    </td>
                                </tr> </td>
                                    <td class="align-middle">
                                    <div class="form-group">จังหวัด:
                                        
                                        <input class="form-control form-control-user" type="text" required="required" name="province"
                                value="<?php echo isset($chk_edit['province'])?$chk_edit['province']:''; ?>" />
                                        </div>
                                <td class="align-middle">
                                    <div class="form-group">รหัสไปรษณีย์:
                                        <input class="form-control form-control-user" type="text" required="required" name="zip_code"
                                value="<?php echo isset($chk_edit['zip_code'])?$chk_edit['zip_code']:''; ?>" />
                                        </div>
                                    

                                    </tr>
                                    </td>
                                        
                                </tr>
                        </tbody>

                    </table>
                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="บันทึกข้อมูล" />
                    </form>
                </div>
            </div>
        </div>

    </div>

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
        title: 'ยืนยันการลบข้อมูล',
        text: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่!",
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
    text: 'ไม่สามารถลงทะเบียนได้ รหัสบัตรประชาชนซ้ำ',
    
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