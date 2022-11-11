<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SeconModel;
use App\Models\SubModel;

class Mainusers extends BaseController
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
        $model = model(PharmacyModel::class);
        $getstatus01 = '1';
        $getstatus02 = '2';
        //$data['getGraph']=$model->getGraph();   
        $b_year= isset($_POST['b_year'])?$_POST['b_year']:date("Y");
        $data['getCount']=$model->getCount();   
        $data['getCountstatus01']=$model->getCountstatus($getstatus01);   
        $data['getCountstatus02']=$model->getCountstatus($getstatus02); 
        $data['getmain']=$model->getmain();  
        $data['pharmacy']=$model->getmain();
        $data['chk_government']=$model->chk_government();
        $data['chart']=$model->chart($b_year); 
        $data['b_year']=$b_year;

        //print_r($data['chart']);
        //exit();
        echo view('header');
        echo view('maindashboard' ,$data);
        echo view('footer');
    }
}