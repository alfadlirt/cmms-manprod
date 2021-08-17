<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Login extends BaseController
{
    protected $AdminModel;
    private $id_admin;
    private $role;
    private $session;

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function getUserInfo()
    {
        $this->session = session();
        $this->id_admin = $this->session->get('user_id');
        $this->role = $this->session->get('role');
    }

    public function index()
    {
        $this->getUserInfo();
        
        if (isset($this->id_admin) && $this->role == '1') {
            return view('Dashboard/SuperadminDashboard');
        } else if (isset($this->id_admin) && $this->role == '0') {
            //dd($this->role);
            return view('Dashboard/AdminDashboard');
        } else {
            return view('Login/LoginPage');
        }
    }

    public function authentication()
    {
        $session = session();
        $input_uname = $this->request->getVar('username');
        $input_password = $this->request->getVar('password');
        $array = ['username' => $input_uname, 'status' => 1];
        $check = $this->AdminModel->where($array)->first();
        //dd($array);
        if ($check) {
            $pass = $check['password'];
            if (password_verify($input_password, $pass)) {
                $session_data = [
                    'user_id' => $check['id_admin'],
                    'user_name' => $check['username'],
                    'role' => $check['role'],
                    'logged_in' => true
                ];
                $session->set($session_data);
                $session->setFlashdata('authresult', '3');
                return redirect()->to(base_url() . "/");
            } else {
                //Password Salah
                $session->setFlashdata('authresult', '2');

                return redirect()->to(base_url() . "/");
            }
        } else {
            //Username Not Found
            $session->setFlashdata('authresult', '1');

            return redirect()->to(base_url() . "/");
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url() . "/");
    }
}
