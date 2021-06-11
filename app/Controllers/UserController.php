<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    private $model;
    public $error;

    public function __construct()
    {
        $this->model = new User;
    }

    public function login()
    {
        try {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if (empty($email)) {
                throw new \Exception('信箱格式有誤');
            }

            $password = filter_input(INPUT_POST, 'password');
            if (empty($password)) {
                throw new \Exception('密碼不得為空');
            }

            $user = $this->model->getUser($email);  // 用email去搜資料庫，再去比對密碼
            
            if (empty($user)) {
                throw new \Exception('帳號或密碼輸入錯誤');
            }
            elseif (password_verify($password, $user->password) === false) {
                throw new \Exception('帳號或密碼輸入錯誤');
            }
            else {
                $_SESSION['logged_in'] = true;
                echo($_SESSION['logged_in']);
                exit();
            }
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            echo $this->error ?? ''; 
        }

    }

    public function register()
    {
        try {
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
            if (empty($username)) {
                throw new \Exception('請輸入使用者名稱');
            }

            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if (empty($email)) {
                throw new \Exception('信箱格式有誤');
            }
            
            $password = filter_input(INPUT_POST, 'password');
            if (empty($password)) {
                throw new \Exception('請輸入密碼');
            }

            $confirm_password = $_POST['confirm_password'];
            if ($password !== $confirm_password) {
                throw new \Exception('兩次密碼不相同');
            }

            $passwordHash = password_hash($password, PASSWORD_DEFAULT, ['COST' => 12]);
            if ($passwordHash === false) {
                throw new \Exception('密碼有問題');
            }

            $accounts = $this->model->CheckUser($username, $email);
            if (empty($accounts)) {
                $this->model->CreateUser($username, $email, $passwordHash);
                exit();
            } else {
                throw new \Exception('此帳號已被註冊');
            }
            
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            echo $this->error ?? '';
        }
    }

    public function logout()
    {
        unset($_SESSION['logged_in']);
        redirect('');
    }
}
