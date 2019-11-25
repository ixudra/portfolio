
    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::companies.form.fields', array('prefix' => $prefix))

    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::addresses.fields', array('prefix' => 'corporate_address_', 'title' => Translate::recursive('portfolio::members.corporateAddress')))

    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::people.form.fields', array('prefix' => 'representative_', 'title' => Translate::recursive('portfolio::members.representative')))
