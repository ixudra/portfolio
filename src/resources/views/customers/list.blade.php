
    <ul>
    @foreach( $customers as $customer )
        <li>{!! HTML::linkRoute('admin.customers.show', $customer->name, array($customer->id)) !!}</li>
    @endforeach
    </ul>