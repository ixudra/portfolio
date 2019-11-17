@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'company')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'company')) }}
@endsection


@section('content')

@include('portfolio::companies.form', array('route' => array('admin.companies.show', $company->id), 'method' => 'put', 'input' => $input, 'formId' => 'editCompany', 'redirectUrl' => 'admin.companies.show', 'redirectParameters' => array($company->id)))

@endsection
