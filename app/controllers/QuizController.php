<?php
namespace App\Controllers;
use App\models\Quiz;
use App\Models\Subject;
use App\Models\Answer;
use App\Models\Question;
use App\Models\StudentQuiz;
use App\Models\StudentQuizDetail;
class QuizController{
    public function index(){
        $id = $_GET["id"];
        if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 2) {
            $quizs = Quiz::where('subject_id',$id)->get();
        } else {
            $quizs = Quiz::where('subject_id',$id)->where(function($query){
                $query->where('status',2);
            })->get();
        }
        $subjects = Subject::all();
        $subjectTittle = Subject::where('id',$id)->first();
        return view('quiz.index',[
            "quiz" => $quizs,
            "subjectName" => $subjectTittle,
            "monhoc" => $subjects
        ]);
    }
    public function questionAddNewForm(){
        $subjects = Subject::all();
        $quizs = Quiz::where('subject_id',$_GET['id'])->get();
        return view('quiz.new-question-answer',[
            "quiz" => $quizs,
            "monhoc" => $subjects
        ]);
    }
    public function questionAddNew(){
        Question::create([
            'id' => $_POST["question_id"],
            'name' => $_POST["name"],
            'quiz_id' => $_POST["quiz_id"],
            'img' => $_POST["img_question"],
        ]);
        $questions = Question::where("quiz_id",$_POST["quiz_id"])->orderByDesc('id')->first();
        $id_question = $questions->id;
        $data2 = [
            0 => $_POST['content1'],
            1 => $_POST['content2'],
            2 => $_POST['content3'],
            3 => $_POST['content4'],
        ];
        $data3 = [
            0 => $_POST['is_correct1'],
            1 => $_POST['is_correct2'],
            2 => $_POST['is_correct3'],
            3 => $_POST['is_correct4'],
        ];
        for ($i=0; $i < count($data2); $i++) { 
            $arr = [
                'id'=>$_POST['answer_id'],
                'content'=>$data2[$i],
                'question_id'=>$id_question,
                'is_correct'=>$data3[$i]
            ];
            Answer::create($arr);  
        }
        header("location:". BASE_URL . "quiz?id=".$_GET["id"]);
        die;
    }
    public function quizAddNew(){
        $quizs = new Quiz();
        $data = [
            'id' => $_POST["id"],
            'name' => $_POST["name"],
            'subject_id' => $_GET["id"],
            'duration_minutes' => $_POST["duration_minutes"],
            'start_time' => $_POST["start_time"],
            'end_time' => $_POST["end_time"],
            'status' => $_POST["status"],
            'is_shuffle' => $_POST["is_shuffle"],
        ];
        $quizs->insert($data);
        header("location:". BASE_URL . 'quiz?id='.$_GET["id"]);
    }
    public function quizEdit(){
        
        $status = ($_POST["status"] == 0) ? 2 : $_POST["status"];
        $model = Quiz::find($_POST['id']);
        $model->name = $_POST['name'];
        $model->subject_id = $_GET['id'];
        $model->duration_minutes = $_POST['duration_minutes'];
        $model->start_time = $_POST['start_time'];
        $model->end_time = $_POST['end_time'];
        $model->status = $status;
        $model->is_shuffle = $_POST['is_shuffle'];
        $model->save();
        header("location:". BASE_URL . 'quiz?id='.$_GET["id"]);
    }
    public function quizRemove(){
        Quiz::destroy($_GET["id"]);
        header("location:". BASE_URL . 'quiz?id='.$_GET["id_subject"]);
    }
    public function editQuestionForm(){
        $subjects = Subject::all();
        $quizs = Quiz::where('id',$_GET["id"])->first();
        $questions = Question::where('quiz_id' ,$_GET["id"])->get();
        $arr_answers = [];
        foreach ($questions as $key) {
            $question_id = $key->id;
            $answer = Answer::where('question_id',$question_id)->get();
            array_push($arr_answers,$answer);
        }
        return view('quiz.edit-question',[
            "quiz" => $quizs,
            "question" =>$questions,
            "arr_answer" =>$arr_answers,
            "monhoc" => $subjects
        ]);
    }
    public function editQuestion(){
        $i = 1;
        while (isset($_POST['q'.$i])) {
            $j =1;
            $questions=Question::find($_POST['id'.$i]);
            $questions->name = $_POST['q'.$i];
            $questions->save();
            while (isset($_POST['content'.$j.'quiz'.$i])) {
                $answers = Answer::find($_POST['id_answer'.$j.'quiz'.$i]);
                $answers->content = $_POST['content'.$j.'quiz'.$i];
                $answers->is_correct = $_POST['is_correct'.$j.'quiz'.$i];
                $answers->save();
                $j+=1;
            }
           $i+=1;
        }
        header("location:" . BASE_URL .'quiz?id='.$_GET['id']);
    }
    public function removeQuestion(){
        Question::destroy($_GET["id"]);
        header("location:" . BASE_URL .'quiz/edit-question-form?id='.$_GET['id_quiz'].'&id_subject='.$_GET['id_subject']);
    }
    public function startQuestion(){
        $quizs = Quiz::where('id' ,$_GET["id"])->first();
        $time = $quizs->duration_minutes;
        $questions = Question::where('quiz_id' ,$_GET["id"])->get();
        if (empty($questions)) {
            include_once './app/views/quiz/start-quiz.php';
            die;
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = date('Y-m-d H:i:s');
        $arr_answers = [];
        $arr_student_quiz = [
            'student_id' => $_SESSION["user"]->id,
            'quiz_id' => $_GET["id"],
            'start_time' => $start_time,
        ];
        StudentQuiz::create($arr_student_quiz);
        foreach ($questions as $key) {
            $question_id = $key->id;
            $answer = Answer::where('question_id',$question_id)->get();
            array_push($arr_answers,$answer);
        }
        $student_quiz_id =StudentQuiz::where('quiz_id',$_GET["id"])->where(function ($query)
        {
            $query->where('student_id',$_SESSION["user"]->id);
        })->orderByDesc('id')->first();
        return view('quiz.start-quiz',[
            "quizs" => $quizs,
            "questions" => $questions,
            "arr_answers" => $arr_answers,
            "student_quiz_id" => $student_quiz_id,
            "time" => $time
        ]);
    }
    public function checkTime(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $the_present_time = date('Y-m-d H:i:s');
        $student_quiz = StudentQuiz::find($_GET['id']);
        $student_quiz->end_time = $the_present_time;
        $student_quiz->save();
    }
    public function submit(){
        $model = new StudentQuiz();
        $model_2 = new StudentQuizDetail();
        $i = 1;
        $number_id = 1;
        $count_correct = 0;
        $count_question = 0;
        // $model = StudentQuiz::rawQuery("SELECT * FROM student_quizs")->orderBy('id',false)->first();
            while (isset($_POST['q'.$number_id])) {
                $count_question +=1;
                $number_id+=1;
            }
            while (isset($_POST['mapQuestion'.$i])) {
                $answer = Answer::where("id", $_POST['mapQuestion'.$i])->first();
                $arr_detail = [
                    'quiz_id' => $_GET['id_quizs'],
                    'answer_id' => $_POST['mapQuestion'.$i],
                    'student_quiz_id' => $_GET['id_student_quiz'],
                ];
                StudentQuizDetail::create($arr_detail);
                if ($answer->is_correct == 2) {
                    $count_correct += 1;
                }
              $i+=1;
            }
       $model = StudentQuiz::find($_GET['id_student_quiz']);
       $model->score =($count_correct/$count_question)*10;
       $model->save();
        header("location:" . BASE_URL .'quiz?id='.$_GET['id']);
    }
    

    public function checkScore(){
        $subjects = Subject::all();
        $score = StudentQuiz::where('quiz_id', $_GET['id'])->where(function($query){
            $query->where('student_id',$_SESSION['user']->id);
        })->get();
        if ($score->isEmpty()) {
            header('location:' . BASE_URL . 'quiz/lam-bai?id='.$_GET['id'].'&id_subject='.$_GET['id_subject']);
        }else{
            return view('quiz.list-score',[
                'score'=> $score,
                'monhoc' =>$subjects
            ]);
        }
    }

    public function listQuiz(){
        $id = $_GET["id"];
        $subjects = Subject::all();
        $list_quizs = Quiz::where('subject_id',$id)->get();
        return view('profile_detail.list-quizs',[
            "monhoc" => $subjects,
            "list_quizs" => $list_quizs,
        ]);
    }
    public function detailQuiz(){
        $id = $_GET["id"];
        $subjects = Subject::all();
        $detail_quizs = StudentQuiz::join('users','users.id','=','student_quizs.student_id')->select('student_quizs.id as id','users.name as name_user','student_quizs.start_time as start_time','student_quizs.end_time as end_time','student_quizs.score as score')->where('quiz_id',$id)->get();
        return view('profile_detail.detail-quizs',[
            "monhoc" => $subjects,
            "detail_quizs" => $detail_quizs,
        ]);
    }
    public function detailQuizAnswer(){
        $StudentQuizDetail = new StudentQuizDetail();
        $id = $_GET["id"];
        $subjects = Subject::all();
        $detail_quizs = $StudentQuizDetail
        ->join('answers','answers.id','=','student_quiz_detail.answer_id')
        ->join('questions', 'questions.id','=','answers.question_id')
        ->select('questions.name as name_question','answers.content as content_answer','answers.is_correct as correct')
        ->where('student_quiz_id',$id)->get();
        return view('profile_detail.detail-quizAnswer',[
            "monhoc" => $subjects,
            "detail_quizs" => $detail_quizs,
        ]);
    }
    public function deleteResult(){
        $id = $_GET["id"];
        StudentQuiz::destroy($_GET["id"]);
        header("location:" . BASE_URL .'quiz/quiz-detail?id='.$_GET['id_quiz']);
    }
}
