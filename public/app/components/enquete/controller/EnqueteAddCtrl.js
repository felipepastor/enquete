/**
 * @ngdoc controller
 * @name EnqueteAdicionar
 *
 * @description
 * Controladora responsável por gerenciar a tela de adiçao de enquete
 *
 * @requires $scope
 * @requires $http
 * @requires Enquete
 * @requires $state
 * */
enqueteControllers.controller('EnqueteAddCtrl', ['$scope', '$http', 'Enquete', '$state',
    function ($scope, $http, Enquete, $state) {
        $scope.checked = true;

        $scope.enquete = new Enquete({
            id: '',
            nome: '',
            ativa: 0,
            created_at: '',
            updated_at: ''
        });

        $scope.closeAlert = function (index) {
            $scope.alerts.splice(index, 1);
        };

        $scope.submit = function () {
            $scope.enquete.$save($scope.enquete, function (response, header) {
                $state.go('enqueteEdit', {id: response.id, msg: '1'});
            }, function (error) {
                $scope.alerts = [
                    {
                        type: 'danger',
                        msg: '<strong>Erro!</strong> Tivemos alguns erros com a sua requisição por favor, verifique os dados.'
                    }
                ];
            });
        };
    }
]);