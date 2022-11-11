<?php
namespace App\Models;

use CodeIgniter\Model;

class SubModel extends model{
    protected $table='subheading';
    protected $allowedFields =[ 'main_id', 'secondary_id','sub_id','file_dow','file_ex' ,'content3','user_add','date_add','user_edit','date_edit'];
    public function getData(){
        $db = db_connect();
        $sql = "SELECT
        subheading.*, 
        main_title.content, 
        secondary_title.content2
    FROM
        main_title
        INNER JOIN
        secondary_title
        ON 
            main_title.main_id = secondary_title.main_id
        INNER JOIN
        subheading
        ON 
            subheading.main_id = secondary_title.main_id AND
            secondary_title.secondary_id = subheading.secondary_id
    ORDER BY
        subheading.sub_id ASC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
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
    public function getData2(){
        $db = db_connect();
        $sql = "SELECT
        mt.*, 
        st.secondary_id, 
        st.content2, 
        sh.sub_id, 
        sh.content3, 
        sh.file_dow,
		sh.file_ex
    FROM
        main_title AS mt
        INNER JOIN
        secondary_title AS st
        ON 
            mt.main_id = st.main_id
        INNER JOIN
        subheading AS sh
        ON 
            st.main_id = sh.main_id AND
            st.secondary_id = sh.secondary_id
    ORDER BY
        mt.main_id ASC, 
        st.secondary_id ASC, 
        sh.sub_id ASC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    public function chk_edit($sub_id){
        $db = db_connect();
        $sql= "SELECT
        subheading.*
    FROM
    subheading
        WHERE
        sub_id = '$sub_id'
        ";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;

    }
    public function getDataEdit($id){
       return $this->find($id);
    }
    public function getMainData(){
        $db = db_connect();
        $sql = "SELECT
        main_title.main_id, 
        main_title.content, 
        main_title.id
    FROM
        main_title";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;

    }
    public function getOldData($id){
        $db = db_connect();
        $sql = "SELECT
        subheading.sub_id, 
        subheading.content3
        FROM
        subheading
        WHERE
        id = $id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    //เอาข้อมูล main secon content content2
    public function getmainseconcontent($secondary_id){
        $db = db_connect();
        $sql = "SELECT
        main_title.content, 
        secondary_title.content2
    FROM
        subheading
        INNER JOIN
        secondary_title
        ON 
            subheading.main_id = secondary_title.main_id AND
            subheading.secondary_id = secondary_title.secondary_id
        INNER JOIN
        main_title
        ON 
            secondary_title.main_id = main_title.main_id
            WHERE
            pharmacy.subheading.secondary_id = $secondary_id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    public function checkPK($main_id,$secondary_id,$sub_id){
        $db = db_connect();
        $sql= "SELECT
        count(id) as cnt
    FROM
    subheading
        WHERE 
        main_id = '$main_id' and secondary_id = '$secondary_id' and sub_id = '$sub_id'
    ORDER BY
    subheading.id ASC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results[0]['cnt'];

    }
    public function checkData($id){
        $db = db_connect();
        $sql= "SELECT
        *,COUNT(sh.secondary_id)checkdata
    FROM
    secondary_title s
        LEFT JOIN
        subheading sh
        ON 
            s.secondary_id = sh.secondary_id
            WHERE
            s.id = '$id'
            GROUP BY
            s.secondary_id";
            $query = $db->query($sql);
            $results = $query->getResult('array');
            return $results[0]['checkdata'];
        }
        public function getdataMain(){
            $db = db_connect();
            $sql = "SELECT
            *
        FROM
            secondary_title
            INNER JOIN
            main_title
            ON 
                secondary_title.main_id = main_title.main_id";
                $query =$db->query($sql);
                $results = $query->getResult('array');
                return $results;
        }
        public function getdataMain2($main_id,$secondary_id){
            $db = db_connect();
            $sql = "SELECT
            *
        FROM
            secondary_title
            INNER JOIN
            main_title
            ON 
                secondary_title.main_id = main_title.main_id
        WHERE
            secondary_title.main_id = '$main_id'
         AND
            secondary_title.secondary_id = '$secondary_id'
                ";
                $query =$db->query($sql);
                $results = $query->getResult('array');
                return $results;
        }
        public function getId($main_id,$secondary_id,$sub_id){
            $db = db_connect();
            $sql= "SELECT
            subheading.id
        FROM
        subheading
            WHERE
            subheading.main_id = '$main_id' AND
            subheading.secondary_id = '$secondary_id' AND
            subheading.sub_id = '$sub_id'
        ORDER BY
            subheading.id ASC";
            $query = $db->query($sql);
            $results = $query->getResult('array');
            return $results;
        }
        public function getSeconData(){
            $db = db_connect();
            $sql = "SELECT
            secondary_title.main_id, 
            secondary_title.secondary_id, 
            secondary_title.content2, 
            secondary_title.id
        FROM
            secondary_title";
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
        ORDER BY
        main_id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    //เอาขอมูลประเภทผลิตภัณฑ์สุขภาพ
    public function getsecon(){
        $db = db_connect();
        $sql = "SELECT
        secondary_title.*
    FROM
    secondary_title
        ORDER BY
        secondary_id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    public function savedata($data){
        extract($data);
        $db = db_connect();
        $sql= "insert into subheading (main_id,secondary_id,sub_id,content3,title_stid,file_dow,file_ex,user_add,date_add) values ('$main_id','$secondary_id','$sub_id','$content3','$title_stid','$file_dow','$file_ex','$user_add','$date_add')";
        $query = $db->query($sql);
        return $query;
    }
    public function editdatashow($data){
        extract($data);
        $db = db_connect();
        $sql= "update subheading set 
        title_stid = '$title_stid'
        where
        sub_id = '$sub_id'";
        $query = $db->query($sql);
        return $query;
    }
}
?>