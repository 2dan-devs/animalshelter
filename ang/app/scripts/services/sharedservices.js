'use strict';

angular.module('animalShelterApp')
   .factory('SharedServices', function ($http) {

      function getAboutInfo() {
         return $http.get('/client_api/aboutus');
      }

      function getEvents() {
         return $http.get('/client_api/events');
      }

      function getContactInfo() {
         return $http.get('/client_api/contactus');
      }

      function getAllAnimals() {
         return $http.get('/client_api/all_animals');
      }

      function getAllCats() {
         return $http.get('/client_api/all_cats');
      }

      function getAllDogs() {
         return $http.get('/client_api/all_dogs');
      }

      function postUserMessage(formData) {
         var _formData = {
            name: formData.name,
            email: formData.email,
            phone: formData.phone,
            userMessage: formData.userMessage
         };

         return $http({
            method: 'POST',
            url: 'client_api/post_message',
            data: _formData
         });
      }

      // Public API here
      return {
         getEvents: getEvents,
         getAllAnimals: getAllAnimals,
         getAllCats: getAllCats,
         getAllDogs: getAllDogs,
         getAboutInfo: getAboutInfo,
         getContactInfo: getContactInfo,
         postUserMessage: postUserMessage
      };

   }); // end SharedServices
