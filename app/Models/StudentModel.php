<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class StudentModel extends Model{

    protected $table = "students";
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name','last_name','address','email', 'mobile'];
    protected $returnType = 'array';
    
    public function getAllStudents(){   //return all student records
        $student = $this->findAll();
        return $student;
    }

    public function addnewStudent($data){   //insert student record
        $this->insert($data);
    }

    public function getStudentWhere($id){   //return one student where
        $data = $this->where('id', $id)->first();
        return $data;
    }

    public function deleteStudentWhere($id){    //delete one student where
        $this->where('id', $id)->delete();
    }

    public function updateStudentWhere($data, $id){ //update student record where
        $this->update($id, $data);
    }
}