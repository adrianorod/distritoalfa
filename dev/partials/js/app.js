(function() {
  'use strict';

  angular
    .module('distritoalfa', ['ngRoute', 'ngAnimate'])
    .config(function($routeProvider, $locationProvider) {

      $routeProvider.when('/',{
          templateUrl:"views/home.html",
          controller:"homeController",
          controllerAs:"vm"
        });

      $routeProvider.when('/convites',{
          templateUrl:"views/convites.html",
          controller:"convitesController",
          controllerAs:"vm"
        });

      $routeProvider.when('/midias',{
          templateUrl:"views/midias.html",
          controller:"midiasController",
          controllerAs:"vm"
        });

      $routeProvider.otherwise({redirectTo: "/"});

    });
})();
