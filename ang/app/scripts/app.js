'use strict';

/**
 * @ngdoc overview
 * @name animalShelterApp
 * @description
 * # animalShelterApp
 *
 * Main module of the application.
 */
angular
  .module('animalShelterApp', ['ngAnimate','ngCookies','ngRoute','ngSanitize'])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl'
      })
      .when('/contact', {
        templateUrl: 'views/contact.html',
        controller: 'ContactCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  });
