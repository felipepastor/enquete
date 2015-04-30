/**
 * @ngdoc controller
 * @name Enquete
 *
 * @description
 * Controladora responsável por gerenciar a tela inicial de listagem das enquetes
 *
 * @requires $scope
 * @requires Enquete
 * @requires EnqueteService
 * */


enqueteControllers.controller('EnqueteCtrl', ['$scope', 'Enquete', 'EnqueteService', function ($scope, Enquete, EnqueteService) {
    $scope.enquetes = Enquete.query();
    $scope.alerts = [];

    $scope.delete = function(id) {
        return EnqueteService.deleteEnquete(id, $scope);
    };

    $scope.closeAlert = function (index) {
        $scope.alerts.splice(index, 1);
    };
}]);
