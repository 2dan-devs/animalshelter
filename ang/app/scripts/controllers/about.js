'use strict';

/**
 * @ngdoc function
 * @name animalShelterApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the animalShelterApp
 */
angular.module('animalShelterApp')
  .controller('AboutCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
