<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<head>
    <title>Homeadmin Page</title>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-fluid ">
        <div class="container-fluid ">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="p-5">

                                <h1>เมนูยืนยันรับเรื่อง</h1>
                                <small class="form-text text-muted">(หน้าเมนูค้นหาข้อมูลการนัดหมายที่ต้องการ)</small>
                                <hr>
                                <a href="<?php echo base_url('pharmacy/dashboard/1'); ?>" class="btn btn-primary btn-user btn-block" >เลือกข้อมูลตามวันที่</a>
                                
                                
                                <p></p><a href="<?php echo base_url('pharmacy/check_statusid/2'); ?>" class="btn btn-primary btn-user btn-block" >ข้อมูลที่รอการยืนยัน</a>
                                <p></p><a href="<?php echo base_url('pharmacy/check_statusid/3'); ?>" class="btn btn-primary btn-user btn-block" >ข้อมูลที่ปฏิเสธ</a>
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