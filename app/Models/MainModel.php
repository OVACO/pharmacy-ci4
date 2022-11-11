<?php
namespace App\Models;

use CodeIgniter\Model;

class MainModel extends model{
    protected $table='main_title';
    protected $allowedFields =['main_id' ,'content','user_add','date_add','user_edit','date_edit'];
    public function getData(){
        $db = db_connect();
        $sql= "SELECT
        main_title.*, 
        title_st.status_name
    FROM
        main_title
        INNER JOIN
        title_st
        ON 
            main_title.title_stid = title_st.title_stid
            ORDER BY
            main_id DESC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;

    }
    public function getDataEdit($id){
       return $this->find($id);

    }
    public function checkPK($main_id){
        $db = db_connect();
        $sql= "SELECT
        count(main_id) as cnt
    FROM
        main_title
        WHERE 
        main_id = '$main_id'
    ORDER BY
        main_title.main_id ASC";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results[0]['cnt'];
    }
    public function checkData($id){
    $db = db_connect();
    $sql= "SELECT
	*,COUNT(s.main_id)checkdata
FROM
	main_title m
	
	LEFT JOIN
	secondary_title s
	ON 
		m.main_id = s.main_id
        WHERE
        m.id = '$main_id'
		GROUP BY
		m.main_id";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results[0]['checkdata'];
    }
    public function chk_edit($main_id){
        $db = db_connect();
        $sql= "SELECT
        main_title.*
    FROM
    main_title
        WHERE
        main_id = '$main_id'
        ";
        $query = $db->query($sql);
        $results = $query->getResult('array');
        return $results;

    }
    public function savedata($data){
        extract($data);
        $db = db_connect();
        $sql= "insert into main_title (main_id,content,title_stid,user_add,date_add) values ('$main_id', '$content','$title_stid','$user_add','$date_add')";
        $query = $db->query($sql);
        return $query;
    }
    public function editdata($data){
        extract($data);
        $db = db_connect();
        $sql= "update main_title set 
        main_id = '$main_id',
        content = '$content',
        user_edit = '$user_edit',
        date_edit = '$date_edit'
        WHERE
        main_id = '$main_id'";
        $query = $db->query($sql);
        return $query;
    }
    public function editdatashow($data){
        extract($data);
        $db = db_connect();
        $sql= "update main_title set 
        title_stid = '$title_stid'
        where
        main_id = '$main_id'";
        $query = $db->query($sql);
        return $query;
    }
}
?>