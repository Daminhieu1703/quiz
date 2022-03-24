<?php
namespace App\Controllers;
use App\Models\Subject;

class SubjectController{
    public function index(){
        $subjects = Subject::all();
        return view('SubjectViews',[
            "monhoc" => $subjects
        ]);
    }
    public function saveAdd(){
        $model = new Subject();
        $data = [
            'name' => $_POST['name'],
            'author_id' => $_SESSION['user']->id
        ];
        $model->insert($data);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function saveEdit(){
        $id = $_GET['id'];
        $model = Subject::where('id', $id)->first();
        if(!$model){
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }

        $data = [
            'name' => $_POST['name']
        ];

        $model->update($data);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }

    public function remove(){
        $id = $_GET['id'];
        Subject::destroy($id);
        header('location: ' . BASE_URL . 'mon-hoc');
        die;
    }
    public function detailAllSubject(){
        $subjects = Subject::all();
        $subject = Subject::join('users','users.id','=','subjects.author_id')->select('subjects.name as name_subjects','users.name as name_users','subjects.id as id_subjects')->get();
        return view('profile_detail.detail-subjects',[
            "monhoc" => $subjects,
            'subject' => $subject
        ]);
    }
}
?>