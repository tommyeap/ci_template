'use strict';

/**
 * @ngdoc overview
 * @name tommyAuthApp
 * @description
 * # tommyAuthApp
 *
 * Main module of the application.
 */
angular
  .module('tommyAuthApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch'
  ])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  });
