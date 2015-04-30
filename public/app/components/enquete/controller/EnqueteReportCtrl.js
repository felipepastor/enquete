/**
 * @ngdoc controller
 * @name EnqueteReportCtrl
 *
 * @description
 * _Please update the description and dependencies._
 *
 * @requires $scope
 * */
enqueteControllers.
    controller('EnqueteReportCtrl', ['$scope', '$http', 'Enquete', '$state', function ($scope, $http, Enquete, $state) {
        $scope.enquete = Enquete.get({id: $state.params.id});

        $http.get('/relatorio/' + $state.params.id)
            .success(function (data) {
                $scope.relatorios = data;
            })
            .error(function () {

            });
    }]);