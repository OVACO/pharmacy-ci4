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
            <a href="<?php echo base_url('secon?main_id='.$main_id); ?>"><img src="https://img.icons8.com/ios/50/000000/circled-chevron-left.png"/></a> เพิ่ม และแก้ไขข้อมูลประเภทผลิตภัณฑ์สุขภาพ
            </h1>
            <small class="form-text text-muted">(หน้าเพิ่ม ลบ และแก้ไขข้อมูลประเภทผลิตภัณฑ์สุขภาพหรือประเภทงานอื่น ๆ ทั้งหมด เช่น ยา ยาเสพติต วัตถุออกฤิทธิ์  เครื่องสำอาง วัคซีน เป็นต้น)</small>
            <hr>
                            <form name="form" method="post" action="<?php echo base_url($action); ?>">
                                <br>รหัสเรื่องขอรับบริการ
                                <br><div class="form-group">
                                    <input class="form-control form-control-user" type="text" required="required" readonly
                                        name="main_id"
                                        value="<?php echo isset($main_id)?$main_id:''; ?>" />
                                </div>
                                <br>เรื่องขอรับบริการ
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" required="required" readonly
                                        name="content"
                                        value="<?php echo $contentmain[0]['content']?$contentmain[0]['content']:''; ?>" />
                                </div>
                                <br>รหัสผลิตภัณฑ์สุขภาพ
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" required="required"
                                        name="secondary_id"
                                        value="<?php echo isset($olddata[0]['secondary_id'])?$olddata[0]['secondary_id']:''; ?>" />
                                </div>
                                ชื่อประเภทผลิตภัณฑ์สุขภาพ
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" required="required"
                                        name="content2"
                                        value="<?php echo isset($olddata[0]['content2'])?$olddata[0]['content2']:''; ?>" />
                                </div>
                                <input type="hidden" name="id"
                                    value="<?php echo isset($id)?$id:''; ?>" />
                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="บันทึกข้อมูล" />
                            </form>
                        </div>
                    </div>
                </div>

        
</body>

</html>
</div>