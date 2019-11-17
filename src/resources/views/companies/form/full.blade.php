
    @include('portfolio::companies.form.fields', array('prefix' => $prefix))

    <div class="row">
        <div class="col-md-12">
            <h3>{{ Translate::recursive('portfolio::members.corporateAddress') }}</h3>
        </div>
    </div>

    @include('portfolio::addresses.fields', array('prefix' => 'corporate_address_'))

    <div class="row">
        <div class="col-md-12">
            <h3>{{ Translate::recursive('portfolio::members.representative') }}</h3>
        </div>
    </div>

    @include('portfolio::people.form.fields', array('prefix' => 'representative_'))
