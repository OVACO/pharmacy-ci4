<!DOCTYPE html>
<html lang="en">
<?php $session = session(); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<head>
    <title>Update Page</title>
</head>

<body>
    <?php
    echo "<meta charset='utf-8'>";
    function DateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strMonthCut = Array("", "มกรามก", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
 // แสดงวันที่ 

?>
    <div class="container-fluid ">


    <div class="card o-hidden border-0 shadow-lg my-5">
        
        <div class="card-body p-0">
            <div class="p-5">
            <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">สถานะการนัดหมายต่าง ๆ </h1>
                    </div>
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th class="align-middle">วันที่ติดต่อ</th>
                            <th class="align-middle">เวลาที่ติดต่อ</th>
                            <th class="align-middle">เบอร์โทรศัพท์</th>
                            <th class="align-middle">ขอรับบริการเรื่อง</th>
                            <th class="align-middle">งาน</th>
                            <th class="align-middle">สถานะ</th>
                            <th class="align-middle">หมายเหตุ</th>
                            <th class="align-middle"></th>
                            <th class="align-middle"></th>
                        </tr>
                    </thead>
                    
                    <?php foreach($getData as $row) { 
                        
                    if($row['status_id'] == 2 or $row['status_id'] == 3){ 
                        ?>
                    <tbody>
                        <tr class="table-danger">
                            <td class="align-middle"><?php echo DateThai($row['date_app']); ?></td>
                            <td class="align-middle"><?php echo $row['time_set']; ?></td>
                            <td class="align-middle"><?php echo $row['phonenumber']; ?></td>
                            <td class="align-middle"><?php echo $row['content']; ?></td>
                            
                            <td class="align-middle"><?php echo $row['content2']; ?></td>
                            <td class="align-middle"><?php echo $row['status_con']; ?></td>
                            <td class="align-middle"><?php echo $row['reason']; ?></td>
                            <td class="align-middle"><a class="btn btn-warning btn-sm" href="<?php echo base_url('pharmacy/pharmacyAddEdit?editid='.$row['id']); ?> ">แก้ไขข้อมูล</a></td>
                            <td class="align-middle"><a onclick="confirmation(event)" class="btn btn-danger btn-sm" href="<?php echo base_url('pharmacy/delete/'.$row['id']); ?> ">ลบข้อมูล</a></td>
                        </tr>
                        <?php }else{ ?>
                            <tbody>
                        <tr>
                            <td class="align-middle"><?php echo DateThai($row['date_app']); ?></td>
                            <td class="align-middle"><?php echo $row['time_set']; ?></td>
                            <td class="align-middle"><?php echo $row['phonenumber']; ?></td>
                            <td class="align-middle"><?php echo $row['content']; ?></td>
                            
                            <td class="align-middle"><?php echo $row['content2']; ?></td>
                            <td class="align-middle"><?php echo $row['status_con']; ?></td>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
                        </tr>
                            <?php } ?>
                    </tbody>
                    <?php } ?>
                </table>
                </div>
</div>
</div>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">ระบบนัดหมายสำหรับขออนุญาตเกี่ยวกับผลิตภัณฑ์สุขภาพ สำนักงานสาธารณสุขจังหวัดอุตรดิตถ์</h1>
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
                                
                                <input type="hidden" name="id_card" required="required"
                                    value="<?php echo isset($_SESSION['id_card'])?$_SESSION['id_card']:''; ?>" />
                                    <input type="hidden" name="id" value="<?php echo isset($chk_edit['id'])?$chk_edit['id']:''; ?>" />
                                    <tr>
                                    <td class="align-middle">
                                        <div class="form-group">รหัสบัตรประชาชน:
                                            <input class="form-control form-control-user" type="text"
                                                required="required" name="id_card" readonly
                                                value="<?php echo isset($getuserdata[0]['id_card'])?$getuserdata[0]['id_card']:''; ?>" />
                                        </div>
                                    </td>
                                    <td class="align-middle"><a class="btn btn-info align-middle " href="<?php echo base_url('register/personal_information?editid='.$getuserdata[0]['id_card']); ?> ">แก้ไขข้อมูลส่วนตัว</a></td>
                                    </tr>
                                    <tr>
                                    <td class="align-middle">
                                        <div class="form-group">คำนำหน้าชื่อ:
                                            <input class="form-control form-control-user" type="text"
                                                required="required" name="pname" readonly
                                                value="<?php echo isset($getuserdata[0]['pname'])?$getuserdata[0]['pname']:''; ?>" />
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="form-group">ชื่อ:
                                            <input class="form-control form-control-user" type="text"
                                                required="required" name="fname" readonly
                                                value="<?php echo isset($getuserdata[0]['fname'])?$getuserdata[0]['fname']:''; ?>" />
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="form-group">นามสกุล:
                                            <input class="form-control form-control-user" type="text"
                                                required="required" name="lname" readonly
                                                value="<?php echo isset($getuserdata[0]['lname'])?$getuserdata[0]['lname']:''; ?>" />
                                        </div>
                                    </td>
                                    <td class="align-middle"></td>

                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <div class="form-group">เลือกวันที่ติดต่อ:
                                            <small class="form-text text-muted">***กรุณาเลือกวันเวลาราชการ จันทร์-ศุกร์***</small>
                                            <input class="form-control form-control-user" type="date" required="required" name="date_app"
                            value="<?php echo isset($chk_edit['date_app'])?$chk_edit['date_app']:''; ?>" />
                                        </div>
                                    </td>


                                    <td class="align-middle">
                                        <div class="form-group">ระบุเวลา:
                                            <select class="form-control form-control-user"name="time_id">
                                                
                                            <option value="">--โปรดเลือก--</option>
                                                <?php 
                                                $time_id = isset($chk_edit['time_id'])?$chk_edit['time_id']:""; 
                                                foreach($gettime as $rs1){ 
    
                                                    $select1 = ($rs1['time_id'] == $time_id)?" selected ":"";
                                                echo '<option value="'.$rs1['time_id'].'" '.$select1.'>'.$rs1['time_set'].'</option>';
                                                  } ?>
                                            </select>
                                    </td>
                                    <td class="align-middle">
                                        <div class="form-group">หมายเลขโทรศัพท์:
                                            <input class="form-control form-control-user" type="text"
                                                required="required" name="phonenumber" readonly
                                                value="<?php echo isset($getuserdata[0]['phonenumber'])?$getuserdata[0]['phonenumber']:''; ?>" />
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="align-middle">
                                        <div class="form-group">ขอรับบริการเรื่อง:
                                            <select class="form-control form-control-user" id="getmain" name="main_id">
                                                
                                            <option value="">--โปรดเลือก--</option>
                                                <?php 
                                                $main_id = isset($chk_edit['main_id'])?$chk_edit['main_id']:""; 
                                                foreach($getmain as $rs1){ 
    
                                                    $select1 = ($rs1['main_id'] == $main_id)?" selected ":"";
                                                echo '<option value="'.$rs1['main_id'].'" '.$select1.'>'.$rs1['content'].'</option>';
                                                  } ?>
                                            </select>
                                    </td>
                                    <td class="align-middle">
                                        <div class="form-group">ประเภทผลิตภัณฑ์สุขภาพ:
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
                                </tr>
                                <tr>
                                    <td class="align-middle">

                                        <div class="form-group">เอกสารประกอบการพิจารณาที่ต้องเตรียมมา:
                                            <span id="subb">
                                            
                                            <?php 
                                                foreach($getsub as $rs1){ 
                                                $href = isset($rs1['file_dow'])?"href='".base_url("doc/".$rs1['file_dow'])."' target='_blank' ":"";
                                                //echo '<option value="'.$rs1['sub_id'].'" >'.$rs1['content3'].'';
                                                echo "<br><a $href>".$rs1['content3']."</a>";
                                                  } ?>
                                            </span>
                                        </div>
                                    </td>
                                   <td class="align-middle">
                                        <div class="form-group">ตัวอย่างการเขียนเอกสารประกอบการพิจารณา:
                                            <span id="subb2">
                                            <?php 
                                                foreach($getsub as $rs1){
                                                $ti = 'ตัวอย่าง';
                                                $href = isset($rs1['file_ex'])?"href='".base_url("doc/".$rs1['file_ex'])."' target='_blank' ":"";
                                                //echo '<option value="'.$rs1['sub_id'].'" >'.$rs1['content3'].'';
                                                echo "<br><a $href>".$ti.$rs1['content3']."</a>";
                                                  } ?>
                                                  </span>
                                        </div>
                                    </td>
                                    <td class="align-middle"></td>

                                </tr>
                        </tbody>

                    </table>
                    <input type="hidden" name="edit_id" value="<?php echo isset($_GET['editid'])?$_GET['editid']:''; ?>" />
                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="บันทึกข้อมูล" />
                    </form>

                </div>
            </div>
        </div>
    </div>

    

                
</body>

</html>


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
                        if (data[count].file_dow != 'null'&& data[count].file_dow != null) {
                            html += "<a  href = '<?php echo base_url('doc');?>/" + data[
                                    count].file_dow + "' target = '_blank'>" + data[count]
                                .content3 + "</a><br>";
                            //alert(data[count].file_dow);
                        } else {
                            html += data[count].content3 + '<br>';
                        }
                        if (data[count].file_ex != 'null'&& data[count].file_ex != null) {
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