<!DOCTYPE html>
<html lang="en">
<?php $session = session(); ?>
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
                                <form method="post" action="<?php echo base_url('pharmacy/edittoken/')?>">
                                <h1>แก้ไขโทเค็นไลน์</h1>
                                <small class="form-text text-muted">(หน้าแก้ไขข้อมูลโทเค็นไลน์ เพื่อที่จะแจ้งเตือนในกลุ่มไลน์ที่ต้องการ)</small>
                                    <br>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="text" required="required" name="token"value="<?php echo isset($chk_token[0]['token'])?$chk_token[0]['token']:''; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <p></p><input type="submit" class="btn btn-success btn-user btn-block" name="submit" value="บันทึกข้อมูล" />
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>

    </html>
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