<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Secon extends BaseController
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
        echo view('header');
        $model = model(SeconModel::class);
        $action = ($this->request->getget('editid') != '')?'secon/edit':'secon/add';
        $chk_edit = $model->chk_edit($this->request->getget('editid'));
        //print_r($chk_edit);
        $data=[
            'getmain' => $model->getmain(),
            'action' => $action,
            'chk_edit' => isset($chk_edit[0])?$chk_edit[0]:[],
        ];
        
        
        $data['secondary_title']=$model->getData();
        echo view('homesecon', $data);
        echo view('footer');

    }
    public function add()
    {
        $session = session();
        $model = model(SeconModel::class);        
        if($this->request->getpost('submit')){
            $main_id = $this->request->getpost('main_id');
            $secondary_id = $this->request->getpost('secondary_id');
            $content2 = $this->request->getpost('content2');
            $title_stid = '0';
            $user_add = $_SESSION['id_card'];
            $date_add = date('Y-m-d H:i:s');
            $value =$model->savedata([
                'title_stid' => $title_stid,
                'main_id' => $main_id,
                'secondary_id' => $secondary_id,
                'content2' => $content2,
                'user_add' => $user_add,
                'date_add' => $date_add
            ]);
        //echo 'eeeeeeee = ' .$content2;
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
    }
            return redirect()->to('secon');
        
    }

    public function edit()
    {
        $session = session();
        $model = model(SeconModel::class);        
        if($this->request->getpost('submit')){
            $main_id = $this->request->getpost('main_id');
            $secondary_id = $this->request->getpost('secondary_id');
            $content2 = $this->request->getpost('content2');
            $user_edit = $_SESSION['id_card'];
            $date_edit = date('Y-m-d H:i:s');
            $value =$model->editdata([
                'main_id' => $main_id,
                'secondary_id' => $secondary_id,
                'content2' => $content2,
                'user_edit' => $user_edit,
                'date_edit' => $date_edit
            ]);
        //echo 'eeeeeeee = ' .$value;
        //exit();
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
    }
    
            return redirect()->to('secon');
        
    }
    public function edit_data()
    {
        $model = model(SeconModel::class);
        $main_id = $this->request->getpost('main_id');
        $secondary_id = $this->request->getpost('secondary_id');
            if ($model->checkPK($main_id,$secondary_id)== 0){
        $model->save([
            'id' => $this->request->getpost('id'),
            'main_id' => $main_id,
            'secondary_id' => $secondary_id,
            'content2' => $this->request->getpost('content2'),
            'user_edit' => $_SESSION['id_card'],
            'date_edit' => date('Y-m-d H:i:s')
        ]);
    } else {
        $model->save([
            'id' => $this->request->getpost('id'),
            'content2' => $this->request->getpost('content2'),
            'user_edit' => $_SESSION['id_card'],
            'date_edit' => date('Y-m-d H:i:s')
        ]);
    }
        return redirect()->to("secon?main_id=$main_id");
    
    }
    public function delete($id)
    {
        $model = model(SeconModel::class);
        $session = session();
        $data['checkdata']= $model->checkData($id);
        //echo $data['checkdata'];
        //exit();
    if($data['checkdata'] == 0 ){
        $model->delete($id);
        return redirect()->to('secon');
    }else{
        $this->session->set('test' , 1);
        return redirect()->to('secon');
    }
        
    }
    public function approve($secondary_id)
    {
        $model = model(SeconModel::class);
        $session = session();
        $title_stid = '1';
        $value =$model->editdatashow([         
            'secondary_id' => $secondary_id,
            'title_stid' => $title_stid,
        ]);

            return redirect()->to('secon');
    }
    public function disapproved($secondary_id)
    {
        $model = model(SeconModel::class);
        $session = session();
        $title_stid = '0';
        $value =$model->editdatashow([         
            'secondary_id' => $secondary_id,
            'title_stid' => $title_stid,
        ]);
         return redirect()->to('secon');
    }

}