
$(document).on('pagebeforecreate', '.spkpmpage', function(){     
    var interval = setInterval(function(){
        $.mobile.loading('show');       
    },1);
        clearInterval(interval);
});

$(document).on('pagebeforechange', '.spkpmpage', function(){     
    var interval = setInterval(function(){
        $.mobile.loading('show');       
    },1);  
         clearInterval(interval);
});

$(document).on('pagecontainerbeforeload', '.spkpmpage', function(){     
    var interval = setInterval(function(){
        $.mobile.loading('show');       
    },1); 
    clearInterval(interval);
});

$(document).on('pagecontainerload', '.spkpmpage', function(){  
    var interval = setInterval(function(){
        $.mobile.loading('hide');
       
    },1); 
     clearInterval(interval);
});


$(document).on("pagebeforecreate",".spkpmpage",function(){ 
    var interval = setInterval(function(){
        $.mobile.loading('show');
      
    },1); 
      clearInterval(interval);
});
     
$(document).on('pagebeforechange', '.spkpmpage', function(){     
    $("#pagealternatif,#pageaspek,#pagekriteria,#pageprofile,#pageperhitungan").on("vclick",function(){
    var interval = setInterval(function(){
        $.mobile.loading('show');
      
    },1);
      clearInterval(interval);
  });     
});

$(document).on('pagecontainerbeforeload', '.spkpmpage', function(){ 
    $("#pagealternatif,#pageaspek,#pagekriteria,#pageprofile,#pageperhitungan").on("vclick",function(){
    var interval = setInterval(function(){
        $.mobile.loading('show');
      
    },1); 
      clearInterval(interval);
});
});

$(document).on("pagebeforehide",".spkpmpage",function(){ // When leaving pagetwo
 var interval = setInterval(function(){
        $.mobile.loading('show');
      
    },1); 
      clearInterval(interval);
});

$(document).on("pagecreate",".spkpmpage",function(){
    var interval = setInterval(function(){
        $.mobile.loading('hide');
    
    },1); 
        clearInterval(interval);
});

$(document).on('pagechange', '.spkpmpage', function(){     
    var interval = setInterval(function(){
        $.mobile.loading('hide');
        $.mobile.ajaxEnabled = false;
     
    },1);
       clearInterval(interval);
});

$(document).on("pagecontainerloadfailed",function(event,data){
  swal({
  title: "Mohon Maaf !",
  text: "Session sudah Habis",
  type: "warning",
  showCancelButton: false,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Login ?",
  closeOnConfirm: false
},
function(){
  window.location.reload();
});  
    var interval = setInterval(function(){
        $.mobile.loading('hide');
        
    },1);
    clearInterval(interval);
});

$(document).on('pagecontainerload', '.spkpmpage', function(){ 
    var interval = setInterval(function(){
        $.mobile.loading('hide');
   
    },1); 
         clearInterval(interval);
});

$(document).on('pagecontainerload', '.spkpmpage', function(){  
    var interval = setInterval(function(){
        $.mobile.loading('hide');
     
    },1); 
       clearInterval(interval);
});

$(document).on("pagehide",".spkpmpage",function(){ // When leaving pagetwo
    var interval = setInterval(function(){
        $.mobile.loading('hide');
    
    },1);
        clearInterval(interval);
});

$(document).on('pageshow', '.spkpmpage', function(){  
    var interval = setInterval(function(){
        $.mobile.loading('hide');
   
    },1);  
         clearInterval(interval);
});

$(document).ready(function(){
 var interval = setInterval(function(){
        $.mobile.loading('hide');
     
    },1);
       clearInterval(interval);
});

$( document ).on( "mobileinit", function() {
    $.mobile.loader.prototype.options.disabled = true;
});

$( document ).on( "mobileinit", function() {
 var interval = setInterval(function(){
        $.mobile.loading('hide');
     
    },1);
       clearInterval(interval);
});


