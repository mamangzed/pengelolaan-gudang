<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Gudang extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data barang',
            'gudang' => $this->gudang->findAll(),
            'user' => $this->user->userDetail(session()->get('user_id')),
            'laporan' => false
        ];
        return view('gudang/index.php',$data);
    }

    public function add()
    {
        $kdbarang = $this->gudang->orderBy('id','DESC')->first();        
        $kode = $kdbarang['kode_barang'];
        
        
        $urut = substr($kode, 8, 3);
        $tambah = (int) $urut + 1;
        $bulan = date("m");
        $tahun = date("y");
        
        if(strlen($tambah) == 1){
            $format = "BAR-".$bulan.$tahun."00".$tambah;
        } else if(strlen($tambah) == 2){
            $format = "BAR-".$bulan.$tahun."0".$tambah;
            
        } else{
            $format = "BAR-".$bulan.$tahun.$tambah;
        
        }
        $data = [
            'title' => 'Data barang',
            'jenis' => $this->jenisBarang->findAll(),
            'user' => $this->user->userDetail(session()->get('user_id')),
            'laporan' => false,
            'satuan' => $this->satuanBarang->findAll(),
            'format' => $format,
            'jumlah' => 0
        ];
        return view('gudang/tambah.php',$data);
    }

    public function actAdd()
    {
        $kodeBarang = $this->request->getPost('kode_barang');
        $namaBarang = $this->request->getPost('nama_barang');
        $jenisBarang = $this->request->getPost('jenis_barang');
        $jumlah = $this->request->getPost('jumlah');
        $satuan = $this->request->getPost('satuan');
        $simpan = $this->gudang->insert([
            'kode_barang' => $kodeBarang,
            'nama_barang' => $namaBarang,
            'jenis_barang' => $jenisBarang,
            'jumlah' => $jumlah,
            'satuan' => $satuan
        ]);
        if($simpan){
            $this->session->setFlashdata('success',"Berhasil menambahkan data barang $namaBarang");
        }else{
            $this->session->setFlashdata('error',"Gagal menambahkan data barang $namaBarang");
        }
        return redirect()->route('gudang');
    }

    public function edit($id)
    {
        $wle = $this->gudang->find($id);
        if(!$wle){
            $this->session->setFlashdata('warning','Data tidak ditemukan');
            return redirect()->route('gudang');
            exit;
            die();
        }
        $data = [
            'title' => 'Edit data '.$wle['nama_barang'],
            'user' => $this->user->userDetail(session()->get('user_id')),
            'tampil' => $wle,
            'jenis' => $this->jenisBarang->findAll(),
            'satuan' => $this->satuanBarang->findAll(),
        ];
        return view('gudang/edit.php',$data);
    }

    public function actEdit()
    {
        dd($this->request->getPost());
        $id = $this->request->getPost('id_barang');

        $edit = $this->gudang->update($id,[
            'nama_barang' => $this->requst->getPost('nama_barang'),
            'jenis_barang' => $this->request->getPost('jenis_barang'),
            'satuan' => $this->requst->getPost('satuan')
        ]);
        if($edit){
            $this->session->setFlashdata('success','Berhasil edit data ');
        }else{
            $this->session->setFlashdata('warning','Gagal edit data');
        }
        return redirect()->route('gudang');
    }

    public function export()
    {
        $data = [
            'title' => 'Gudang',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'gudang' => $this->gudang->orderBy('id','DESC')->findAll(),
            'laporan' => true
        ];
        $this->respon->setHeader('Content-type','application/vnd-ms-excel');
        $this->respon->setHeader("Content-Disposition","attachment; filename=Laporan_Gudang(".date('d-m-Y').").xls");
        return view('page/gudang/export.php',$data);
    }

    public function laporan()
    {
        $data = [
            'title' => 'Laporan data gudang',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'gudang' => $this->gudang->orderBy('id','DESC')->findAll(),
            'laporan' => true
        ];
        return view('gudang/index.php',$data);
    }

    public function delete($id)
    {
        $hapus = $this->gudang->delete($id);
        $cari = $this->gudang->find($id);
        if(!$cari){
            $this->session->setFlashdata('warning','data barang tidak ditemukan');
        }elseif($hapus){
            $this->session->setFlashdata('success','Berhasil menghapus barang');
        }else{
            $this->session->setFlashdata('error','Gagal menghapus barang');
        }
        return redirect()->route('gudang');
    }
}
