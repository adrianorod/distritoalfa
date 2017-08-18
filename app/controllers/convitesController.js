(function() {
  'use strict';

  angular
    .module('distritoalfa')
    .controller('convitesController', convitesController);

  function convitesController($document) {
    /* jshint validthis: true*/
    var vm = this;

    vm.validar = validar;
    function validar(formConvite) {
      if(!formConvite.$valid) {
        angular.element($document[0].querySelector('input.ng-invalid')).focus();
      }
      else {
        angular.element($document[0].querySelector('#apoio')).modal('show');
      }
    }

    vm.enviar = enviar;
    function enviar(formConvite,formulario) {
      console.log(formulario);
      angular.element($document[0].querySelector('#apoio')).modal('hide');
      angular.element($document[0].querySelector('#confirmacao')).modal('show');
      vm.convite = {};
      formConvite.$setUntouched();
      formConvite.$setPristine();
    }

    vm.redirecionando = redirecionando;
    function redirecionando(local) {
      window.location.href = local;
    }

  }
})();
