
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ Translate::recursive('members.name') }}</th>
                    <th>{{ Translate::recursive('members.vat_nr') }}</th>
                    <th>{{ Translate::recursive('models.address.singular') }}</th>
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
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::linkRoute('admin.companies.edit', Translate::recursive('common.edit'), array($company->id), array('class' => 'btn btn-actions')) !!}</li>
                                <li>{!! HTML::linkRoute('admin.companies.show', Translate::recursive('common.delete'), array($company->id, '_token' => csrf_token()), array('class' => 'btn btn-actions rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $companies->render() !!}
    </div>