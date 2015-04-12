
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ Translate::recursive('members.name') }}</th>
                    <th>{{ Translate::recursive('members.customer_id') }}</th>
                    <th>{{ Translate::recursive('members.project_type_id') }}</th>
                    <th>{{ Translate::recursive('members.hidden') }}</th>
                    <th>{{ Translate::recursive('common.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $projects as $project )
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{!! HTML::linkRoute('admin.projects.show', $project->name, array($project->id)) !!}</td>
                    <td><span class="glyphicon glyphicon-{{ $project->customer->object->present()->segmentIcon }}" aria-hidden="true"></span> {!! HTML::linkRoute('admin.projects.show', $project->customer->object->present()->fullName, array($project->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.projects.show', $project->projectType->name, array($project->id)) !!}</td>
                    <td><span class="glyphicon glyphicon-{{ $project->present()->hiddenIcon }}" aria-hidden="true"></td>
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::linkRoute('admin.projects.edit', Translate::recursive('common.edit'), array($project->id), array('class' => 'btn btn-actions')) !!}</li>
                                <li>{!! HTML::linkRoute('admin.projects.show', Translate::recursive('common.delete'), array($project->id, '_token' => csrf_token()), array('class' => 'btn btn-actions rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $projects->render() !!}
    </div>