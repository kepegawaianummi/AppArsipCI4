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
?>  

<div data-role="page" id="home" >
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
    
       <div role="main" class="ui-content" data-role="content" >
    <div class="se-pre-con"></div>
<div class="ui-body ui-body-a ui-corner-all">
<div class="ui-corner-all custom-corners">
    <div class="ui-bar ui-bar-a">
        <h3>Laporan Surat Masuk</h3>
    </div>
    <div class="ui-body ui-body-a">
               <?php
echo form_fieldset('');
echo form_open(site_url('Suratmasuk/downloadsurat/'));
?>
            <label>Pilih Rentang Laporan</label>
          <input type="text" name="rentangtanggal" value='' />
          
          <hr>
          <button type="submit" class="ui-btn ui-corner-all ui-btn-icon ui-btn-icon-left ui-icon-clock">Download</button>
     <?php
echo form_close();
echo form_fieldset_close();
?> 
    </div>
</div>
</div>
</div>

</div>

<script type="text/javascript">
$(function() {

  $('input[name="rentangtanggal"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="rentangtanggal"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
  });

  $('input[name="rentangtanggal"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>



