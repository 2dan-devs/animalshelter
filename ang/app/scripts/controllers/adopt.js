/* global angular */
'use strict';

angular.module('animalShelterApp')
.controller('AdoptCtrl', function ($scope, SharedServices) {

	var spinner = angular.element('.fa-spinner'); // Holds spinner element.

	/*
	* Binds 3 radio buttons (all, cats, dogs).
	* Load 'all' records by default.
	*/
	$scope.species = 'all';

	/*
	* When user selects a specie, display appropriate data.
	*/
	$scope.$watch('species', function() {
		spinner.show();

		if ($scope.species === 'all') {
			/*
			* Get all available animals.
			*/
			SharedServices.getAllAnimals().success(function(data) {
				spinner.hide();
				$scope.animals = data;
			});

		} else if ($scope.species === 'cats') {
			/*
			* Get all available Cats.
			*/
			SharedServices.getAllCats().success(function(data) {
				spinner.hide();
				$scope.animals = data;
			});

		} else if ($scope.species === 'dogs') {
			/*
			* Get all available Dogs.
			*/
			SharedServices.getAllDogs().success(function(data) {
				spinner.hide();
				$scope.animals = data;
			});
		}

	}); // end $scope.$watch('species').

}); // end AdoptCtrl.
