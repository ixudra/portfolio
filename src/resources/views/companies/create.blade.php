@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('admin.menu.title.new', array('model' => 'company')) }}
@endsection


@section('content')

@include('portfolio::companies.form', array('url' => 'admin/companies/', 'method' => 'post', 'input' => $input, 'formId' => 'createCompany', 'redirectUrl' => 'admin.companies.index', 'redirectParameters' => array()))

@endsection