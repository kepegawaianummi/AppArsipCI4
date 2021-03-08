<?php
namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\TblSuratmasukModel;


class Pages extends BaseController {
    
    public $session;
    public function __construct() {
        $this->session = session();
     
    }

  //  public $session = session();
    
    public function index()
    {
        echo view('templates/header');
        echo view('pages/home');
        echo view('templates/footer');
	}
        
        
        
    
    public function view($page = null)
    {
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }
    
    
   
    
    
          public function suratmasuk()
    {
        $opsibok = null;
        $model = new TblSuratmasukModel();
        $db = \Config\Database::connect();
        $query = $db->table('tbl_suratmasuk');
        $tabelpenyimpanan = $db->table('tbl_penyimpanan');
        $tabelbok = $db->table('tbl_bok')->get()->getResultObject();
        $getdata = $query->get();
        $data = [
            'datasurat'=>$getdata->getResultObject(),
            'pager' => $model->pager,
            'opsibok' => $tabelbok
        ];
        echo view('templates/header');
        echo view('pages/suratmasuk/index', $data);
        echo view('templates/footer');
        if($this->request->getMethod()=== 'post'){
            $datasurat = [
                    'tgl_surat' => date("Y-m-d", strtotime($this->request->getPost('tgl_surat'))),
                    'tgl_diterima'  => date("Y-m-d", strtotime($this->request->getPost('tgl_diterima'))),
                    'tahun_arsip'  => $this->request->getPost('tahun_arsip'),
                    'perihal_surat'  => $this->request->getPost('perihal_surat'),
                    'jenis_surat'  => $this->request->getPost('jenis_surat'),
                    'no_surat'  => $this->request->getPost('no_surat').'SKM',
                    'instansi_asal'  => $this->request->getPost('instansi_asal'),
                    'keterangan_surat'  => $this->request->getPost('keterangan_surat'),
                    'isi_surat'  => $this->request->getPost('isi_surat')
                
            ];
             $penyimpanan = [
                    'no_surat'  => $datasurat['no_surat'],
                    'kd_bok'  => $this->request->getPost('kd_bok'),
                    'kd_rak'  => $this->request->getPost('kd_rak'),
                    'warna_sampul'  => $this->request->getPost('warna_sampul')
                
            ];
             
          //   return var_dump($penyimpanan);
        $simpandata = $query->insert($datasurat); 
        
        if($simpandata){
            $tabelpenyimpanan->insert($penyimpanan);
           return redirect()->to('suratmasuk');
        }
        }
    }
    
