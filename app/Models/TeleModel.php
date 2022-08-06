<?php

namespace App\Models;

use CodeIgniter\Model;

class TeleModel extends Model
{
    protected $table            = 'tele';
    protected $allowedFields    = ['chat_id','cmd1','cmd2','cmd3','cmd4','cmd5'];

    public function cekCmd($chatid)
    {
        $cek = $this->where('chat_id',$chatid)->get();
        if($cek->getNumRows() < 1){
            return [
                'msg' => 'data tidak ditemukan',
            ];
        }else{
            return $cek->getResultArray();
        }
    }

    public function setCmd($id,$no,$cmd)
    {
        if($no > 5){
            return [
                'status' => false,
                'code' => 404,
                'msg' => 'data tidak ditemukan'
            ];
            exit;
            die();
        }
        $cmdNo = "cmd$no";
        $update = $this->update($id,[
            $cmdNo => $cmd
        ]);
        if($update){
            $data = [
                'status' => false,
                'code' => 200,
                'msg' => 'Berhasil update perintah'
            ];
        }else{
            $data = [
                'status' => false,
                'code' => 404,
                'msg' => 'gagal update perintah'
            ];
        }
        return $data;
    }

    public function tambahCmd($chatid)
    {
        if($this->where('chat_id',$chatid)->get()->getNumRows() >= 1){
            $data = [
                'status' => false,
                'code' => 203,
                'msg' => 'Chat id ini sudah ada'
            ];
        }else{
            $insert = $this->insert([
                'chat_id' => $chatid
            ]);
            if($insert){
                $data = [
                    'status' => true,
                    'code' => 200,
                    'msg' => 'Berhasil menambahkan chat id'
                ];
            }else{
                $data = [
                    'status' => false,
                    'code' => 404,
                    'msg' => 'Gagal menambahkan chat id'
                ];
            }
        }
        return $data;
    }

    public function hapusCmd($id)
    {
        $update = $this->update($id,[
            'cmd1' => NULL,
            'cmd2' => NULL,
            'cmd3' => NULL,
            'cmd4' => NULL,
            'cmd5' => NULL,
        ]);
        if($update){
            $data = [
                'status' => true,
                'code' => 200,
                'msg' => 'berhasil hapus command'
            ];
        }else{
            $data = [
                'status' => false,
                'code' => 404,
                'msg' => 'gagal hapus command'
            ];

        }
        return $data;
    }
}
