<?php
helper('html');
helper('form');
helper('date');
$session = session(); 
$iconpenyimpanan = 'images/sd-card.png';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html>
    <head>
        <?= link_tag('css/normalize.min.css') ?>
        <?= link_tag('css/cake.css') ?>
        <?= link_tag('css/font-awesome-4/font-awesome-4.7/css/font-awesome.css') ?>  
        <?= link_tag('css/home.css') ?> 
        <?= link_tag('css/style.css') ?> 
        <?= link_tag('css/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css') ?> 
        <?= link_tag('css/sweetalert.css') ?> 
        <?= link_tag('css/datatables.css') ?> 
        <?= link_tag('css/showload.css') ?>
        <?= link_tag('css/jquery.mobile.datepicker.css') ?>
        <?= link_tag('css/jquery.mobile.datepicker.theme.css') ?>
         <?= link_tag('css/daterangepicker.css') ?>
        <?= script_tag('js/jquery.js')?>
        <?= script_tag('js/jquery-1.11.1.min.js')?>  
    <script>
        $(document).bind("mobileinit", function(){
       $.mobile.ajaxEnabled= false;
    });
    </script>
    <?= script_tag('js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js')?>
    <?= script_tag('js/sweetalert.min.js')?>
    <?= script_tag('js/external/jquery-ui/datepicker.js')?>
    <?= script_tag('js/jquery.mobile.datepicker.js')?>
    <?= script_tag('js/showload.js')?>
    <?= script_tag('js/datatables.js')?>
    <?= script_tag('js/dist/jquery.validate.js')?>
    
    <?= script_tag('js/moment.js')?>
    <?= script_tag('js/daterangepicker.js')?>
    
    </head> 
    <style>
        .controlgroup-textinput{
    padding-top:.10em;
    padding-bottom:.10em;
}
.ui-datepicker {
width: 17em; /*what ever width you want*/
}
.button-wrap {
    margin-left: 5px;
    margin-right: 5px;
}

.ui-icon-myicon:after {
   background-image: url("data:image/svg+xml,%3Csvg id='Capa_1' enable-background='new 0 0 497 497' height='512' viewBox='0 0 497 497' width='512' xmlns='http://www.w3.org/2000/svg'%3E%3Cg%3E%3Cpath d='m413.5 0h-30v497h30c16.57 0 30-13.43 30-30v-437c0-16.57-13.43-30-30-30z' fill='%23496585'/%3E%3Cpath d='m413.5 30c0-16.57-13.43-30-30-30h-240c-16.569 0-30 13.431-30 30v150l-51.213 51.213c-5.626 5.626-8.787 13.257-8.787 21.213v25.074c0 4.142 3.358 7.5 7.5 7.5h22.5v60l-21.213 21.213c-5.626 5.626-8.787 13.257-8.787 21.213v79.574c0 16.569 13.431 30 30 30h300c16.569 0 30-13.431 30-30l-60-128.5 60-128.5v-30l-30-75z' fill='%235a7ba0'/%3E%3Cg fill='%23ffe17c'%3E%3Cpath d='m293.5 30h45v150h-45z'/%3E%3Cpath d='m368.5 30h45v150h-45z'/%3E%3Cpath d='m143.5 30h45v150h-45z'/%3E%3Cpath d='m218.5 30h45v150h-45z'/%3E%3C/g%3E%3Cpath d='m413.5 467h-30l-90-128.377 90-128.623h30z' fill='%233a4e66'/%3E%3Cpath d='m143.5 210h240v257h-240z' fill='%23496585'/%3E%3C/g%3E%3C/svg%3E");
    /* Make your icon fit */
    background-size: 18px 18px;
}
    </style>
    <body> 
  
        
   
    
 <div data-role="popup" id="popuparsip" data-theme="b">
    <ul data-role="listview" data-inset="true" style="min-width:210px;">
            <li data-role="list-divider">Pilih Arsip</li>
             <li>
                    <a data-textonly="false" data-textvisible="true" data-msgtext="Memuat.."  href="<?= site_url('pages/suratmasuk'); ?>" rel="external" class="ui-btn ui-shadow ui-corner-all ui-icon-mail ui-btn-icon-left show-page-loading-msg" id="pageaspek">Surat Masuk</a>
                </li>
                <li>
                    <a data-textonly="false" data-textvisible="true" data-msgtext="Memuat.."  href="<?= site_url('pages/suratkeluar'); ?>" rel="external" class="ui-btn ui-shadow ui-corner-all ui-icon-mail ui-btn-icon-left show-page-loading-msg" id="pagekriteria">Surat Keluar</a>
                </li>
                <li>
                     <a data-textonly="false" data-textvisible="true" data-msgtext="Memuat.." data-inline="true" href="<?= site_url('pages/penyimpanan'); ?>"  rel="external" class="ui-btn ui-shadow ui-corner-all ui-icon-tag ui-btn-icon-left show-page-loading-msg" id="pagealternatif">Penyimpanan RAK</a>
                </li>
        </ul>
