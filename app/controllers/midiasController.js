(function() {
  'use strict';

  angular
    .module('distritoalfa')
    .controller('midiasController', midiasController);

  function midiasController($rootScope, $location) {
    /* jshint validthis: true*/
    var vm = this;
    $rootScope.activetab = $location.path();
  }
})();
