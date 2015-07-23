'use strict';

describe('Controller: AdoptCtrl', function () {

  // load the controller's module
  beforeEach(module('animalShelterApp'));

  var AdoptCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    AdoptCtrl = $controller('AdoptCtrl', {
      $scope: scope
    });
  }));

  // it('should get animal info from backend api and display data', function () {
  //
  // });
});