</div>  
    

    
 <div data-role="popup" id="popupfile" >
    <div data-role="collapsibleset" data-theme="b" data-content-theme="a" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d" style="margin:0; width:250px;">
        <div data-role="collapsible" data-inset="false">
        <h2>File</h2>
            <ul data-role="listview">
                <li>
                    <a data-textonly="false" data-textvisible="true" data-msgtext="Memuat.."  href="<?= site_url('pages/sejarah'); ?>" rel="external" class="ui-btn ui-shadow ui-corner-all ui-icon-mail ui-btn-icon-left show-page-loading-msg" id="pageaspek">Sejarah</a>
                </li>
                <li>
                    <a data-textonly="false" data-textvisible="true" data-msgtext="Memuat.."  href="<?= site_url('pages/visimisi'); ?>" rel="external" class="ui-btn ui-shadow ui-corner-all ui-icon-mail ui-btn-icon-left show-page-loading-msg" id="pagekriteria">Visi Misi</a>
                </li>
                <li>
                     <a data-textonly="false" data-textvisible="true" data-msgtext="Memuat.." data-inline="true" href="<?= site_url('pages/stukturorganisasi'); ?>"  rel="external" class="ui-btn ui-shadow ui-corner-all ui-icon-tag ui-btn-icon-left show-page-loading-msg" id="pagealternatif">Stuktur Organisasi</a>
                </li>
            </ul>
        </div><!-- /collapsible -->
    </div><!-- /collapsible set -->
</div><!-- /popup -->    

 <div data-role="popup" id="popuplaporan" data-theme="none">
    <div data-role="collapsibleset" data-theme="b" data-content-theme="a" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d" style="margin:0; width:250px;">
        <div data-role="collapsible" data-inset="false">
        <h2>Laporan</h2>
            <ul data-role="listview">
                <li>
                    <a data-textonly="false" data-textvisible="true" data-msgtext="Memuat.."  href="<?= site_url('pages/laporansuratmasuk'); ?>" rel="external" class="ui-btn ui-shadow ui-corner-all ui-icon-star ui-btn-icon-left show-page-loading-msg" id="pageprofile">Laporan Surat Masuk</a>
                </li>
                <li>
                                        <a data-textonly="false" data-textvisible="true" data-msgtext="Memuat.."  href="<?= site_url('pages/laporansuratkeluar'); ?>" rel="external" class="ui-btn ui-shadow ui-corner-all ui-icon-star ui-btn-icon-left show-page-loading-msg" id="pageprofile">Laporan Surat Keluar</a>
                </li>
             
            </ul>
        </div><!-- /collapsible -->
    </div><!-- /collapsible set -->
</div><!-- /popup -->    
        
        
        
      <div data-role="popup" id="popuppesan" data-overlay-theme="b" data-theme="b" data-dismissible="false" style="max-width:400px;">
    <div data-role="header" data-theme="a">
    </div>
    <div role="main" class="ui-content">
        <p><span id="infoflash"></span></p>
    <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">OK</a>
    </div>
</div>  
<script>
$.datepicker.setDefaults({dateFormat: 'dd-mm-yy'}); 
$( function() {
    $( "#popuppesan" ).popup();
});

$( function() {
    $( "#popuparsip" ).enhanceWithin().popup();
      $( "#popuplaporan" ).enhanceWithin().popup();
        $( "#popupfile" ).enhanceWithin().popup();
});
</script>
<script>
// assumes you're using jQuery
$(document).ready(function() {
$( "#popuppesan" ).popup( "close" ); 
<?php if($session->getFlashdata('item')){ ?>
$('#infoflash').html('<?php echo $session->getFlashdata('item'); ?>');
$( "#popuppesan" ).popup( "open" ); 
<?php } ?>
});
</script>