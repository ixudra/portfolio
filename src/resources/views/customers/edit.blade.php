@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('admin.menu.title.edit', array('model' => 'customer')) }}
@endsection


@section('content')

@include('portfolio::customers.form', array('url' => 'admin/customers/'.$customer->id, 'method' => 'put', 'input' => $input, 'formId' => 'editCustomer', 'redirectUrl' => 'admin.customers.show', 'redirectParameters' => array($customer->id)))

@endsection