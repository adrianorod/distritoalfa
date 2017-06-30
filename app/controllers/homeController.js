(function() {
  'use strict';

  angular
    .module('distritoalfa')
    .controller('homeController', homeController);

  function homeController($rootScope, $location) {
    /* jshint validthis: true*/
    var vm = this;
    $rootScope.activetab = $location.path();

  }
})();
