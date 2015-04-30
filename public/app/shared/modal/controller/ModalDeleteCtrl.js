/**
 * @ngdoc controller
 * @name ModalDelete
 *
 * @description
 * _Please update the description and dependencies._
 *
 * @requires $scope
 * */
enqueteSharedControllers
    .controller('ModalDeleteCtrl', function ($scope, $modalInstance, options) {
        $scope.title = options.title;
        $scope.content = options.content;

        $scope.ok = function () {
            $modalInstance.close();
        };

        $scope.cancel = function () {
            $modalInstance.dismiss();
        };
    });
