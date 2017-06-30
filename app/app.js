angular.module('distritoalfa', ['ngRoute'])
  .config(function($routeProvider, $locationProvider) {
    $routeProvider
      .when('/',{
        templateUrl:"app/views/home.html",
        controller:"homeController",
        controllerAs:"vm"
      })
      .when('/convites',{
        templateUrl:"app/views/convites.html",
        controller:"convitesController",
        controllerAs:"vm"
      })
      .when('/midias',{
        templateUrl:"app/views/midias.html",
        controller:"midiasController",
        controllerAs:"vm"
      });
    $routeProvider.otherwise({redirectTo: "/"});
  });
