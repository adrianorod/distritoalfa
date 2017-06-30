(function() {
  'use strict';

  angular
    .module('distritoalfa')
    .controller('convitesController', convitesController);

  function convitesController($rootScope, $location) {
    /* jshint validthis: true*/
    var vm = this;
    $rootScope.activetab = $location.path();
  }
})();
