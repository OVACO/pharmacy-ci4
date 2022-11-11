<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Time extends BaseController
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
        $model = model(TimeModel::class);
        $action = ($this->request->getget('editid') != '')?'time/edit':'time/add';
        $chk_edit = $model->chk_edit($this->request->getget('editid'));
        //print_r($chk_edit);
        $data=[
            'action' => $action,
            'chk_edit' => isset($chk_edit[0])?$chk_edit[0]:[],
        ];
        //echo 'eeeeeeee = ' .$action;
        //exit();
        $data['time']=$model->getData();
        echo view('hometime',$data);
        echo view('footer');

    }


    public function add()
    {
        $session = session();
        $model = model(TimeModel::class);        
        if($this->request->getpost('submit')){
            $time_id = $this->request->getpost('time_id');
            $time_set = $this->request->getpost('time_set');
            $tim_stid = '0';
            $value =$model->savedata([
                'tim_stid' => $tim_stid,
                'time_id' => $time_id,
                'time_set' => $time_set,
            ]);
        //echo 'eeeeeeee = ' .$value;
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
    }
            return redirect()->to('time');
        
    }

    public function edit()
    {
        $session = session();
        $model = model(TimeModel::class);        
        if($this->request->getpost('submit')){
            $time_id = $this->request->getpost('time_id');
            $time_set = $this->request->getpost('time_set');
            $value =$model->editdata([
                'time_id' => $time_id,
                'time_set' => $time_set,
            ]);
        //echo 'eeeeeeee = ' .$value;
        //exit();
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
    }
    
            return redirect()->to('time');
        
    }

    public function delete($time_id)
    {
        $model = model(TimeModel::class);
        $model->delete($time_id);
        return redirect()->to("time");
    }
    public function approve($time_id)
    {
        $model = model(TimeModel::class);
        $session = session();
        $tim_stid = '1';
        $value =$model->editdatausers([         
            'time_id' => $time_id,
            'tim_stid' => $tim_stid,
        ]);

            return redirect()->to('time');
    }
    public function disapproved($time_id)
    {
        $model = model(TimeModel::class);
        $session = session();
        $tim_stid = '0';
        $value =$model->editdatausers([         
            'time_id' => $time_id,
            'tim_stid' => $tim_stid
        ]);
         return redirect()->to('time');
    }
}