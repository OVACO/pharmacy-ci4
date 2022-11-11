<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SeconModel;
use App\Models\SubModel;

class Pharmacy extends BaseController
{
    protected $session;
    protected $helpers=['html'];

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index()
    {
        $session = session();
        if($session->get('id_card')==""){
            return redirect()->to('loginuser');
        }
        
        $model = model(PharmacyModel::class);
        $getstatus01 = '1';
        $getstatus02 = '2';
        $getstatus03 = '3';
        $date_app = date('Y-m-d');
        $data['getdashboard']=$model->getdashboard();   
        $data['getCount']=$model->getCount();   
        $data['getCounttoday']=$model->getCounttoday();   
        $data['pharmacy']=$model->dashboard($date_app);
        $data['getCountstatus01']=$model->getCountstatus($getstatus01);   
        $data['getCountstatus02']=$model->getCountstatus($getstatus02); 
        $data['getCountstatus03']=$model->getCountstatus($getstatus03); 
        $data['date_app']=$date_app;
        //print_r($data);
        //exit();
        echo view('header');
        echo view('admindashboard' ,$data);
        echo view('footer');

    }

    function action()
	{
		if($this->request->getVar('action'))
		{
			$action = $this->request->getVar('action');

			if($action == 'get_getsecon')
			{
				$SeconModel = new SeconModel();

				$secondata = $SeconModel->where('main_id', $this->request->getVar('main_id'))->findAll();

				echo json_encode($secondata);
			}
            if($action == 'get_getsub'){
                $SubModel = new SubModel();

				$subdata = $SubModel->where('secondary_id', $this->request->getVar('secondary_id'))->findAll();

				echo json_encode($subdata);
            }
		}
	}

    public function pharmacyAddEdit(){
        $session = session();
        
        $model = model(PharmacyModel::class);
        $id = $this->request->getpost('editid');
        $id_card = $_SESSION['id_card'];
        $action = ($this->request->getget('editid') != '')?'pharmacy/edit':'pharmacy/add';
        $chk_edit = $model->chk_edit($this->request->getget('editid'));
        $data['getData']=$model->getData($session->get('cid'));
        $main_id1 = isset($chk_edit[0]['main_id'])?$chk_edit[0]['main_id']:"";
        $secondary_id1 = isset($chk_edit[0]['secondary_id'])?$chk_edit[0]['secondary_id']:"";
        //echo "aaaaa =".$main_id1;
        $data=[
            'action' => $action,
            'chk_edit' => isset($chk_edit[0])?$chk_edit[0]:[],
            'getuserdata' => $model->getuserdata($id_card),
            'getData' => $model->getData($id_card),
            'gettime' => $model->gettime(),
            'getmain' => $model->getmain(),
            'getsecon' => $model->getsecon_edit($main_id1),
            'getsub' => $model->getsubedit($main_id1,$secondary_id1)
        ];
        
        //echo print_r($data);
        //exit();
        echo view('header');
        $session->remove('cid');
        echo view('pharmacyAddEdit',$data);
        echo view('footer');
    }

    public function add()
    {
        $session = session();
        $model = model(PharmacyModel::class);        
        if($this->request->getpost('submit')){
            $id_card = $this->request->getpost('id_card');
            $date_app = $this->request->getpost('date_app');
            $time_id = $this->request->getpost('time_id');
            $main_id = $this->request->getpost('main_id');
            $secondary_id = $this->request->getpost('secondary_id');
            $getstatus02 = '2';
            $value = $model->savedata([
                'id_card' => $id_card,
                'date_app' => $date_app,
                'time_id' => $time_id,
                'main_id' => $main_id,
                'secondary_id' => $secondary_id,
                'status_id' => $getstatus02,
                
                'user_add' => $_SESSION['id_card'],
                'date_add' => date('Y-m-d H:i:s')
            ]);
        //echo 'eeeeeeee = ' .$value;
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
        $session->set(['cid'=>$id_card]);
    }



    $data['getline']=$model->getline();
    //print_r($data);
    $sToken = $model->chk_token()[0]['token'];
	$sMessage = "ระบบการนัดหมายขอรับบริการผลิตภัณฑ์และบริการสุขภาพ\n";
    $sMessage .= "ผู้ติดต่อ: ".$data['getline'][0]['pname'].$data['getline'][0]['fname']." ".$data['getline'][0]['lname']." \n";
    $sMessage .= "วันที่ติดต่อ: ".$data['getline'][0]['date_app']." \n";
    $sMessage .= "เวลาที่มาติดต่อ: ".$data['getline'][0]['time_set']." \n";
    $sMessage .= "ใช้บริการเรื่อง: ".$data['getline'][0]['content']." \n";
    $sMessage .= "ประเภทงาน: ".$data['getline'][0]['content2']." \n";

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	} 
	curl_close( $chOne );   


