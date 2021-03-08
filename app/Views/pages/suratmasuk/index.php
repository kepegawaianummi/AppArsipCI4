 <?php
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


$hiddenbok = ['type'=>'hidden','name'=> 'kd_bok','id'=>'hiddenkd_bok'];
$hiddenrak = ['type'=>'hidden','name'=> 'kd_rak','id'=>'hiddenkd_rak'];
$hiddenwarnasampul = ['type'=>'hidden','name'=> 'warna_sampul','id'=>'hiddenwarnasampul'];
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
   
 
    <!-- Main -->
    
       <div role="main" class="ui-content" data-role="content">
<div class="ui-body ui-body-a ui-corner-all">
<div class="ui-corner-all custom-corners">
    <div class="ui-bar ui-bar-a">
        <h3>Daftar Surat Masuk</h3>
    </div>
    <div class="ui-body ui-body-a">  
        <div data-role="controlgroup" data-type="horizontal" data-mini="true">
    <input type="text"  id="filterTable-input" data-type="search"  data-wrapper-class="controlgroup-textinput ui-btn">
  <!--  <a href="#tambah" class="ui-btn ui-corner-all">Cari</a>-->
    <a href="#tambah" class="ui-btn ui-corner-all">Tambah</a>
</div>
    <table id="tabelsuratmasuk" data-mini="true" data-role="table"  class="ui-body-d ui-shadow table-stripe ui-responsive" data-filter="true" data-input="#filterTable-input">
        <thead>
            <tr class="">
                <th scope="col"  ><?= 'Nomor Surat' ?></th>
                <th scope="col"  ><?= 'Tanggal Surat' ?></th>
                <th scope="col"  style="vertical-align: middle"><?= 'Tanggal Diterima' ?></th>
                <th scope="col"  style="vertical-align: middle;"><?= 'Tahun Arsip' ?></th>
                <th scope="col" style="vertical-align: middle;"><?= 'Perihal' ?></th>
                <th scope="col" style="vertical-align: middle;"><?= 'Isi Surat' ?></th>
                <th scope="col" style="vertical-align: middle;"><?= 'Instansi Asal' ?></th>
                <th scope="col" style="vertical-align: middle;"><?= 'Keterangan' ?></th>
                <th scope="col" style="vertical-align: middle;"><?= 'Jenis Surat' ?></th>
                <th scope="col"  ><center><?= ('Pilihan') ?></center></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($datasurat as $surat): ?>
            <tr>
                <td><?= ($surat->no_surat) ?></td>
                <td><?= date('d-m-Y',strtotime($surat->tgl_surat)) ?></td>
                <td><?= date('d-m-Y',strtotime($surat->tgl_diterima)) ?></td>
                <td style="vertical-align: middle;"><?= ($surat->tahun_arsip) ?></td>
                <td style="vertical-align: middle;"><?= ($surat->perihal_surat) ?></td>
                <td style="vertical-align: middle;"><?= ($surat->isi_surat) ?></td>
                <td style="vertical-align: middle;"><?= ($surat->instansi_asal) ?></td>
                <td style="vertical-align: middle;"><?= ($surat->keterangan_surat) ?></td>
                <td style="vertical-align: middle;"><?= ($surat->jenis_surat) ?></td>
                <td >
                        <div data-role="controlgroup" data-type="horizontal" data-mini="true">
                <?=  anchor(site_url('Suratmasuk/delete/'.$surat->id), '', ['data-role'=>'button','class'=>'ui-shadow ui-corner-all ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext']); ?>               
                <?=  anchor(site_url("pages/editsuratmasuk/$surat->id"), '', ['data-role'=>'button','class'=>'uui-shadow ui-corner-all ui-btn ui-corner-all ui-icon-edit ui-btn-icon-notext','rel'=>'external']); ?>  
                    </div>
          </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    
</table>

    </div>
</div>
</div>
</div>
    
</div>




<div data-role="page" id="tambah" >
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
   
  
    <!-- Main -->
   
    
    
   

    
       <div role="main" class="ui-content" data-role="content">
                <?php
