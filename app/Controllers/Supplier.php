<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Supplier extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Supplier',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'supplier' => $this->supplier->orderBy('id','DESC')->findAll(),
            'laporan' => false
        ];
        return view('supplier/index.php',$data);
    }

    public function hapus($id)
    {
        $hapus = $this->supplier->delete($id);
        if($hapus){
            $this->session->setFlashdata('success','Berhasil hapus data supplier');
            return redirect()->route('supplier');
        }else{
            $this->session->setFlashdata('error','Gagal hapus data supplier');
            return redirect()->route('supplier');
        }
    }
    
    public function edit($id)
    {
        $edit = $this->supplier->find($id);
        if(!$edit){
            $this->session->setFlashdata('warning','Data supplier tidak ditemukan');
            return redirect()->route('supplier');
        }else{
            $data = [
                'title' => 'Edit supplier',
                'user' => $this->user->userDetail(session()->get('user_id')),
                'tampil' => $this->supplier->find($id)
            ];
            return view('supplier/edit.php',$data);
        }
    }
    
    public function actEdit()
    {
        $edit = $this->supplier->update($this->request->getPost('id'),[
            'kode_supplier' => $this->request->getPost('kode_supplier'),
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon')
        ]);
        if(!$edit){
            $this->session->setFlashdata('warning','Gagal mengubah supplier '.$this->request->getPost('nama_supplier'));
            return redirect()->route('supplier');
        }else{
            $this->session->setFlashdata('success','berhasil mengubah supplier '.$this->request->getPost('nama_supplier'));
            return redirect()->route('supplier');
        }
    }

    public function add()
    {
        $kdsupplier = $this->supplier->orderBy('kode_supplier','DESC')->first();
        $kode = $this->supplier->orderBy('kode_supplier','DESC')->countAllResults() == NULL ? 'SUP-07202200' :$kdsupplier['kode_supplier'];
        $urut = substr($kode, 8, 3);
        $tambah = (int) $urut + 1;
        $bulan = date("m");
        $tahun = date("y");
        
        if(strlen($tambah) == 1){
            $format = "SUP-".$bulan.$tahun."00".$tambah;
        } else if(strlen($tambah) == 2){
            $format = "SUP-".$bulan.$tahun."0".$tambah;
        } else{
            $format = "SUP-".$bulan.$tahun.$tambah;
        }
        $data = [
            'title' => 'Tambah supplier',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'format' => $format
        ];
        return view('supplier/add.php',$data);
    }

    public function actAdd()
    {
        $add = $this->supplier->insert([
            'kode_supplier' => $this->request->getPost('kode_supplier'),
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon')
        ]);
        if($add){
            $this->session->setFlashdata('success','Berhasil menambahkan supplier '.$this->request->getPost('nama_supplier'));
        }else{
            $this->session->setFlashdata('error','gagal menambahkan supplier '.$this->request->getPost('nama_supplier'));
        }
        return redirect()->route('supplier');
    }

    public function laporan()
    {
        $data = [
            'title' => 'Laporan barang keluar',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'supplier' => $this->supplier->orderBy('id','DESC')->findAll(),
            'laporan' => true
        ];
        return view('supplier/index.php',$data);
    }
    
    public function export()
    {
        $data = [
            'title' => 'Supplier',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'supplier' => $this->supplier->orderBy('id','DESC')->findAll(),
            'laporan' => true
        ];
        $this->respon->setHeader('Content-type','application/vnd-ms-excel');
        $this->respon->setHeader("Content-Disposition","attachment; filename=Laporan_Supplier(".date('d-m-Y').").xls");
        return view('page/supplier/export.php',$data);
    }
}
