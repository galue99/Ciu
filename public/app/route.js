/**
 * Created by edgar on 23/01/16.
 */
(function() {
    'use strict';

    angular
        .module('ciuApp')
        .config(routeConfig);

    function routeConfig($stateProvider, $locationProvider, $urlRouterProvider, $authProvider) {

        $authProvider.loginUrl = '/api/authenticate';

        /*    $locationProvider.html5Mode({
         enabled: true,
         requireBase: false
         });*/

        function loginRequired($q, $location, $auth, $rootScope, $log, $state) {
            var deferred = $q.defer();
            if ($auth.isAuthenticated()) {
                deferred.resolve();
            }else{
                $state.go('main');
            }
        }

        $stateProvider
            .state('main', {
                url: '/main',
                templateUrl: '/app/views/login.html',
                controller: 'LoginController'
            })
            .state('signup', {
                url: '/signup',
                templateUrl: '/app/views/signup.html',
                controller: 'SignupController'
            })
            .state('step1', {
                url: '/step1',
                templateUrl: '/app/views/form-step1.html',
                controller: 'LoginController',
                resolve: {
                    loginRequired: loginRequired
                }
            })
            .state('step2', {
                url: '/step2',
                templateUrl: '/app/views/form-step2.html',
                controller: 'LoginController',
                resolve: {
                    loginRequired: loginRequired
                }
            })
            .state('logout', {
                url: '/logout',
                templateUrl: null,
                controller: 'LogoutController',
                resolve: {
                    loginRequired: loginRequired
                }
            });
        $urlRouterProvider.otherwise('/main');
    }

})();