        public function editsuratmasuk($id=null){
           $opsibok = null;    
        $db = \Config\Database::connect();
        $getsuratmasuk = $db->table('tbl_suratmasuk')
                ->select('*')
                ->select('tbl_suratmasuk.id as idtblsuratmasuk')
                 ->select('tbl_penyimpanan.id as idtblpenyimpanan')
                ->join('tbl_penyimpanan', 'tbl_penyimpanan.no_surat=tbl_suratmasuk.no_surat')
                ->where(['tbl_suratmasuk.id'=>$id])
                ->get()->getFirstRow();
       
         $table_bok = $db->table('tbl_bok');
         $table_rak = $db->table('tbl_rak');
         $tabelbok = $table_bok->get()->getResultObject();
         $tabelrak = $table_rak->getWhere(['kd_bok'=>$getsuratmasuk->kd_bok])->getResultObject();
         if($tabelbok!==null){
        foreach ($tabelbok as $opsi){
            $opsibok[$opsi->kd_bok] = $opsi->kd_bok.' - '.$opsi->nama_bok;
         }
         
        }
        
         $data = [
            'suratmasuk'=>$getsuratmasuk,
             'opsibok'=>$opsibok,
             'opsirak'=>$tabelrak
                
        ];
     //  return var_dump($data);
        echo view('templates/header');
        echo view('pages/suratmasuk/edit',$data);
        echo view('templates/footer'); 
         if($this->request->getMethod()=== 'post'){
           $data = [
                    'id'=>$id,
                    'tgl_surat' => date("Y-m-d", strtotime($this->request->getPost('tgl_surat'))),
                    'tgl_diterima'  => date("Y-m-d", strtotime($this->request->getPost('tgl_diterima'))),
                    'tahun_arsip'  => $this->request->getPost('tahun_arsip'),
                    'perihal_surat'  => $this->request->getPost('perihal_surat'),
                    'jenis_surat'  => $this->request->getPost('jenis_surat'),
                    'no_surat'  => $this->request->getPost('no_surat'),
                    'instansi_asal'  => $this->request->getPost('instansi_asal'),
                    'keterangan_surat'  => $this->request->getPost('keterangan_surat'),
                    'isi_surat'  => $this->request->getPost('isi_surat')
                
            ];
             $penyimpanan = [
                    'id'=>$getsuratmasuk->idtblpenyimpanan,
                    'no_surat'  => $this->request->getPost('no_surat'),
                    'kd_bok'  => $this->request->getPost('kd_bok'),
                    'kd_rak'  => $this->request->getPost('kd_rak'),
                    'warna_sampul'  => $this->request->getPost('warna_sampul')
                
            ];
          try{
           $db->table('tbl_suratmasuk')->replace($data);
           $db->table('tbl_penyimpanan')->replace($penyimpanan);
           $this->session->setFlashdata('item', 'Berhasil menyimpan Data'); 
           return redirect()->to(site_url('pages/suratmasuk'));
        } catch (\CodeIgniter\HTTP\Exceptions $ex){
           $this->session->setFlashdata('item', 'Gagal menyimpan Data'); 
           return redirect()->to(site_url('pages/suratmasuk'));
        }
        }
    }
    
    
    
    
          public function suratkeluar(){
                  $opsibok = null;
        $model = new TblSuratmasukModel();
        $db = \Config\Database::connect();
        $query = $db->table('tbl_suratkeluar');
        $tabelpenyimpanan = $db->table('tbl_penyimpanan');
        $tabelbok = $db->table('tbl_bok')->get()->getResultObject();
        $getdata = $query->get();
        $data = [
            'datasurat'=>$getdata->getResultObject(),
            'pager' => $model->pager,
            'opsibok' => $tabelbok
        ];
        echo view('templates/header');
        echo view('pages/suratkeluar/index', $data);
        echo view('templates/footer');
        if($this->request->getMethod()=== 'post'){
            $datasurat = [
                    'tgl_surat' => date("Y-m-d", strtotime($this->request->getPost('tgl_surat'))),
                    'tgl_diterima'  => date("Y-m-d", strtotime($this->request->getPost('tgl_diterima'))),
                    'tahun_arsip'  => $this->request->getPost('tahun_arsip'),
                    'perihal_surat'  => $this->request->getPost('perihal_surat'),
                    'jenis_surat'  => $this->request->getPost('jenis_surat'),
                    'no_surat'  => $this->request->getPost('no_surat').'SKL',
                    'instansi_asal'  => $this->request->getPost('instansi_asal'),
                    'keterangan_surat'  => $this->request->getPost('keterangan_surat'),
                    'isi_surat'  => $this->request->getPost('isi_surat')
                
            ];
             $penyimpanan = [
                    'no_surat'  => $datasurat['no_surat'],
                    'kd_bok'  => $this->request->getPost('kd_bok'),
                    'kd_rak'  => $this->request->getPost('kd_rak'),
                    'warna_sampul'  => $this->request->getPost('warna_sampul')
                
            ];
             
          //   return var_dump($penyimpanan);
        $simpandata = $query->insert($datasurat); 
        
        if($simpandata){
            $tabelpenyimpanan->insert($penyimpanan);
           return redirect()->to('suratkeluar');
        }
        } 
    }
    
    
        public function editsuratkeluar($id=null){
         $opsibok = null;    
        $db = \Config\Database::connect();
        $getsuratkeluar = $db->table('tbl_suratkeluar')
                ->select('*')
                ->select('tbl_suratkeluar.id as idtblsuratmasuk')
                 ->select('tbl_penyimpanan.id as idtblpenyimpanan')
                ->join('tbl_penyimpanan', 'tbl_penyimpanan.no_surat=tbl_suratkeluar.no_surat')
                ->where(['tbl_suratkeluar.id'=>$id])
                ->get()->getFirstRow();
       
         $table_bok = $db->table('tbl_bok');
         $table_rak = $db->table('tbl_rak');
         $tabelbok = $table_bok->get()->getResultObject();
         $tabelrak = $table_rak->getWhere(['kd_bok'=>$getsuratkeluar->kd_bok])->getResultObject();
         if($tabelbok!==null){
        foreach ($tabelbok as $opsi){
            $opsibok[$opsi->kd_bok] = $opsi->kd_bok.' - '.$opsi->nama_bok;
         }
         
        }
        
         $data = [
            'suratkeluar'=>$getsuratkeluar,
             'opsibok'=>$opsibok,
             'opsirak'=>$tabelrak
                
        ];
     //  return var_dump($data);
        echo view('templates/header');
        echo view('pages/suratkeluar/edit',$data);
        echo view('templates/footer'); 
         if($this->request->getMethod()=== 'post'){
           $data = [
                    'id'=>$id,
                    'tgl_surat' => date("Y-m-d", strtotime($this->request->getPost('tgl_surat'))),
                    'tgl_diterima'  => date("Y-m-d", strtotime($this->request->getPost('tgl_diterima'))),
                    'tahun_arsip'  => $this->request->getPost('tahun_arsip'),
                    'perihal_surat'  => $this->request->getPost('perihal_surat'),
                    'jenis_surat'  => $this->request->getPost('jenis_surat'),
                    'no_surat'  => $this->request->getPost('no_surat'),
                    'instansi_asal'  => $this->request->getPost('instansi_asal'),
                    'keterangan_surat'  => $this->request->getPost('keterangan_surat'),
                    'isi_surat'  => $this->request->getPost('isi_surat')
                
            ];
             $penyimpanan = [
                    'id'=>$getsuratmasuk->idtblpenyimpanan,
                    'no_surat'  => $this->request->getPost('no_surat'),
                    'kd_bok'  => $this->request->getPost('kd_bok'),
                    'kd_rak'  => $this->request->getPost('kd_rak'),
                    'warna_sampul'  => $this->request->getPost('warna_sampul')
                
            ];
          try{
           $db->table('tbl_suratkeluar')->replace($data);
           $db->table('tbl_penyimpanan')->replace($penyimpanan);
           $this->session->setFlashdata('item', 'Berhasil menyimpan Data'); 
           return redirect()->to(site_url('pages/suratkeluar'));
        } catch (\CodeIgniter\HTTP\Exceptions $ex){
           $this->session->setFlashdata('item', 'Gagal menyimpan Data'); 
           return redirect()->to(site_url('pages/suratkeluar'));
        }
        }
    }
    
    
    
    
       public function penyimpanan()
    {
        $db = \Config\Database::connect();
        $query = $db->table('tbl_bok');
        $bok = $query->get()->getResultObject();
        $data = [
            'bok'=>$bok
            
        ];
        echo view('templates/header');
        echo view('pages/penyimpanan/index', $data);
        echo view('templates/footer');
        if($this->request->getMethod()=== 'post'){
           $data = [
                    'kd_bok'  => $this->request->getPost('kd_bok'),
                    'nama_bok'  => $this->request->getPost('nama_bok')
            ];
            
          $simpandata = $query->insert($data); 
        if($simpandata){
           return redirect()->to('penyimpanan');
        }
        }
    }
    