            return redirect()->to('pharmacy/pharmacyAddEdit');
        
    }

    public function edit()
    {
        $session = session();
        $model = model(PharmacyModel::class);        
        if($this->request->getpost('submit')){
            $id = $this->request->getpost('id');
            $id_card = $this->request->getpost('id_card');
            $date_app = $this->request->getpost('date_app');
            $time_id = $this->request->getpost('time_id');
            $main_id = $this->request->getpost('main_id');
            $secondary_id = $this->request->getpost('secondary_id');
            $getstatus02 = '2';
            $value =$model->editdata([
                'id' => $id,
                'date_app' => $date_app,
                'time_id' => $time_id,
                'main_id' => $main_id,
                'secondary_id' => $secondary_id,
                'status_id' => $getstatus02,
                'reason' => $_SESSION[''],
                'user_edit' => $_SESSION['id_card'],
                'date_edit' => date('Y-m-d H:i:s')
            ]);
        //echo 'eeeeeeee = ' .$value;
        //exit();
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
        $session->set(['cid'=>$id_card]);
    }
    $data['getline']=$model->getline();
    //print_r($data);
    $sToken = "nbgrah2c4T1G6QGxqX3tj3P5AMwYd5UE8LgcuGsQjq4";
	$sMessage = "ขอรับบริการผลิตภัณฑ์และบริการสุขภาพ\n";
    $sMessage .= "ผู้ติดต่อ: ".$data['getline'][0]['pname'].$data['getline'][0]['fname']." ".$data['getline'][0]['lname']." \n";
    $sMessage .= "วันที่ติดต่อ: ".$data['getline'][0]['date_app']." \n";
    $sMessage .= "เวลาที่มาติดต่อ: ".$data['getline'][0]['time_set']." \n";
    $sMessage .= "ใช้บริการเรื่อง: ".$data['getline'][0]['content']." \n";
    $sMessage .= "ประเภทงาน: ".$data['getline'][0]['content2']." \n";

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	} 
	curl_close( $chOne );   

            return redirect()->to('pharmacy/pharmacyAddEdit');
        
    }


    public function editreason()
    {
        $session = session();
        $model = model(PharmacyModel::class);        
            $id = $this->request->getpost('id');
            //$status_id = $this->request->getpost('status_id');
            $reason = $this->request->getpost('reason');
            $getstatus02 = '3';
            $value =$model->editreason([
                'id' => $id,
                'reason' => $reason,
                'status_id' => $getstatus02,
                'user_edit' => $_SESSION['id_card'],
                'date_edit' => date('Y-m-d H:i:s')
            ]);
        //echo 'eeeeeeee = ' .$value;
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
    
            return redirect()->to('pharmacy/dashboardshowall');
        
    }



    public function editgovernment()
    {
        $session = session();
        $model = model(PharmacyModel::class);        
            $government_title = $this->request->getpost('government_title');
            $value =$model->editgovernment([
                'government_title' => $government_title,
                'government_update' => date('Y-m-d H:i:s')
            ]);
        //echo 'eeeeeeee = ' .$value;
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);

    
            return redirect()->to('Mainusers');
        
    }

