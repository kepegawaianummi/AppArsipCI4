// Code goes here
var app = angular.module('AHPApp', []);
app.controller('AHPController', function ($scope,$http) {
    $scope.kkkk = 100;
    $scope.penghasilan1 = 4;
    $scope.prestasi2 = 8;
    $scope.ipk = 1;
    $scope.prestasi = 1;
    $scope.penghasilan = 1;
    $scope.ratio = 3 ;
    //baris kahiji
    $scope.prestasiolah1 = $scope.ipk / $scope.prestasi1;
    $scope.penghasilanolah1 = $scope.ipk / $scope.penghasilan1;
    $scope.prestasi2olah1 = $scope.prestasi / $scope.prestasi2;
    $scope.totalprestasi = $scope.prestasi1 + $scope.prestasi +$scope.prestasi2olah1;
    $scope.editorEnabled = false;
    
    $scope.enableEditor = function() {
    $scope.editorEnabled = true;
    $scope.editprestasi1 = $scope.prestasi1;
    $scope.editpenghasilan1 = $scope.penghasilan1;
    $scope.editprestasi2 = $scope.prestasi2 ;
  };
  
    $scope.disableEditor = function() {
    $scope.editorEnabled = false;
  };
  
    $scope.save = function() {
    $scope.prestasi1 = $scope.editprestasi1;
    $scope.penghasilan1 = $scope.editpenghasilan1;
    $scope.prestasi2 =  $scope.editprestasi2 ;
    $scope.prestasiolah1 = $scope.ipk / $scope.prestasi1;
    $scope.penghasilanolah1 = $scope.ipk / $scope.penghasilan1;
    $scope.prestasi2olah1 = $scope.prestasi / $scope.prestasi2;
    $scope.total();
    $scope.disableEditor();
  };
  
  $scope.total = function(){
    $scope.totalprestasi = $scope.editprestasi1 + $scope.prestasi + $scope.prestasi2olah1;
  };
  


});
