'use strict';

/**
 * @ngdoc function
 * @name animalShelterApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the animalShelterApp
 */
angular.module('animalShelterApp')
  .controller('AboutCtrl', function ($scope, $http) {

  		$http.get('/client_api/aboutus')
  			.success(function(response) {
    			$scope.aboutus = response;
  		});
  });