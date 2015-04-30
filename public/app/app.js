var enqueteApp = angular.module('enqueteApp',
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

var enqueteControllers = angular.module('enqueteControllers', ['chart.js']);

var enqueteSharedControllers = angular.module('enqueteSharedControllers', []);

var enqueteFactory = angular.module('enqueteFactory', []);

var enqueteFilter = angular.module('enqueteFilter', []);

var enqueteDirective = angular.module('enqueteDirective', []);

var enqueteService = angular.module('enqueteService', []);


