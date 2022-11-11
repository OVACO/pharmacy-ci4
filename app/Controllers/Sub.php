<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Sub extends BaseController
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
        $model = model(SubModel::class);
        $action = ($this->request->getget('editid') != '')?'Sub/edit':'Sub/add';
        $chk_edit = $model->chk_edit($this->request->getget('editid'));
        $main_id1 = isset($chk_edit[0]['main_id'])?$chk_edit[0]['main_id']:"";
        //$secondary_id1 = isset($chk_edit[0]['secondary_id'])?$chk_edit[0]['secondary_id']:"";
        //print_r($chk_edit);
        $data=[
            'getmain' => $model->getmain(),
            //'getsecon' => $model->getsecon(),
            'getsecon' => $model->getsecon_edit($main_id1),
            //'getsub' => $model->getsubedit($main_id1,$secondary_id1),
            'action' => $action,
            'chk_edit' => isset($chk_edit[0])?$chk_edit[0]:[],
        ];
        
        
        $data['subheading']=$model->getData();
        echo view('homesub', $data);
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
    public function add()
    {
        $session = session();
        $model = model(SubModel::class);
        $target_dir = "doc/";
        $target_dir01 = "doc/";
        $file_dow = $this->request->getpost('file_dow');
        $file_ex = $this->request->getpost('file_ex');

        $imageFileType = strtolower(pathinfo(basename($_FILES["file_dow"]["name"]),PATHINFO_EXTENSION));
        $imageFileType01 = strtolower(pathinfo(basename($_FILES["file_ex"]["name"]),PATHINFO_EXTENSION));

        echo 'imageFileType =' .$imageFileType. "<br />";
        echo 'imageFileType01 =' .$imageFileType01. "<br />";
        print_r($value);
        //exit();
        $file_dow = date('YmdHis').'.'.$imageFileType;
        $file_ex = date('YmdHis').'.'.$imageFileType01;
        $target_file = $target_dir . $file_dow;
        $target_file01 = $target_dir01 . $file_ex;
        $uploadOk = 1;
        if($imageFileType == ""){
            $file_dow = 'null';
        }
        if($imageFileType01 == ""){
            $file_ex = 'null';
        }
        if($this->request->getpost('submit')){
            $main_id = $this->request->getpost('main_id');
            $secondary_id = $this->request->getpost('secondary_id');
            $sub_id = $this->request->getpost('sub_id');
            $content3 = $this->request->getpost('content3');
            $title_stid = '0';
            $user_add = $_SESSION['id_card'];
            $date_add = date('Y-m-d H:i:s');
            exit();
            move_uploaded_file($_FILES["file_dow"]["tmp_name"], $target_file);
            move_uploaded_file($_FILES["file_ex"]["tmp_name"], $target_file01);
            $value =$model->savedata([
                'title_stid' => $title_stid,
                'main_id' => $main_id,
                'secondary_id' => $secondary_id,
                'sub_id' => $sub_id,
                'content3' => $content3,
                'file_dow'  => $file_dow,
                'file_ex'  => $file_ex,
                'user_add' => $user_add,
                'date_add' => $date_add
            ]);
            //echo 'target_file =' .$target_file. "<br />";
            //echo 'target_file01 =' .$target_file01. "<br />";
            //echo 'file_dow =' .$file_dow. "<br />";
            //echo 'file_ex =' .$file_ex. "<br />";
            //print_r($value);
            //exit();
        $value = ($value !='')?$value:0;
        $session->set(['test'=>$value]);
    }
            return redirect()->to('sub');
        
    }
    public function edit($id)
    {
        $b_year = $this->request->getget('b_year');
        $main_id = $this->request->getget('main_id');
        $secondary_id = $this->request->getget('secondary_id');
        $model = model(SubModel::class);
        $data=[
            'action' => 'sub/edit_data',
            'id' => $id,
            'olddata' => $model->getOldData($id),
            'main_id' => $main_id,
            'secondary_id' => $secondary_id,
            'contentmainsecon'=> $model->getmainseconcontent($secondary_id)
        ];
        echo view('header');
        echo view('SubAddEdit', $data);
        echo view('footer');
    }
    public function edit_data()
    {
        $model = model(SubModel::class);
        $main_id = $this->request->getpost('main_id');
        $secondary_id = $this->request->getpost('secondary_id');
        $sub_id = $this->request->getpost('sub_id');
        if ($model->checkPK($b_year,$main_id,$secondary_id,$sub_id)== 0){
        $model->save([
            'id' => $this->request->getpost('id'),
            'main_id' => $main_id,
            'secondary_id' => $secondary_id,
            'sub_id' => $sub_id,
            'content3' => $this->request->getpost('content3'),
            'user_edit' => $_SESSION['id_card'],
            'date_edit' => date('Y-m-d H:i:s')
        ]);
    } else {
        $model->save([
            'id' => $this->request->getpost('id'),
            'content3' => $this->request->getpost('content3'),
            'user_edit' => $_SESSION['id_card'],
            'date_edit' => date('Y-m-d H:i:s')
        ]);
    }
        return redirect()->to("sub?main_id=$main_id&secondary_id=$secondary_id");
    
    }
    public function delete($id)
    {
        $main_id = $this->request->getget('main_id');
        $secondary_id = $this->request->getget('secondary_id');
        $model = model(SubModel::class);
        $model->delete($id);
        return redirect()->to("sub?main_id=$main_id&secondary_id=$secondary_id");
    }
    public function approve($sub_id)
    {
        $model = model(SubModel::class);
        $session = session();
        $title_stid = '1';
        $value =$model->editdatashow([         
            'sub_id' => $sub_id,
            'title_stid' => $title_stid,
        ]);

            return redirect()->to('sub');
    }
    public function disapproved($sub_id)
    {
        $model = model(SubModel::class);
        $session = session();
        $title_stid = '0';
        $value =$model->editdatashow([         
            'sub_id' => $sub_id,
            'title_stid' => $title_stid,
        ]);
         return redirect()->to('sub');
    }
    

}