//ฟังก์ชันลบข้อมูล
    public function delete($id)
    {
        $model = model(PharmacyModel::class);
        $model->delete($id);
        return redirect()->to("pharmacy/pharmacyAddEdit");
    }
    
    public function dashboard(){
        $model = model(PharmacyModel::class);
        $startdate= isset($_POST['startdate'])?$_POST['startdate']:date('Y-m-d');
        $enddate= isset($_POST['enddate'])?$_POST['enddate']:date('Y-m-d');
        $data = [
            'pharmacy' => $model->dashboard02($startdate,$enddate),
            'startdate' => $startdate,
            'enddate' => $enddate,
        ];
        echo view('header');
        echo view('dashboard',$data);
        echo view('footer');
    }
    public function dashboardshowall(){
        $model = model(PharmacyModel::class);
        $data = [
            'pharmacy' => $model->dashboardshowall(),
        ];
        echo view('header');
        echo view('dashboardshow',$data);
        echo view('footer');
    }

    public function d_menu(){
        $model = model(PharmacyModel::class);

        $data = [

        ];
        echo view('header');
        echo view('d_menu',$data);
        echo view('footer');
    }


    public function check_statusid($status_id){
        $model = model(PharmacyModel::class);

        $data = [
            'pharmacy' => $model->check_statusid($status_id),
            'r' => $status_id,
        ];
        echo view('header');
        echo view('d_acceptrefuse',$data);
        echo view('footer');
    }



    public function uploadfile(){
        $model = model(SubModel::class);
        //$b_year = 2564;
        $data['subheading']=$model->getData2();
        //$data['listchospital']=$model->listchospital();
        //$data['b_year']= $b_year;
        //$data['h_code']= $h_code;
        echo view('header');
        echo view('homeupload',$data);
        echo view('footer');
    }
    public function viewupload()
    {
        $main_id = $this->request->getget('main_id');
        $secondary_id = $this->request->getget('secondary_id');
        $sub_id = $this->request->getget('sub_id');
        $data['main_id']=$main_id;
        $data['secondary_id']=$secondary_id;
        $data['sub_id']=$sub_id;

        echo view('header');
        echo view('pharmacyupload',$data);
        echo view('footer');
    }
    
    public function pharmacyupload()
    {
        $model = model(SubModel::class);
        $main_id = $this->request->getget('main_id');
        $secondary_id = $this->request->getget('secondary_id');
        $sub_id = $this->request->getget('sub_id');
        //$data['main']=$model->getData2($main_id);
        //$h_code = $_SESSION['h_code'];
        
        $checkPK = 0; //$model->checkPK($main_id,$secondary_id);
        //echo 'eeeeeeee = '.$checkPK;
        //exit();
        $target_dir = "doc/";
        $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
        //echo 'eeeeeeee = '.$imageFileType;
        
        $file_dow = date('YmdHis').'.'.$imageFileType;
        $target_file = $target_dir . $file_dow;
        $uploadOk = 1;
        //echo 'eeeeeeee = ' .$file_dow;
        //exit();
if(isset($_POST["submit"])) {
  if (move_uploaded_file($_FILES["file_dow"]["tmp_name"], $target_file)) {
    if ($checkPK == 0){
        $database = \Config\Database::connect();
    $db = $database->table('subheading');
    $data = [ 
        'main_id' =>  $main_id,
        'secondary_id' =>  $secondary_id,
        'sub_id' =>  $sub_id,
        'file_dow'  => $file_dow,
     ];
     
     $save = $db->insert($data);
    } else {
        $data['subheading_id'] = $model->getId($main_id,$secondary_id,$sub_id);
        $subheading_id =  $data['subheading_id'][0]['sub_id'];
        $database = \Config\Database::connect();
    $db = $database->table('subheading');
    $data = [
        'file_dow'  => $file_dow,
        'user_edit' => $_SESSION['id_card'],
        'date_edit' => date('Y-m-d H:i:s')     
    ];
    $db->where('sub_id',$subheading_id);
    $db->update($data);
    }
}
    $file_dow = $this->request->getpost('file_dow');

    return redirect()->to("pharmacy/uploadfile");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  //echo $target_file;
}
//อัปโหลด2
public function viewupload2()
    {
        $main_id = $this->request->getget('main_id');
        $secondary_id = $this->request->getget('secondary_id');
        $sub_id = $this->request->getget('sub_id');
        $data['main_id']=$main_id;
        $data['secondary_id']=$secondary_id;
        $data['sub_id']=$sub_id;

        echo view('header');
        echo view('pharmacyupload2',$data);
        echo view('footer');
    }
    public function pharmacyupload2()
    {
        $model = model(SubModel::class);
        $main_id = $this->request->getget('main_id');
        $secondary_id = $this->request->getget('secondary_id');
        $sub_id = $this->request->getget('sub_id');
        //$data['main']=$model->getData2($main_id);
        //$h_code = $_SESSION['h_code'];
        $checkPK = $model->checkPK($main_id,$secondary_id,$sub_id);
        $target_dir = "doc/";
        $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload2"]["name"]),PATHINFO_EXTENSION));
        $file_ex = date('YmdHis').'.'.$imageFileType;
        $target_file = $target_dir . $file_ex;
        $uploadOk = 1;

if(isset($_POST["submit"])) {
  if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
    if ($checkPK == 0){
        $database = \Config\Database::connect();
    $db = $database->table('subheading');
    $data = [ 
        'main_id' =>  $main_id,
        'secondary_id' =>  $secondary_id,
        'sub_id' =>  $sub_id,
        'file_ex'  => $file_ex,
     ];
     $save = $db->insert($data);
    } else {
        $data['subheading_id'] = $model->getId($main_id,$secondary_id,$sub_id);
        $subheading_id =  $data['subheading_id'][0]['id'];
        $database = \Config\Database::connect();
    $db = $database->table('subheading');
    $data = [
        'file_ex'  => $file_ex,
        'user_edit' => $_SESSION['id_card'],
        'date_edit' => date('Y-m-d H:i:s')     
    ];
    $db->where('id',$subheading_id);
    $db->update($data);
    }
}
    $file_ex = $this->request->getpost('file_ex');

    return redirect()->to("pharmacy/uploadfile");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  //echo $target_file;
}

public function getfile(){
    $model = model(PharmacyModel::class);
    $main_id = $this->request->getpost('main_id');
    $secondary_id = $this->request->getpost('secondary_id');
    $getfile = $model->getfile($main_id,$secondary_id);
    echo json_encode($getfile);
}
//ยืนยันรับเรื่อง
public function accept($id,$r){
    $session = session();
    $model = model(PharmacyModel::class);
    $getstatus01 = '1';
    $value =$model->editacceptrefuse([
        'id' => $id,
        'status_id' => $getstatus01
    ]);
    $value = ($value !='')?$value:0;
    $session->set(['test'=>$value]);
    if($r == 1){
        return redirect()->to('pharmacy/dashboard');
    }
    if($r == 2){
        return redirect()->to('pharmacy/check_statusid/2');
    }
    if($r == 3){
    return redirect()->to('pharmacy/check_statusid/3');
    }
}
public function dashboardtoken()
{
    $model = model(PharmacyModel::class);
    $chk_token = $model->chk_token()[0]['token'];
    $data['chk_token']=$model->chk_token();

    echo view('header');
    echo view('dashtoken',$data);
    echo view('footer');
    
}

//แก้ไขโทเค็น
public function edittoken()
{
    $session = session();
        $model = model(PharmacyModel::class);
        if($this->request->getpost('submit')){
            $token = $this->request->getpost('token');
            $value =$model->edittoken([
                'token' => $token,
                'd_update' => date('Y-m-d H:i:s')
            ]);
        //echo 'eeeeeeee = ' .$value;
        //exit();
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
        }
        
        return redirect()->to('pharmacy/dashboardtoken');
    }


    public function line_alert()
    {
        $session = session();
        $model = model(PharmacyModel::class);        

    $data=$model->line_alert();
    if(count($model->line_alert())==0)
    //exit();
    
    //exit();
    //print_r($data);
    $sToken = $model->chk_token()[0]['token'];
	$sMessage = "ระบบแจ้งเตือนรายวัน\n";
    $sMessage .= "จำนวนผู้ที่มารับบริการวันที่: ".date('Y-m-d')." \n";
    foreach($data as $key=> $rs){
        $sMessage .= $rs['content'].' ['.$rs['content2'].'] '.$rs['cnt']." คน \n";
    }
    	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	} 
	curl_close( $chOne );   

    }







}