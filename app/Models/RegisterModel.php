<?php
namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends model{
    protected $table='register';
    protected $allowedFields =['id_card','pname','fname','lname','phonenumber','house_num','district','amphure','province','zip_code','user_add','date_add','user_edit','date_edit','license_code'];
    public function getData($cid){
        $db = db_connect();
        $sql= "SELECT register.* FROM register where id_card = '$cid' ORDER BY id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    public function getData2(){
        $db = db_connect();
        $sql= "SELECT
        register.*, 
        license_user.license_con
    FROM
        register
        INNER JOIN
        license_user
        ON 
            register.license_code = license_user.license_code
    ORDER BY
        id DESC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    public function savedata($data){
        extract($data);
        $db = db_connect();
        $sql= "insert into register (id_card,pname,fname,lname,phonenumber,user_add,date_add,license_code) values ('$id_card','$pname','$fname','$lname','$phonenumber','$id_card','$date_add','$license_code')";
        $query = $db->query($sql);
        return $query;
    }
    

    public function editdata($data){
        extract($data);
        $db = db_connect();
        $sql= "update register set 
        license_code = '$license_code',
        id_card = '$id_card',
        pname = '$pname',
        fname = '$fname',
        lname = '$lname',
        phonenumber = '$phonenumber',
        house_num = '$house_num',
        district = '$district',
        amphure = '$amphure',
        province = '$province',
        zip_code = '$zip_code',
        user_edit = '$id_card',
        date_edit = '$date_edit'
        where
        id = '$id'";
        $query = $db->query($sql);
        return $query;
    }
    public function editdataAdmin($data){
        extract($data);
        $db = db_connect();
        $sql= "update register set 
        license_code = '$license_code',
        id_card = '$id_card',
        pname = '$pname',
        fname = '$fname',
        lname = '$lname',
        phonenumber = '$phonenumber',
        user_edit = '$id_card',
        date_edit = '$date_edit'
        where
        id = '$id'";
        $query = $db->query($sql);
        return $query;
    }
    public function editdatausers($data){
        extract($data);
        $db = db_connect();
        $sql= "update register set 
        license_code = '$license_code',
        date_edit = '$date_edit'
        where
        id = '$id'";
        $query = $db->query($sql);
        return $query;
    }

    public function chk_edit($id_card){
        $db = db_connect();
        $sql= "SELECT
        register.*
    FROM
    register
        WHERE
        id_card = '$id_card'
        ";
        $query = $db->query($sql);
        $results = $query->getResult('array');

        return $results;

    }
    public function checkPK($id_card){
        $db = db_connect();
        $sql= "SELECT
        count(id) as cnt
    FROM
        register
        WHERE 
        id_card = '$id_card'
    ORDER BY
        register.id ASC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results[0]['cnt'];
    }
//เช็คข้อมูลว่ามีหรือไม่
    public function checkData($id_card){
        $db = db_connect();
        $sql= "SELECT
        *,COUNT(register.id_card)checkdata
    FROM
    register
            WHERE
           register.id_card = '$id_card'";
            $query = $db->query($sql);
            $results = $query->getResult('array');
            return $results[0]['checkdata'];
        }
        //เอาขอมูลผู้ใช้
        public function getuserdata($id_card){
            $db = db_connect();
            $sql = "SELECT
            register.*
        FROM
            register
        WHERE
            id_card = '$id_card'";
            $query = $db->query($sql);
            $results = $query->getResult('array');
            return $results;
        }
        //เอาขอมูลสิทธิ์
    public function getlicense_user(){
        $db = db_connect();
        $sql = "SELECT
        *
        FROM
            license_user
            ORDER BY
            id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    
}
?>