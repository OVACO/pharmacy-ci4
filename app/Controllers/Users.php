<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Users extends BaseController
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
        
        $model = model(RegisterModel::class);
        $action = ($this->request->getget('editid') != '')?'Users/edit':'Users/add';
        $chk_edit = $model->chk_edit($this->request->getget('editid'));
        $data=[
            'getlicense_user' => $model->getlicense_user(),
            'action' => $action,
            'chk_edit' => isset($chk_edit[0])?$chk_edit[0]:[],
        ];
        $data['register']=$model->getData2();
        echo view('header');
        echo view('usersAddEdit',$data);
        echo view('footer');

    }
//เพิ่มข้อมูลผู้ใช้ส่วนแอดมิน
    public function add()
    {
        $session = session();
        $model = model(RegisterModel::class);        
        if($this->request->getpost('submit')){
            $id_card = $this->request->getpost('id_card');
            $pname = $this->request->getpost('pname');
            $fname = $this->request->getpost('fname');
            $lname = $this->request->getpost('lname');
            $phonenumber = $this->request->getpost('phonenumber');
            $license_code = $this->request->getpost('license_code');
            $date_add = date('Y-m-d H:i:s');
            $value = $model->savedata([
                'license_code' =>$license_code,
                'id_card' => $id_card,
                'pname' => $pname,
                'fname' => $fname,
                'lname' => $lname,
                'phonenumber' => $phonenumber,
                'user_add' => $id_card,
                'date_add' => $date_add
            ]);
        //echo 'eeeeeeee = ' .$value;
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
        $session->set(['cid'=>$id_card]);
    }
            return redirect()->to('Users');
        
    }
//แก้ไขข้อมูลผู้ใช้ส่วนแอดมิน
    public function editdata()
    {        
        $session = session();
        $model = model(RegisterModel::class);        
            $id = $this->request->getpost('id');
            $id_card = $this->request->getpost('id_card');
            $license_code = $this->request->getpost('license_code');
            $pname = $this->request->getpost('pname');
            $fname = $this->request->getpost('fname');
            $lname = $this->request->getpost('lname');
            $phonenumber = $this->request->getpost('phonenumber');
            $date_edit = date('Y-m-d H:i:s');
            $value =$model->editdataAdmin([
                'id' => $id,
                'license_code' => $license_code,
                'id_card' => $id_card,
                'pname' => $pname,
                'fname' => $fname,
                'lname' => $lname,
                'phonenumber' => $phonenumber,
                'user_edit' => $id_card,
                'date_edit' => $date_edit
            ]);
        //echo 'eeeeeeee = ' .$id;
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
            return redirect()->to('Users');
        
    }
//ลบข้อมูลผู้ใช้
    public function delete($id)
    {
        $model = model(RegisterModel::class);
        $session = session();
        $data['checkdata']= $model->checkData($id);
        echo $data['checkdata'];
        //exit();
        if($data['checkdata'] == 0 ){
            $model->delete($id);
            return redirect()->to('Users');
        }else{
            $this->session->set('del' , 1);
            return redirect()->to('Users');
        }
    }
    public function approve($id)
    {
        $model = model(RegisterModel::class);
        $session = session();
        $license_code = '01';
        $date_edit = date('Y-m-d H:i:s');
        $value =$model->editdatausers([         
            'id' => $id,
            'license_code' => $license_code,
            'date_edit' => $date_edit
        ]);

            return redirect()->to('Users');
    }
    public function disapproved($id)
    {
        $model = model(RegisterModel::class);
        $session = session();
        $license_code = '02';
        $date_edit = date('Y-m-d H:i:s');
        $value =$model->editdatausers([         
            'id' => $id,
            'license_code' => $license_code,
            'date_edit' => $date_edit
        ]);
         return redirect()->to('Users');
    }
}
    