<?php namespace App\Models;

use CodeIgniter\Model;

class TblSuratmasukModel extends Model
{

    protected $table      = 'tbl_suratmasuk';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
             'tgl_surat', 'tgl_diterima', 'tahun_arsip','perihal_surat','jenis_surat','no_surat','instansi_asal','keterangan_surat','tgl_diterima'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'created';
    protected $updatedField  = 'modified';

    protected $validationRules    = [
                'no_surat'=>'required'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}