@extends('bootstrap.layouts.master')


@section('content-title')
    {{ $company->name }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('url' => '/admin/companies/'. $company->id, 'method' => 'delete')) !!}
            {!! HTML::linkRoute('admin.companies.edit', Translate::recursive('common.edit'), array($company->id), array('class' => 'btn btn-default')) !!}
            {!! Form::submit(Translate::recursive('common.delete'), array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    @include('portfolio::companies.data', array('company' => $company, 'includeName' => false))

    @include('portfolio::companies.corporateAddress', array('address' => $company->corporateAddress))

    @include('portfolio::companies.billingAddress', array('address' => $company->billingAddress))

    @include('portfolio::companies.representative', array('person' => $company->representative))

@endsection