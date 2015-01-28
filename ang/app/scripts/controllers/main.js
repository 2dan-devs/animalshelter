'use strict';

/**
 * @ngdoc function
 * @name animalShelterApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the animalShelterApp
 */
angular.module('animalShelterApp')
  .controller('MainCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
