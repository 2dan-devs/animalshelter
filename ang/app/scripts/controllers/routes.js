'use strict';

/**
 * @ngdoc function
 * @name animalShelterApp.controller:RoutesCtrl
 * @description
 * # RoutesCtrl
 * Controller of the animalShelterApp
 */
angular.module('animalShelterApp')
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
      .when('/events', {
        templateUrl: 'views/events.html',
        controller: 'EventsCtrl'
      })
      .when('/adopt', {
        templateUrl: 'views/adopt.html',
        controller: 'AdoptCtrl'
      })
      .when('/volunteer', {
        templateUrl: 'views/volunteer.html',
        controller: 'VolunteerCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  });