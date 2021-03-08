<?php namespace App\Entities;

use CodeIgniter\Entity;

class TblSuratmasuk extends Entity
{
    protected $table         = 'tbl_suratkeluar';
    protected $allowedFields = [
        'tgl_surat', 'tgl_diterima', 'tahun_arsip','perihal_surat','jenis_surat','no_surat','instansi_asal','keterangan_surat','tgl_diterima'
    ];
    protected $returnType    = 'App\Entities\Aspek';
    protected $useTimestamps = true;
    
    
    /* public function isValidProsentase($value){
     
    }*/
    
}