
    @include('portfolio::companies.show.data', array('company' => $company, 'title' => Translate::recursive('portfolio::common.titles.basicInformation'), 'includeName' => false))

    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::companies.show.corporateAddress', array('address' => $company->corporateAddress, 'title' => Translate::recursive('portfolio::members.corporateAddress')))

    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::companies.show.billingAddress', array('address' => $company->billingAddress, 'title' => Translate::recursive('portfolio::members.billingAddress')))

    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::companies.show.representative', array('person' => $company->representative))

    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::customers.show.projects', array('projects' => $company->projects))
