/**
 * Created by edgar on 24/01/16.
 */
(function() {
    'use strict';

    angular
        .module('ciuApp')
        .controller('LogoutController', function($state, $auth, $log, toastr){

            $log.info('abc');

            $auth.logout()
                .then(function() {
                    toastr.info('You have been logged out');
                    $state.go('main');
                });
        });
})();