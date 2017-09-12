(function() {
  'use strict';

  angular
    .module('distritoalfa')
    .controller('adminController', adminController);

  function adminController($rootScope, $location, $http) {
    /* jshint validthis: true*/
    var vm = this;

    vm.convite = [];

    $http.get('php/get.php')
      .success(function(retorno) {
        console.log(retorno);
        vm.convite = retorno;
      })
      .error(function(erro) {
        console.log(erro);
      });

  }
})();
