/**
 * Created by edgar on 24/01/16.
 */
(function() {
    'use strict';

    angular
        .module('ciuApp')
        .controller('SignupController', function($state, $auth, toastr, $log, $scope, CiuServices){
            $scope.user = {};
            $scope.users = {email:'eespienetti@gmail.com', username: 'galue', password: 123123};
            $scope.submit = function(form){
                $scope.submitted = true;
                if(form.$valid){
                    CiuServices.User.save($scope.users, function(data){
                        $log.info(data);
                    });
                }

            }
        });
})();