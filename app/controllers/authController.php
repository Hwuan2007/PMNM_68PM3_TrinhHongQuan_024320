<?php
class AuthController{   
    public function index(){
        // echo "Hello from AuthController - login method!";
        require_once '../app/views/auth/login.php';
    }

    public function doLogin(){
        // echo "Hello from AuthController - doLogin method!";
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        if($username === '024220@st.huce.edu.vn' && $password === '024220'){
            // echo "Login successful!";
            //lưu session và cookie nếu tick remember
            session_start();
            $_SESSION['username'] = $username;
            if(isset($_POST['remember'])){
                setcookie('username', $username, time() + (86400 * 30), '/'); // 86400 = 1 day
                setcookie('password', $password, time() + (86400 * 30), '/'); // 86400 = 1 day
            }
            header('Location: ?url=home/index');
            exit();
        } else {
            // echo "Invalid credentials!";
            header('Location: ?url=auth/login');
            exit();
        }
    }

    public function logout(){
        // echo "Hello from AuthController - logout method!";
        session_start();
        session_destroy();
        setcookie('username', '', time() - 3600, '/'); // xóa cookie
        setcookie('password', '', time() - 3600, '/'); // xóa cookie
        header('Location: ?url=auth/login');
        exit();
    }
}
?>