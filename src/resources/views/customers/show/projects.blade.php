
    <div class="row col-md-12">
        <h2>{{ Translate::recursive('portfolio::models.project.plural') }}</h2>
    </div>

    <div class="d-flex flex-row-reverse bd-highlight">
        {!! HTML::iconRoute('admin.projects.create', Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'project')), 'plus', array('customer_id' => $customer->id), array('class' => 'btn btn-primary')) !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="row col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="table-small">&nbsp;</th>
                    <th>{{ Translate::recursive('portfolio::members.name') }}</th>
                    <th>{{ Translate::recursive('portfolio::members.project_type_id') }}</th>
                    <th>{{ Translate::recursive('portfolio::members.status') }}</th>
                    <th>{{ Translate::recursive('portfolio::form.shown') }}</th>
                    <th>{{ Translate::recursive('common.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $projects as $project )
                <tr>
                    <td>{{ $project->id }}</td>
                    <td class="table-small">{!! HTML::imageRoute('admin.projects.show', $project->image->present()->imageUrl, $project->image->alt, array('class' => 'img-icon', 'title' => $project->image->title), array($project->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.projects.show', $project->name, array($project->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.projects.show', $project->projectType->name, array($project->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.projects.show', $project->present()->projectStatus, array($project->id)) !!}</td>
                    <td>{!! HTML::iconRoute('admin.projects.show', '', $project->present()->hiddenIcon, array($project->id)) !!}</td>
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::iconRoute('admin.projects.edit', Translate::recursive('common.edit'), 'edit', array($project->id), array('class' => 'btn btn-actions pull-left')) !!}</li>
                                <li>{!! HTML::iconRoute('admin.projects.show', Translate::recursive('common.delete'), 'trash-alt', array($project->id, '_token' => csrf_token()), array('class' => 'btn btn-actions pull-left rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
