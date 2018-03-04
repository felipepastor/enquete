/**
 * @ngdoc service
 * @name Enquete
 * @description
 * Exemplo de serviço separando a lógica da controladora para uma camada de tratamento.
 *
 * */
enqueteService
    .service('EnqueteService', ['$modal', 'Enquete', function ($modal, Enquete) {

        this.deleteEnquete = function (id, $scope) {
            const modal = $modal.open({
                templateUrl: 'app/shared/modal/templates/index.html',
                controller: 'ModalDeleteCtrl',
                resolve: {
                    options: function () {
                        return {
                            title: 'Excluir?',
                            content: 'Deseja realmente excluir essa enquete?'
                        }
                    }
                }
            });

            modal.result.then(function () {
                const enquete_to_delete = $scope.enquetes[id];

                Enquete.delete({id: enquete_to_delete.id}, function (response) {
                    if (response.retorno === true) {
                        $scope.enquetes.splice(id, 1);

                        $scope.alerts.push({
                            type: 'success',
                            msg: '<strong>Muito bem!</strong> Enquete excluida com sucesso.'
                        });
                    }
                });
            }, function () {
                console.log('cancelado exclusão de pergunta')
            });
        }

    }]);

