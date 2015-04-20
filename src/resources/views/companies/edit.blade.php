@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'company')) }}
@endsection


@section('content')

@include('portfolio::companies.form', array('url' => 'admin/companies/'.$company->id, 'method' => 'put', 'input' => $input, 'formId' => 'editCompany', 'redirectUrl' => 'admin.companies.show', 'redirectParameters' => array($company->id)))

@endsection