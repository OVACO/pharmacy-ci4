<?php
namespace App\Controllers;

use CodeIgniter\Controller;


class Register extends BaseController
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
        
        $model = model(RegisterModel::class);
        $action = ($this->request->getget('editid') != '')?'register/edit':'register/add';
        $chk_edit = $model->chk_edit($this->request->getget('editid'));
        $data=[
            'action' => $action,
            'chk_edit' => isset($chk_edit[0])?$chk_edit[0]:[],
        ];
        
        $data['register']=$model->getData($session->get('cid'));

        
        $session->remove('cid');
        echo view('header');
        echo view('registerdashboard',$data);
        echo view('footer');
    }


    
    public function add()
    {
        $session = session();
        $model = model(RegisterModel::class);        
        if($this->request->getpost('submit')){
            $license_code = '02';
            $id_card = $this->request->getpost('id_card');
            $pname = $this->request->getpost('pname');
            $fname = $this->request->getpost('fname');
            $lname = $this->request->getpost('lname');
            $phonenumber = $this->request->getpost('phonenumber');
            $date_add = date('Y-m-d H:i:s');
            $value = $model->savedata([
                'license_code' => $license_code,
                'id_card' => $id_card,
                'pname' => $pname,
                'fname' => $fname,
                'lname' => $lname,
                'phonenumber' => $phonenumber,
                'user_add' => $id_card,
                'date_add' => $date_add
            ]);
        echo 'eeeeeeee = ' .$value;
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
        $session->set(['cid'=>$id_card]);
    }
            return redirect()->to('register');
        
    }

    public function edit()
    {
        $session = session();
        $model = model(RegisterModel::class);        
        if($this->request->getpost('submit')){
            $id = $this->request->getpost('editid');
            $license_code = '01';
            $id_card = $this->request->getpost('id_card');
            $pname = $this->request->getpost('pname');
            $fname = $this->request->getpost('fname');
            $lname = $this->request->getpost('lname');
            $phonenumber = $this->request->getpost('phonenumber');
            $house_num = $this->request->getpost('house_num');
            $district = $this->request->getpost('district');
            $amphure = $this->request->getpost('amphure');
            $province = $this->request->getpost('province');
            $zip_code = $this->request->getpost('zip_code');
            $date_edit = date('Y-m-d H:i:s');
            $value =$model->editdata([
                'id' => $id,
                'license_code' => $license_code,
                'id_card' => $id_card,
                'pname' => $pname,
                'fname' => $fname,
                'lname' => $lname,
                'phonenumber' => $phonenumber,
                'house_num' => $house_num,
                'district' => $district,
                'amphure' => $amphure,
                'province' => $province,
                'zip_code' => $zip_code,
                'user_edit' => $id_card,
                'date_edit' => $date_edit
            ]);
        //echo 'eeeeeeee = ' .$value;
        //echo $id;
        //exit();
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
        $session->set(['cid'=>$id_card]);
    }
            return redirect()->to('register/personal_information?editid='.$id_card);
        
    }

    public function delete($id)
    {
        $model = model(RegisterModel::class);
        $model->delete($id);
        return redirect()->to("register");
    }
        
    public function personal_information(){
        
            $session = session();
            
            $model = model(RegisterModel::class);
            $id_card = $_SESSION['id_card'];
            $action = ($this->request->getget('editid') != '')?'register/edit':'register/add';
            $chk_edit = $model->chk_edit($this->request->getget('editid'));
            $data=[
                'action' => $action,
                'chk_edit' => isset($chk_edit[0])?$chk_edit[0]:[],
                'getuserdata' => $model->getuserdata($id_card),
            ];
            
            $data['register']=$model->getData($session->get('cid'));
    
            
            $session->remove('cid');
            echo view('header');
            echo view('personal_information',$data);
            echo view('footer');
        }


}