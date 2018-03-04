/**
 * @ngdoc controller
 * @name EnqueteEditCtrl
 *
 * @description
 * Controladora responsavel por gerenciar a tela de Ediçao de Enquete, bem como as manipulações das perguntas e respostas
 *
 * @requires $scope
 * @requires $http
 * @requires Enquete
 * @requires $state
 * @requires $modal
 * */
enqueteControllers
    .controller('EnqueteEditCtrl', ['$scope', '$http', 'Enquete', '$state', '$modal',
        function ($scope, $http, Enquete, $state, $modal) {
            $scope.perguntas = [{
                repostas: []
            }];

            $scope.enquete = Enquete.get({
                id: $state.params.id
            }, function (data) {

                $scope.perguntas = data.perguntas;

                parseInt($scope.enquete.ativa) === 1 ? $scope.enquete.ativa = true : $scope.enquete.ativa = false;
            });

            $scope.closeAlert = function (index) {
                $scope.alerts.splice(index, 1);
            };

            $scope.alerts = [];

            if (parseInt($state.params.msg) === 1) {
                $scope.alerts.push({
                    type: 'success',
                    msg: '<strong>Muito bem!</strong> Enquete salva com sucesso, adicione as perguntas e respostas.'
                });
            }

            $scope.submit = function () {
                Enquete.update($scope.enquete, function (response, header) {
                    $scope.alerts = [
                        {
                            type: 'success',
                            msg: '<strong>Muito bem!</strong> Enquete atualizada com sucesso.'
                        }
                    ];
                }, function (error) {
                    $scope.alerts = [
                        {
                            type: 'danger',
                            msg: '<strong>Erro!</strong> Erro ao tentar atualizar a sua enquete, por favor, entre em contato.'
                        }
                    ];
                });
            };

            $scope.pergunta = {
                enquete_id: $state.params.id,
                nome: ''
            };

            $scope.addPergunta = function () {
                if ($scope.pergunta.nome === '') {
                    $scope.alerts.push({
                        type: 'warning',
                        msg: '<strong>Erro!</strong> A pergunta não pode ser vazia.'
                    });
                    return false;
                }

                $http.post('/pergunta/store', $scope.pergunta)
                    .success(function (data, status, headers, config) {
                        $scope.perguntas.unshift(data);
                    })
                    .error(function (data, status, headers, config) {
                        // called asynchronously if an error occurs
                        // or server returns response with an error status.
                    });
            };

            $scope.removePergunta = function (index) {
                const modal = $modal.open({
                    templateUrl: 'app/shared/modal/templates/index.html',
                    controller: 'ModalDeleteCtrl',
                    resolve: {
                        options: function () {
                            return {
                                title: 'Excluir?',
                                content: 'Deseja realmente excluir essa pergunta?'
                            }
                        }
                    }
                });

                modal.result.then(function () {
                    const pergunta = $scope.perguntas[index];

                    $http.delete('/pergunta/' + pergunta.id)
                        .success(function (data) {
                            if (data.retorno === true) {
                                $scope.perguntas.splice(index, 1);

                                $scope.alerts.push({
                                    type: 'success',
                                    msg: '<strong>Muito bem!</strong> Pergunta deletada com sucesso.'
                                });
                            }
                        })
                        .error(function (data) {
                            $scope.alerts.push({
                                type: 'danger',
                                msg: '<strong>Erro!</strong> Tivemos problemas ao salvar a pergunta, tente novamente.'
                            });
                        });
                }, function () {
                    // console.log('cancelado')
                });

            };

            $scope.addResposta = function (index) {
                if ($scope.perguntas[index].resposta === undefined) {
                    $scope.alerts.push({
                        type: 'warning',
                        msg: '<strong>Erro!</strong> A resposta não pode ser vazia.'
                    });
                    return false;
                }

                if ($scope.perguntas[index].respostas === undefined) {
                    $scope.perguntas[index].respostas = [];
                }

                $scope.perguntas[index].resposta.pergunta_id = $scope.perguntas[index].id;

                $http.post('/resposta/store', $scope.perguntas[index].resposta)
                    .success(function (data, status, headers, config) {
                        $scope.perguntas[index].respostas.push(data);
                        $scope.perguntas[index].resposta.nome = '';

                        $scope.alerts.push({
                            type: 'success',
                            msg: '<strong>Parabéns!</strong> Resposta adicionada com sucesso.'
                        });
                    })
                    .error(function (data, status, headers, config) {
                        // called asynchronously if an error occurs
                        // or server returns response with an error status.
                    });
            };

            $scope.removeResposta = function (index, parentIndex) {
                const modal = $modal.open({
                    templateUrl: 'app/shared/modal/templates/index.html',
                    controller: 'ModalDeleteCtrl',
                    resolve: {
                        options: function () {
                            return {
                                title: 'Excluir?',
                                content: 'Deseja realmente excluir essa resposta?'
                            }
                        }
                    }
                });

                modal.result.then(function () {
                    const resposta = $scope.perguntas[parentIndex].respostas[index];

                    $http.delete('/resposta/' + resposta.id).success(function (data) {
                        if (data.retorno === true) {
                            $scope.perguntas[parentIndex].respostas.splice(index, 1);
                        }
                    }).error(function (data) {

                    });
                }, function () {
                    // console.log('cancelado resposta');
                });
            };
        }]);