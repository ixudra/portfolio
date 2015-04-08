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

    <div class="row">
        <div class="well well-large col-md-12">
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('members.vat_nr') }}:</div>
                <div class='col-md-8'>{{ $company->vat_nr }}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('members.email') }}:</div>
                <div class='col-md-8'>{!! link_to('mailto:'. $company->email, $company->email) !!}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('members.url') }}:</div>
                <div class='col-md-8'>{!! link_to($company->url, $company->url, array('target' => '_blank')) !!}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('members.phone') }}:</div>
                <div class='col-md-8'>{{ $company->phone }}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('members.fax') }}:</div>
                <div class='col-md-8'>{{ $company->fax }}</div>
            </div>
        </div>
    </div>

    @include('portfolio::companies.corporateAddress', array('address' => $company->corporateAddress))

    @include('portfolio::companies.billingAddress', array('address' => $company->billingAddress))

    @include('portfolio::companies.representative', array('person' => $company->representative))

@endsection