echo form_fieldset('');
echo form_open('',['id'=>'CloseForm']);
?>   
      <!-- Main -->
    <div data-role="popup" id="popuprak" data-theme="a" data-dismissible="false" class="ui-corner-all" style="max-width:400px;width:400px">
   <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a>
        <div style="padding:10px 20px;">
             <div class="ui-bar ui-bar-a">
            <h3>Input Penyimpanan RAK</h3>
            </div>
            <select name="kd_bok" data-mini="true" onchange="carirak()" id="no_bok" required="true">
                <option disabled="true" selected="true">Pilih Box</option>
               <?php
                foreach($opsibok as $bok):?>
                 <option value="<?= $bok->kd_bok ?>"><?= $bok->kd_bok.'-'.$bok->nama_bok ?></option>
                <?php
                endforeach;   
            ?>
            </select>
            <label for="un" class="ui-hidden-accessible">Nomor Rak:</label>
              <select name="kd_rak" data-mini="true" id="no_rak" required="true">
                <option disabled="true" selected="true">Pilih Rak</option>
               
            </select>
            <label for="pw" class="ui-hidden-accessible">Warna Sampul:</label>
            <input type="text" data-mini="true" name="warna_sampul" id="warna_sampul" value="" placeholder="Warna Sampul" data-theme="a" required="true">
            <a href="#" id="popupCloseSubmit" data-role="button"  data-rel="back" class=""
            data-mini="true" data-theme="b" type="button">SIMPAN</a>
        </div>

</div>             
<div class="ui-body ui-body-a ui-corner-all">
<div class="ui-corner-all custom-corners">
    <div class="ui-bar ui-bar-a">
        <h3>Tambah Surat Masuk</h3>
    </div>
    <div class="ui-body ui-body-a">

        <div class="ui-grid-a">
            <div class="ui-block-a">
                <?php   
                echo form_input($hiddenbok);
                echo form_input($hiddenrak);
                echo form_input($hiddenwarnasampul);
                echo form_input('tgl_surat', '',['placeholder'=>'Tanggal Surat','data-role'=>'date','data-mini'=>"true",'required'=>'true']);
                echo form_input('tgl_diterima', '',['placeholder'=>'Tanggal Diterima','data-role'=>'date','data-mini'=>"true",'required'=>'true']);
                ?>
                <?php
                echo form_dropdown('tahun_arsip',$options,'',['data-mini'=>'true']);
                echo form_input('perihal_surat', '',['placeholder'=>'Perihal Surat','data-mini'=>"true",'required'=>'true']);
                echo form_input('jenis_surat', '',['placeholder'=>'Jenis Surat','data-mini'=>"true",'required'=>'true']);
                ?>
            </div>
             <div class="ui-block-b">
                <?php
                echo form_input('no_surat', '',['placeholder'=>'Nomor Surat','data-mini'=>"true",'required'=>'true','id'=>'no_surat']);
echo form_input('instansi_asal', '',['placeholder'=>'Instansi Asal','data-mini'=>"true"]);
echo form_textarea('keterangan_surat', '',['placeholder'=>'Keterangan Surat','data-mini'=>"true"]);
echo form_textarea('isi_surat', '',['placeholder'=>'Isi Surat','data-mini'=>"true"]);                                              
                ?>
            </div>
        </div>        

    </div>
</div>
    
    
    
    
    
</div>
       <?php

echo form_close();
echo form_fieldset_close();
?> 
         <a href="#popuprak" id="tambahpopup"  data-rel="popup" data-position-to="window" class=" ui-btn  ui-btn-b ui-corner-all ui-shadow  ui-icon-plus ui-btn-icon-left ui-btn-a ui-mini" data-transition="pop">TAMBAH</a>

</div>
     
 
        
        
        <script>
            $('#tambahpopup').click(function() {
      if($("#no_surat").val()===''){
                $("#popupCloseSubmit").prop('disabled', true).addClass("ui-disabled"); ; 
                $('[type="submit"]').button('disable');
             }else{
                    $("#popupCloseSubmit").prop('disabled', false).removeClass("ui-disabled"); ; 
                $('[type="submit"]').button('enable');
             }
});
        
            
          $(document).ready(function(){
              	$("#CloseForm").validate();
             if($("#no_surat").val()===''){
                $("#popupCloseSubmit").prop('disabled', true).addClass("ui-disabled"); 
                $('[type="submit"]').button('disable');
             } 
          });  
            
            
            
        $(document).on('pageinit', function () {
 var srclicked;
 $("#popupCloseSubmit").on("tap", srsubHandler);
   function srsubHandler(event) {
       srclicked = true;
   }
   $("#popuprak").on("popupafterclose", pcHandler);
   function pcHandler(event) {
    /*   $("#hiddenkd_bok").val() = $("#kd_bok").val();
       $("#hiddenkd_rak").val() = $("#kd_rak").val();
       $("#hiddenwarnasampul").val() = $("#warna_sampul").val();*/
        var nilaikdbok =  $("#no_bok").val();
        var nilaikdrak =  $("#no_rak").val();
        var nilaiwarna =  $("#warna_sampul").val();
        $("#hiddenkd_bok").val(nilaikdbok);
        $("#hiddenkd_rak").val(nilaikdrak);
        $("#hiddenwarnasampul").val(nilaiwarna);
       if (srclicked) {
          $("#CloseForm").submit();      
           srclicked = false;
        }
   }
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


