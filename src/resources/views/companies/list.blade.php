
    <ul>
    @foreach( $companies as $company )
        <li>{!! HTML::linkRoute('admin.companies.show', $company->name, array($company->id)) !!}</li>
    @endforeach
    </ul>