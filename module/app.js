var app = angular.module('myApp',[]);

app.controller('consumidorCtrl', function ($scope, $http){    
  $http.get('php/data.php')
  .success(function(response){
     console.log(response);
     $scope.nombres = response.records;
  });
});