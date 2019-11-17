
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
                                <li>{!! HTML::iconRoute('admin.projectTypes.edit', Translate::recursive('common.edit'), 'edit', array($projectType->id), array('class' => 'btn btn-actions pull-left')) !!}</li>
                                <li>{!! HTML::iconRoute('admin.projectTypes.show', Translate::recursive('common.delete'), 'trash', array($projectType->id, '_token' => csrf_token()), array('class' => 'btn btn-actions pull-left rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $projectTypes->render() !!}
    </div>
