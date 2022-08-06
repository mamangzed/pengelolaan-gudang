<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['nik','nama','telepon','username','password','level','foto','chat_id'];
    
    public function login($user,$pass)
    {
        $result = $this->where(['username' => $user, 'password' => $pass])->get();
        if($result->getNumRows() < 1){
            return false;
        }else{
            return $result->getRow();
        }
    }

    public function userDetail($id){
        $result = $this->where('id',$id)->get();
        if($result->getNumRows() < 1){
            return false;
        }else{
            return $result->getRow();
        }
    }


    public function cariTele($chatid,$mmk = false)
    {
        $cek = $this->where('chat_id',$chatid)->get();
        if($cek->getNumRows() >= 1){
            if($mmk == true){
                return true;
            }else{
                return $cek->getRow();
            }
        }else{
            return false;
        }
    }

    public function loginTele($user,$pass,$chatID)
    {
        $cek = $this->where(['username' => $user,'password' => $pass])->get();
        if($cek->getNumRows() >= 1){
            $this->insert(['chat_id' => $chatID]);
            return true;
        }else{
            return false;
        }
    }

    public function loginTelepon($no)
    {
        if($this->where('telepon',$no)->get()->getNumRows() >= 1){
            $data = [
                'status' => true,
                'code' => 200,
                'msg' => 'Nomor kamu terdaftar'
            ];
        }else{
            $data = [
                'status' => false,
                'code' => 404,
                'msg' => 'Nomor kamu tidak terdaftar'
            ];
        }
        return $data;
    }
}
