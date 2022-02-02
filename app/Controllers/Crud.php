<?php namespace App\Controllers;

use App\Models\StudentModel;

class Crud extends BaseController
{
	protected $model;
	public function __construct(){
		$this->model = new StudentModel();
	}

	public function records(){      //READ
		$data['students'] = $this->model->getAllStudents();
		return view('records', $data);
	}

	public function create(){       //CREATE GET METHOD
		return view('add');
	}

	public function store(){        //POST METHOD NEEDED FOR CREATE
        $data = [
            'first_name' => $this->request->getPost('Fname'),
            'last_name' => $this->request->getPost('Lname'),
            'address' => $this->request->getPost('Address'),
            'email' => $this->request->getPost('Email'),
            'mobile' => $this->request->getPost('Mobile'),
        ];
		$this->model->addNewStudent($data);
		return redirect()->to(base_url('index.php/crud/records')); 
	}

	public function edit(){         //EDIT GET METHOD
		$id = $this->request->uri->getSegment(3);
		$data['student'] = $this->model->getStudentWhere($id);
		return view('edit', $data);
	}

	public function update(){       //POST METHOD NEEDED FOR EDIT
        $data = [
			'first_name' => $this->request->getPost('Fname'),
            'last_name' => $this->request->getPost('Lname'),
            'address' => $this->request->getPost('Address'),
            'email' => $this->request->getPost('Email'),
            'mobile' => $this->request->getPost('Mobile'),
		];
		$id = $this->request->uri->getSegment(3);
		$this->model->updateStudentWhere($data, $id);
		return redirect()->to(base_url('index.php/crud/records')); 
	}

	public function delete(){       //DELETE
		$id = $this->request->uri->getSegment(3);
		$this->model->deleteStudentWhere($id);
		return redirect()->to(base_url('index.php/crud/records')); 
	}
	//--------------------------------------------------------------------
}