<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid ">
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">
                        <div class="p-1">
                            <div class="text-left">
                                <form method="post" action="<?php echo base_url('pharmacy/pharmacyupload2/'.$main_id.'?main_id='.$main_id.'&secondary_id='.$secondary_id.'&sub_id='.$sub_id);?>" enctype="multipart/form-data">
                                <h1>อัปโหลดไฟล์ตัวอย่าง</h1>
                                <small class="form-text text-muted">(หน้าอัปโหลดไฟล์ตัวอย่าง เพื่อที่จะให้ผู้ใช้บริการสามารถตรวจสอบเอกสารที่กรอกได้ถูกต้องก่อนส่งเจ้าหน้าที่)</small>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="file" required="required" name="fileToUpload2"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p><button name="submit" type="submit" class="btn btn-success">อัปโหลดไฟล์</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>