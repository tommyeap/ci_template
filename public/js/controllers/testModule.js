define('app', function(){

  var app = angular.module('testModule', ['bootstrap', 'jquery', 'validate', 'testModule']);

  app.controller('mainController', function($scope, $http){
    $scope.title = 'Hello World';
    alert($scope.title);
  });
}); 