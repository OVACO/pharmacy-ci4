<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<head>
    <title>Update Page</title>
</head>

<body>
    <div class="container-fluid ">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
            
            <h1>
            <a href="<?php echo base_url('main'); ?>"><img src="https://img.icons8.com/ios/50/000000/circled-chevron-left.png"/></a> เพิ่ม และแก้ไขข้อมูลเรื่องที่ขอรับบริการ
            </h1>
            <small class="form-text text-muted">(หน้าเพิ่ม ลบ และแก้ไขข้อมูลเรื่องขอรับบริการทั้งหมด เช่น วัคซีนพาสปอร์ต ขอรับใบอนุญาติ และขอต่ออายุ/ชำระค่าธรรมเนียม เป็นต้น)</small>
            <hr>
                            <form name="form" method="post" action="<?php echo base_url($action); ?>">
                                รหัสเรื่องขอรับบริการ
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" required="required"
                                        name="main_id"
                                        value="<?php echo isset($main_title['main_id'])?$main_title['main_id']:''; ?>" />
                                </div>
                                เรื่องขอรับบริการ
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" required="required"
                                        name="content"
                                        value="<?php echo isset($main_title['content'])?$main_title['content']:''; ?>" />
                                </div>
                                <input type="hidden" name="id"
                                    value="<?php echo isset($main_title['id'])?$main_title['id']:''; ?>" />
                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="บันทึกข้อมูล" />
                            </form>  
                        </div>
                    </div>

        </div>
</body>

</html>
</div>