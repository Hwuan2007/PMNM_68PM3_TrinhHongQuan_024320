<?php
require_once '../app/core/Controller.php';
class AuthController extends Controller
{

    public function index()
    {
        $this->view('layout/masterLayout', [
            'title' => 'Đăng nhập',
            'nameView' => 'auth/login'
        ]);
    }

    public function doLogin()
    {
        // echo "Hello from AuthController - doLogin method!";
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($username === '024320@st.huce.edu.vn' && $password === '024320') {
            // echo "Login successful!";
            //lưu session và cookie nếu tick remember
            session_start();
            $_SESSION['username'] = $username;
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + (86400 * 30), '/'); // 86400 = 1 day
                setcookie('password', $password, time() + (86400 * 30), '/'); // 86400 = 1 day
            }
            header('Location: /PMNM_68PM3_TrinhHongQuan_024320/public/?url=sinhvien/index');

            exit();
        } else {
            // redirect back to login (index will render via masterLayout)
            header('Location: /PMNM_68PM3_TrinhHongQuan_024320/public/?url=auth/login');
            exit();
        }
    }

    public function logout()
    {
        // echo "Hello from AuthController - logout method!";
        session_start();
        session_destroy();
        setcookie('username', '', time() - 3600, '/'); // xóa cookie
        setcookie('password', '', time() - 3600, '/'); // xóa cookie
        header('Location: /PMNM_68PM3_TrinhHongQuan_024320/public/?url=auth/login');
        exit();
    }
}
