/**
 * Created by edgar on 23/01/16.
 */
(function() {
    'use strict';

    angular
        .module('ciuApp')
        .controller('LoginController', function($scope, $log, UserService, $auth, $state){
            //$scope.login = {};

               $scope.login = function() {

                    var credentials = {
                        email: $scope.login.email,
                        password: $scope.login.password
                    };

                    // Use Satellizer's $auth service to login
                    $auth.login(credentials).then(function(data) {
                        $log.info(data);
                        // If login is successful, redirect to the users state
                       // $state.go('users', {});
                    });
                }

        });
})();
