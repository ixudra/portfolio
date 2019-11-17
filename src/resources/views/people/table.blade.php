
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ Translate::recursive('portfolio::members.name') }}</th>
                    <th>{{ Translate::recursive('portfolio::members.email') }}</th>
                    <th>{{ Translate::recursive('common.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $people as $person )
                <tr>
                    <td>{{ $person->id }}</td>
                    <td>{!! HTML::linkRoute('admin.people.show', $person->present()->fullName, array($person->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.people.show', $person->email, array($person->id)) !!}</td>
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::iconRoute('admin.people.edit', Translate::recursive('common.edit'), 'edit', array($person->id), array('class' => 'btn btn-actions pull-left')) !!}</li>
                                <li>{!! HTML::iconRoute('admin.people.show', Translate::recursive('common.delete'), 'trash', array($person->id, '_token' => csrf_token()), array('class' => 'btn btn-actions pull-left rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $people->render() !!}
    </div>