         public function rak($kodebok = null)
    {
        $agent = $this->request->getUserAgent();
        $db = \Config\Database::connect();
        $query = $db->table('tbl_rak');
        $rak = $query->getWhere(['kd_bok'=>$kodebok])->getResultObject();
        $data = [
            'rak'=>$rak,
            'kode_bok'=>$kodebok
        ];
        echo view('templates/header');
        echo view('pages/penyimpanan/rak', $data);
        echo view('templates/footer');
         if($this->request->getMethod()=== 'post'){
           $data = [
                    'kd_bok'  => $this->request->getPost('kd_bok'),
                    'kd_rak'  => $this->request->getPost('kd_rak'),
               'nama_rak'  => $this->request->getPost('nama_rak')
            ];
            
          $simpandata = $query->insert($data); 
        if($simpandata){
           return redirect()->to($agent->getReferrer());
        }
        }
        
        
        
        
    }
    
    
    
    
    
    
    
    
    
           public function disposisi($kodebok = null,$koderak = null)
    {
        $db = \Config\Database::connect();
        $query = $db->table('tbl_penyimpanan');
        $disposisisuratmasuk = $query->select('*')
                ->join('tbl_suratmasuk sm' , 'sm.no_surat=tbl_penyimpanan.no_surat')
             //   ->join('tbl_suratkeluar sk', 'sk.no_surat=tlbp.no_surat','left')
                ->where('tbl_penyimpanan.kd_bok',$kodebok)
                ->where('tbl_penyimpanan.kd_rak',$koderak)
                ->get()
                ->getResultObject();
        $disposisisuratkeluar = $query->select('*')
                ->join('tbl_suratkeluar sm' , 'sm.no_surat=tbl_penyimpanan.no_surat')
             //   ->join('tbl_suratkeluar sk', 'sk.no_surat=tlbp.no_surat','left')
                ->where('tbl_penyimpanan.kd_bok',$kodebok)
                ->where('tbl_penyimpanan.kd_rak',$koderak)
                ->get()
                ->getResultObject();
        $data = [
            'disposisisuratmasuk'=>$disposisisuratmasuk,
            'disposisisuratkeluar'=>$disposisisuratkeluar,
            'kode_bok'=>$kodebok,
            'kode_rak'=>$koderak
        ];
        
      //  return var_dump($disposisi);
        echo view('templates/header');
        echo view('pages/penyimpanan/disposisi', $data);
        echo view('templates/footer');
    }
    public function laporansuratmasuk(){
         $data = [];
        echo view('templates/header');
        echo view('pages/laporan/laporansuratmasuk');
        echo view('templates/footer'); 
         
    }
    
       public function laporansuratkeluar(){
         $data = [];
        echo view('templates/header');
        echo view('pages/laporan/laporansuratkeluar');
        echo view('templates/footer'); 
         
    }
    
 public function sejarah(){
         $data = [];
        echo view('templates/header');
        echo view('pages/sejarah/index');
        echo view('templates/footer'); 
         
    }
     public function visimisi(){
         $data = [];
        echo view('templates/header');
        echo view('pages/visimisi/index');
        echo view('templates/footer'); 
         
    }
     public function stukturorganisasi(){
         $data = [];
        echo view('templates/header');
        echo view('pages/stukturorganisasi/index');
        echo view('templates/footer'); 
         
    }
  
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

