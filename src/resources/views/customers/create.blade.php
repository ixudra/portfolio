@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('admin.menu.title.new', array('model' => 'customer')) }}
@endsection


@section('content')

    <ul role="tablist" class="nav nav-tabs" id="createCustomerTab">
        <li class="active" role="presentation">
            <a aria-controls="company" data-toggle="tab" role="tab" aria-expanded="true"
                id="company-tab" href="#company">Company</a>
        </li>
        <li role="presentation">
            <a aria-controls="person" data-toggle="tab" role="tab"
                id="person-tab" href="#person">Person</a>
        </li>
    </ul>
    <div class="tab-content" id="createCustomerTabContent">
        <div aria-labelledby="company-tab" id="company" class="tab-pane fade in active" role="tabpanel">

            @include('portfolio::companies.form', array('url' => 'admin/companies/', 'method' => 'post', 'input' => $input, 'formId' => 'createCompany', 'redirectUrl' => 'admin.companies.index', 'redirectParameters' => array(), 'prefix' => 'company_'))

        </div>
        <div aria-labelledby="person-tab" id="person" class="tab-pane fade" role="tabpanel">

            @include('portfolio::people.form', array('url' => 'admin/people/', 'method' => 'post', 'input' => $input, 'formId' => 'createPerson', 'redirectUrl' => 'admin.people.index', 'redirectParameters' => array(), 'prefix' => 'person_'))

        </div>
    </div>

@endsection