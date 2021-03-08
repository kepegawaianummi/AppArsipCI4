<?php
namespace App\Controllers;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Rak extends BaseController{
    
    
    public function __construct() {
        
    }
    
    public function getdatarak(){
        $db = \Config\Database::connect();
        $kodebok = $this->request->getGet('kdbok');
        $tabelrak = $db->table('tbl_rak')->getWhere(['kd_bok'=>$kodebok])->getResultArray();
        return $this->response->setJSON($tabelrak);
    }
    
    
    public function delete($id = null){
        $session = session(); 
        if($id !== null){
        $db = \Config\Database::connect();
        $table = $db->table('tbl_rak');
        try{
           $table->delete(['id' => $id]);
           $session->setFlashdata('item', 'Berhasil Menghapus Data'); 
        } catch (\CodeIgniter\HTTP\Exceptions $ex){
           $session->setFlashdata('item', 'Gagal Menghapus Data'); 
        }
          return redirect()->to(base_url('pages/suratkeluar'));
        } 
        
    }
    
}