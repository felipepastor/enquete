const enqueteApp = angular.module('enqueteApp',
    [
        'ui.router',
        'ui.bootstrap',
        'ngResource',
        'enqueteControllers',
        'enqueteFactory',
        'enqueteFilter',
        'enqueteDirective',
        'enqueteSharedControllers',
        'enqueteService'
    ],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

const enqueteControllers = angular.module('enqueteControllers', ['chart.js']);

const enqueteSharedControllers = angular.module('enqueteSharedControllers', []);

const enqueteFactory = angular.module('enqueteFactory', []);

const enqueteFilter = angular.module('enqueteFilter', []);

const enqueteDirective = angular.module('enqueteDirective', []);

const enqueteService = angular.module('enqueteService', []);


