
    <ul>
    @foreach( $projects as $project )
        <li>{!! HTML::linkRoute('admin.projects.show', $project->name, array($project->id)) !!}</li>
    @endforeach
    </ul>