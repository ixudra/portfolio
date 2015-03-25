
    <ul>
    @foreach( $addresses as $address )
        <li>{!! HTML::linkRoute('admin.addresses.show', $address->name, array($address->id)) !!}</li>
    @endforeach
    </ul>