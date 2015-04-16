
    @include('portfolio::companies.form.fields', array('prefix' => $prefix))

    <div class=row">
        <h3>{{ Translate::recursive('members.corporateAddress') }}</h3>
    </div>

    @include('portfolio::addresses.fields', array('prefix' => 'corporate_address_'))

    <div class=row">
        <h3>{{ Translate::recursive('members.representative') }}</h3>
    </div>

    @include('portfolio::people.form.fields', array('prefix' => 'representative_'))
