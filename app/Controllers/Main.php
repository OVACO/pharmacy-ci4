<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Main extends BaseController
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
        $model = model(MainModel::class);
        $action = ($this->request->getget('editid') != '')?'main/edit':'main/add';
        $chk_edit = $model->chk_edit($this->request->getget('editid'));
        //print_r($chk_edit);
        $data=[
            'action' => $action,
            'chk_edit' => isset($chk_edit[0])?$chk_edit[0]:[],
        ];
        
        
        $data['main_title']=$model->getData();
        echo view('homemain', $data);
        echo view('footer');

    }
    public function add()
    {
        $session = session();
        $model = model(MainModel::class);        
        if($this->request->getpost('submit')){
            $main_id = $this->request->getpost('main_id');
            $content = $this->request->getpost('content');
            $title_stid = '0';
            $user_add = $_SESSION['id_card'];
            $date_add = date('Y-m-d H:i:s');
            $value =$model->savedata([
                'title_stid' => $title_stid,
                'main_id' => $main_id,
                'content' => $content,
                'user_add' => $user_add,
                'date_add' => $date_add
                
            ]);
            
        //echo 'eeeeeeee = ' .$value;
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
    }
            return redirect()->to('main');
        
    }

    public function edit()
    {
        $session = session();
        $model = model(MainModel::class);        
        if($this->request->getpost('submit')){
            $main_id = $this->request->getpost('main_id');
            $content = $this->request->getpost('content');
            $user_edit = $_SESSION['id_card'];
            $date_edit = date('Y-m-d H:i:s');
            $value =$model->editdata([
                'main_id' => $main_id,
                'content' => $content,
                'user_edit' => $user_edit,
                'date_edit' => $date_edit
            ]);
        //echo 'eeeeeeee = ' .$value;
        //exit();
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
    }
    
            return redirect()->to('main');
        
    }
    public function edit_data()
    {
        $model = model(MainModel::class);
        $main_id = $this->request->getpost('main_id');
            if ($model->checkPK($main_id)== 0){
        $model->save([
            'id' => $this->request->getpost('id'),
            'main_id' => $main_id,
            'content' => $this->request->getpost('content'),
            'user_edit' => $_SESSION['id_card'],
            'date_edit' => date('Y-m-d H:i:s')
        ]);
    } else {
        $model->save([
            'id' => $this->request->getpost('id'),
            'content' => $this->request->getpost('content'),
            'user_edit' => $_SESSION['id_card'],
            'date_edit' => date('Y-m-d H:i:s')
        ]);
    }
        return redirect()->to("main");
    
    }
    public function delete($id)
    {
        $model = model(MainModel::class);
        $session = session();
        $data['checkdata']= $model->checkData($id);
        echo $data['checkdata'];
        //exit();
    if($data['checkdata'] == 0 ){
        $model->delete($id);
        return redirect()->to('main');
    }else{
        $this->session->set('test' , 1);
        return redirect()->to('main');
    }
        
    }
    public function approve($main_id)
    {
        $model = model(MainModel::class);
        $session = session();
        $title_stid = '1';
        $value =$model->editdatashow([         
            'main_id' => $main_id,
            'title_stid' => $title_stid,
        ]);

            return redirect()->to('main');
    }
    public function disapproved($main_id)
    {
        $model = model(MainModel::class);
        $session = session();
        $title_stid = '0';
        $value =$model->editdatashow([         
            'main_id' => $main_id,
            'title_stid' => $title_stid,
        ]);
         return redirect()->to('main');
    }


}