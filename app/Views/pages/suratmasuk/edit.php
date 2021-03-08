<?php
helper('form');
$datapengguna = user()->toArray();
$imageProperties = [
    'src'    => 'images/logo-300.png',
    'alt'    => 'disdukpil',
    'class'  => 'popphoto',
    'width'  => '200',
    'height' => '80',
    'title'  => 'disduk'
];
$options = [
    date('Y') =>  date('Y'),
        date('Y')-1    => date('Y')-1
];
?>


<div data-role="page" id="index" >
       <div data-role="header"  >
           <center> <?php echo img($imageProperties); ?></center>
<h1>APLIKASI ARSIP</h1>
<a  data-iconpos="notext"></a>
    <?php if (!empty(user())) { ?>
<a href="#panelprofile" data-icon="user" data-iconpos="notext">Profile</a>
<div data-role="panel" data-position="right" data-position-fixed="true" data-display="overlay" data-theme="a" id="panelprofile">
<div class="ui-body ui-body-a">
    <div class="ui-bar-a ui-bar" align="center">Informasi Pengguna</div>
    <br>
    <div class="" align="center">
    </div>
    <table class="ui-table ui-responsive table-stroke table-stripe">
           <tr>
    <td><i class="fa fa-address-card" style="color:#8DD9D4"></i> 
<?= $datapengguna['username'] ?>
    </td>        
        </tr> 
        <tr>
            <td><i class="fa fa-inbox" style="color:#8DD9D4"></i> 
              <?= strtoupper($datapengguna['bagian']) ?>  
            </td>
        </tr>
    </table>
       <div class="ui-grid-solo"> 
        <div class="ui-block-a text-center">
<a href="<?= site_url('pages')?>" rel="external" class="ui-btn ui-btn ui-btn-icon ui-icon-home  ui-shadow ui-corner-all ui-mini ui-btn-icon-notext show-page-loading-msg"></a>


        </div>
    </div>
</div>  
</div> 
<?php } ?>
    <div data-role="navbar">
        <ul>
            <li><a href="#popupfile" data-rel="popup" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-bars ui-btn-icon-left ui-btn-b" >File</a></li>
            <li> <a href="#popuparsip" data-rel="popup" data-transition="slideup" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-myicon ui-btn-icon-left ui-btn-a">Arsip</a>
</li>
            <li><a href="#popuplaporan" data-rel="popup" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-bars ui-btn-icon-left ui-btn-b" data-transition="pop">Laporan</a></li>
            <li>          
           <a href="<?= site_url('logout')?>" rel="external"  class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-power ui-btn-icon-left " >Keluar</a>
                
            </li>
        </ul>
    </div><!-- /navbar -->
</div><!-- /header -->   
   

<div role="main" class="ui-content" data-role="content">
<div data-role="header" style="overflow:hidden;">
<h1>Edit Surat Masuk</h1>
<a href="" rel="external" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-btn-icon-left ui-icon-arrow-l ui-btn-b">Kembali</a>

</div>
        <?php
echo form_fieldset('');
echo form_open();
?>
        <div class="ui-grid-a">
            <div class="ui-block-a">
                <?php
                
                echo form_input('tgl_surat', date('d-m-Y',strtotime($suratmasuk->tgl_surat)),['placeholder'=>'Tanggal Surat','data-role'=>'date','data-mini'=>"true"]);
                echo form_input('tgl_diterima', date('d-m-Y',strtotime($suratmasuk->tgl_diterima)),['placeholder'=>'Tanggal Diterima','data-role'=>'date','data-mini'=>"true"]);
                echo form_dropdown('tahun_arsip',$options, "$suratmasuk->tahun_arsip",['placeholder'=>'Tahun Arsip','data-mini'=>"true"]);
                echo form_input('perihal_surat', "$suratmasuk->perihal_surat",['placeholder'=>'Perihal Surat','data-mini'=>"true"]);
                echo form_input('jenis_surat', "$suratmasuk->jenis_surat",['placeholder'=>'Jenis Surat','data-mini'=>"true"]);
                ?>
            </div>
             <div class="ui-block-b">
                <?php
                echo form_input('no_surat', "$suratmasuk->no_surat",['placeholder'=>'Nomor Surat','data-mini'=>"true"]);

echo form_input('instansi_asal', "$suratmasuk->instansi_asal",['placeholder'=>'Instansi Asal','data-mini'=>"true"]);
echo form_textarea('keterangan_surat', "$suratmasuk->keterangan_surat",['placeholder'=>'Keterangan Surat','data-mini'=>"true"]);
echo form_textarea('isi_surat', "$suratmasuk->isi_surat",['placeholder'=>'Isi Surat','data-mini'=>"true"]);
                
                
                
                ?>
            </div>
        </div> 
          <div class="ui-grid-solo">
            <div class="ui-block-a">
                <?php
                echo "<label for='text-basic'>Kode Bok:</label>";
                echo form_dropdown('kd_bok', $opsibok,$suratmasuk->kd_bok,['placeholder'=>'Kode Bok','onchange'=>"carirak()",'id'=>"no_bok",'data-mini'=>"true"]);
                 echo "<label for='text-basic'>Kode RAK:</label>";
                 ?>
                <select name="kd_rak" data-mini="true" id="no_rak"> 
                <option disabled="true">Pilih Rak</option>
                <?php  foreach($opsirak as $opsirak): ?>
                <option value="<?= $opsirak->kd_rak?>" <?php echo  $opsirak->kd_rak===$suratmasuk->kd_rak?'selected':'' ?>><?= $opsirak->kd_rak?> - <?= $opsirak->nama_rak?></option>
               <?php  endforeach;?>
            </select>
                <?php
                 echo "<label for='text-basic'>Warna Sampul:</label>";
                echo form_input('warna_sampul', "$suratmasuk->warna_sampul",['placeholder'=>'Warna Sampul','data-mini'=>"true"]);
                ?>
            </div>
        </div>  
<?php
echo form_submit('submit','Simpan');
echo form_close();
echo form_fieldset_close();
?>    
</div>

<script>
 $(document).ready(function(){
              	$("#CloseForm").validate();
          });  





    function carirak(){
        var nilairak = $("#no_bok").val();
        var $ul =  $("#no_rak");
         var html = '<option disabled="true" selected="true">Pilih Rak</option>';
        $.ajax({
        method: "GET",
        url: "<?= site_url('rak/getdatarak'); ?>",
        data: { kdbok: nilairak }
      })
        .done(function( msg ) {
       //   alert( "Data Saved: " + msg );
  $.each( msg, function ( i, val ) {
        html += "<option  value="+"'"+val.kd_rak+"'"+">" + val.kd_rak +"-"+val.nama_rak+ "</option>";
                });
                console.log(html);
                $ul.empty().append(html);
               
        });
    }   
</script>



</div>


