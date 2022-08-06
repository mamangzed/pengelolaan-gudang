<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Halaman utama',
            'user' => $this->user->userDetail(session()->get('user_id')),
        ];
        return view('home/dashboard.php',$data);
    }

    public function pengguna()
    {
        $data = [
            'title' => 'Data pengguna',
            'pengguna' => $this->user->findAll(),
            'user' => $this->user->userDetail(session()->get('user_id'))
        ];
        return view('home/pengguna.php',$data);
    }

    public function tambahPengguna()
    {
        $data = [
            'title' => 'Data pengguna',
            'pengguna' => $this->user->findAll(),
            'user' => $this->user->userDetail(session()->get('user_id'))
        ];
        return view('home/tambah-pengguna.php',$data);
    }

    public function aksiTambahPengguna()
    {
        $file = $this->request->getFile('foto');
        $fileName = $file->getRandomName();
        $move = $file->move(WRITEPATH.'/uploads/img/',$fileName);
        $insert = $this->user->insert([
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'telepon' => $this->request->getPost('telepon'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
            'foto' => $fileName,
            'chat_id' => $this->request->getPost('chatid')
        ]);
        if($move && $insert){
            $this->session->setFlashdata('success','Berhasil menambahkan '.$this->request->getPost('nama'));
            return redirect()->route('pengguna');
        }else{
            $this->session->setFlashdata('error','Gagal menambahkan '.$this->request->getPost('nama'));
            return redirect()->route('pengguna');
        }
    }

}
