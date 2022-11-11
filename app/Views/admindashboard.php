<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<head>
    <title>Homeadmin Page</title>

</head>
<body>
<div class="container-fluid ">
    




<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-header text-uppercase">รายงาน <?php echo ThDate(); ?> </div>
<?php
echo "<meta charset='utf-8'>";
function ThDate()
{
//วันภาษาไทย
$ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
//เดือนภาษาไทย
$ThMonth = array ( "มกรามก", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );

//กำหนดคุณสมบัติ
$week = date( "w" ); // ค่าวันในสัปดาห์ (0-6)
$months = date( "m" )-1; // ค่าเดือน (1-12)
$day = date( "d" ); // ค่าวันที่(1-31)
$years = date( "Y" )+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.

return "วัน$ThDay[$week] 
		ที่ $day  
		เดือน $ThMonth[$months] 
		พ.ศ. $years";
}
function DateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strMonthCut = Array("", "มกรามก", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

?>

        <div class="card-body p-0">
            <div class="p-5">
    
<div class="card-body">
                <div class="row mt-1">  
                    
                
                    <div class="col-12 col-lg-5 col-xl-3">
                        <div class="card">
                        <div class="card-header" style="background: linear-gradient(to right, rgb(5, 117, 230), rgb(2, 27, 121));">
                                <h5 class="text-white"><center><i class="fa-solid fa-file-circle-plus fa-4x"></i></center></h5><br>
                                <h2 class="text-white"><center><?php echo $getCounttoday[0]['cnt']; ?></center></h2>
                            </div>
                            <div class="card-header" style="background: linear-gradient(to right, rgb(5, 117, 230), rgb(2, 27, 121));">                            
                                <h5 class="text-white"><center>จำนวนเรื่องที่ขอรับบริการวันนี้</center></h5>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5 col-xl-3">
                        <div class="card">
                        <div class="card-header" style="background-image: linear-gradient(90deg, rgba(249, 206, 88, 1) 0%, rgba(245, 189, 36, 1) 100%);">
                                <h5 class="text-white"><center><i class="fa-solid fa-file-circle-exclamation fa-4x" aria-hidden="true" ></i></center></h5><br>
                                <h2 class="text-white"><center><?php echo $getCountstatus02[0]['cnt']; ?></center></h2>
                            </div>
                            <div class="card-header" style="background-image: linear-gradient(90deg, rgba(249, 206, 88, 1) 0%, rgba(245, 189, 36, 1) 100%);">                            
                                <h5 class="text-white"><center>จำนวนเรื่องที่รอการตอบรับ</center></h5>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5 col-xl-3">
                        <div class="card">
                        <div class="card-header" style="background-image: linear-gradient(90deg, rgba(6, 229, 10, 1) 0%, rgba(0, 179, 3, 1) 100%);">
                                <h5 class="text-white"><center><i class="fa-solid fa-file-circle-xmark fa-4x" aria-hidden="true" ></i></center></h5><br>
                                <h2 class="text-white"><center><?php echo $getCountstatus03[0]['cnt']; ?></center></h2>
                            </div>
                            <div class="card-header" style="background-image: linear-gradient(90deg, rgba(6, 229, 10, 1) 0%, rgba(0, 179, 3, 1) 100%);">                            
                                <h5 class="text-white"><center>จำนวนเรื่องที่ปฏิเสธ</center></h5>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5 col-xl-3">
                        <div class="card">
                        <div class="card-header" style="background: linear-gradient(to right, rgb(188, 78, 156), rgb(248, 7, 89));">
                                <h5 class="text-white"><center><i class="fa-solid fa-file-circle-check fa-4x" aria-hidden="true" ></i></center></h5><br>
                                <h2 class="text-white"><center><?php echo $getCountstatus01[0]['cnt']; ?></center></h2>
                            </div>
                            <div class="card-header" style="background: linear-gradient(to right, rgb(188, 78, 156), rgb(248, 7, 89));">                            
                                <h5 class="text-white"><center>จำนวนเรื่องที่ตอบรับแล้ว</center></h5>
                                <br>
                            </div>
                        </div>
                    </div>

                   
    <div class="p-5">
    <table class="table table-hover ">
        <thead>
            <tr>
                <th class="align-middle">ผู้ติดต่อ</th>
                <th class="align-middle">วันที่มาติดต่อ</th>
                <th class="align-middle">เวลาที่มาติดต่อ</th>
                <th class="align-middle">ใช้บริการเรื่อง</th>
                <th class="align-middle">ประเภทงาน</th>
                <th class="align-middle">สถานะ</th>
            </tr>
        </thead>
        <?php foreach($getdashboard as $row) { ?>
                    <tbody>
                        <tr>
                            <td class="align-middle"><?php echo $row['pname'].$row['fname']." ".$row['lname']; ?></td>
                            <td class="align-middle"><?php echo DateThai($row['date_app']); ?></td>
                            <td class="align-middle"><?php echo $row['time_set'] ?></td>
                            <td class="align-middle"><?php echo $row['content']; ?></td>
                            <td class="align-middle"><?php echo $row['content2']; ?></td>
                            <td class="align-middle"><?php echo $row['status_con']; ?></td>
                        </tr>
                        
                    </tbody>
                    <?php } ?>
                </table>



                </div>
                
                    </div>

        </div>
        
        </div>

                      
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
            $('#dashboard-list0').dataTable( {
            "oLanguage": {
            "sLengthMenu": "แสดง _MENU_ แถว",
            "sZeroRecords": "ไม่มีการนัดหมายที่ต้องทำตอนนี้",
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
<?php if( $session->get('test') ){ ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'เกิดข้อผิดพลาด',
    text: 'ยังมีข้อมูลอยู่ข้างในไม่สามารถลบได้',
})
</script>
<?php  } $session->remove('test'); ?>