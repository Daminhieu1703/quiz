<?php
namespace App\Controllers;
use App\models\User;
class LoginController{
    public function loginForm()
    {
        include_once "./app/views/login.php";
    }
    public function login(){
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        $user = User::where('email', $data['email'])->first();
        if ($data['email'] == "" || $data['password'] == "") {
            echo'<script>
            alert("Không được để trống !");
            window.location.href = "' . BASE_URL  .'index.php";
            </script>';
            die;
        }elseif ($user->email != $data['email']) {
            echo'<script>
            alert("Tài khoản không tồn tại !");
            window.location.href = "' . BASE_URL  .'index.php";
            </script>';
            die;
        }elseif (!password_verify($data['password'], $user->password)) {
            echo'<script>
            alert("Sai mật khẩu !");
            window.location.href = "' . BASE_URL  .'index.php";
            </script>';
            die;
        }
        $_SESSION['user'] = $user;
        header("location: " . BASE_URL . 'mon-hoc');
        die;
    }
    public function register(){
        if ($_POST['password'] == "" || $_POST['again_pass'] == "" || $_POST['name'] == "" || $_POST['email'] == "") {
            echo'<script>
            alert("Không được để trống !");
            window.location.href = "' . BASE_URL  .'index.php";
            </script>';
            die;
        }else if ($_POST['password'] !== $_POST['again_pass']) {
            echo'<script>
            alert("Sai mật khẩu !");
            window.location.href = "' . BASE_URL  .'index.php";
            </script>';
            die;
        }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo'<script>
            alert("Sai định dạng email !");
            window.location.href = "' . BASE_URL  .'index.php";
            </script>';die;
        }elseif (is_numeric($_POST['name'])) {
            echo'<script>
            alert("Tên không đúng định dạng !");
            window.location.href = "' . BASE_URL  .'index.php";
            </script>';die;
        }
        $img = BASE_URL . "app/views/img/avatar_empty.png";
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'avatar' => $img
        ];
        User::create($data);
        echo'<script>
            alert("Đăng ký thành công !");
            window.location.href = "' . BASE_URL  .'index.php";
            </script>';
            die;
    }
    public function logout(){
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
            header("location:" . BASE_URL);
            die;
        }
        unset($_SESSION['user']);
        header("location:" . BASE_URL);
        die;
    }
}

?>