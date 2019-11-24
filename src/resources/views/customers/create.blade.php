@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'customer')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'customer')) }}
@endsection


@section('content')

    <ul role="tablist" class="nav nav-tabs" id="createCustomerTab">
        <li class="active" role="presentation">
            <a aria-controls="company" data-toggle="tab" data-customer-type="company" role="tab" aria-expanded="true" id="company-tab" href="#company">Company</a>
        </li>
        <li role="presentation">
            <a aria-controls="person" data-toggle="tab" data-customer-type="person" role="tab" id="person-tab" href="#person">Person</a>
        </li>
    </ul>

    {!! Form::open(array('route' => array('admin.customers.index'), 'method' => 'post', 'id' => 'createCompany', 'class' => 'form-horizontal', 'role' => 'form')) !!}
        <div class="tab-content" id="createCustomerTabContent">

            {!! Form::hidden('customerType', 'company', array('id' => 'customerType')) !!}

            <div aria-labelledby="company-tab" id="customer-company-form" class="tab-pane fade in active" role="tabpanel">

                @include('portfolio::companies.form.full', array('input' => $input, 'prefix' => 'company_'))

                <div class="action-button pull-right">
                    {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
                    {!! HTML::linkRoute('admin.customers.index', Translate::recursive('common.cancel'), array(), array('class' => 'btn btn-default')) !!}
                </div>

            </div>
            <div aria-labelledby="person-tab" id="customer-person-form" class="tab-pane fade" role="tabpanel">

                @include('portfolio::people.form.full', array('input' => $input, 'prefix' => 'person_'))

                <div class="action-button pull-right">
                    {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
                    {!! HTML::linkRoute('admin.customers.index', Translate::recursive('common.cancel'), array(), array('class' => 'btn btn-default')) !!}
                </div>

            </div>

        </div>
    {!! Form::close() !!}

@endsection
