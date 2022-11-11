<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class LoginUser extends Controller
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
        return view('loginuser');   
    }
    public function check()
    {
        $model = model(RegisterModel::class);    
        $session = session(); 
        $result = $model->where('id_card',$this->request->getVar('id_card'))->first();

        if($result != null){
                if($result['phonenumber'] == $this->request->getVar('phonenumber')){
                    $data=[
                        'license_code' => $result['license_code'],
                        'id_card' => $this->request->getVar('id_card'),
                        'phonenumber' => $this->request->getVar('phonenumber'),
                        'pname'=> $result['pname'],
                        'fname'=> $result['fname'],
                        'lname'=> $result['lname']
                    ];
                    $this->session->set($data);
                    print_r($data['license_code'] );
                    //exit();
                    if($data['license_code']==01){
                        return redirect()->to("pharmacy/pharmacyAddEdit");
                    }elseif($data['license_code']==00){
                        return redirect()->to("Users");
                    }elseif($data['license_code']==02){
                        $session->setFlashdata('msg', 'โปรดรอการยืนยันเข้าใช้งาน หากได้ลงทะเบียนเกิน 24 ชั่วโมง โปรดติดต่อเจ้าหน้าที่!!');
                        return redirect()->to("loginuser");
                    }else{
                        return redirect()->to("pharmacy");
                    }
                    
                    
                }else{
                    $session->setFlashdata('msg', 'รหัสผ่านผิด');
                    return redirect()->to('loginuser');
        }
        } else{
            $session->setFlashdata('msg', 'ไม่พบบัญชีผู้ใช้');
            return view('loginuser');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Mainusers'));
    }
    
    
}