<?php

namespace App\Controllers;
use App\Models\UserModel;


class Auth extends BaseController
{
    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function aksiLogin()
    {
        $user = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        $login = $this->users->login($user,$pass);
        if($login != FALSE){
            $this->session->setFlashdata([
                'success' => 'Selamat datang '.$login->nama
            ]);
            $this->session->set([
                'user_id' => $login->id,
                'login' => true
            ]);
            return redirect()->route('dashboard');
        }{
            $this->session->setFlashdata('error','Username atau password salah');
            return redirect()->route('login');
        }
    }

    public function halamanLogin()
    {
        $data = [
            'title' => 'Halaman login'
        ];
        return view('auth/login',$data);
    }

    public function logout()
    {
        $this->session->remove([
            'user_id',
            'login'
        ]);
        $this->session->setFlashdata('success','Kamu berhasil keluar');
        return redirect()->route('login');
    }
}
