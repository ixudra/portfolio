
    @include('portfolio::companies.show.data', array('company' => $company, 'includeName' => false))

    @include('portfolio::companies.show.corporateAddress', array('address' => $company->corporateAddress))

    @include('portfolio::companies.show.billingAddress', array('address' => $company->billingAddress))

    @include('portfolio::companies.show.representative', array('person' => $company->representative))

    @include('portfolio::customers.show.projects', array('projects' => $company->projects))