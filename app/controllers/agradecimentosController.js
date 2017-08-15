(function() {
  'use strict';

  angular
    .module('distritoalfa')
    .controller('agradecimentosController', agradecimentosController);

  function agradecimentosController($rootScope, $location) {
    /* jshint validthis: true*/
    var vm = this;
    $rootScope.activetab = $location.path();

    vm.redirecionando = redirecionando;

    function redirecionando(local) {
      window.location.href = local;
    }

  }
})();
