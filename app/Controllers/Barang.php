<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    public function index()
    {
        echo 'Access Denied';
    }

    public function barangMasuk()
    {
        $data = [
            'title' => 'barang masuk',
            'barang' => $this->barangMasuk->findAll(),
            'user' => $this->user->userDetail(session()->get('user_id')),
            'laporan' => false
        ];
        return view('barang/barang-masuk.php',$data);
    }

    public function pageTambahBarangMasuk()
    {
        $barang = $this->barangMasuk->orderBy('id','DESC')->first();
        $kode = $barang['id_transaksi'];
        
        
        $urut = substr($kode, 8, 3);
        $tambah = (int) $urut + 1;
        $bulan = date("m");
        $tahun = date("y");
        
        
        if(strlen($tambah) == 1){
            $format = "TRM-".$bulan.$tahun."00".$tambah;
            // TRM-0622005
        
        } else if(strlen($tambah) == 2){
            $format = "TRM-".$bulan.$tahun."0".$tambah;
            
        } else{
            $format = "TRM-".$bulan.$tahun.$tambah;
        
        }

        $data = [
            'title' => 'Tambah barang masuk',
            'barang' => $this->barangMasuk->findAll(),
            'gudang' => $this->gudang->orderBy('kode_barang','ASC')->findAll(),
            'supplier' => $this->supplier->findAll(),
            'user' => $this->user->userDetail(session()->get('user_id')),
            'format' => $format,
            'tanggal_masuk' => date('Y-m-d')
        ];
        return view('barang/tambah-barang-masuk.php',$data);
    }

    public function aksiTambahBarangMasuk()
    {
        $barang= $this->request->getPost('barang');
		$pecah_barang = explode(".", $barang);
		$kode_barang = $pecah_barang[0];
		$nama_barang = $pecah_barang[1];
        $insert = $this->barangMasuk->insert([
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'tanggal' => $this->request->getPost('tanggal_masuk'),
            'kode_barang' => $kode_barang,
            'nama_barang' => $nama_barang,
            'pengirim' => $this->request->getPost('pengirim'),
            'jumlah' => $this->request->getPost('jumlahmasuk'),
            'satuan' => 'Pack',
        ]);
        if($insert){
            $this->session->setFlashdata('success','Berhasil menambahkan data barang masuk '.$nama_barang);
            return redirect()->route('barangMasuk');
        }else{
            $this->session->setFlashdata('error','Gagal menambahkan data barang masuk '.$nama_barang);
            return redirect()->route('barangMasuk');
        }
    }

    public function hapusBarangMasuk($id)
    {
        $hapus = $this->barangMasuk->delete($id);
        if($hapus){
            $this->session->setFlashdata('success','Berhasil menghapus data');
            return redirect()->route('barangMasuk');
        }else{
            $this->session->setFlashdata('error','Gagal menghapus data');
            return redirect()->route('barangMasuk');
        }
    }

    public function barangKeluar()
    {
        $data = [
            'title' => 'Barang keluar',
            'barang' => $this->barangKeluar->where('status',1)->orderBy('id','DESC')->findAll(),
            'user' => $this->user->userDetail(session()->get('user_id')),
            'laporan' => false
        ];
        return view('barang/barang-keluar.php',$data);
    }

    public function pageTambahBarangKeluar()
    {
        $barang = $this->barangKeluar->orderBy('id','DESC')->first();
        $kode = $this->barangKeluar->orderBy('id','DESC')->countAllResults() == null ? 'TRK-0722000' : $barang['id_transaksi'];
        
        
        $urut = substr($kode, 8, 3);
        $tambah = (int) $urut + 1;
        $bulan = date("m");
        $tahun = date("y");
        
        if(strlen($tambah) == 1){
            $format = "TRK-".$bulan.$tahun."00".$tambah;
        } else if(strlen($tambah) == 2){
            $format = "TRK-".$bulan.$tahun."0".$tambah;
            
        } else{
            $format = "TRK-".$bulan.$tahun.$tambah;
        
        }

        $data = [
            'title' => 'Tambah barang',
            'barang' => $this->barangKeluar->findAll(),
            'gudang' => $this->gudang->orderBy('kode_barang','ASC')->findAll(),
            'supplier' => $this->supplier->findAll(),
            'user' => $this->user->userDetail(session()->get('user_id')),
            'format' => $format,
            'tanggal_keluar' => date('Y-m-d')
        ];
        return view('barang/tambah-barang-keluar.php',$data);
    }

    public function hapusBarangKeluar($id)
    {
        $hapus = $this->barangKeluar->delete($id);
        if($hapus){
            $this->session->setFlashdata('success','Berhasil menghapus data');
            return redirect()->route('barangKeluar');
        }else{
            $this->session->setFlashdata('error','Gagal menghapus data');
            return redirect()->route('barangKeluar');
        }
    }

    public function aksiTambahBarangKeluar()
    {
        
        $barang= $this->request->getPost('barang');
		$pecah_barang = explode(".", $barang);
		$kode_barang = $pecah_barang[0];
		$nama_barang = $pecah_barang[1];
        $barangCok = $this->gudang->findTrx($kode_barang);
        $insert = $this->barangKeluar->insert([
            'user_nik' => $this->user->userDetail(session()->get('user_id'))->nik,
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'tanggal' => $this->request->getPost('tanggal_keluar'),
            'kode_barang' => $kode_barang,
            'nama_barang' => $nama_barang,
            'jumlah' => $this->request->getPost('jumlahkeluar'),
            'tujuan' => $this->request->getPost('tujuan'),
            'satuan' => $barangCok->satuan,
        ]);
        if($insert){
            $this->session->setFlashdata('success','Berhasil menambahkan data barang keluar '.$nama_barang);
            return redirect()->route('approveKeluar');
        }else{
            $this->session->setFlashdata('error','Gagal menambahkan data barang keluar '.$nama_barang);
            return redirect()->route('approveKeluar');
        }
    }

    public function laporanBarangMasuk()
    {
        $data = [
            'title' => 'Laporan barang Masuk',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'barang' => $this->barangMasuk->orderBy('id','DESC')->findAll(),
            'laporan' => true
        ];
        return view('barang/barang-masuk.php',$data);
    }

    public function laporanBarangKeluar()
    {
        $data = [
            'title' => 'Laporan barang keluar',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'barang' => $this->barangKeluar->orderBy('id','DESC')->findAll(),
            'laporan' => true
        ];
        return view('barang/barang-keluar.php',$data);
    }

    public function exportBarangMasuk()
    {
        $data = [
            'title' => 'Supplier',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'barang' => $this->barangMasuk->orderBy('id','DESC')->findAll(),
            'laporan' => true
        ];
        $this->respon->setHeader('Content-type','application/vnd-ms-excel');
        $this->respon->setHeader("Content-Disposition","attachment; filename=Laporan_Barang_Masuk(".date('d-m-Y').").xls");
        return view('page/barang_masuk/export.php',$data);
    }

    public function exportBarangKeluar()
    {
        $data = [
            'title' => 'Supplier',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'barang' => $this->barangKeluar->orderBy('id','DESC')->findAll(),
            'laporan' => true
        ];
        $this->respon->setHeader('Content-type','application/vnd-ms-excel');
        $this->respon->setHeader("Content-Disposition","attachment; filename=Laporan_Barang_Keluar(".date('d-m-Y').").xls");
        return view('page/barang_keluar/export.php',$data);
    }

    public function jenisBarang()
    {
        $data = [
            'title' => 'Jenis Barang',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'jenis' => $this->jenisBarang->orderBy('id','DESC')->findALL(),
        ];
        return view('barang/jenis-barang.php',$data);
    }
    
    public function tambahJenisBarang()
    {
        $data = [
            'title' => 'Tambah Jenis Barang',
            'user' => $this->user->userDetail(session()->get('user_id')),
        ];
        return view('barang/tambah-jenis-barang.php',$data);
    }

    public function actTambahJenisBarang()
    {
        $save = $this->jenisBarang->insert([
            'jenis_barang' => $this->request->getPost('jenis_barang')
        ]);
        if($save){
            $this->session->setFlashdata('success','Berhasil menyimpan jenis barang '.$this->request->getPost('jenis_barang'));
        }else{
            $this->session->setFlashdata('success','Berhasil menyimpan jenis barang '.$this->request->getPost('jenis_barang'));
        }
        return redirect()->route('jenisBarang');
    }

    public function approveKeluar()
    {
        $data = [
            'title' => 'Approve barang keluar',
            'user' => $this->user->userDetail(session()->get('user_id')),
            'barang' => $this->barangKeluar->where('status',0)->orderBy('id','DESC')->findALL(),
        ];
        return view('barang/approve-keluar.php',$data);
    }

    public function actApproveKeluar($id)
    {
        $cek = $this->barangKeluar->find($id);
        if(!$cek){
            $this->session->setFlashdata('warning','Data tidak ditemukan');
        }elseif($this->barangKeluar->update($id,[
            'status' => 1,
        ])){
            $this->session->setFlashdata('success','Berhasil menerima barang keluar');
        }else{
            $this->session->setFlashdata('error','Gagal menerima barang keluar');
        }
        return redirect()->route('approveKeluar');
    }
}
