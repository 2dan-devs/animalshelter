"use strict";angular.module("animalShelterApp",["ngAnimate","ngRoute","ngSanitize","angularUtils.directives.dirPagination"]),angular.module("animalShelterApp").controller("NavCtrl",["$scope",function(a){a.activeMenu={item:1}}]),angular.module("animalShelterApp").factory("SharedServices",["$http",function(a){function b(){return a.get("/client_api/aboutus")}function c(){return a.get("/client_api/events")}function d(){return a.get("/client_api/contactus")}function e(){return a.get("/client_api/all_animals")}function f(){return a.get("/client_api/all_cats")}function g(){return a.get("/client_api/all_dogs")}function h(b){var c={name:b.name,email:b.email,phone:b.phone,userMessage:b.userMessage};return a({method:"POST",url:"client_api/post_message",data:c})}return{getEvents:c,getAllAnimals:e,getAllCats:f,getAllDogs:g,getAboutInfo:b,getContactInfo:d,postUserMessage:h}}]),angular.module("animalShelterApp").controller("AboutCtrl",["$scope","SharedServices",function(a,b){var c=angular.element(".fa-spinner");b.getAboutInfo().success(function(b){c.hide(),a.aboutus=b})}]),angular.module("animalShelterApp").controller("ContactCtrl",["$scope","SharedServices",function(a,b){var c=angular.element(".fa-spinner");b.getContactInfo().success(function(b){c.hide(),a.contactInfo=b}),a.formData={},a.formData.name=null,a.formData.phone=null,a.formData.message=null,a.formData.email=null,a.submitForm=function(){b.postUserMessage(a.formData).success(function(){})};var d={zoom:12,center:new google.maps.LatLng(40.7833,-73.9667),mapTypeId:google.maps.MapTypeId.TERRAIN};a.map=new google.maps.Map(document.getElementById("gmap"),d);new google.maps.Marker({position:new google.maps.LatLng(40.7833,-73.9667),map:a.map,title:"Central Park NY"})}]),angular.module("animalShelterApp").controller("MainCtrl",function(){}),angular.module("animalShelterApp").config(["$routeProvider",function(a){a.when("/",{templateUrl:"views/main.html",controller:"MainCtrl"}).when("/about",{templateUrl:"views/about.html",controller:"AboutCtrl"}).when("/contact",{templateUrl:"views/contact.html",controller:"ContactCtrl"}).when("/events",{templateUrl:"views/events.html",controller:"EventsCtrl"}).when("/adopt",{templateUrl:"views/adopt.html",controller:"AdoptCtrl"}).when("/volunteer",{templateUrl:"views/volunteer.html",controller:"VolunteerCtrl"}).otherwise({redirectTo:"/"})}]),angular.module("animalShelterApp").controller("EventsCtrl",["$scope","SharedServices",function(a,b){var c=angular.element(".fa-spinner");b.getEvents().success(function(b){c.hide(),a.shelterEvents=b})}]),angular.module("animalShelterApp").controller("AdoptCtrl",["$scope","SharedServices",function(a,b){var c=angular.element(".fa-spinner");a.species="all",a.$watch("species",function(){c.show(),"all"===a.species?b.getAllAnimals().success(function(b){c.hide(),a.animals=b}):"cats"===a.species?b.getAllCats().success(function(b){c.hide(),a.animals=b}):"dogs"===a.species&&b.getAllDogs().success(function(b){c.hide(),a.animals=b})})}]),angular.module("animalShelterApp").controller("VolunteerCtrl",["$scope","SharedServices",function(a){a.sendVolunteerForm={}}]);