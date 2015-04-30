<h3 class="clearfix">
    Últimas enquetes criadas
    <div class="pull-right">
        <button type="button" class="btn btn-primary" ui-sref="enqueteAdicionar">
            <i class="glyphicon glyphicon-plus"></i> Adicionar
        </button>
    </div>
</h3>

<hr/>
<div class="table-container">
    <div class="form-group input-group pull-right col-md-4 nopadding">
        <input type="text" class="form-control" placeholder="Filtre as enquetes :)" aria-describedby="basic-addon1">
        <span class="input-group-addon" id="basic-addon1">
            <i class="glyphicon glyphicon-search"></i>
        </span>
    </div>
    <table class="table table-bordered col-md-12 enquete-table">
        <tr>
            <th>Enquete</th>
            <th>Criada em</th>
            <th>Ativa?</th>
            <th class="actions">Ações</th>
        </tr>

        <tr ng-repeat="enquete in enquetes">
            <td><a ui-sref="enqueteEdit({id:enquete.id, msg:0})"><% enquete.nome %></a></td>
            <td><% enquete.created_at | asDate %></td>
            <td><% enquete.ativa %></td>
            <td class="center">
                <button class="btn btn-danger" ng-click="delete($index, $event)">Excluir</button>
                <button class="btn btn-info">Editar</button>
                <button class="btn btn-default">Visualizar</button>
            </td>
        </tr>
    </table>

</div>


