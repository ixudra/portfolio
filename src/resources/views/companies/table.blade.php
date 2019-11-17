
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ Translate::recursive('portfolio::members.name') }}</th>
                    <th>{{ Translate::recursive('portfolio::members.vat_nr') }}</th>
                    <th>{{ Translate::recursive('portfolio::models.address.singular') }}</th>
                    <th>{{ Translate::recursive('portfolio::members.representative') }}</th>
                    <th>{{ Translate::recursive('common.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $companies as $company )
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{!! HTML::linkRoute('admin.companies.show', $company->name, array($company->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.companies.show', $company->vat_nr, array($company->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.companies.show', $company->corporateAddress->present()->name, array($company->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.companies.show', $company->representative->present()->fullName, array($company->id)) !!}</td>
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::iconRoute('admin.companies.edit', Translate::recursive('common.edit'), 'edit', array($company->id), array('class' => 'btn btn-actions pull-left')) !!}</li>
                                <li>{!! HTML::iconRoute('admin.companies.show', Translate::recursive('common.delete'), 'trash', array($company->id, '_token' => csrf_token()), array('class' => 'btn btn-actions pull-left rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $companies->render() !!}
    </div>
