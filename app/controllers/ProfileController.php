<?php
namespace App\Controllers;
use App\Models\Quiz;
use App\Models\StudentQuiz;
use App\models\User;
use App\Models\Subject;
class ProfileController{
    public function profile(){
        $subjects = Subject::all();
        $id_role = (isset($_SESSION['admin'])) ? $_SESSION['admin']->id : $_SESSION['user']->id;
        $user = User::join('roles', 'users.role_id', '=', 'roles.id')->select('users.avatar','users.name as name_user','users.email','roles.name as name_role')->where('users.id',$id_role)->first();
        return view('profile_detail.profile',[
            "user" => $user,
            "id_role" => $id_role,
            "monhoc" => $subjects
        ]);
    }
    public function editProfile(){;
        $avatar = $_POST['avatar_before'];
        if ($_POST['name'] == "" || $_POST['email'] == "") {
            echo'<script>
            alert("Không được để trống !");
            window.location.href = "' . BASE_URL  .'index.php?url=profile";
            </script>';
            die;
        }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo'<script>
            alert("Sai định dạng email !");
            window.location.href = "' . BASE_URL  .'index.php?url=profile";
            </script>';die;
        }elseif (is_numeric($_POST['name'])) {
            echo'<script>
            alert("Tên không đúng định dạng !");
            window.location.href = "' . BASE_URL  .'index.php?url=profile";
            </script>';die;
        }
        if ($_FILES['avatar']['size'] > 0) {
            if (strpos($_FILES['avatar']['type'], 'image') === false) {
                echo'<script>
                alert("Không phải file ảnh, mời bạn upload lại !");
                window.location.href = "' . BASE_URL  .'index.php?url=profile";
                </script>';
                die;
            }else if($_FILES['avatar']['size'] > 3000000) {
                echo'<script>
                alert("File ảnh bạn tải lên không được lớn hơn 30MB !");
                window.location.href = "' . BASE_URL  .'index.php?url=profile";
                </script>';
                die;
            }
            move_uploaded_file($_FILES['avatar']['tmp_name'], './app/views/img/' . $_FILES['avatar']['name']);
            $avatar = BASE_URL . 'app/views/img/' . $_FILES['avatar']['name'];
        }
        $user = User::find($_POST['id']);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->avatar = $avatar;
        $user->save();
        echo'<script>
            alert("Thay đổi thông tin thành công !");
            window.location.href = "' . BASE_URL  .'index.php?url=profile";
            </script>';
            die;
    }
    function changePass(){
        $users = new User();
        $user = $users::where(['id', '=', $_POST['id']])->first();
        if (!password_verify($_POST['pass_before'], $user->password)) {
            echo'<script>
            alert("Sai mật khẩu !");
            window.location.href = "' . BASE_URL  .'index.php?url=profile";
            </script>';die;
        }elseif ($_POST['pass_after'] !== $_POST['pass_accuracy']) {
            echo'<script>
            alert("Mật khẩu mới và xác nhận lại mật khẩu không giống nhau !");
            window.location.href = "' . BASE_URL  .'index.php?url=profile";
            </script>';die;
        }
        $data = [
            'password' => password_hash($_POST['pass_after'], PASSWORD_DEFAULT)
        ];
        $users->id = $_POST['id'];
        $users->update($data);
        echo'<script>
            alert("Thay đổi mật khẩu thành công !");
            window.location.href = "' . BASE_URL  .'index.php?url=profile";
            </script>';
            die;
    }
}
?>