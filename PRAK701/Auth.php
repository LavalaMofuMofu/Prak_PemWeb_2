<?php
namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function process()
    {
        $users = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $dataUser = $users->where([
            'username' => $username,
        ])->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username'  => $dataUser['username'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/buku');
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->back();
        }
    }

    public function logout() 
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}