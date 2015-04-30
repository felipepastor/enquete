/**
 * @ngdoc service
 * @name Enquete
 * @description
 * _Please update the description and dependencies._
 *
 * */
enqueteFilter
    .filter('asDate', ['$filter', function ($filter) {
        return function (input) {
            if (input == null) {
                return "";
            }
            return $filter('date')(new Date(input), 'dd/MM/yyyy HH:mm:ss');
        };
    }])
    .filter('parseHtml', function ($sce) {
        return function (value) {
            if (!value) {
                return '';
            }
            return $sce.trustAsHtml(value);
        };
    });

