enqueteApp.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('_home', {
            url: "",
            templateUrl: "app/components/enquete/templates/list.html",
            controller: 'EnqueteCtrl'
        })
        .state('home', {
            url: "/",
            templateUrl: "app/components/enquete/templates/list.html",
            controller: 'EnqueteCtrl'
        })
        .state('enqueteAdicionar', {
            url: "/enquete/create",
            templateUrl: "app/components/enquete/templates/add.html",
            controller: 'EnqueteAddCtrl'
        })
        .state('enqueteEdit', {
            url: "/enquete/:id/edit/:msg",
            templateUrl: 'app/components/enquete/templates/edit.html',
            controller: 'EnqueteEditCtrl'
        })
        .state('enqueteView', {
            url: "/enquete/:id",
            templateUrl: 'app/components/enquete/templates/view.html',
            controller: 'EnqueteViewCtrl'
        })
        .state('enqueteRelatorio', {
            url: "/enquete/:id/report",
            templateUrl: 'app/components/enquete/templates/report.html',
            controller: 'EnqueteReportCtrl'
        })
        .state('error', {
            url: "/error",
            templateUrl: "",
            controller: function () {
                console.log('error');
            }
        });
    $urlRouterProvider.otherwise('/error');
}]);
