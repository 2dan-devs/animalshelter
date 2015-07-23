'use strict';

/**
 * @ngdoc function
 * @name animalShelterApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the animalShelterApp
 */
angular.module('animalShelterApp')
	.controller('AboutCtrl', function ($scope, SharedServices) {

		var spinner = angular.element('.fa-spinner');
		/*
		 * Get About Info from Backend API and remove spinner on success
		 */
		SharedServices.getAboutInfo().success(function(response) {
			spinner.hide();
			$scope.aboutus = response;
		});

	});
