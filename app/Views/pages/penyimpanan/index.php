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

$folderimage = [
    'src'    => 'images/open-box.png',
    'alt'    => 'disdukpil',
    'class'  => 'popphoto',
    'style'=>'margin:8px',
    'width'  => '150px',
    'height' => '80px',
    'title'  => 'disduk'
];

$folderimagemini = [
    'src'    => 'images/open-box.png',
    'alt'    => 'disdukpil',
    'class'  => 'popphoto',
    'style'=>'margin:0px',
    'width'  => '30',
    'height' => '30',
    'title'  => 'disduk'
];
$sdcardmini = [
    'src'    => 'images/sd-card.png',
    'alt'    => 'disdukpil',
    'class'  => 'popphoto',
    'style'=>'margin:0px',
    'width'  => '30',
    'height' => '30',
    'title'  => 'disduk'
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


    <!-- Main -->
    

<div data-role="popup" id="popupbox" data-theme="a" data-dismissible="false" class="ui-corner-all" style="max-width:400px;width:400px">
    <form method="post">
        <div style="padding:10px 20px;">
            <div class="ui-bar ui-bar-a">
            <h3>FORM TAMBAH BOK</h3>
            </div>
            <label for="un" class="ui-hidden-accessible">Kode Bok:</label>
            <input type="text" name="kd_bok" id="un" value="" placeholder="Kode Bok" data-theme="a" required="true">
            <label for="pw" class="ui-hidden-accessible">Nama Bok:</label>
            <input type="text" name="nama_bok" id="pw" value="" placeholder="Nama Bok" data-theme="a" required="true">
            <button type="submit" class="ui-btn ui-corner-all ui-btn-inline ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check ui-mini">Simpan</button>
        <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b ui-btn-icon-left ui-icon-delete ui-mini" data-rel="back">Tutup</a>
        </div>
</form>
</div>
    
    
    
       <div role="main" class="ui-content" data-role="content">
<div class="ui-body ui-body-a ui-corner-all">
<div class="ui-corner-all custom-corners">
    <div class="ui-bar ui-bar-a">
        <h1><?php echo img($sdcardmini); ?>Penyimpanan > <?php echo img($folderimagemini); ?>BOK</h1>
    </div>
    <div class="ui-body ui-body-a">  
        <div data-role="controlgroup" data-type="horizontal">
    <a href="#popupbox"  data-rel="popup" data-position-to="window" class=" ui-btn  ui-btn-b ui-corner-all ui-shadow ui-btn-inline ui-icon-plus ui-btn-icon-left ui-btn-a ui-mini" data-transition="pop">TAMBAH</a>
</div>

<ul data-role="listview"  data-filter="true" data-inset="true" data-mini="true">
      <?php foreach ($bok as $bok): ?>
    <li><a href="<?= site_url('pages/rak/'.$bok->kd_bok); ?>">
      <?php echo img($folderimage); ?>
        <h2><?= $bok->kd_bok ?></h2>
    <p><?= $bok->nama_bok ?></p></a>
    </li>
   <?php endforeach; ?>
</ul>
    </div>
</div>
</div>
</div>
    
</div>

