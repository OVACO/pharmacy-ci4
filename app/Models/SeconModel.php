<?php
namespace App\Models;

use CodeIgniter\Model;

class SeconModel extends model{
    protected $table='secondary_title';
    protected $allowedFields =['main_id','secondary_id' ,'content2','user_add','date_add','user_edit','date_edit','content','content3'];
    public function getData(){
        $db = db_connect();
        $sql = "SELECT
        secondary_title.*, 
        title_st.status_name, 
        main_title.content
    FROM
        secondary_title
        INNER JOIN
        title_st
        ON 
            secondary_title.title_stid = title_st.title_stid
        INNER JOIN
        main_title
        ON 
            secondary_title.main_id = main_title.main_id
    ORDER BY
        secondary_id DESC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }

    public function getDataEdit($secondary_id){
       return $this->find($secondary_id);
    }
    public function getMainData(){
        $db = db_connect();
        $sql = "SELECT
        main_title.main_id, 
        main_title.content
    FROM
        main_title";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;

    }
    public function getOldData($secondary_id){
        $db = db_connect();
        $sql = "SELECT
        secondary_title.secondary_id, 
        secondary_title.content2
        FROM
        secondary_title
        WHERE
        secondary_id = $secondary_id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
//เอาข้อมูล main content
    public function getmaincontent($main_id){
        $db = db_connect();
        $sql = "SELECT
        pharmacy.main_title.content
    FROM
        pharmacy.secondary_title
        INNER JOIN
        pharmacy.main_title
        ON 
            pharmacy.secondary_title.main_id = pharmacy.main_title.main_id
        WHERE
         pharmacy.secondary_title.main_id = $main_id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }
    public function checkPK($main_id,$secondary_id){
        $db = db_connect();
        $sql= "SELECT
        count(id) as cnt
    FROM
        secondary_title
        WHERE 
        main_id = '$main_id' and secondary_id = '$secondary_id'
    ORDER BY
        secondary_title.id ASC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results[0]['cnt'];

    }
    public function checkData($secondary_id){
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
            s.secondary_id = '$secondary_id'
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
        public function getId($main_id,$secondary_id){
            $db = db_connect();
            $sql= "SELECT
            secondary_title.id
        FROM
            secondary_title
        WHERE
            secondary_title.main_id = $main_id AND
            secondary_title.secondary_id = '$secondary_id'
                ORDER BY
                    secondary_title.main_id ASC";
            $query = $db->query($sql);
            $results = $query->getResult('array');
            return $results;
        }
        public function chk_edit($secondary_id){
            $db = db_connect();
            $sql= "SELECT
            secondary_title.*
        FROM
        secondary_title
            WHERE
            secondary_id = '$secondary_id'
            ";
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
    public function savedata($data){
        extract($data);
        $db = db_connect();
        $sql= "insert into secondary_title (main_id,secondary_id,content2,title_stid,user_add,date_add) values ('$main_id','$secondary_id','$content2','$title_stid','$user_add','$date_add')";
        $query = $db->query($sql);
        return $query;
    }
    public function editdata($data){
        extract($data);
        $db = db_connect();
        $sql= "update secondary_title set 
        main_id = '$main_id',
        secondary_id = '$secondary_id',
        content2 = '$content2',
        user_edit = '$user_edit',
        date_edit = '$date_edit'
        WHERE
        secondary_id = '$secondary_id'";
        $query = $db->query($sql);
        return $query;
    }
    public function editdatashow($data){
        extract($data);
        $db = db_connect();
        $sql= "update secondary_title set 
        title_stid = '$title_stid'
        where
        secondary_id = '$secondary_id'";
        $query = $db->query($sql);
        return $query;
    }
}
?>