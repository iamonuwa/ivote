(function(angular) {
    'use strict';

    angular
        .module('camera')
        .controller('voterCtrl', controller);

    controller.$inject = [];

    function controller() {
        /* jshint validthis: true */
        var vm = this;

        vm.picture = false; // Initial state
    }

})(angular);
