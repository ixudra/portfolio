@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'customer')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'customer')) }}
@endsection


@section('content')

    <ul role="tablist" class="nav nav-tabs" id="createCustomerTab">
        <li  class="nav-item" role="presentation">
            <a class="nav-link active" id="customer-company-tab" data-toggle="tab" role="tab" data-customer-type="company" href="#company" aria-selected="true">Company</a>
        </li>
        <li  class="nav-item" role="presentation">
            <a class="nav-link" id="customer-person-tab" data-toggle="tab" role="tab" data-customer-type="person" href="#person" aria-selected="false">Person</a>
        </li>
    </ul>

    {!! Form::open(array('route' => array('admin.customers.index'), 'method' => 'post', 'id' => 'createCompany', 'class' => 'form-horizontal', 'role' => 'form')) !!}
        <div class="tab-content" id="createCustomerTabContent">

            {!! Form::hidden('customerType', 'company', array('id' => 'customerType')) !!}

            <div aria-labelledby="customer-company-tab" id="company" class="tab-pane fade show active" role="tabpanel">

                @include('portfolio::companies.form.full', array('input' => $input, 'prefix' => 'company_'))

                <div class="row col-md-12">&nbsp;</div>

                <div class="align-right">
                    {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
                    {!! HTML::linkRoute('admin.customers.index', Translate::recursive('common.cancel'), array(), array('class' => 'btn btn-outline-secondary')) !!}
                </div>

            </div>
            <div aria-labelledby="customer-person-tab" id="person" class="tab-pane fade" role="tabpanel">

                @include('portfolio::people.form.full', array('input' => $input, 'prefix' => 'person_'))

                <div class="row col-md-12">&nbsp;</div>

                <div class="align-right">
                    {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
                    {!! HTML::linkRoute('admin.customers.index', Translate::recursive('common.cancel'), array(), array('class' => 'btn btn-outline-secondary')) !!}
                </div>

            </div>

        </div>
    {!! Form::close() !!}

@endsection
