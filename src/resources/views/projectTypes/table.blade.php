
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ Translate::recursive('portfolio::members.name') }}</th>
                    <th>{{ Translate::recursive('common.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $projectTypes as $projectType )
                <tr>
                    <td>{{ $projectType->id }}</td>
                    <td>{!! HTML::linkRoute('admin.projectTypes.show', $projectType->name, array($projectType->id)) !!}</td>
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::linkRoute('admin.projectTypes.edit', Translate::recursive('common.edit'), array($projectType->id), array('class' => 'btn btn-actions')) !!}</li>
                                <li>{!! HTML::linkRoute('admin.projectTypes.show', Translate::recursive('common.delete'), array($projectType->id, '_token' => csrf_token()), array('class' => 'btn btn-actions rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $projectTypes->render() !!}
    </div>