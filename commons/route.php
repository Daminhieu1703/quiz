<?php
use App\Controllers\LoginController;
use App\Controllers\ProfileController;
use App\Controllers\SubjectController;
use App\Controllers\QuizController;
use Phroute\Phroute\RouteCollector;
function definedRoute($url){
    $router = new RouteCollector();
    //check login
    $router->filter('user', function(){
        if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
            header('location: ' . BASE_URL);
            die;
        }
    });
    $router->filter('check', function(){
        if(isset($_SESSION['user']) || !empty($_SESSION['user'])){
            header('location: ' . BASE_URL. "mon-hoc");
            die;
        }
    });

    $router->group(['before' => 'check'],function ($router){
        $router->get('/',[LoginController::class,'loginForm']);
        $router->post('login',[LoginController::class,'login']);
        $router->post('register',[LoginController::class,'register']);
    });
    //logout
    $router->get('logout',[LoginController::class,'logout']);

    $router->group(['prefix' => "mon-hoc",'before' => 'user'],function ($router){
        //subject
        $router->get('/',[SubjectController::class,'index']);
        $router->post('luu-tao-moi',[SubjectController::class,'saveAdd']);
        $router->post('luu-cap-nhat',[SubjectController::class,'saveEdit']);
        $router->get('xoa',[SubjectController::class,'remove']);
        $router->get('detail-subjects',[SubjectController::class,'detailAllSubject']);
    });
    $router->group(['prefix' => "quiz",'before' => 'user'],function ($router){
        //quiz
        $router->get('/',[QuizController::class,'index']);
        $router->get('xoa-quiz',[QuizController::class,'quizRemove']);
        $router->post('luu-cap-nhat-quiz',[QuizController::class,'quizEdit']);
        $router->post('tao-moi-quiz',[QuizController::class,'quizAddNew']);
        $router->get('list-quizs',[QuizController::class,'listQuiz']);
        $router->get('quiz-detail',[QuizController::class,'detailQuiz']);
        $router->get('quiz-detail-answer',[QuizController::class,'detailQuizAnswer']);
        $router->get('delete-result',[QuizController::class,'deleteResult']);
        //question and answer
        $router->get('tao-moi-cau-hoi',[QuizController::class,'questionAddNewForm']);
        $router->post('luu-tao-moi-cau-hoi',[QuizController::class,'questionAddNew']);
        $router->get('edit-question-form',[QuizController::class,'editQuestionForm']);
        $router->post('edit-question',[QuizController::class,'editQuestion']);
        $router->get('remove-question',[QuizController::class,'removeQuestion']);
        //start quiz
        $router->get('lam-bai',[QuizController::class,'startQuestion']);
        $router->get('check-time',[QuizController::class,'checkTime']);
        $router->post('submit-quiz',[QuizController::class,'submit']);
        $router->get('check-score',[QuizController::class,'checkScore']);
    });
    $router->group(['prefix' => "profile",'before' => 'user'],function ($router){
        //profile
        $router->get('/',[ProfileController::class,'profile']);
        $router->post('edit',[ProfileController::class,'editProfile']);
        $router->post('change-password',[ProfileController::class,'changePass']); 
    });    
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;
}
?>