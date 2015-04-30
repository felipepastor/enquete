<h3 class="clearfix title-enquete">
    Adicionar nova enquete
</h3>

<alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)">
    <span ng-bind-html="alert.msg | parseHtml"></span>
</alert>

<div class="row">
    <form class="col-md-6" ng-submit="submit()">
        <div class="form-group">
            <label for="nome_enquete">Nome da enquente</label>
            <input type="text" class="form-control" ng-model="enquete.nome" id="nome_enquete" placeholder="Digite o nome da enquete">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" ng-model="enquete.ativa"> Pública?
            </label>
        </div>
        <button type="submit" class="btn btn-success pull-right">Salvar</button>
    </form>

    <form class="col-md-6 form_enquete">
        <label for="nome_da_pergunta">Nome da pergunta</label>
        <div class="input-group">
            <input type="text" ng-disabled="checked" class="form-control" id="nome_da_pergunta[]" placeholder="Nome da pergunta">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" ng-disabled="checked">
                    <i class="glyphicon glyphicon-plus"></i>
                </button>
            </span>
        </div>
        <div class="col-md-12 nopadding-right respostas">
            <div class="input-group">
                <input type="text" ng-disabled="checked" class="form-control" id="nome_da_pergunta[]" placeholder="Nome da resposta">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" ng-disabled="checked">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </span>
            </div>
        </div>
    </form>
</div>