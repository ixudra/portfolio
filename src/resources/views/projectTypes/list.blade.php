
    <ul>
    @foreach( $projectTypes as $projectType )
        <li>{!! HTML::linkRoute('admin.projectTypes.show', $projectType->name, array($projectType->id)) !!}</li>
    @endforeach
    </ul>