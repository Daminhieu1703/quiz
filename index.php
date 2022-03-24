<?php
require_once './commons/helpers.php';
require_once './vendor/autoload.php';
require_once './commons/utils.php';
require_once './commons/route.php';
session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
definedRoute($url);
// $url mong muốn của người gửi request
// switch ($url) {
    // case '/':
    //     checkSessionIsset();
    //     $ctr = new LoginController();
    //     $ctr->loginForm();
    //     break;
    // case 'logout':
    //     checkSessionNoIsset();
    //     $ctr = new LoginController();
    //     $ctr->logout();
    //     break;
    // case 'login':
    //     checkSessionIsset();
    //     $ctr = new LoginController();
    //     $ctr->login();
    //     break;
    // case 'register':
    //     checkSessionIsset();
    //     $ctr = new LoginController();
    //     $ctr->register();
    //     break;    
    // case 'mon-hoc':
    //     checkSessionNoIsset();
    //     $ctr = new SubjectController();
    //     $ctr->index();
    //     break;
    // case 'mon-hoc/luu-tao-moi':
    //     checkSessionAdmin();
    //     $ctr = new SubjectController();
    //     $ctr->saveAdd();
    //     break;
    // case 'mon-hoc/luu-cap-nhat':
    //     checkSessionAdmin();
    //     $ctr = new SubjectController();
    //     $ctr->saveEdit();
    //     break;
    // case 'mon-hoc/xoa':
    //     checkSessionAdmin();
    //     $ctr = new SubjectController();
    //     $ctr->remove();
    //     break;
    // case 'quiz':
    //     checkSessionNoIsset();
    //     $ctr = new QuizController();
    //     $ctr->index();
    //     break;
    // case 'quiz/tao-moi-cau-hoi':
    //     checkSessionAdmin();
    //     $ctr = new QuizController();
    //     $ctr->questionAddNewForm();
    //     break;
    // case 'quiz/luu-tao-moi-cau-hoi':
    //     checkSessionAdmin();
    //     $ctr = new QuizController();
    //     $ctr->questionAddNew();
    //     break;
    // case 'quiz/tao-moi-quiz':
    //     checkSessionAdmin();
    //     $ctr = new QuizController();
    //     $ctr->quizAddNew();
    //     break;
    // case 'quiz/luu-cap-nhat-quiz':
    //     checkSessionAdmin();
    //     $ctr = new QuizController();
    //     $ctr->quizEdit();
    //     break;
    // case 'quiz/xoa-quiz':
    //     checkSessionAdmin();
    //     $ctr = new QuizController();
    //     $ctr->quizRemove();
    //     break;
    // case 'quiz/lam-bai':
    //     checkSessionUser();
    //     $ctr = new QuizController();
    //     $ctr->startQuestion();
    //     break;
    // case 'quiz/edit-question-form':
    //     checkSessionAdmin();
    //     $ctr = new QuizController();
    //     $ctr->editQuestionForm();
    //     break;
    // case 'quiz/edit-question':
    //     checkSessionAdmin();
    //     $ctr = new QuizController();
    //     $ctr->editQuestion();
    //     break;
    // case 'quiz/remove-question':
    //     checkSessionAdmin();
    //     $ctr = new QuizController();
    //     $ctr->removeQuestion();
    //     break;
    // case 'quiz/check-time':
    //     checkSessionUser();
    //     $ctr = new QuizController();
    //     $ctr->checkTime();
    //     break;
    // case 'quiz/submit-quiz':
    //     checkSessionUser();
    //     $ctr = new QuizController();
    //     $ctr->submit();
    //     break;
    // case 'profile':
    //     checkSessionNoIsset();
    //     $ctr = new LoginController();
    //     $ctr->profile();
    //     break;
    // case 'profile/edit':
    //     checkSessionNoIsset();
    //     $ctr = new LoginController();
    //     $ctr->editProfile();
    //     break;
    // case 'profile/change-password':
    //     checkSessionNoIsset();
    //     $ctr = new LoginController();
    //     $ctr->changePass();
    //     break;
    // default:
    //     echo "Đường dẫn truy cập này đã bị hỏng !";
    //     break;
// }


?>