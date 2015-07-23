'use strict';

/**
 * @ngdoc function
 * @name animalShelterApp.controller:ContactCtrl
 * @description
 * # ContactCtrl
 * Controller of the animalShelterApp
 */
angular.module('animalShelterApp')
   .controller('ContactCtrl', function ($scope, SharedServices) {

      var spinner = angular.element('.fa-spinner');
      /*
       * Get contact info from backend api.
       */
      SharedServices.getContactInfo().success(function(response) {
         spinner.hide();
         $scope.contactInfo = response;
      });

      /*
       * function to post message to backend.
       */
      $scope.formData = {};
      $scope.formData.name    = null;
      $scope.formData.phone   = null;
      $scope.formData.message = null;
      $scope.formData.email   = null;

      $scope.submitForm = function() {
         SharedServices.postUserMessage($scope.formData).success(function() {
            // TODO: show thank you message in place of form.
         });
      };

      /*
       * Google Map Specific
       */
      var mapOptions = {
         zoom: 12,
         center: new google.maps.LatLng(40.7833, -73.9667),
         mapTypeId: google.maps.MapTypeId.TERRAIN
      };
      // Initialize map
      $scope.map = new google.maps.Map(document.getElementById('gmap'), mapOptions);

      // Add marker to map
      var marker = new google.maps.Marker({
         position: new google.maps.LatLng(40.7833, -73.9667),
         map: $scope.map,
         title: 'Central Park NY'
      });

   });
