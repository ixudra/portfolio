@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('admin.menu.title.new', array('model' => 'customer')) }}
@endsection


@section('content')

@include('portfolio::customers.form', array('url' => 'admin/customers/', 'method' => 'post', 'input' => $input, 'formId' => 'createCustomer', 'redirectUrl' => 'admin.customers.index', 'redirectParameters' => array()))

@endsection