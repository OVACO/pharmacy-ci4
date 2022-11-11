<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<head>
    <title>HomeSub Page</title>
</head>

<body>


    <div class="container-fluid ">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <h1>
                    จัดการเอกสาร
                    </h1>
                    <small class="form-text text-muted">(หน้าเพิ่ม ลบ และแก้ไขข้อมูลหัวข้อไฟล์ที่ต้องดาวน์โหลด และไฟล์ตัวอย่างทั้งหมด เช่น เอกสารการออกวัคซีน สำเนาบัตรประชาชน เป็นต้น)</small>
                    <hr>
                    <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success  btn-user btn-block" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php //echo $row['main_id']; ?>">
                                                        เพิ่มเอกสาร</button>
                                                        <div class="modal fade" id="staticBackdrop<?php //echo $row['main_id']; ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                            เพิ่มเอกสาร
                                                            </h5>
                                                            
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="post" action="<?php echo base_url('Sub/add')?>" enctype="multipart/form-data">
                                                            <div class="form-group">ระบุเรื่องขอรับบริการ:
                                                                <select class="form-control form-control-user" id="getmain" name="main_id">
                                                
                                                <option value="">--โปรดเลือก--</option>
                                                    <?php 
                                                    $main_id = isset($chk_edit['main_id'])?$chk_edit['main_id']:""; 
                                                    foreach($getmain as $rs1){ 
        
                                                        $select1 = ($rs1['main_id'] == $main_id)?" selected ":"";
                                                    echo '<option value="'.$rs1['main_id'].'" '.$select1.'>'.$rs1['content'].'</option>';
                                                      } ?>
                                                </select>
                                                </div>
                                                <div class="form-group">ระบุประเภทผลิตภัณฑ์สุขภาพ:
                                                    <select class="form-control form-control-user" id="getsecon"
                                                name="secondary_id">
                                                <option value="">--โปรดเลือก--</option>
                                                <?php 
                                                $secondary_id = isset($chk_edit['secondary_id'])?$chk_edit['secondary_id']:""; 
                                                foreach($getsecon as $rs1){ 
    
                                                    $select1 = ($rs1['secondary_id'] == $secondary_id)?" selected ":"";
                                                echo '<option value="'.$rs1['secondary_id'].'" '.$select1.'>'.$rs1['content2'].'</option>';
                                                  } ?>
                                            </select>
                                                </div>
                                        <div class="form-group">ชื่อเอกสาร:
                                            <small class="form-text text-muted">(ตัวอย่างการเพิ่ม เช่น เอกสารยา เอกสารบัตรประจำตัวประชาชน เป็นต้น)</small>
                                            <input class="form-control form-control-user" type="text" required="required" name="content3"
                            value="<?php echo isset($row['content3'])?$row['content3']:''; ?>" />
                    </div>
                    <div class="form-group">อัปโหลดเอกสารที่ต้องดาวน์โหลด:
                    <small class="form-text text-muted">(อัปโหลดเอกสารที่ต้องดาวน์โหลด เพื่อที่จะให้ผู้ใช้บริการสามารถดาวน์โหลดเอกสารไปกรอกเพื่อส่งเจ้าหน้าที่)</small>
                                    <input class="form-control form-control-user" type="file" name="file_dow" />
                                </div>
                                <div class="form-group">อัปโหลดเอกสารตัวอย่าง:
                    <small class="form-text text-muted">(อัปโหลดเอกสารตัวอย่าง เพื่อที่จะให้ผู้ใช้บริการสามารถตรวจสอบเอกสารที่กรอกได้ถูกต้องก่อนส่งเจ้าหน้าที่)</small>
                                    <input class="form-control form-control-user" type="file" name="file_ex"/>
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
                    <div class="d-flex justify-content-end">

                    </div>
                    <table class="table table-hover " id="sub-list0">
                        <thead>
                            <tr>
                                <th class="align-middle" width="10%">รหัสเอกสาร</th>
                                <th class="align-middle" width="16%">เรื่องขอรับบริการ</th>
                                <th class="align-middle" width="16%">ประเภทผลิตภัณฑ์สุขภาพ</th>
                                <th class="align-middle" width="35%">ชื่อเอกสาร</th>
                                <th class="align-middle"width="35%">ไฟล์เอกสาร</th>
                                <th class="align-middle"width="10%">แสดง/ไม่แสดง</th>
                                <th class="align-middle"width="8%"></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($subheading as $row): ?>
                            <tr>
                                <td><?php echo $row['sub_id']; ?></td>
                                <td><?php echo $row['content']; ?></td>
                                <td><?php echo $row['content2']; ?></td>
                                <td><?php echo $row['content3']; ?></td>
                                <td>
                            <center>
                            <?php if($row['file_dow']!='null'&& $row['file_dow'] != null){?>
                                            <a class="btn btn-info text-white" target = "_blank" href="<?php echo base_url('doc/'.$row['file_dow']);?>">เอกสารดาวน์โหลด</a>
                                            <?php } ?>
                                            <?php if($row['file_ex'] !='null'&& $row['file_ex'] != null){?>
                                            <a class="btn btn-info text-white" target = "_blank" href="<?php echo base_url('doc/'.$row['file_ex']);?>">เอกสารตัวอย่าง</a>
                                            <?php } ?>
                            </center>    
                        </td>
                        <td>
                            <center>
                            <?php if($row['title_stid'] == '0'){ ?>
                            <a onclick="confirmation(event)" class="btn btn-success btn-sm" href="<?php echo base_url('Sub/approve/'.$row['sub_id']); ?> ">แสดง</a>
                            <?php }else{ ?>
                            <a onclick="confirmation(event)" class="btn btn-danger btn-sm" href="<?php echo base_url('Sub/disapproved/'.$row['sub_id']); ?> ">ไม่แสดง</a>
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
                                                            แก้ไขข้อมูลเอกสาร
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="post"
                                                                action="<?php echo base_url('Sub/edit'); ?>">
                                                                <input type="hidden" name="sub_id"
                                                                    value="<?php echo $row['sub_id'];  ?>">
                                                                    <div class="form-group">ระบุเรื่องขอรับบริการ:
                                            <select class="form-control form-control-user"name="main_id">
                                                
                                            <option value="">--โปรดเลือก--</option>
                                                <?php 
                                                $main_id = isset($row['main_id'])?$row['main_id']:""; 
                                                foreach($getmain as $rs1){ 
    
                                                    $select1 = ($rs1['main_id'] == $main_id)?"selected":"";
                                                
                                                echo '<option value="'.$rs1['main_id'].'" '.$select1.'>' .$rs1['content'].'</option>';
                                                  } ?>
                                            </select>
                                                </div>
                                                <div class="form-group">ระบุประเภทผลิตภัณฑ์สุขภาพ:
                                                    <select class="form-control form-control-user" id="getsecon"
                                                name="secondary_id">
                                                <option value="">--โปรดเลือก--</option>
                                                <?php 
                                                $secondary_id = isset($chk_edit['secondary_id'])?$chk_edit['secondary_id']:""; 
                                                foreach($getsecon as $rs1){ 
    
                                                    $select1 = ($rs1['secondary_id'] == $secondary_id)?" selected ":"";
                                                echo '<option value="'.$rs1['secondary_id'].'" '.$select1.'>'.$rs1['content2'].'</option>';
                                                  } ?>
                                            </select>
                                                </div>
                                        <div class="form-group">ชื่อเอกสาร:
                                            <small class="form-text text-muted">(ตัวอย่างการเพิ่ม เช่น เอกสารยา เอกสารบัตรประจำตัวประชาชน เป็นต้น)</small>
                                            <input class="form-control form-control-user" type="text" required="required" name="content3"
                            value="<?php echo isset($row['content3'])?$row['content3']:''; ?>" />
                    </div>
                    <div class="form-group">อัปโหลดเอกสารที่ต้องดาวน์โหลด:
                    <small class="form-text text-muted">(อัปโหลดเอกสารที่ต้องดาวน์โหลด เพื่อที่จะให้ผู้ใช้บริการสามารถดาวน์โหลดเอกสารไปกรอกเพื่อส่งเจ้าหน้าที่)</small>
                                    <input class="form-control form-control-user" type="file" name="file_dow" />
                                </div>
                                <div class="form-group">อัปโหลดเอกสารตัวอย่าง:
                    <small class="form-text text-muted">(อัปโหลดเอกสารตัวอย่าง เพื่อที่จะให้ผู้ใช้บริการสามารถตรวจสอบเอกสารที่กรอกได้ถูกต้องก่อนส่งเจ้าหน้าที่)</small>
                                    <input class="form-control form-control-user" type="file" name="file_ex"/>
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
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                        crossorigin="anonymous"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
            $('#sub-list0').dataTable( {
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
<script>
$(document).ready(function() {


    $('#getmain').change(function() {

        var main_id = $('#getmain').val();
        var action = 'get_getsecon';

        if (main_id != '') {
            $.ajax({

                url: "<?php echo base_url('/Pharmacy/action'); ?>",
                method: "POST",
                data: {
                    main_id: main_id,
                    action: action
                },
                dataType: "JSON",

                success: function(data) {
                    var html = '<option value="">--โปรดเลือก--</option>';

                    for (var count = 0; count < data.length; count++) {

                        html += '<option value="' + data[count].secondary_id + '">' + data[
                            count].content2 + '</option>';

                    }

                    $('#getsecon').html(html);
                    $('#getsub').html('');
                    $('#subb').html('');
                    $('#subb2').html('');
                }
            });
        } else {
            $('#getsecon').val('');
        }
        $('#getsub').val('');
    });
    $('#getsecon').change(function() {
        var main_id = $('#getmain').val();
        var secondary_id = $('#getsecon').val();
        var action = 'get_getsub';

        if (secondary_id != '') {
            $.ajax({
                url: "<?php echo base_url('/Pharmacy/getfile'); ?>",
                method: "POST",
                data: {
                    main_id: main_id,
                    secondary_id: secondary_id,
                    action: action
                },
                dataType: "JSON",
                success: function(data) {
                    var html = '<br>';
                    var ti = 'ตัวอย่าง';
                    var html2 = '<br>';
                    for (var count = 0; count < data.length; count++) {
                        if (data[count].file_dow != null) {
                            html += "<a  href = '<?php echo base_url('doc');?>/" + data[
                                    count].file_dow + "' target = '_blank'>" + data[count]
                                .content3 + "</a><br>";
                            //alert(data[count].file_dow);
                        } else {
                            html += data[count].content3 + '<br>';
                        }
                        if (data[count].file_ex != null) {
                                html2 += "<a  href = '<?php echo base_url('doc');?>/" + data[
                                    count].file_ex + "' target = '_blank'>" +ti+ data[count]
                                .content3 + "</a><br>";
                            //alert(data[count].file_ex);
                        } else {
                            html2 += ti+ data[count].content3 + '<br>';
                        }
                    }
                    $('#subb').html(html);
                    $('#subb2').html(html2);
                }
            });
        } else {
            $('#getsub').val('');
        }
    });
});
</script>