<?php
namespace App\Models;

use CodeIgniter\Model;

class PharmacyModel extends model{
    protected $table='pharmacy';
    protected $allowedFields =['id_card','pname','fname','lname','date_app','time_id','phonenumber','main_id', 'secondary_id','user_add','date_add','user_edit','date_edit','time_set','title_stid'];
    public function getData($cid){
        $db = db_connect();
        $sql = "SELECT
        pharmacy.*, 
        register.pname, 
        register.fname, 
        register.lname, 
        register.phonenumber, 
        secondary_title.content2, 
        main_title.content, 
        time.time_set, 
        status_all.status_con
    FROM
        pharmacy
        LEFT JOIN
        register
        ON 
            pharmacy.id_card = register.id_card
        LEFT JOIN
        main_title
        ON 
            pharmacy.main_id = main_title.main_id
        LEFT JOIN
        secondary_title
        ON 
            main_title.main_id = secondary_title.main_id AND
            pharmacy.secondary_id = secondary_title.secondary_id
        LEFT JOIN
        time
        ON 
            pharmacy.time_id = time.time_id
        INNER JOIN
        status_all
        ON 
            pharmacy.status_id = status_all.status_id
    WHERE
        pharmacy.id_card = '$cid'
    ORDER BY
        id ASC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เรียกข้อมูลทั้งหมด
    public function getData2(){
        $db = db_connect();
        $sql = "SELECT
        pharmacy.*, 
        register.pname, 
        register.fname, 
        register.lname, 
        register.phonenumber, 
        secondary_title.content2, 
        main_title.content, 
        time.time_set, 
        status_all.status_con
    FROM
        pharmacy
        LEFT JOIN
        register
        ON 
            pharmacy.id_card = register.id_card
        LEFT JOIN
        main_title
        ON 
            pharmacy.main_id = main_title.main_id
        LEFT JOIN
        secondary_title
        ON 
            main_title.main_id = secondary_title.main_id AND
            pharmacy.secondary_id = secondary_title.secondary_id
        LEFT JOIN
        time
        ON 
            pharmacy.time_id = time.time_id
        INNER JOIN
        status_all
        ON 
            pharmacy.status_id = status_all.status_id
    ORDER BY
        id ASC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาขอมูลจำนวนทั้งหมด
    public function getCount(){
        $db = db_connect();
        $sql = "SELECT
        count(id) as cnt
    FROM
    register
WHERE NOT
		id_card ='admin'";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    public function getCountstatus($status_id){
        $db = db_connect();
        $sql = "SELECT
        count(status_id) as cnt
    FROM
            pharmacy
    WHERE
            status_id = '$status_id'";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาขอมูลจำนวนการติดต่อวันนี้
    public function getCounttoday(){
        $db = db_connect();
        $sql = "SELECT
        count(date_app) as cnt
    FROM
            pharmacy
    WHERE
            date_app = curdate()";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาจำนวนข้อมูลหลัก
    public function getCountmain($main_id){
        $db = db_connect();
        $sql = "SELECT
        count(main_id) as cnt
    FROM
            pharmacy
    WHERE
    main_id = '$main_id'";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาขอมูลกราฟ
    public function getGraph(){
        $db = db_connect();
        $sql = "SELECT
	pharmacy.*, 
	main_title.content
FROM
	pharmacy
	INNER JOIN
	main_title
	ON 
		pharmacy.main_id = main_title.main_id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาขอมูลเวลา
    public function gettime(){
        $db = db_connect();
        $sql = "SELECT
        time.*
    FROM
        time
				WHERE
				tim_stid != '0'
        ORDER BY
        time_id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาขอมูลเรื่องที่ขอ
    public function getmain(){
        $db = db_connect();
        $sql = "SELECT
        main_title.*
    FROM
        main_title
				WHERE
				title_stid != '0'
        ORDER BY
        main_id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาขอมูลงาน
    public function getsecon(){
        $db = db_connect();
        $sql = "SELECT
        secondary_title.*
    FROM
        secondary_title
        WHERE
				title_stid != '0'
        ORDER BY
        secondary_id
    ";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    //เอาขอมูลงาน02
    public function getsecon_edit($main_id){
        $db = db_connect();
        $sql = "SELECT
        secondary_title.*
    FROM
        secondary_title
    WHERE
        main_id = '$main_id'
    ";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาขอมูลไฟล์
    public function getsub(){
        $db = db_connect();
        $sql = "SELECT
        subheading.*
    FROM
    subheading";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาขอมูลมาแสดงรายวัน
    public function getdashboard(){
        $db = db_connect();
        $sql = "SELECT
        pharmacy.*, 
        main_title.content, 
        secondary_title.content2, 
        time.time_set, 
        register.pname, 
        register.fname, 
        register.lname, 
        register.phonenumber, 
        status_all.status_con
    FROM
        pharmacy
        INNER JOIN
        main_title
        ON 
            pharmacy.main_id = main_title.main_id
        INNER JOIN
        secondary_title
        ON 
            main_title.main_id = secondary_title.main_id AND
            pharmacy.main_id = secondary_title.main_id AND
            pharmacy.secondary_id = secondary_title.secondary_id
        INNER JOIN
        time
        ON 
            pharmacy.time_id = time.time_id
        INNER JOIN
        register
        ON 
            pharmacy.id_card = register.id_card
        INNER JOIN
        status_all
        ON 
            pharmacy.status_id = status_all.status_id
    WHERE
        date_app = CURDATE()
        ORDER BY
        id DESC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }

    public function chk_token(){
        $db = db_connect();
        $sql = "SELECT
        pharmacy_token.*
    FROM
    pharmacy_token";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาข้อมูลวันหยุด
    public function chk_government(){
        $db = db_connect();
        $sql = "SELECT
        government_setting.*
    FROM
    government_setting";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    //เอาขอมูลไฟล์02
    public function getsubedit($main_id,$secondary_id){
        $db = db_connect();
        $sql = "SELECT
        subheading.*
    FROM
    subheading
    WHERE
        main_id ='$main_id' and 
        secondary_id ='$secondary_id'
    ";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาขอมูลผู้ใช้
    public function getuserdata($id_card){
        $db = db_connect();
        $sql = "SELECT
        register.id_card, 
        register.pname, 
        register.fname, 
        register.lname, 
        register.phonenumber
    FROM
        register
    WHERE
        id_card = '$id_card'";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    //เอาขอมูลไลน์
    public function getline(){
        $db = db_connect();
        $sql = "SELECT
        pharmacy.date_app, 
        pharmacy.time_id, 
        pharmacy.main_id, 
        pharmacy.secondary_id, 
        register.pname, 
        register.fname, 
        register.lname, 
        register.phonenumber, 
        main_title.content, 
        secondary_title.content2, 
        pharmacy.id_card, 
        time.time_set
    FROM
        pharmacy
        INNER JOIN
        register
        ON 
            pharmacy.id_card = register.id_card
        INNER JOIN
        secondary_title
        ON 
            pharmacy.secondary_id = secondary_title.secondary_id
        INNER JOIN
        main_title
        ON 
            secondary_title.main_id = main_title.main_id AND
            pharmacy.main_id = main_title.main_id
        INNER JOIN
        time
        ON 
            pharmacy.time_id = time.time_id
    ORDER BY
        pharmacy.date_add DESC
    LIMIT 1";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    
//บันทึกข้อมูล
    public function savedata($data){
        extract($data);
        $db = db_connect();
        $sql= "insert into pharmacy (id_card,date_app,time_id,main_id,secondary_id,status_id,user_add,date_add) values ('$id_card','$date_app','$time_id','$main_id','$secondary_id','$status_id','$user_add','$date_add')";
        $query = $db->query($sql);
        return $query;
    }
//แก้ไขข้อมูล
    public function editdata($data){
        extract($data);
        $db = db_connect();
        $sql= "update pharmacy set 
        date_app = '$date_app',
        time_id = '$time_id',
        main_id = '$main_id',
        secondary_id = '$secondary_id',
        status_id = '$status_id',
        reason =  '$reason',
        user_edit = '$user_edit',
        date_edit = '$date_edit'
        where
        id = '$id'
        ";
        $query = $db->query($sql);
        return $query;
    }
//แก้ไขtokenline
    public function edittoken($data){
        extract($data);
        $db = db_connect();
        $sql= "update pharmacy_token set 
        token = '$token',
        d_update = '$d_update'
        ";
        $query = $db->query($sql);
        return $query;
    }




    public function editreason($data){
        extract($data);
        $db = db_connect();
        $sql= "update pharmacy set 
        status_id = '$status_id',
        reason = '$reason',
        user_edit = '$user_edit',
        date_edit = '$date_edit'
        where
        id = '$id'
        ";
        
        $query = $db->query($sql);
        return $query;
    }


//แก้ไขข้อมูลวันเปิดปิด
    public function editgovernment($data){
        extract($data);
        $db = db_connect();
        $sql = "update government_setting set 
        government_title = '$government_title',
        government_update = '$government_update'
        
        ";
        $query = $db->query($sql);
        return $query;
    }

//แก้ไขข้อมูลการยืนยัน
public function editacceptrefuse($data){
    extract($data);
    $db = db_connect();
    $sql= "update pharmacy set 
    status_id = '$status_id',
    reason = null
    where
    id = '$id'
    ";
    $query = $db->query($sql);
    return $query;
}
//เช็คการแก้ไขข้อมูล
    public function chk_edit($id){
        $db = db_connect();
        $sql= "SELECT
        pharmacy.*
    FROM
    pharmacy
        WHERE
        id = '$id'
        ";
        $query = $db->query($sql);
        $results = $query->getResult('array');

        return $results;

    }


    public function checkPK($main_id,$secondary_id){
        $db = db_connect();
        $sql= "SELECT
        count(id) as cnt
    FROM
    pharmacy
        WHERE 
        main_id = '$main_id' and secondary_id = '$secondary_id'
    ORDER BY
    pharmacy.id ASC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results[0]['cnt'];

    }
    public function dashboard($date_app){
        $db = db_connect();
        $sql= "SELECT
        pharmacy.*, 
        register.pname, 
        register.fname, 
        register.lname, 
        register.phonenumber, 
        secondary_title.content2, 
        main_title.content, 
        time.time_set, 
        status_all.status_con
    FROM
        pharmacy
        LEFT JOIN
        register
        ON 
            pharmacy.id_card = register.id_card
        LEFT JOIN
        main_title
        ON 
            pharmacy.main_id = main_title.main_id
        LEFT JOIN
        secondary_title
        ON 
            main_title.main_id = secondary_title.main_id AND
            pharmacy.secondary_id = secondary_title.secondary_id
        LEFT JOIN
        time
        ON 
            pharmacy.time_id = time.time_id
        INNER JOIN
        status_all
        ON 
            pharmacy.status_id = status_all.status_id
    WHERE
    date_app = '$date_app'
    ORDER BY
        id ASC
            ";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เรียกข้อมูลทั้งหมดตามวันที่
public function dashboard02($startdate,$enddate){
    $db = db_connect();
    $sql= "SELECT
    pharmacy.*, 
    register.pname, 
    register.fname, 
    register.lname, 
    register.phonenumber, 
    secondary_title.content2, 
    main_title.content, 
    time.time_set, 
    if(pharmacy.status_id = '3', pharmacy.reason,status_all.status_con) as status_con
FROM
    pharmacy
    LEFT JOIN
    register
    ON 
        pharmacy.id_card = register.id_card
    LEFT JOIN
    main_title
    ON 
        pharmacy.main_id = main_title.main_id
    LEFT JOIN
    secondary_title
    ON 
        main_title.main_id = secondary_title.main_id AND
        pharmacy.secondary_id = secondary_title.secondary_id
    LEFT JOIN
    time
    ON 
        pharmacy.time_id = time.time_id
    INNER JOIN
    status_all
    ON 
        pharmacy.status_id = status_all.status_id
    WHERE
    pharmacy.date_app between '$startdate' and '$enddate'

ORDER BY
    id ASC 
        ";
    $query = $db->query($sql);
    $results = $query->getResult('array');
    return $results;
}

//เรียกข้อมูลทั้งหมด
public function dashboardshowall(){
    $db = db_connect();
    $sql= "SELECT
    pharmacy.*, 
    register.pname, 
    register.fname, 
    register.lname, 
    register.phonenumber, 
    secondary_title.content2, 
    main_title.content, 
    time.time_set, 
    if(pharmacy.status_id = '3', pharmacy.reason,status_all.status_con) as status_con
FROM
    pharmacy
    LEFT JOIN
    register
    ON 
        pharmacy.id_card = register.id_card
    LEFT JOIN
    main_title
    ON 
        pharmacy.main_id = main_title.main_id
    LEFT JOIN
    secondary_title
    ON 
        main_title.main_id = secondary_title.main_id AND
        pharmacy.secondary_id = secondary_title.secondary_id
    LEFT JOIN
    time
    ON 
        pharmacy.time_id = time.time_id
    INNER JOIN
    status_all
    ON 
        pharmacy.status_id = status_all.status_id
ORDER BY
    id DESC 
        ";
    $query = $db->query($sql);
    $results = $query->getResult('array');
    return $results;
}


public function check_statusid($status_id){
    $db = db_connect();
    $sql= "SELECT
    pharmacy.*, 
    register.pname, 
    register.fname, 
    register.lname, 
    register.phonenumber, 
    secondary_title.content2, 
    main_title.content, 
    time.time_set, 
    if(pharmacy.status_id = '3', pharmacy.reason,status_all.status_con) as status_con
FROM
    pharmacy
    LEFT JOIN
    register
    ON 
        pharmacy.id_card = register.id_card
    LEFT JOIN
    main_title
    ON 
        pharmacy.main_id = main_title.main_id
    LEFT JOIN
    secondary_title
    ON 
        main_title.main_id = secondary_title.main_id AND
        pharmacy.secondary_id = secondary_title.secondary_id
    LEFT JOIN
    time
    ON 
        pharmacy.time_id = time.time_id
    INNER JOIN
    status_all
    ON 
        pharmacy.status_id = status_all.status_id
    WHERE
    pharmacy.status_id = '$status_id'

ORDER BY
    id ASC 
        ";
    $query = $db->query($sql);
    $results = $query->getResult('array');
    return $results;
}



public function line_alert(){
    $db = db_connect();
    $sql= "SELECT
	mt.content, 
	st.content2, 
	count(p.id_card) as cnt 
FROM
	main_title AS mt
	INNER JOIN
	secondary_title AS st
	INNER JOIN
	pharmacy AS p
	ON 
		p.main_id = mt.main_id AND
		st.secondary_id = p.secondary_id AND
		st.main_id = p.main_id 
WHERE
	p.date_app = CURDATE() AND p.status_id = '1'
GROUP BY
	p.main_id, 
	p.secondary_id";
    $query = $db->query($sql);
    $results = $query->getResult('array');
    return $results;
}


public function chart($b_year){
    $db = db_connect();
    $sql= "SELECT
    pharmacy.main_id,  
    main_title.content,
		COUNT(pharmacy.main_id) as cnt,
		COUNT(if(pharmacy.main_id=1,1,NULL)) as cnt_ap
    FROM
    pharmacy
    INNER JOIN
    main_title
    ON 
        pharmacy.main_id = main_title.main_id
    WHERE
    year(pharmacy.date_app)='$b_year'
    GROUP BY
    pharmacy.main_id";
$query = $db->query($sql);
    $results = $query->getResult('array');
    return $results;
}

    public function getfile($main_id,$secondary_id){
        $db = db_connect();
        $sql= "SELECT
        subheading.*
    FROM
        subheading
    WHERE
        main_id = '$main_id' AND
        secondary_id = '$secondary_id'";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    public function getDataEdit(){
        return $this->find();
 
     }
   
    }
?>