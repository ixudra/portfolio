@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'address')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'address')) }}
@endsection


@section('content')

    @include('portfolio::addresses.form', array('route' => array('admin.addresses.show', $address->id), 'method' => 'put', 'input' => $input, 'formId' => 'editAddress', 'redirectUrl' => 'admin.addresses.show', 'redirectParameters' => array($address->id)))

@endsection
