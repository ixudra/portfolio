@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('admin.menu.title.edit', array('model' => 'address')) }}
@endsection


@section('content')

@include('portfolio::addresses.form', array('url' => 'admin/addresses/'.$address->id, 'method' => 'put', 'input' => $input, 'formId' => 'editAddress', 'redirectUrl' => 'admin.addresses.show', 'redirectParameters' => array($address->id)))

@endsection