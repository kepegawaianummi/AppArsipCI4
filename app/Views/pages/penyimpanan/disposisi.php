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
$stampimage = [
    'src'    => 'images/stamp.png',
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


$stampimagemini = [
    'src'    => 'images/stock.png',
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
    
       <div role="main" class="ui-content" data-role="content">
<div class="ui-body ui-body-a ui-corner-all">
<div class="ui-corner-all custom-corners">
    <div class="ui-bar ui-bar-a">
               <h1 data-position="left"><?php echo img($sdcardmini); ?>Penyimpanan  > <?php echo img($folderimagemini); ?> BOK : <?= $kode_bok ?> > <?php echo img($stampimagemini); ?> RAK : <?= $kode_rak ?> </h1>
    </div>
    <div class="ui-body ui-body-a">  
          <div data-role="controlgroup" data-type="horizontal">
             <a data-rel="back"  class=" ui-btn  ui-btn-b ui-corner-all ui-shadow ui-btn-inline ui-icon-carat-l ui-btn-icon-left ui-btn-a ui-mini" >Kembali</a>
</div>
        
        <div class="ui-grid-a">
            <div class="ui-block-a">
                <ul data-role="listview" data-autodividers="true" data-filter="true" data-inset="true">
         <?php foreach ($disposisisuratmasuk as $disposisi): ?>
    <li data-role="list-divider">Thursday, October 7, 2010 <span class="ui-li-count">1</span></li>
     <li>    
         
         <a href="#">
                 <?php echo img($stampimage); ?>
            <h2><?= $disposisi->no_surat ?></h2>
    <p><strong>Perihal : <?= $disposisi->perihal_surat?></strong></p>
    <p><?= $disposisi->isi_surat?></p>
    <p class="ui-li-aside"><?= $disposisi->tgl_surat?></p>
        </a></li>
      <?php endforeach; ?>
</ul>
            </div>
            <div class="ui-block-b">
                <ul data-role="listview" data-autodividers="true" data-filter="true" data-inset="true">
         <?php foreach ($disposisisuratkeluar as $disposisi): ?>
    <li data-role="list-divider">Thursday, October 7, 2010 <span class="ui-li-count">1</span></li>
     <li>    
         
         <a href="#">
                 <?php echo img($stampimage); ?>
            <h2><?= $disposisi->no_surat ?></h2>
    <p><strong>Perihal : <?= $disposisi->perihal_surat?></strong></p>
    <p><?= $disposisi->isi_surat?></p>
    <p class="ui-li-aside"><?= $disposisi->tgl_surat?></p>
        </a></li>
      <?php endforeach; ?>
</ul>
            </div>
        </div>

        
    </div>
</div>
</div>
</div>
    
</div>