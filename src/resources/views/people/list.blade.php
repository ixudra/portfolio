
    <ul>
    @foreach( $people as $person )
        <li>{!! HTML::linkRoute('admin.people.show', $person->name, array($person->id)) !!}</li>
    @endforeach
    </ul>