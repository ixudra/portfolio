@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'company')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'company')) }}
@endsection


@section('content')

    @include('portfolio::companies.form', array('route' => array('admin.companies.index'), 'method' => 'post', 'input' => $input, 'formId' => 'createCompany', 'redirectUrl' => 'admin.companies.index', 'redirectParameters' => array()))

@endsection
