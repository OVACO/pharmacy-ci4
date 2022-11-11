<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<head>
    <title>Homeupload Page</title>
</head>
<body>
<div class="container-fluid ">
<div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
            <h1>
            จัดการข้อมูลไฟล์
            </h1>
            <small class="form-text text-muted">(หน้าจัดการข้อมูลไฟล์ อัปโหลดไฟล์ที่ต้องดาวน์โหลด อัปโหลดไฟล์ตัวอย่าง ตรวจสอบไฟล์ทั้งหมด)</small>
            <hr>
            <br>
                <div class="d-flex justify-content-end">
                
            </div>
                            <div class="text-center">
                                <table class="table table-hover " id="upload-list0">
                                <thead>
                                    <tr>
                                        <th width="15%">รหัสขอรับบริการเรื่อง</th>
										<th width="20%">ขอรับบริการเรื่อง</th>
                                        <th width="20%">ประเภทผลิตภัณฑ์สุขภาพ</th>
                                        <th width="10%">ชื่อไฟล์</th>
                                        <th width="10%">อัปโหลดไฟล์ที่ต้องดาวน์โหลด</th>
                                        <th width="5%"></th>
                                        <th width="10%">อัปโหลดไฟล์ตัวอย่าง</th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                                    
                                        <tbody>
                                        <?php foreach($subheading as $row): ?>
                                    <tr>
										
                                        <td><?php echo $row['main_id']; ?></td>
										<td><?php echo $row['content']; ?></td>
                                        <td><?php echo $row['content2']; ?></td>
                                        <td><?php echo $row['content3']; ?></td>

                                        <td>
                                            <a class="btn btn-success btn-sm"href="<?php echo base_url('pharmacy/viewupload/'.'?main_id='.$row['main_id'].'&secondary_id='.$row['secondary_id'].'&sub_id='.$row['sub_id']); ?>">อัปโหลดไฟล์</a>
                                        </td>

                                        <td> 
                                            <?php if($row['file_dow']){?>
                                            <a class="btn btn-info" target = "_blank" href="<?php echo base_url('doc/'.$row['file_dow']);?>"><i class="fa fa-file-text text-white" aria-hidden="true"></i> </a>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <a class="btn btn-success btn-sm" href="<?php echo base_url('pharmacy/viewupload2/'.$row['sub_id'].'?main_id='.$row['main_id'].'&secondary_id='.$row['secondary_id'].'&sub_id='.$row['sub_id']); ?>">อัปโหลดไฟล์</a>
                                        </td>

                                        <td> 
                                            <?php if($row['file_ex']){?>
                                            <a class="btn btn-info" target = "_blank" href="<?php echo base_url('doc/'.$row['file_ex']);?>"><i class="fa fa-file-text text-white" aria-hidden="true"></i> </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tbody>
                                    
                                </table>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                        crossorigin="anonymous"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                    <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
            $('#upload-list0').dataTable( {
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
    </div>
</body>

</html>
