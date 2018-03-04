/**
 * @ngdoc controller
 * @name EnqueteEditCtrl
 *
 * @description
 * Controladora responsável por gerenciar a tela de visualização de enquete e as suas respostas, e até o voto para cada resposta.
 *
 * @requires $scope
 * @requires $http
 * @requires Enquete
 * @requires $state
 * */
enqueteControllers
    .controller('EnqueteViewCtrl', ['$scope', '$http', 'Enquete', '$state', function ($scope, $http, Enquete, $state) {
        $scope.perguntas = [{
            repostas: []
        }];

        $scope.enquete = Enquete.get({
            id: $state.params.id
        }, function (data, i) {
            $scope.perguntas = data.perguntas;

            parseInt($scope.enquete.ativa) === 1 ? $scope.enquete.ativa = true : $scope.enquete.ativa = false;
        });
        $scope.alerts = [];

        $scope.addAvaliacao = function (index) {
            console.log($scope.perguntas[index].selectedResposta);

            if ($scope.perguntas[index].selectedResposta === undefined) {
                $scope.alerts = [
                    {
                        type: 'warning',
                        msg: '<strong>Ops!</strong> Por favor, escolha uma resposta.'
                    }
                ];
                return false;
            }

            $http.post('/resposta/avaliacao/store', $scope.perguntas[index])
                .success(function (data, status, headers, config) {
                    $scope.perguntas[index].checked = false;

                    $scope.alerts.push({
                        type: 'success',
                        msg: '<strong>Parabéns!</strong> Enquente respondida com sucesso.'
                    });
                })
                .error(function (data, status, headers, config) {
                    $scope.alerts.push({
                        type: 'danger',
                        msg: '<strong>Erro!</strong> Tivemos problemas ao responder sua pergunta, por favor, tente novamente.'
                    });
                });
        };

        $scope.closeAlert = function (index) {
            $scope.alerts.splice(index, 1);
        };

    }]);