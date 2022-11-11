<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<head>
    <title>Homeadmin Page</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-fluid ">
        <div class="container-fluid ">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="p-5">

                            <h3>
                             รายงานการนัดหมายสำหรับขออนุญาตเกี่ยวกับผลิตภัณฑ์สุขภาพ สำนักงานสาธารณสุขจังหวัดอุตรดิตถ์
                            </h3>
                                <hr>

                                <br>
                                <div class="text-center">
                                    <table class="table table-hover " id="dashboard-list00">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">ลำดับ</th>
                                                <th class="align-middle" width="17%">ชื่อ-นามสกุลผู้มาติดต่อ</th>
                                                <th class="align-middle" width="15%">วันที่นัดหมาย</th>
                                                <th class="align-middle" width="15%">เวลานัดหมาย</th>
                                                <th class="align-middle" width="12%">ขอรับบริการเรื่อง</th>
                                                <th class="align-middle" width="9%">งาน</th>
                                                <th class="align-middle" width="11%">เบอร์โทรศัพท์</th>
                                                <th class="align-middle" width="10%">สถานะ</th>
                                                <th class="align-middle" width="12%">ยืนยันสถานะ</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($pharmacy as $row): 
                                                if($row['status_id'] == 2){ 
                                                ?>
                                                
                                            <tr class="table-warning">
                                            <td class="align-middle"><?php echo $row['id']; ?></td>
                                                <td class="align-middle">
                                                    <?php echo $row['pname'];echo $row['fname']; echo ' ';  echo $row['lname']; ?>
                                                </td>
                                                <td class="align-middle"><?php echo DateThai($row['date_app']); ?></td>
                                                <td class="align-middle"><?php echo $row['time_set']; ?></td>
                                                <td class="align-middle"><?php echo $row['content']; ?></td>
                                                <td class="align-middle"><?php echo $row['content2']; ?></td>
                                                <td class="align-middle"><?php echo $row['phonenumber']; ?></td>
                                                <td class="align-middle"><?php echo $row['status_con']; ?></td>
                                                <td>
                                                    <a class="btn btn-success btn-sm"
                                                        href="<?php echo base_url('pharmacy/accept/'.$row['id'].'/1'); ?>">ยืนยันรับเรื่อง</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $row['id']; ?>">
                                                        ปฏิเสธรับเรื่อง
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php }elseif($row['status_id'] == 1){ ?>
                                                <tr>
                                                <td class="align-middle"><?php echo $row['id']; ?></td>
                                                <td class="align-middle">
                                                    <?php echo $row['pname'];echo $row['fname']; echo ' ';  echo $row['lname']; ?>
                                                </td>
                                                <td class="align-middle"><?php echo DateThai($row['date_app']); ?></td>
                                                <td class="align-middle"><?php echo $row['time_set']; ?></td>
                                                <td class="align-middle"><?php echo $row['content']; ?></td>
                                                <td class="align-middle"><?php echo $row['content2']; ?></td>
                                                <td class="align-middle"><?php echo $row['phonenumber']; ?></td>
                                                <td class="align-middle"><?php echo $row['status_con']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $row['id']; ?>">
                                                        ปฏิเสธรับเรื่อง
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php }elseif($row['status_id'] == 3){ ?>
                                                <tr class="table-danger">
                                                <td class="align-middle"><?php echo $row['id']; ?></td>
                                                <td class="align-middle">
                                                    <?php echo $row['pname'];echo $row['fname']; echo ' ';  echo $row['lname']; ?>
                                                </td>
                                                <td class="align-middle"><?php echo DateThai($row['date_app']); ?></td>
                                                <td class="align-middle"><?php echo $row['time_set']; ?></td>
                                                <td class="align-middle"><?php echo $row['content']; ?></td>
                                                <td class="align-middle"><?php echo $row['content2']; ?></td>
                                                <td class="align-middle"><?php echo $row['phonenumber']; ?></td>
                                                <td class="align-middle"><?php echo $row['status_con']; ?></td>
                                                <td>
                                                    <a class="btn btn-success btn-sm"
                                                        href="<?php echo base_url('pharmacy/accept/'.$row['id'].'/1'); ?>">ยืนยันรับเรื่อง</a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop<?php echo $row['id']; ?>">
                                                        แก้ไขข้อความปฏิเสธรับเรื่อง
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <div class="modal fade" id="staticBackdrop<?php echo $row['id']; ?>"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                                ปฏิเสธรับเรื่อง
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                action="<?php echo base_url('pharmacy/editreason'); ?>">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $row['id'];  ?>">

                                                                <?php echo 'ชื่อ : '.$row['pname'].$row['fname'].' '.$row['lname'].'<br>';
                                                         echo 'ขอรับบริการเรื่อง : '.$row['content'].'<br>';
                                                         echo 'งาน : '.$row['content2'].'<br>';
                                                         echo 'วันที่นัดหมาย : '.$row['date_app'].'<br>';
                                                         echo 'เวลาที่นัดหมาย : '.$row['time_set'].'<br>';
                                                        ?>
                                                                <input type="hidden" name="status_id"
                                                                    value="<?php echo $row['status_id'];  ?>">
                                                                    เหตุผลที่ปฏิเสธ : <input type="text" name="reason"
                                                                    value="<?php echo $row['reason'];  ?>">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit" name ="submit"
                                                                class="btn btn-primary">บันทึก</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach; ?>
                                        <tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#dashboard-list00').dataTable({
            "oLanguage": {
                "sLengthMenu": "แสดง _MENU_ แถว",
                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 แถว",
                "sInfoFiltered": "(จากแถวทั้งหมด _MAX_ แถว)",
                "sSearch": "ค้นหา :",
                "aaSorting": [
                    [0, 'desc']
                ],
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                },
            }
        });
    });
    </script>
    <?php if( $session->get('test')=='1'){ ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'บันทึกสำเร็จ',
    })
    </script>
    <?php  }?>
    <?php $session->remove('test'); ?>

    <script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute(
            'href'
        ); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
        console.log(urlToRedirect); // verify if this is the right URL
        //alert(urlToRedirect);
        Swal.fire({
            title: 'เหตุผลในการปฏิเสธ',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            cancelButtonText: 'ยกเลิก',
            showCancelButton: true,
            confirmButtonText: 'บันทึก',
            showLoaderOnConfirm: true,
            preConfirm: (login) => {
                return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url
                })
            }
        })
    }
    </script>
    </script>
</body>

</html>