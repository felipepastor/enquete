/**
 * @ngdoc directive
 * @name Enquete
 *
 * @description
 * Diretivas customizadas
 *
 * @restrict A
 * */
enqueteDirective
    .directive("loader", function ($rootScope) {
        return function ($scope, element, attrs) {
            $scope.$on("loader_show", function () {
                return element.show();
            });

            $scope.$on("loader_hide", function () {
                return element.hide();
            });
        };
    });
