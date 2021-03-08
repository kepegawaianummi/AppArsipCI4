<?php
namespace App\Controllers;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Suratkeluar extends BaseController{
    
    
    public function __construct() {
        
    }
    
  
    
    public function delete($id = null){
        $session = session(); 
        if($id !== null){
        $db = \Config\Database::connect();
        $table = $db->table('tbl_suratkeluar');
        try{
           $table->delete(['id' => $id]);
           $session->setFlashdata('item', 'Berhasil Menghapus Data'); 
        } catch (\CodeIgniter\HTTP\Exceptions $ex){
           $session->setFlashdata('item', 'Gagal Menghapus Data'); 
        }
          return redirect()->to(base_url('pages/suratkeluar'));
        } 
        
    }
    
    
    public function downloadsurat(){
        $rentang = $this->request->getPost('rentangtanggal');
        $db = \Config\Database::connect();
        $table = $db->table('tbl_suratkeluar');
          if($rentang){
                $pecahjaraktanggal = explode('-', $rentang);
                $mulaitgl = date('Y-m-d', strtotime($pecahjaraktanggal[0]));
                $sampaitgl = date('Y-m-d', strtotime($pecahjaraktanggal[1]));
                }
                $getdata = $table;
                if($rentang){
                $getdata->where('tgl_surat >=', $mulaitgl);
                $getdata->where('tgl_surat <=', $sampaitgl);
                }
                $sediakandata = $getdata->get()->getResultObject();
//return var_dump($sediakandata);
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load("template/tlsuratkeluar.xlsx");
            $sheet = $spreadsheet->getActiveSheet();
            // manually set table data value
            $sheet->setCellValue('A2', "Tanggal $mulaitgl s.d $sampaitgl");
            $no =1;
            $barisdata = 4;
          foreach($sediakandata as $key => $data){		
              $sheet
                 ->setCellValue('A'.$barisdata, $no++)
                 ->setCellValue('B'.$barisdata, $data->no_surat)
                 ->setCellValue('C'.$barisdata, $data->tgl_surat)
		 ->setCellValue('D'.$barisdata, $data->tgl_diterima)
                 ->setCellValue('E'.$barisdata, $data->tahun_arsip)
                 ->setCellValue('F'.$barisdata, $data->perihal_surat) 
                 ->setCellValue('G'.$barisdata, $data->isi_surat)
                 ->setCellValue('H'.$barisdata, $data->instansi_asal)
                      ->setCellValue('I'.$barisdata, $data->keterangan_surat)
                      ->setCellValue('J'.$barisdata, $data->jenis_surat)
                      ;
              $barisdata++;
          }
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'Laporan Surat Keluar'; // set filename for excel file to be exported
 
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');	// download file 
       
    }
    
    
}