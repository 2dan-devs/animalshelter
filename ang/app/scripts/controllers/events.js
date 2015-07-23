'use strict';

/**
 * @ngdoc function
 * @name animalShelterApp.controller:EventsCtrl
 * @description
 * # EventsCtrl
 * Controller of the animalShelterApp
 */
angular.module('animalShelterApp')
  .controller('EventsCtrl', function ($scope, SharedServices) {

  		var spinner = angular.element('.fa-spinner');
  		/*
  		 * description
  		 */
  		SharedServices.getEvents().success(function(data) {
  			spinner.hide();
  			$scope.shelterEvents = data;
  		});

  });
