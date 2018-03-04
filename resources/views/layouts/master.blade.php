<!-- Stored in resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Enquete XYS</title>
        <link rel="stylesheet" href="app/assets/css/styles.css"/>
        <link rel="stylesheet" href="app/vendor/angular-chart.js/dist/angular-chart.css">
    </head>
    <body ng-app="enqueteApp">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Enquete XYS</a>
                </div>


                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a ui-sref="home">Home</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Enquete <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a ui-sref="enqueteAdicionar">Adicionar nova Enquete</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <div class="loader" loader></div>
            <div ui-view class="row"></div>
        </div><!-- /.container -->

    <!-- Bibliotecas para a aplicação -->
    <script src='app/vendor/jquery/dist/jquery.js' type="text/javascript"></script>
    <script src='app/vendor/angular/angular.js' type="text/javascript"></script>
    <script src='app/vendor/angular-ui-router/release/angular-ui-router.js' type="text/javascript"></script>
    <script src='app/vendor/angular-resource/angular-resource.js' type="text/javascript"></script>
    <script src='app/vendor/bootstrap/dist/js/bootstrap.js' type="text/javascript"></script>
    <script src='app/vendor/angular-bootstrap/ui-bootstrap.js' type="text/javascript"></script>
    <script src='app/vendor/angular-bootstrap/ui-bootstrap-tpls.js' type="text/javascript"></script>
    <script src='app/vendor/Chart.js/Chart.js' type="text/javascript"></script>
    <script src='app/vendor/angular-chart.js/dist/angular-chart.js' type="text/javascript"></script>

    <!-- Chamadas para a configuração da aplicação-->
    <script src='app/app.js' type="text/javascript"></script>
    <script src='app/routes.js' type="text/javascript"></script>

    <!-- Chamadas para as Factories -->
    <script src='app/factory/enqueteFactory.js' type="text/javascript"></script>

    <!-- Chamadas para as Controllers -->
    <script src='app/components/enquete/controller/EnqueteCtrl.js' type="text/javascript"></script>
    <script src='app/components/enquete/controller/EnqueteAddCtrl.js' type="text/javascript"></script>
    <script src='app/components/enquete/controller/EnqueteEditCtrl.js' type="text/javascript"></script>
    <script src='app/components/enquete/controller/EnqueteViewCtrl.js' type="text/javascript"></script>
    <script src='app/components/enquete/controller/EnqueteReportCtrl.js' type="text/javascript"></script>

    <!-- Chamadas para as Services -->
    <script src='app/components/enquete/service/EnqueteService.js' type="text/javascript"></script>

    <!-- Chamadas para as Controllers Compartilhadas -->
    <script src='app/shared/modal/controller/ModalDeleteCtrl.js' type="text/javascript"></script>

    <!-- Chamadas para os filtros -->
    <script src='app/filters/EnqueteFilter.js' type="text/javascript"></script>

    <!-- Chamadas para Diretivas -->
    <script src='app/directives/EnqueteDirective.js' type="text/javascript"></script>

    </body>
</html>