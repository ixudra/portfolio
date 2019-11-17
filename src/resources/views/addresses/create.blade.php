@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'address')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'address')) }}
@endsection


@section('content')

    @include('portfolio::addresses.form', array('route' => array('admin.addresses.index'), 'method' => 'post', 'input' => $input, 'formId' => 'createAddress', 'redirectUrl' => 'admin.addresses.index', 'redirectParameters' => array()))

@endsection
