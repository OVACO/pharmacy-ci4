<?php
namespace App\Models;

use CodeIgniter\Model;

class TimeModel extends model{
    protected $table='time';
    protected $allowedFields =['time_id','time_set'];
    public function getData(){
        $db = db_connect();
        $sql= "SELECT
        time.*, 
        tim_st.status_name
    FROM
        time
        INNER JOIN
        tim_st
        ON 
            time.tim_stid = tim_st.tim_stid
    ORDER BY
        time_id DESC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;

    }
    
    public function savedata($data){
        extract($data);
        $db = db_connect();
        $sql= "insert into time (time_id,time_set,tim_stid) values ('$time_id', '$time_set','$tim_stid')";
        $query = $db->query($sql);
        return $query;
    }

    public function editdata($data){
        extract($data);
        $db = db_connect();
        $sql= "update time set 
        time_id = '$time_id',
        time_set = '$time_set'
        WHERE
        time_id = '$time_id'";
        $query = $db->query($sql);
        return $query;
    }

    public function chk_edit($time_id){
        $db = db_connect();
        $sql= "SELECT
        time.*
    FROM
        time
        WHERE
        time_id = '$time_id'
        ";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;

    }
    public function editdatausers($data){
        extract($data);
        $db = db_connect();
        $sql= "update time set 
        tim_stid = '$tim_stid'
        where
        time_id = '$time_id'";
        $query = $db->query($sql);
        return $query;
    }
}
?>