(function() {
  'use strict';

  angular
    .module('distritoalfa')
    .controller('convitesController', convitesController);

  function convitesController($document) {
    /* jshint validthis: true*/
    var vm = this;

    vm.enviar = enviar;

    function enviar() {
      angular.element($document[0].querySelector('input.ng-invalid')).focus();
    }

  }
})();
