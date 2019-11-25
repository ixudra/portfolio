
    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::people.form.fields', array('prefix' => $prefix, 'title' => Translate::recursive('portfolio::common.titles.basicInformation')))

    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::addresses.fields', array('prefix' => 'address_', 'title' => Translate::recursive('portfolio::models.address.singular')))
