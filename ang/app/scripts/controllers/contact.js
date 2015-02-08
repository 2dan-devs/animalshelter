'use strict';

/**
 * @ngdoc function
 * @name animalShelterApp.controller:ContactCtrl
 * @description
 * # ContactCtrl
 * Controller of the animalShelterApp
 */
angular.module('animalShelterApp')
	.controller('ContactCtrl', function ($scope, contactService) {

		contactService.get().success(function(data){
			$scope.contact = data;
		});
	});



angular.module('animalShelterApp')
	.factory('contactService', function($http){
		return {
			get: function(){
				return $http.get('/client_api/contactus');
			}
		}
	});