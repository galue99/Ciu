/**
 * Created by edgar on 23/01/16.
 */
(function() {
    'use strict';

    angular
        .module('ciuApp')
        .factory('CiuServices', function ($resource, base_url)  {
            return {
                User: $resource(base_url + '/api/v1/user/:id', {id: '@id'},{'update':{ method:'PUT'}},{stripTrailingSlashes: true}),
                Information: $resource(base_url + '/api/v1/information/:id', {id: '@id'},{'update':{ method:'PUT'}},{stripTrailingSlashes: true}),
                Register: $resource(base_url + '/api/v1/registration/:id', {id: '@id'},{'update':{ method:'PUT'}},{stripTrailingSlashes: true})
            };
        })
        .factory('UserService', function ($resource, base_url) {
            return $resource('/api/v1/login/', { id: '@id' }, {
                login: { method: 'POST' },
                logout: { method: 'GET' } // Added `find` action
            });
        });
})();